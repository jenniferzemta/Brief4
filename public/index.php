<?php
// public/index.php

require_once '../config/database.php';
require_once '../controller/ContactController.php';
require_once '../controller/UserController.php';
require_once '../controller/AdminController.php';
require_once '../controller/AuthController.php';


$controller = new ContactController($pdo);
$controller2= new UserController($pdo);
$adminController= new AdminController($pdo);
$authController= new AuthController($pdo);

$action = $_GET['action'] ?? 'CreateUser';

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
    case 'CreateUser':
        $controller2->CreateUser();
        break;
    case 'dashboard':  
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
    case 'login':
        $authController->login();
        // case 'listeUsers':
        //     $controller2->listeUsers();
        //     break;
    case 'logout':
        $authController->logout();
        break;
    case 'updateUserStatus':
        $id = $_GET['id'];
        $status = $_GET['status'];
        $adminController->updateUserStatus($id, $status);
        break;
    case 'updateUserRole':
        $id = $_GET['id'];
        $roleId = $_GET['role_id'];
        $adminController->updateUserRole($id, $roleId);
        break;
    case 'profile':
        $userController->profile();
        break;
    case 'updateProfile':
        $userController->updateProfile();
        break;
    case 'history':
        $userController->history();
        break;
  
        case 'updateUserStatus':
            $id = $_GET['id'];
            $status = $_GET['status'];
            $adminController->updateUserStatus($id, $status);
            break;
    case 'updateUserRole':
            $id = $_GET['id'];
            $roleId = $_GET['role_id'];
            $adminController->updateUserRole($id, $roleId);
            break;
    case 'profile':
            $userController->profile();
            break;
    case 'updateProfile':
            $userController->updateProfile();
            break;
    case 'history':
            $userController->history();
            break;
    default:
        
        echo "Page non trouvée.";
        break;
}
?>