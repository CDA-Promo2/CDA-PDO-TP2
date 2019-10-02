<?php

class Status extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getStatus() {
        $query = $this->db->get('Marital_Status');
        return $query->result();
    }
    
    public function getStatusById($id) {
        $query = $this->db->get_where('Marital_Status', ['id' => $id]);
        return $query->row();
    }
}

