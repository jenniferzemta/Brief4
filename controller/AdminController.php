

<?php
require_once '../models/UserModel.php';

class AdminController {
    private $model;

    public function __construct($pdo) {
        $this->model = new UserModel($pdo);
    }

    public function dashboard() {
        if ($_SESSION['role'] !== 1) {
            header('Location: /home');
            exit;
        }

        $users = $this->model->getAllUsers();
        include '../views/admin/dashboard.php';
    }

    public function updateUserStatus($userId, $status) {
        if ($this->model->updateUserStatus($userId, $status)) {
            header('Location: /admin/dashboard');
        } else {
            echo "Erreur lors de la mise à jour du statut.";
        }
    }


    public function updateUserRole($userId, $roleId) {
        if ($this->model->updateUserRole($userId, $roleId)) {
            header('Location: /admin/dashboard');
        } else {
            echo "Erreur lors de la mise à jour du rôle.";
        }
    }
    
}