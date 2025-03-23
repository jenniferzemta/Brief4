<?php
require_once '../models/UserModel.php';

class UserController {
    private $model;

    public function __construct($pdo) {
        $this->model = new UserModel($pdo);
    }
// creer
public function CreateUser() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role_id = $_POST['role_id'];

        if ($this->model->usernameExists($username)) {
            echo "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
        } else {
            if ($this->model->createUser($username, $email, $password, $role_id)) {
                echo "<script>alert('Utilisateur ajouté avec succès!')</script>";
                header ("Location : CreateUser");
            } else {
                echo "<script>alert('Erreur lors de l'ajout de l'utilisateur.')</script>";
            }
        }
    } else {
        $roles = $this->model->getRoles();
           $users = $this->model->getAllUsers();
         // print_r($users); // Affiche les utilisateurs pour vérifier
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
        include '../views/admin/profile.php';
    }


    // modifier user

    public function updateUser($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role = $_POST['role_id'];
            $status = $_POST['status'];
          

            if ($this->model->updateUser($id, $username, $email, $password, $role, status: $status)) {
                echo "<script>alert('Utilisateur modifié avec succès!')</script>";
                header("Location: CreateUser");
                exit();
            } else {
                echo "<script>alert('Erreur lors de la modification.')</script>";
            }
        }
        $roles = $this->model->getRoles();
      //  $users = $this->model->getAllUsers();
        $user= $this->model->getUserById($id);
        print_r($user);
        include '../views/admin/updateUser.php';
        
    }

    
    public function listeUsers() {
        $users = $this->model->getAllUsers();
        include '../views/admin/users.php';
    }

 
    // delete user
    public function deleteUser($id) {
        if ($this->model->deleteUser($id)) {
            header("Location: CreateUser");
          
        } else {
            echo "Erreur lors de la suppression.";
        }
    } 


//   updateProfile
    // public function updateProfile() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $username = $_POST['username'];
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];

    //         if ($this->model->updateUser($_SESSION['user_id'], $username, $email, $password)) {
    //             header('Location: profile');
    //         } else {
    //             echo "Erreur lors de la mise à jour du profil.";
    //         }
    //     }
 
    // }
//  dashboard
         
    
    
}