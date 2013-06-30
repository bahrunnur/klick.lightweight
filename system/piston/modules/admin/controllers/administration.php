<?php 

/**
* 
*/
class Administration extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        if ( $this->session->userdata('role') == 'register' ) redirect('admin/voter');
        
        $this->load->model('admin_m');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['admins'] = $this->admin_m->get_all();

        $bricks = array(
            'title' => 'Administration',
            'content' => $this->load->view('administration/home', $data, true)
        );
        $this->load->view('admin_layouts', $bricks);
    }

    public function create() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[admin.username]|max_length[32]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

        $this->form_validation->set_error_delimiters('<small>', '</small>');

        if ( $this->form_validation->run() ) {
            $salt       = substr(md5(uniqid(rand(), true)), 0, 4);
            $password   = $this->input->post('password');
            $hashedpass = sha1($password . $salt);

            $data = array(
                'username'  => $this->input->post('username'),
                'email'     => $this->input->post('email'),
                'password'  => $hashedpass,
                'role'      => $this->input->post('role'),
                'salt'      => $salt
            );

            $this->admin_m->create($data);
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Admin : ' . $data['username'] . ' with ' . $data['role'] . ' role ' . ' has been created!');
            redirect('admin/administration');
        }

        $bricks = array(
            'title' => 'New Admin',
            'content' => $this->load->view('administration/create', null, true)
        );
        $this->load->view('admin_layouts', $bricks);
    }

    public function edit($id) {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'New Password', 'trim|max_length[32]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|matches[password]');

        $this->form_validation->set_error_delimiters('<small>', '</small>');

        if ( $this->form_validation->run() ) {
            $data = array(
                'username'  => $this->input->post('username'),
                'email'     => $this->input->post('email'),
                'role'      => $this->input->post('role')
            );

            if ( isset($_POST['password']) && $_POST['password'] !== '' ) {
                $salt       = substr(md5(uniqid(rand(), true)), 0, 4);
                $password   = $this->input->post('password');
                $hashedpass = sha1($password . $salt);

                $data['password'] = $hashedpass;
                $data['salt']     = $salt;
            }

            $this->admin_m->edit($id, $data);
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Admin : ' . $data['username'] . ' has been edited!');
            redirect('admin/administration');
        }

        $data['admin'] = $this->admin_m->get($id);

        $bricks = array(
            'title' => 'Edit Admin',
            'content' => $this->load->view('administration/edit', $data, true)
        );
        $this->load->view('admin_layouts', $bricks);
    }

    public function delete($id) {
        $data = $this->admin_m->get($id);
        $this->admin_m->delete($id);

        $this->session->set_flashdata('message_type', 'success');
        $this->session->set_flashdata('message', 'admin: ' . $data->username . ' Deleted!');
        redirect('admin/administration');
    }

    public function backupdb() {
        $this->load->dbutil();
        $this->load->helper('download');

        $backup =& $this->dbutil->backup();
        $name = 'backupdb.zip';
        force_download($name, $backup);
    }

    public function exportcsv() {
        $this->load->model('voter_m');
        $this->load->dbutil();
        $this->load->helper('download');

        $voter = $this->voter_m->get_all();
        $data  = $this->dbutil->csv_from_result($voter);
        $name  = 'voterdata.csv';

        force_download($name, $data);
    }

    public function printresult() {
        // make javascript, window.print();
    }
}