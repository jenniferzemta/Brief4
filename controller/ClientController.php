<?php
require_once '../models/UserModel.php';
require_once '../models/SessionModel.php';

class ClientController {
    private $userModel;
    private $sessionModel;

    public function __construct($pdo) {
        $this->userModel = new UserModel($pdo);
        $this->sessionModel = new SessionModel($pdo);
    }

    // Afficher la page d'accueil du client
    public function home() {
        // if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Client') {
        //     header('Location: /login');
        //     exit();
        // }
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        include '../views/clients/home.php';
    }

    // Afficher l'historique des connexions du client
    public function history() {
        // if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
        //     header('Location: login');
        //     exit();
        // }

        // Récupérer les logs de connexion de l'utilisateur connecté
        $logs = $this->sessionModel->getLogsByUserId($_SESSION['user_id']);
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        include '../views/clients/history.php';
    }

    // Afficher le profil de l'utilisateur connecté
    public function showProfile() {
        // if (!isset($_SESSION['user_id'])) {
        //    header('Location: /login');
        //     exit();
        //  }

        // Récupérer les informations de l'utilisateur connecté
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        include '../views/clients/profile.php';
    }

    // Mettre à jour le profil de l'utilisateur connecté
    public function updateProfile() {
        // if (!isset($_SESSION['user_id'])) {
        //     header('Location: /login');
        //     exit();
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Mettre à jour l'utilisateur
            if ($this->userModel->updateUserProfile($_SESSION['user_id'], $email, $username, $password)) {
                echo "<script>alert('Profil mis à jour avec succès!');</script>";
                header("Location: /profile");
                exit();
            } else {
                echo "<script>alert('Erreur lors de la mise à jour du profil.');</script>";
            }
        }

        // Afficher le formulaire de profil
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        include '../views/client/profile.php';
    }
}
