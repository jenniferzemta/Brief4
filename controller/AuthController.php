<?php
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


    
}