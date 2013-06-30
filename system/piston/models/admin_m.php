<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Admin_m extends CI_Model {

    public function create($data) {
        // create new candidate
        $this->db->insert('admin', $data);
    }

    public function get($id) {
        // get one admin
        $query = $this->db->select('*')->from('admin')->where('id', $id)->get();

        return $query->row();
    }

    public function get_all() {
        // get all admin
        $query = $this->db->select('*')->from('admin')->get();

        return $query->result();
    }

    public function edit($id, $data) {
        // edit admin
        $this->db->where('id', $id);
        $this->db->update('admin', $data);
    }

    public function delete($id) {
        // delete admin
        $this->db->delete('admin', array('id' => $id));
    }
}