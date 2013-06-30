<?php 

/**
* 
*/
class Settings extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
        $this->form_validation->set_rules('appname', 'Election Name', 'required');
        $this->form_validation->set_rules('start', 'Election Start Day', 'required');
        $this->form_validation->set_rules('end', 'Election End Day', 'required');

        $this->form_validation->set_error_delimiters('<small>', '</small>');

        if ( $this->form_validation->run() ) {
            // update
            $data = array(
                'name' => $this->input->post('appname'),
                'start_date' => strtotime($this->input->post('start')),
                'end_date' => strtotime($this->input->post('end'))
            );

            $this->db->update('election', $data);

            $this->session->set_flashdata('message', 'Election App Updated!');
            $this->session->set_flashdata('message_type', 'success');
            redirect('admin/settings');
        }

        $data['election'] = $this->db->select('*')->from('election')->get()->row();
        $data['election']->start_date = date('d M, Y', $data['election']->start_date);
        $data['election']->end_date   = date('d M, Y', $data['election']->end_date);

        $bricks = array(
            'title' => 'Application Settings',
            'content' => $this->load->view('settings', $data, true)
        );
        $this->load->view('admin_layouts', $bricks);
    }
}