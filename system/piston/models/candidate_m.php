<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Candidate_m extends CI_Model {
    
    var $image_path;
    var $image_path_url;

    public function __construct() {
        parent::__construct();
        $this->image_path = realpath(APPPATH . '../../assets/images/candidate');
        $this->image_path_url = base_url() . 'assets/images/candidate/';
    }

    public function upload_image($photo) {
        $config = array(
            'upload_path'   => $this->image_path,
            'allowed_types' => 'gif|jpg|png|jpeg|JPG',
            'max_size'      => '5000'
        );

        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload($photo) ) {
            return array('status' => 'error', 'message' => $this->upload->display_errors());
        }

        return array('status' => 'success', 'upload_data' => $this->upload->data());
    }

    public function create($data) {
        // create new candidate
        $this->db->insert('candidate', $data);
    }

    public function get($id) {
        // get one candidate
        $query = $this->db->select('*')->from('candidate')->where('id', $id)->get();

        return $query->row();
    }

    public function get_all() {
        // get all candidate
        $query = $this->db->select('*')->from('candidate')->get();

        return $query->result();
    }

    public function edit($id, $data) {
        // edit candidate
        $this->db->where('id', $id);
        $this->db->update('candidate', $data);
    }

    public function delete($id) {
        // delete candidate
        $this->db->delete('candidate', array('id' => $id));
    }

    public function get_election_info() {
        $query = $this->db->select('*')->from('election')->get();

        return $query->result();
    }
}