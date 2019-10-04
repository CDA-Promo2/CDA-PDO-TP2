<?php

class Credit extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getCreditsByClient($id) {
        $this->db->select(['Credit.*', 'Credit_Type.type']);
        $this->db->join('Credit_Type', 'Credit.id_Credit_Type = Credit_Type.id');
        $query = $this->db->get_where('Credit', array('id_Client' => $id));
        return $query->result();
    }

    public function getCreditsType() {
        $query = $this->db->get('Credit_Type');
        return $query->result();
    }

    public function getCreditByID($id) {
        $query = $this->db->get_where('Credit', ['id' => $id]);
        return $query->row();
    }

    public function createCredit($id) {
        $data = [
            'company' => $this->input->post('company'),
            'rate' => $this->input->post('rate'),
            'total' => $this->input->post('total'),
            'remaining' => $this->input->post('total'),
            'negotiable' => $this->input->post('negotiable'),
            'id_Client' => $id,
            'id_Credit_Type' => $this->input->post('credit_Type'),
        ];
        $data = $this->security->xss_clean($data);
        return $this->db->insert('Credit', $data);
    }

    public function updateCredit($id) {
        $data = [
            'company' => $this->input->post('company'),
            'rate' => $this->input->post('rate'),
            'total' => $this->input->post('total'),
            'remaining' => $this->input->post('total'),
            'negotiable' => $this->input->post('negotiable'),
            'id_Credit_Type' => $this->input->post('credit_Type'),
        ];
        $this->db->where('id', $id);
        $data = $this->security->xss_clean($data);
        return $this->db->update('Credit', $data);
    }

    public function deleteCredit($id) {
        $this->db->where('id', $id);
        return $this->db->delete('Credit');
    }

}
