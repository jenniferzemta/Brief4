<?php 
class AuthController {
    private $model;

    public function __construct($pdo) {
        $this->model = new UserModel($pdo);
    }
    public function Register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role_id = $_POST['role_id'];
    
            if ($this->model->usernameExists($username)) {
                echo "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
            } else {
                if ($this->model->createUser($username, $email, $password, $role_id)) {
                    echo "<script> Utilisateur ajouté avec succès!</script>";
                } else {
                    echo "<script>Erreur lors de l'ajout de l'utilisateur.</script>";
                }
            }
        } else {
            $roles = $this->model->getRoles();
            include '../views/auth/register.php';
        }
    }

    // public function register() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $username = $_POST['username'];
    //         $email = $_POST['email'];
    //         $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    //         if ($this->model->usernameExists($username)) {
    //             echo "Ce nom d'utilisateur est déjà pris.";
    //         } elseif ($this->model->emailExists($email)) {
    //             echo "Cet email est déjà utilisé.";
    //         } else {
    //             if ($this->model->createUser($username, $email, $password, 2)) { // 2 = rôle client
    //                 header('Location: /login');
    //             } else {
    //                 echo "Erreur lors de l'inscription.";
    //             }
    //         }
    //     } else {
    //         include '../views/auth/register.php';
    //     }
    // }

    public function Login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role_id'];
                header('Location: listeUsers');
            } else {
                echo "Identifiants incorrects.";
            }
        } else {
            include '../views/auth/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
    }
}