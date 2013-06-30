<?php 

/**
* 
*/
class Home extends CI_Controller {
    
    private $election;

    public function __construct() {
        parent::__construct();
        $this->load->model('candidate_m');
        $this->load->model('voter_m');
        $this->election = $this->db->select('*')->from('election')->get()->row();
    }

    public function index() {
        if ( time() < $this->election->start_date ) {
            // $this->load->view('not_started');
        }

        if ( time() > $this->election->end_date ) {
            // $this->load->view('ended');
        }

        if ( $_POST ) {
            $this->_process();
        }

        $data = array(
            'election' => $this->election,
            'candidates' => $this->candidate_m->get_all()
        );

        $bricks = array(
            'title' => 'Vote Sheet',
            'content' => $this->load->view('home', $data, true)
        );
        $this->load->view('layouts', $bricks);
    }

    private function _process() {
        $akey = $this->input->post('key');
        $query = $this->voter_m->sync_akey($akey);

        if ( $query->num_rows() !== 1 ) {
            $this->session->set_flashdata('alert', 'alert');
            $this->session->set_flashdata('alert_message', 'Your access key is not valid.');
            redirect();
        }

        $voter = $query->row();

        if ( $voter->vote_for !== '0' ) {
            $this->session->set_flashdata('alert', 'alert');
            $this->session->set_flashdata('alert_message', 'Hey '. $voter->name . ' you cannot vote again.');
            redirect();
        }

        $posted = array(
            'vote_for' => $this->input->post('vfor'),
            'vote_time' => time()
        );

        $this->db->where('id', $voter->id);
        $this->db->update('voter', $posted);

        $this->session->set_flashdata('alert', 'success');
        $this->session->set_flashdata('alert_message', 'Thank You ' . $voter->name . ' for voting.');
        redirect();
    }

}