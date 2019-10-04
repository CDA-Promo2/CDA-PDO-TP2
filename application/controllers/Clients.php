<?php

defined('BASEPATH') OR exist('No direct script access allowed');

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Client', 'Credit', 'Status']);
        $this->load->helper(['url', 'form', 'date']);
        $this->load->library(['form_validation', 'pagination']);
    }

    // Méthode gérant la page d'accueil
    public function index() {
        // On passera dans le tableau data toutes les informations utiles pour la vue
        // Le titre de la page
        $data['title'] = "Accueil";
        $data['totalClient'] = $this->Client->countAll();
        $data['totalCredit'] = $this->Credit->countCredits();
        $data['sumCredit'] = $this->Credit->sumCredits();
        // Chargement des différentes vue, avec envoi du tableau data
        $this->load->view('common/header', $data);
        $this->load->view('client/index', $data);
        $this->load->view('common/footer', $data);
    }

    public function clientsList() {
        // On passera dans le tableau data toutes les informations utiles pour la vue
        // Le titre de la page
        $data['title'] = "Liste des Clients";
        // Récupération de tout les Clients
        $data['clients'] = $this->Client->getClients();
        //configuration de la pagination
        $this->load->config('pagination');
        $config = $this->config->item('pagination_config');
        $config['total_rows'] = $this->Client->countAll();
        $config['base_url'] = site_url('clientsList');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        // Chargement des différentes vue, avec envoi du tableau data
        $this->load->view('common/header', $data);
        $this->load->view('client/clientsList', $data);
        $this->load->view('common/footer', $data);
    }

    //Methode gérant la page details
    public function details($id = 0) {

        $data['title'] = 'Informations du client';
        $data['client'] = $this->Client->getClientById($id);
        $data['credits'] = $this->Credit->getCreditsByClient($id);
        
        
        $this->load->view('common/header', $data);
        $this->load->view('client/details', $data);
        $this->load->view('common/footer', $data);
    }

    // Méthode gérant la modification d'un client
    public function edit($id = 0) {
        // Titre de la page
        $data['title'] = "Modification d'un client";
        // Récupération des status
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

    // Gère la page de création d'un client
    public function create() {
        // Titre de la page
        $data['title'] = "Ajout d'un client";
        // Récupération des status maritaux
        $data['marital_status'] = $this->Status->getStatus();

        // Configuration pour l'upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = 1024;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        // Modification de l'affichage des erreurs
        $this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');
        // S'il n'y a pas d'erreurs lors de l'application des règles de vérification
        // form_validation->run() renvoi TRUE si toutes les règles ont été appliquées sans erreurs
        if ($this->form_validation->run() === TRUE) {
            // On appel la méthodes du model Users servant à la création d'un utilsilateur
            $this->Client->createClient();
            // Récupération du dernier ID enregistré
            $lastId = $this->db->insert_id();
            // Si l'upload réussi
            if ($this->upload->do_upload('image')) {
                // On récupère les informations de l'image upload
                $dataUpload = $this->upload->data();
                // On compose une variale contenant le nouveau nom de l'image
                $newName = $dataUpload['file_path'] . 'profil' . $lastId . $dataUpload['file_ext'];
                // Puis on renomme l'image
                rename($dataUpload['full_path'], $newName);
                // On récupère les informations de l'image uploadée
                // Puis on se redirige vers la page d'accueil
                redirect(base_url());
                // Sinon
            } else {
                // On récupère l'erreur de l'upload
                $data['uploadError'] = $this->upload->display_errors('<small class="alert alert-danger p-1 ml-1 ">', '</small>');
            }
        }
        // Chargement des différentes vues servant à la création d'un utilisateur
        $this->load->view('common/header', $data);
        $this->load->view('client/create', $data);
        $this->load->view('common/footer', $data);
    }

}
