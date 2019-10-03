<?php

defined('BASEPATH') OR exist('No direct script access allowed');

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Client', 'Status']);
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

    // Gère la page de création d'un client
    public function create() {
        // Titre de la page
        $data['title'] = "Ajout d'un client";
        // Récupération des status maritaux
        $data['status'] = $this->Status->getStatus();
        // Mise en place sécurité CSRF
        $csrf = [
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        ];
        // Si le formulaire de création a été submit
        if ($_POST) {
            // Modification de l'affichage des erreurs
            $this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');
            // S'il n'y a pas d'erreurs lors de l'application des règles de vérification
            // form_validation->run() renvoi TRUE si toutes les règles ont été appliquées sans erreurs
            if ($this->form_validation->run() === TRUE) {
                // On appel la méthodes du model Users servant à la création d'un utilsilateur
                $this->Users->createUser();
                // Puis on se redirige vers la page d'accueil
                redirect(base_url());
            }
        }
        // Chargement des différentes vues servant à la création d'un utilisateur
        $this->load->view('common/header', $data);
        $this->load->view('client/create', [$data, 'csrf' => $csrf]);
        $this->load->view('common/footer', $data);
    }

}
