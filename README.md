tailwind css

 npm install tailwindcss @tailwindcss/cli

creation bd

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE NOT NULL
);

INSERT INTO roles (name) VALUES ('Administrateur'), ('Client');


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    logout_time TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


executer le projet avec le fichier index.php
placer le fichier dans votre htdocs de xammp ou www de wamp
http://localhost/CRUD/public/index.php





<!-- <?php
require_once '../models/UserModel.php';

class AuthController {
    private $model;

    public function __construct($pdo) {
        $this->model = new UserModel($pdo);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role_id'];
                header('Location: /auth/login');
            } else {
                echo "Identifiants incorrects.";
            }
        } else {
            include '../views/auth/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role_id= $_POST['role_id'];

            if ($this->model->createUser($username, $email, $password,$role_id)) {
                header('Location: /auth/login');
            } else {
                echo "Erreur lors de l'inscription.";
            }
        } else {
            include '../views/auth/register.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /dashboard');
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
    
}

   <?php  foreach( $user as $profile): ?>
                <h2 class="text-xl font-semibold">Your name </h2>
                <p class="text-gray-500">yourname@gmail.com <?= $profile['username'] ?></p>
            </div> 

            <div class="py-4 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-500"> Nom </span>
                    <span>Your name <?= $profile['username'] ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Email</span>
                    <span>yourname@gmail.com <?= $profile['email'] ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Role</span>
                    <span>Add number <?= $profile['role'] ?></span>
                </div>
               
            </div>
<?php endforeach; ?>