<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*   Klick. RESTful API 
*/

require APPPATH . 'libraries/REST_Controller';

class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('candidate_m');
        $this->load->model('voter_m');
    }

    public function candidate_get($id) {
        // get one candidate

        if ( ! $this->get('id') ) {
            $this->response(null, 400);
        }

        $candidate = $this->candidate_m->get( $this->get('id') );

        if ( $candidate ) {
            $this->response($candidate, 200);
        } else {
            $this->response(array('error' => 'Candidate could not be found'), 404);
        }
    }

    public function candidates_get() {
        // get all candidate

        $candidates = $this->candidate_m->get_all();

        if ( $candidates ) {
            $this->response($candidates, 200);
        } else {
            $this->response(array('error' => 'Could not find any candidate'), 404);
        }
    }

    public function election_get() {
        $election = $this->candidate_m->get_election_info();

        if ( $election ) {
            $this->response($election, 200);
        } else {
            $this->response(array('error' => 'Could not fetch the election info'), 404);
        }
    }

    public function vote_post() {
        // voter is voting
        $akey = $this->post('akey');
        $query = $this->voter_m->sync_akey($akey);

        if ( $query->num_rows() !== 1 ) {
            $this->response(array('error' => 'Access Key not valid'), 400);
        }

        $voter = $query->row();

        if ( $voter->vote_for !== '0' ) {
            $this->response(array('error' => 'Hey '. $voter->name . ' you cannot vote again.'), 400);
        }

        $posted = array(
            'vote_for' => $this->post('vfor'),
            'vote_time' => time()
        );

        $this->db->where('id', $voter->id);
        $this->db->update('voter', $posted);

        $this->response(array('success' => 'Thank You ' . $voter->name . ' for voting.'), 200);
    }

    public function kauth_post() {
        $akey = $this->post('akey');
        $query = $this->voter_m->sync_akey($akey);

        if ( $query->num_rows() !== 1 ) {
            $this->response(array('error' => 'Access Key not valid'), 400);
        }

        $voter = $query->row();
        $this->response($voter, 200);
    }
}