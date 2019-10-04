<?php

class Credit extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function countCredits(){
        return $this->db->count_all('Credit');
    }
    
    public function sumCredits(){
        $this->db->select_sum('total');
        $query = $this->db->get('Credit');
        return $query->result()[0]->total;
    }
    
    public function getCreditsByClient($id) {
        $this->db->select(['Credit.*','Credit_Type.type']);
        $this->db->join('Credit_Type','Credit.id_Credit_Type = Credit_Type.id');
        $query = $this->db->get_where('Credit', array('id_Client' => $id));
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
