<?php

class Client extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getClients() {
        $this->db->select(['Client.*', 'Marital_Status.status']);
        $this->db->join('Marital_Status', 'Client.id_Marital_Status = Marital_Status.id');
        if (isset($_GET['Marital_Status']) && $_GET['service']!=0) {
            $query = $this->db->get_where('Client', array('id_Marital_Status' => $_GET['marital_Status']));
        } else {
            $query = $this->db->get('Client');
        }
        return $query->result();
    }

    
    // Méthode pour récupérer les info d'un client
    public function getClientById($id) {
        $this->db->select(['Client.*','Marital_Status.status']);
        $this->db->join('Marital_Status', 'Client.id_Marital_Status = Marital_Status.id');
        $this->db->where('Client.id',$id);
        $query = $this->db->get('Client');
        return $query->row();
    }
    
     public function createClient() {
        $id = $this->input->post('id');
        $data = [
            'lastname' => $this->input->post('lastname'),
            'firstname' => $this->input->post('firstname'),
            'birthdate' => $this->input->post('birthdate'),
            'address' => $this->input->post('address'),
            'zipcode' => $this->input->post('zipcode'),
            'phone' => $this->input->post('phone'),
            'id_Marital_Status' => $this->input->post('id_Marital_Status'),
        ];
        if (empty($id)) {
            return $this->db->insert('Client', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('Client', $data);
        }
    }
    
    public function updateClient($id) {
        $data = array(
            'lastname' => $this->input->post('lastname'),
            'firstname' => $this->input->post('firstname'),
            'birthdate' => $this->input->post('birthdate'),
            'address' => $this->input->post('address'),
            'zipcode' => $this->input->post('zipcode'),
            'phone' => $this->input->post('phone'),
            'id_Marital_Status' => $this->input->post('id_Marital_Status'),
        );

        $this->db->where('id', $id);
        return $this->db->update('Client', $data);
    }
    
    public function deleteClient($id){
        $this->db->where('id',$id);
        return $this->db->delete('Client');
    }

}