

<?php
require_once '../models/UserModel.php';
require_once '../models/SessionModel.php';
  
   
class AdminController {
    private $model;
    private $sessionModel;

    public function __construct($pdo) {
        $this->model = new UserModel($pdo);
        $this->sessionModel = new SessionModel($pdo);
    }

    public function dasboard() {
        if ($_SESSION['role'] !== 1) {
            header('Location: /profile');
            exit;
        }

        $users = $this->model->getAllUsers();
        include '../views/admin/dashboard.php';
    }



    // public function updateUserRole($userId, $roleId) {
    //     if ($this->model->updateUserRole($userId, $roleId)) {
    //         header('Location: /admin/dashboard');
    //     } else {
    //         echo "Erreur lors de la mise à jour du rôle.";
    //     }
    // }
    

    // Afficher le tableau de bord admin
    public function dashboard() {
        $adminCount = (new UserModel($this->model))->countAdmins();
        $clientCount = (new UserModel($this->model))->countClients();
        include '../views/admin/dashboard.php';
    }

    // Afficher les logs de connexion
    public function logs() {
        $logs = $this->sessionModel->getLogs();
        include '../views/admin/logs.php';
    }
}