<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

// require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->_check_permissions();
    }

    private function _check_permissions() {
        $granted = $this->session->userdata('granted');

        if ( ! $granted ) {
            redirect('auth');
        }
    }
}