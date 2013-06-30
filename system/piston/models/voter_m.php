<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Voter_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function create($data) {
        //create new voter
        $this->db->insert('voter', $data);
    }

    public function get($id) {
        //get one voter
        $query = $this->db->select('*')->from('voter')->where('id',$id)->get();

        return $query->row();
    }

    public function get_auth($pass) {
        //get admin password autentification 
        $query = $this->db->select('*')->from('admin')->where('password',md5($pass))->get()->row();
    }

    public function get_all() {
        //get all voter
        $query = $this->db->select('*')->from('voter')->get();
        return $query->result();
    }

    public function edit($id, $data) {
        //edit voter
        $this->db->where('id', $id);
        $this->db->update('voter',$data);
    }

    public function delete($id) {
        // delete voter
        $this->db->delete('voter', array('id' => $id));
    }

    public function count_vote($id) {
        return $this->db->select('*')->from('voter')->where('vote_for', $id)->get()->num_rows();
    }

    public function count_all_vote() {
        $total = $this->db->select('*')->from('voter')->where('vote_for !=', 0)->get()->num_rows();
        return $total;
    }

    public function sync_akey($access_key) {
        return $this->db->select('id, name, vote_for')->from('voter')->where('access_key', $access_key)->get();
    }
}