<?php 

/**
* 
*/
class Candidate extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        if ( $this->session->userdata('role') == 'register' ) redirect('admin/voter');
        
        $this->load->model('candidate_m');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['candidates'] = $this->candidate_m->get_all();

        $bricks = array(
            'title' => 'Candidate Administration',
            'content' => $this->load->view('candidate/home', $data, true)
        );
        $this->load->view('admin_layouts', $bricks);
    }

    public function create() {
        $this->form_validation->set_rules('name', 'Candidate Name', 'required');
        $this->form_validation->set_rules('info', 'Candidate Info', 'required');
        $this->form_validation->set_error_delimiters('<small>', '</small>');

        if ( $this->form_validation->run() ) {
            $photo = $this->candidate_m->upload_image('photo');

            if ( $photo['status'] == 'success' ) {
                // insert data to the database
                $data = array(
                    'name' => $this->input->post('name'),
                    'photo' => site_url() . 'assets/images/candidate/' . $photo['upload_data']['file_name'],
                    'info' => $this->input->post('info')
                );

                $this->candidate_m->create($data);

                $this->session->set_flashdata('message_type', 'success');
                $this->session->set_flashdata('message', 'Candidate: ' . $data['name'] . ' has been created!');
                redirect('admin/candidate');
            } else {
                $this->session->set_flashdata('message_type', 'alert');
                $this->session->set_flashdata('message', $photo['message']);
                redirect('admin/candidate/create');
            }
        }

        $bricks = array(
            'title' => 'New Candidate',
            'content' => $this->load->view('candidate/create', null, true)
        );
        $this->load->view('admin_layouts', $bricks);
    }

    public function edit($id) {
        $this->form_validation->set_rules('name', 'Candidate Name', 'required');
        $this->form_validation->set_rules('info', 'Candidate Info', 'required');

        if ( $this->form_validation->run() ) {
            $data = array(
                'name' => $this->input->post('name'),
                'info' => $this->input->post('info')
            );

            $this->candidate_m->edit($id, $data);
        }

        $data['candidate'] = $this->candidate_m->get($id);

        $bricks = array(
            'title' => 'Edit Candidate',
            'content' => $this->load->view('candidate/edit', $data, true)
        );
        $this->load->view('admin_layouts', $bricks);
    }

    public function delete($id) {
        $data = $this->candidate_m->get($id);
        $this->candidate_m->delete($id);

        $this->session->set_flashdata('message_type', 'success');
        $this->session->set_flashdata('message', 'Candidate: ' . $data->name . ' Deleted!');
        redirect('admin/candidate');
    }
}