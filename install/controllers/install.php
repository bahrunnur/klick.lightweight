<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('installer');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->_build_view('Installation', 'start');
    }

    public function step1() {
        $this->session->set_userdata(array(
            'dbname'    => $this->input->post('dbname'),
            'dbhost'    => $this->input->post('dbhost'),
            'dbport'    => $this->input->post('dbport'),
            'dbuser'    => $this->input->post('dbuser'),
            'dbpass'    => $this->input->post('dbpass'),
            'dbtprefix' => $this->input->post('dbtprefix')
        ));

        $this->form_validation->set_rules('dbname', 'Database Name', 'required|trim|callback_validate_dbname');
        $this->form_validation->set_rules('dbhost', 'Database Host', 'required|trim|callback_test_db_connection');
        $this->form_validation->set_rules('dbport', 'Database Port', 'required|trim|callback_test_db_connection');
        $this->form_validation->set_rules('dbuser', 'MySQL Username', 'required|trim');
        $this->form_validation->set_rules('dbpass', 'MySQL Password', 'trim');
        $this->form_validation->set_rules('dbtprefix', 'Table Prefix', 'required|trim|callback_validate_dbtprefix');

        $this->form_validation->set_error_delimiters('<small>', '</small>');

        if ( $this->form_validation->run() ) {
            // validated!
            if ( $this->installer->mysql_acceptable('server') && $this->installer->mysql_acceptable('client') ) {
                $this->session->set_flashdata('message', 'Your Database have been tested and working perfectly!');
                $this->session->set_flashdata('message_type', 'success');

                $this->session->set_userdata('step1_passed', true);
                redirect('index.php/install/step2');
            }

            $this->session->set_flashdata('message', 'Seems like your mysql version does not meet our requirement.');
            $this->session->set_flashdata('message_type', 'alert');

            redirect('index.php/install/step1');
        }

        $this->_build_view('Installation - Step 1', 'step1');
    }

    public function step2() {
        if ( ! $this->session->userdata('step1_passed') ) {
            $this->session->set_flashdata('message', 'Please tell us about your Database first.');
            $this->session->set_flashdata('message_type', 'alert');

            redirect('index.php/install/step1');
        }

        $this->load->helper('file');
        $permissions['directory'] = 'system/piston/config/';
        $permissions['file']      = 'system/piston/config/config.php';

        @chmod('../' . $permissions['directory'], 0777);
        $status['writeable_directory'] = is_writable('../' . $permissions['directory']);

        @chmod('../' . $permissions['file'], 0666);
        $status['writeable_file'] = is_writable('../' . $permissions['file']);

        $data['step_passed'] = $status['writeable_directory'] && $status['writeable_file'];
        $data['permissions'] = $permissions;
        $data['status']      = $status;

        if ( $data['step_passed'] ) {
            $this->session->set_userdata('step2_passed', true);

            redirect('index.php/install/step3');
        }

        $this->_build_view('Installation - Step 2', 'step2', $data);
    }

    public function step3() {
        if ( ! $this->session->userdata('step1_passed') || ! $this->session->userdata('step2_passed') ) {
            $this->session->set_flashdata('message', 'Please tell us about your Database first.');
            $this->session->set_flashdata('message_type', 'alert');
            
            redirect('index.php/install/step1');
        }

        $this->form_validation->set_rules('elname', 'Election Name', 'trim|required');
        $this->form_validation->set_rules('start', 'Start Day of Election', 'trim|required|callback_validate_date');
        $this->form_validation->set_rules('end', 'End Day of Election', 'trim|required|callback_validate_date');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_error_delimiters('<small>', '</small>');

        if ( $this->form_validation->run() ) {
            // validated!
            
            // Installing Klick.
            $install = $this->installer->install($_POST);

            if ( $install['status'] ) {
                // installation success
                $this->session->set_userdata('info', array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'email'    => $this->input->post('email'),
                    'elname'   => $this->input->post('elname'),
                    'start'    => $this->input->post('start'),
                    'end'      => $this->input->post('end')
                ));

                redirect('index.php/install/complete');
            }

            $this->session->set_flashdata('message', $install['message']);
            $this->session->set_flashdata('message_type', 'alert');

            redirect('index.php/install/step3');
        }

        $this->_build_view('Installation - Step 3', 'step3');
    }

    public function complete() {
        if ( ! $this->session->userdata('info') ) {
            redirect('index.php/install/step1');
        }

        $data = $this->session->userdata('info');

        // formatting date for better viewing
        $data['start'] = date('d M Y', strtotime($data['start']));
        $data['end']   = date('d M Y', strtotime($data['end']));

        $this->session->sess_destroy();

        $this->_build_view('Installation - Complete', 'complete', $data);
    }

    public function validate_dbname($dbname) {
        $this->form_validation->set_message('validate_dbname', 'Invalid Database Name.');
        return ! ( preg_match('/[^a-z0-9_-]/i', $dbname) );
    }

    public function validate_dbtprefix($dbtprefix) {
        $this->form_validation->set_message('validate_dbtprefix', 'Table Prefix may only contain numbers, letters, and unserscores.');
        return ! ( preg_match('/[^a-z0-9_]/i', $dbtprefix) );
    }

    public function validate_date($date) {
        $this->form_validation->set_message('validate_date', 'You must provide valid Date');
        return ! ( preg_match('/^a-z0-9\/,\-/i', $date) );
    }

    public function test_db_connection() {
        // Check if MySQL is avalable through PHP
        if ( ! $this->installer->mysql_available() ) {
            $this->form_validation->set_message('test_db_connection', 'Seems like MySQL not well.');
            return false;
        }

        // Checking conection...
        if ( ! $this->installer->test_db_connection() ) {
            $this->form_validation->set_message('test_db_connection', 'We Cannot connect to your Database.');
            return false;
        }

        return true; // All iz well, Hooray!
    }

    private function _build_view($title, $content, $data = null) {
        $bricks = array(
            'title' => $title,
            'content' => $this->load->view($content, $data, true)
        );
        $this->load->view('install_layouts', $bricks);
    }
}