<?php 

/**
* 
*/
class Dashboard extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        if ( $this->session->userdata('role') == 'register' ) redirect('admin/voter');
    }

    public function index() {
        $bricks = array(
            'title' => 'Administrator Dashboard',
            'content' => $this->load->view('dashboard', null, true)
        );

        if ( is_dir('./install') ) {
            $bricks['alert'] = 'You should delete installation folder for security reason <button class="small button" id="delete_installation" style="margin-bottom: 0;">Delete</button>';
        }

        $this->load->view('admin_layouts', $bricks);
    }

    public function delete_installation() {
        // delete the installation folder
        if ( ! $this->input->is_ajax_request() ) {
            die('What are you doing?');
        }

        header('Content-Type: application/json');

        if ( is_dir('./install') ) {
            $this->load->helper('file');

            if ( delete_file('./install', true) ) {
                rmdir('./install');

                die(json_encode(array('status' => 'success', 'message' => 'Successfully delete the installation folder.')));
            }
        }

        die(json_encode(array('status' => 'alert', 'message' => 'We cannot delete the installation folder, but you can delete it manually')));
    }
}