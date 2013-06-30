<?php 

/**
* 
*/
class Statistics extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        if ( $this->session->userdata('role') == 'register' ) redirect('admin/voter');
    }

    public function index() {
        // $data = $this->_prep_data();

        // var_dump($data);
        $bricks = array(
            'title' => 'Statistics',
            'content' => $this->load->view('statistics', null, true)
        );
        $this->load->view('admin_layouts', $bricks);
    }

    private function _prep_data() {
        $votes_day = array();
        $voters = $this->db->select('vote_time, vote_for')->from('voter')->get()->result();
        $election = $this->db->select('*')->from('election')->get()->row();
        $date_counter = $election->start_date;
        $total_days = ($election->end_date - $election->start_date) / 60*60*24;
        while ($date_counter < $election->end_date) {
            $i = 0;
            foreach ($voters as $voter) {
                if ($voter->vote_time > $date_counter && $voter->vote_time < $date_counter + 60*60*24) {
                    $votes_day[$i] += 1;
                }
            }
            $i += 1;
            $date_counter += 60*60*24;
        }
        return $votes_day;
    }
}