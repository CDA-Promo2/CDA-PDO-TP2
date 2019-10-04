<?php

defined('BASEPATH') OR exist('No direct script access allowed');

class Credits extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Client', 'Credit', 'Status']);
        $this->load->helper(['url', 'form', 'date']);
        $this->load->library('form_validation');
    }
    
        // Méthode gérant la modification d'un crédit
    public function edit($id = 0) {
        // Titre de la page
        $data['title'] = "Modification d'un crédit";
        // Récupération du crédit
        $data['Credit_Type'] = $this->type->getType();
        var_dum($data);
        die;
        // Si le formulaire de modification a été submit
        if ($_POST) {
            // Modification de l'affichage des erreurs
            $this->form_validation->set_error_delimiters('<small class="alert alert-danger p-1 ml-1 ">', '</small>');
            // S'il n'y a pas eu d'erreurs lors de l'application des règles de sécurités
            if ($this->form_validation->run() === TRUE) {
                // On appel la méthodes du model Client afin de mettre à jour le client d'id = $id
                $this->Credit->updateCredit($id);
                // Puis on se redirige vers l'accueil
                redirect(base_url());
            }
        }
        // Récupération des informations du client choisi
        $data['credit'] = $this->Credit->getCreditsByClient($id);
        // Si les informations sont vides, alors le client d'id = $id n'existe pas
        if (empty($data['credit'])) {
            show_404();
        } else {
            // Affichage des vues correspondants à l'édition
            $this->load->view('common/header', $data);
            $this->load->view('credit/edit', $data);
            $this->load->view('common/footer', $data);
        }
    }
    
    // Gère la page de création d'un credit
    public function create() {
        // Titre de la page
        $data['title'] = "Ajout d'un credit";
        // Récupération du crédit
        $data['Credit_Type'] = $this->type->getType();
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
                $this->credit->createCredit();

                // Puis on se redirige vers la page d'accueil
                redirect(base_url());
            }
        }
        // Chargement des différentes vues servant à la création d'un utilisateur
        $this->load->view('common/header', $data);
        $this->load->view('credit/create', [$data, 'csrf' => $csrf]);
        $this->load->view('common/footer', $data);
    }

    // Méthodes gérant la suppression d'un crédit
    public function delete() {
        // On récupère l'id du crédit que l'on souhaite supprimer
        $id = $this->uri->segment(2);
        // S'il n'y a pas d'id -> page 404
        if (empty($id)) {
            show_404();
        } else {
            // On appel la méthodes du model Crédit afin de supprimer le crédit d'id = $id
            $credit = $this->Credit->deleteCredit($id);
            redirect('');
        }
    }
    
}

