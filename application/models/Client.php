<?php

class Client extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    //cette methode compte le nombre de clients
    public function countAll() {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $this->db->like('firstname', $_GET['search']);
            $this->db->or_like('lastname', $_GET['search']);
            $this->db->from('Client');
            return $this->db->count_all_results();
        }
        return $this->db->count_all('Client');
    }

    public function getClients() {
        $this->db->select(['Client.*', 'Marital_Status.status', 'sum(Credit.remaining) as remaining', 'count(Credit.id) as credits']);
        $this->db->join('Marital_Status', 'Client.id_Marital_Status = Marital_Status.id');
        $this->db->join('Credit', 'Client.id = Credit.id_Client', 'left');
        $this->db->group_by('Client.id');
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $this->db->like('firstname', $_GET['search']);
            $this->db->or_like('lastname', $_GET['search']);
        }
        if (isset($_GET['sortBy']) && in_array($_GET['sortBy'], ['lastname', 'firstname', 'credits', 'remaining'])) {
            $this->db->order_by($_GET['sortBy'], isset($_GET['DESC']) ? 'DESC' : 'ASC');
        }
        $limit = 5;
        if (isset($_GET['per_page'])) {
            $first = ($_GET['per_page'] - 1) * 5;
        } else {
            $first = 0;
        }
        $this->db->limit($limit, $first);
        $query = $this->db->get('Client');
        return $query->result();
    }

    // Méthode pour récupérer les info d'un client
    public function getClientById($id) {
        $this->db->select(['Client.*', 'Marital_Status.status']);
        $this->db->join('Marital_Status', 'Client.id_Marital_Status = Marital_Status.id');
        $this->db->where('Client.id', $id);
        $query = $this->db->get('Client');
        return $query->row();
    }

    public function createClient() {
        $data = [
            'lastname' => $this->input->post('lastname'),
            'firstname' => $this->input->post('firstname'),
            'birthdate' => $this->input->post('birthdate'),
            'address' => $this->input->post('address'),
            'zipcode' => $this->input->post('zipcode'),
            'phone' => $this->input->post('phone'),
            'id_Marital_Status' => $this->input->post('id_Marital_Status'),
        ];
        $data = $this->security->xss_clean($data);
        return $this->db->insert('Client', $data);
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
        $data = $this->security->xss_clean($data);
        return $this->db->update('Client', $data);
    }

    public function deleteClient($id) {
        $this->db->where('id', $id);
        return $this->db->delete('Client');
    }
    
}
