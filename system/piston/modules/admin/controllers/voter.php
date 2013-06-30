<?php 

/**
* 
*/
class Voter extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('voter_m');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['voters'] = $this->voter_m->get_all();

        $bricks = array(
            'title' => 'New Voter',
            'content' => $this->load->view('voter/home', $data, true)
            );
        
        $this->load->view('admin_layouts',$bricks);
    }

    function create() {
        $this->form_validation->set_rules('name', 'Voter Name', 'required');
        $this->form_validation->set_rules('nomor', 'Voter ID', 'required');
        $this->form_validation->set_error_delimiters('<small>', '</small>');

        if( $this->form_validation->run() ) {
            $data = array(
                'name' => $this->input->post('name'),
                'access_key' => substr(md5(microtime() + $this->input->post('nomor')), 0, 5)
                );
            $this->db->insert('voter', $data);
            redirect('admin/voter');
        }

        $bricks = array(
            'title' => 'Create New Voter',
            'content' => $this->load->view('voter/create', null, true)
            );
        $this->load->view('admin_layouts', $bricks);
    }

        

    function edit($id) {
        $data['voter'] = $this->voter_m->get($id);


        $this->form_validation->set_rules('name', 'Candidate Name', 'required');

        if ( $this->form_validation->run() ) {
            $data = array(
                'name' => $this->input->post('name'),
            );

            $this->voter_m->edit($id, $data);
            redirect('admin/voter');
        }

        $bricks = array(
            'title' => 'Edit Voter',
            'content' => $this->load->view('voter/edit', $data, true)
        );
        $this->load->view('admin_layouts', $bricks);
    }

    function delete($id) {
        $data['voter'] = $this->voter_m->get($id);

                $this->db->where('id', $id);
                $this->db->delete('voter');

        redirect('admin/voter');
    }
}