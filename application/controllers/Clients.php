<?php

defined('BASEPATH') OR exist('No direct script access allowed');

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Client','Status']);
        $this->load->helper(['url', 'form']);
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
    
        // Méthode gérant la modification d'un client
        public function edit($id = 0) {
        // Titre de la page
        $data['title'] = "Modification d'un client";
        // Récupération des services
        $data['marital_status'] = $this->Status->getStatus();
        // Si le formulaire de modification a été submit
        if ($_POST) {
            // Modification de l'affichage des erreurs
            $this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');
            // S'il n'y a pas eu d'erreurs lors de l'application des règles de sécurités
            if ($this->form_validation->run() === TRUE) {
                // On appel la méthodes du model Client afin de mettre à jour le client d'id = $id
                $this->Client->updateClient($id);
                // Puis on se redirige vers l'accueil
                redirect(base_url());
            }
        }
        // Récupération des informations du client choisi
        $data['client'] = $this->Client->getClientById($id);
        // Si les informations sont vides, alors le client d'id = $id n'existe pas
        if (empty($data['client'])) {
            show_404();
        } else {
            // Affichage des vues correspondants à l'édition
            $this->load->view('common/header', $data);
            $this->load->view('client/edit', $data);
            $this->load->view('common/footer', $data);
        }
    }
    
        // Méthodes gérant la suppression d'un client
        public function delete() {
        // On récupère l'id du client que l'on souhaite supprimer
        $id = $this->uri->segment(2);
        // S'il n'y a pas d'id -> page 404
        if (empty($id)) {
            show_404();
        } else {
            // On appel la méthodes du model Client afin de supprimer le client d'id = $id
            $client = $this->Client->deleteClient($id);
            redirect('');
        }
    }
}
