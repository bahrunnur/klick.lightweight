<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*   Klick. RESTful API 
*/

// require '../libraries/REST_Controller.php';

class Api extends REST_Controller {
    
    public function __construct() {
        parent::__construct();
        // $this->load->libraries('REST_Controller');
        $this->load->model('candidate_m');
        $this->load->model('voter_m');
    }

    public function candidate_get() {
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

    public function voter_post() {
        // voter is voting
        $a_key = $this->post('a_key');
    }
}