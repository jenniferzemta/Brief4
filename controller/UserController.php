<?php
require_once '../models/UserModel.php';

class UserController {
    private $model;

    public function __construct($pdo) {
        $this->model = new UserModel($pdo);
    }
// creer 
    // public function CreateUser() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $username = $_POST['username'];
    //         $email = $_POST['email'];
    //         $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //         $role_id= $_POST['role_id'];

    //         if ($this->model->createUser($username, $email, $password,$role_id)) {
    //             echo "User ajouté avec succès!";
    //         } else {
    //             echo "Erreur lors de l'ajout du contact.";
    //         }
    //     }// Récupérer les rôles depuis la base de données
    //     $roles = $this->model->getRoles();
    //     $users = $this->model->getAllUsers();
    //     // print_r($users); // Affiche les utilisateurs pour vérifier
    //     include '../views/admin/users.php';
    // }
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
                    echo "Utilisateur ajouté avec succès!";
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
    // public function listeUsers() {
    //     $users = $this->model->getAllUsers();
    //     include '../views/admin/users.php';
    // }
//

    public function profile() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
            exit;
        }

        $user = $this->model->getUserById($_SESSION['user_id']);
        include '../views/user/profile.php';
    }
    // modifier user

    public function updateUser($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            // $role = $_POST['role_id'];
          

            if ($this->model->updateUser($id, $username, $email, $password)) {
                echo "<script>Un User modifié avec succès!</script>";
            } else {
                echo "Erreur lors de la modification.";
            }
        }
    
        //  print_r($users); // Affiche les utilisateurs pour vérifier
        $user= $this->model->getUserById($id);
        print_r($user);
        include '../views/admin/updateUser.php';
        
    }

    
    public function listeUsers() {
        $users = $this->model->getAllUsers();
        include '../views/admin/users.php';
    }

 
    // delete user

    // Supprimer un contact
    public function deleteUser($id) {
        if ($this->model->deleteUser($id)) {
            header("Location: listeUsers");
        } else {
            echo "<script>Erreur lors de la suppression de l'user.</script>";
        }
    }
    
    // public function updateProfile() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $username = $_POST['username'];
    //         $email = $_POST['email'];

    //         if ($this->model->updateUser($_SESSION['user_id'], $username, $email)) {
    //             header('Location: /user/profile');
    //         } else {
    //             echo "Erreur lors de la mise à jour du profil.";
    //         }
    //     }
 
    // }
    
}