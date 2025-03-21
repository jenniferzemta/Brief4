<?php
// app/controllers/ContactController.php

require_once '../models/ContactModel.php';

class ContactController {
    private $model;

    public function __construct($pdo) {
        $this->model = new ContactModel($pdo);
    }

    // Afficher la page d'ajout de contact
    public function ajouterContact() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            if ($this->model->ajouterContact($nom, $email, $telephone)) {
                echo "Contact ajouté avec succès!";
            } else {
                echo "Erreur lors de l'ajout du contact.";
            }
        }
        include '../views/AjouterContact.php';
    }

    // Afficher la liste des contacts
    public function listeContacts() {
        $contacts = $this->model->getContacts();
        include '../views/ListeContact.php';
    }

    // Afficher la page de modification de contact
    public function modifierContact($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            if ($this->model->modifierContact($id, $nom, $email, $telephone)) {
                echo "Contact modifié avec succès!";
            } else {
                echo "Erreur lors de la modification du contact.";
            }
        }
        $contact = $this->model->getContactById($id);
        include '../views/ModifierContact.php';
        
    }

    // Supprimer un contact
    public function supprimerContact($id) {
        if ($this->model->supprimerContact($id)) {
            header("Location: listeContacts");
        } else {
            echo "Erreur lors de la suppression du contact.";
        }
    }
    
}
?>