<?php
require_once '../models/UserModel.php';

// constructeur
class UserController {
    private $model;

    public function __construct($pdo) {
        $this->model = new UserModel($pdo);
    }
// creer
public function CreateUser() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role_id = $_POST['role_id'];

        if ($this->model->usernameExists($username)) {
            echo "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.')";
        } else {
            if ($this->model->createUser($username, $email, $password, $role_id)) {
                echo "Utilisateur ajouté avec succès!";
                header ("Location : CreateUser");
            } else {
                echo "Erreur lors de l'ajout de l'utilisateur.";
            }
        }
    } else {
        $roles = $this->model->getRoles();
           $users = $this->model->getAllUsers();
          print_r($users); // Affiche les utilisateurs pour vérifier
        include '../views/admin/users.php';
    }
}
//profile
    public function profile() {
        // if (!isset($_SESSION['user_id'])) {
        //     header('Location: profile');
        //     exit;
        // }
        if (isset($_SESSION['user_id'])) {
            header('Location: profile');
            exit;
        }


        $user = $this->model->getUserById($_SESSION['user_id']);
        include '../views/clients/profile.php';
    }


    // modifier user

    public function updateUser($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username =trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role = $_POST['role_id'];
            $status = $_POST['status'];
          

            if ($this->model->updateUser($id, $username, $email, $password, $role, status: $status)) {
                echo "Utilisateur modifié avec succès! ";
                header("Location: CreateUser");
                exit();
            } else {
                echo "Erreur lors de la modification ";
            }
        }
        $roles = $this->model->getRoles();
      //  $users = $this->model->getAllUsers();
        $user= $this->model->getUserById($id);
      //  print_r($user);
        include '../views/admin/updateUser.php';
        
    }

    
    public function listeUsers() {
        $users = $this->model->getAllUsers();
        include '../Views/admin/users.php';
    }

 
    // delete user
    public function deleteUser($id) {
        if ($this->model->deleteUser($id)) {
            echo "<script> alert('user supprime') </script>";
            header("Location: CreateUser");
          
        } else {
            echo "Erreur lors de la suppression.";
        }
    } 


    
    
}