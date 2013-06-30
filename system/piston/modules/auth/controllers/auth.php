<?php 

/**
* 
*/
class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[32]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[32]');

        $this->form_validation->set_error_delimiters('<small>', '</small>');

        if ( $this->form_validation->run() ) {
            $username = $this->input->post('username');

            $salt = $this->db->select('salt')->where('username', $username)->get('admin')->row();
            $password = sha1($this->input->post('password') . $salt->salt);

            $query = $this->db->select('*')
                            ->from('admin')
                            ->where('username', $username)
                            ->where('password', $password)
                            ->get();

            if ( $query->num_rows() == 1 ) {
                $row = $query->row();
                $this->session->set_userdata('granted', true);
                $this->session->set_userdata('name', $row->username);
                $this->session->set_userdata('role', $row->role);

                $this->session->set_flashdata('message', 'Welcome, ' . $row->username . '!');
                $this->session->set_flashdata('message_type', 'success');

                if ( $row->role == 'register' ) redirect('admin/voter');

                redirect('admin');
            } else {
                $this->session->set_flashdata('message', 'Wrong Password or Wrong Username');
                $this->session->set_flashdata('message_type', 'alert');

                redirect('auth');
            }
        }

        $bricks = array(
            'title' => 'Login Administrator',
            'content' => $this->load->view('auth', null, true)
        );
        $this->load->view('layouts', $bricks);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}