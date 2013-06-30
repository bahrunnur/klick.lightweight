<?php 

/**
* 
*/
class Qcount extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        if ( $this->session->userdata('role') == 'register' ) redirect('admin/voter');
        
        $this->load->model('candidate_m');
        $this->load->model('voter_m');
    }

    public function index() {
        $candidates = $this->candidate_m->get_all();
        $total_votes = $this->voter_m->count_all_vote();

        $n = 0;
        foreach ( $candidates as &$candidate ) {
            $candidate->vote         = $this->voter_m->count_vote($candidate->id);
            $candidate->vote_percent = (float) $candidate->vote / $total_votes * 100;
            $n++;
        }

        arsort($candidates);

        $data = array(
            'candidates' => $candidates,
            'total_votes' => $total_votes
        );

        $bricks = array(
            'title' => 'Quick Count',
            'content' => $this->load->view('qcount', $data, true)
        );
        $this->load->view('admin_layouts', $bricks);
    }
}