<?php

class Credit extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getCreditsByClient($id) {
        $query = $this->get_where('Credit', array('id_Client' => $id));
        return $query->result();
    }

    public function getCreditByID($id) {
        $query = $this->db->get_where('Credit', array('id' => $id));
        return $query->row();
    }

    public function createCredit() {
        $data = array(
            'company' => $this->input('company'),
            'sum' => $this->input('sum'),
            'id_Client' => $this->input->post('id_Client')
        );
        return $this->db->insert('Credit', $data);
    }

    public function updateCredit($id) {
        $data = array(
            'company' => $this->input('company'),
            'sum' => $this->input('sum'),
            'id_Client' => $this->input->post('id_Client')
        );
        $this->where('id', $id);
        return $this->db->update('Credit', $data);
    }
    
    public function deleteCredit($id){
        $this->db->where('id',$id);
        return $this->db->delete('Credit');
    }

}
