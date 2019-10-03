<?php

defined('BASEPATH') OR exist('No direct script access allowed');

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Client','Credit']);
        $this->load->helper(['url', 'form', 'date']);
        $this->load->library('form_validation');
    }

        // Méthode gérant la page d'accueil
        public function index() {
        // On passera dans le tableau data toutes les informations utiles pour la vue
        // Le titre de la page
        $data['title'] = "Liste des Clients";
        // Récupération de tout les Clients
        $data['clients'] = $this->Client->getClients();
        // Chargement des différentes vue, avec envoi du tableau data
        $this->load->view('common/header', $data);
        $this->load->view('client/index', $data);
        $this->load->view('common/footer', $data);
    }
    
    //Methode gérant la page details
    public function details($id = 0){
        
        $data['title'] = 'Informations du client';
        $data['client'] = $this->Client->getClientById($id);
        $data['credits'] = $this->Credit->getCreditsByClient($id);
        
        $this->load->view('common/header', $data);
        $this->load->view('client/details', $data);
        $this->load->view('common/footer', $data);
    }
}
