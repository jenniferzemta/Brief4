

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



    // Afficher le tableau de bord admin
    public function dashboard() {
        $adminCount = $this->model->countAdmins();
        $clientCount = $this->model->countClients();
        include '../views/admin/dashboard.php';
    }
    
    // Afficher les logs de connexion
    public function logs() {
        $logs = $this->sessionModel->getLogs();
        include '../views/admin/logs.php';
    }
}