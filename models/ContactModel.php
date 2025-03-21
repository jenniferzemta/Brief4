<?php
// app/models/ContactModel.php

class ContactModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Ajouter un contact
    public function ajouterContact($nom, $email, $telephone) {
        $sql = "INSERT INTO contacts (nom, email, telephone) VALUES (:nom, :email, :telephone)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['nom' => $nom, 'email' => $email, 'telephone' => $telephone]);
    }

    // Récupérer tous les contacts
    public function getContacts() {
        $sql = "SELECT * FROM contacts";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un contact par son ID
    public function getContactById($id) {
        $sql = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Modifier un contact
    public function modifierContact($id, $nom, $email, $telephone) {
        $sql = "UPDATE contacts SET nom = :nom, email = :email, telephone = :telephone WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id, 'nom' => $nom, 'email' => $email, 'telephone' => $telephone]);
    }

    // Supprimer un contact
    public function supprimerContact($id) {
        $sql = "DELETE FROM contacts WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>