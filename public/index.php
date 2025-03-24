<?php
// public/index.php
session_start();

require_once '../config/database.php';
require_once '../controller/ContactController.php';
require_once '../controller/UserController.php';
require_once '../controller/AdminController.php';
require_once '../controller/AuthController.php';
require_once '../controller/ClientController.php';


$controller = new ContactController($pdo);
$controller2= new UserController($pdo);
$adminController= new AdminController($pdo);
$authController= new AuthController($pdo);
$clientController= new ClientController($pdo);

$pdo = new PDO("mysql:host=localhost;dbname=gestioncontact", "root", "");
$userModel = new UserModel($pdo);

$action = $_GET['action'] ?? 'login';

//action php du controller
switch ($action) {
    case 'ajouterContact':
        $controller->ajouterContact();
        break;
    case 'listeContacts':
        $controller->listeContacts();
        break;
    case 'modifierContact':
        $id = $_GET['id'];
        $controller->modifierContact($id);
        break;
    case 'supprimerContact':
        $id = $_GET['id'];
        $controller->supprimerContact($id);
        break;
    // case 'register':
    //     $authController->Register();
    //     break;
    case 'login':
         $authController->Login();
         break;
    case 'CreateUser':
        $controller2->CreateUser();
        break;
    case 'dashboard':  
        $adminController->dashboard();
        break;
    case 'updateUser':
        $id = $_GET['id'];
        $controller2->updateUser($id);
        break;
    case 'listeUsers':
         $controller2->listeUsers();
        break;
    case 'deleteUser':
        $id = $_GET['id'];
        $controller2->deleteUser($id);
        break;
    case 'logs':
        $adminController->logs();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'profile':
        $clientController->showProfile();
        break;
    case 'admin_logs':
        $adminController->logs();
         break;
    case 'home':
        $clientController->home();
        break;
    case 'updateProfile':
        $clientController->updateProfile();
        break;
    
    case 'history':
        $clientController->history();
        break;
  
    // case 'profile':
    //         $userController->profile();
    //         break;
    // case 'updateProfile':
    //         $userController->updateProfile();
    //         break;
    // case 'history':
    //         $userController->history();
    //         break;
    default:
        
        echo "Page non trouvée.";
        break;
}
?>