
<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
// crer
    // public function createUser($username, $email, $password, $role_id) {
    //     $sql = "INSERT INTO users (username, email, password, role_id) VALUES (:username, :email, :password, :role_id)";
    //     $stmt = $this->pdo->prepare($sql);
    //     return $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password ,'role_id'=>$role_id]);
    // }
public function createUser($username, $email, $password, $role_id) {
    try {
        $sql = "INSERT INTO users (username, email, password, role_id) VALUES (:username, :email, :password, :role_id)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id
        ]);
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') { // Code d'erreur pour les violations de contrainte d'unicité
            return false; // Ou affichez un message d'erreur
        }
        throw $e; // Relancez l'exception si ce n'est pas une violation de contrainte d'unicité
    }
}
    // update user 
    public function updateUser($userId, $username, $email, $password, $role_id ,$status) {
        $sql = "UPDATE users SET username = :username, email = :email, password = :password , role_id = :role_id, status = :status  WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['username' => $username, 'email' => $email,  'password' => $password, 'role_id'=> $role_id ,  'status'=> $status ,'id' => $userId]);
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function emailExists($email) {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetchColumn() > 0;
    }
    
    // delete
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    // role
    public function getRoles() {
        $sql = "SELECT * FROM roles";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function usernameExists($username) {
        $sql = "SELECT COUNT(*) FROM users WHERE username = :username";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        return $stmt->fetchColumn() > 0;
    }
    
    public function dashboard() {
        if ($_SESSION['role_id'] == "Administrateur") {
            header('Location: ../views/admin/dashboard.php');
            exit;
        }

        // $users = $this->model->getAllUsers();
        // include '../views/admin/dashboard.php';
    }

    // public function getUserByEmail($email) {
    //     $sql = "SELECT * FROM users WHERE email = :email";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute(['email' => $email]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }
    public function getUserByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT users.*, roles.id as role_id FROM users JOIN roles ON users.role_id = roles.id WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    // recuperer tous les users
       public function getAllUsers() {
        $sql = "SELECT users.id, users.username, users.email, roles.name AS role, users.status 
                FROM users 
                JOIN roles ON users.role_id = roles.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne un tableau associatif
    }
    

    // dashboard
    public function countAdmins() {
        $stmt = $this->pdo->query("SELECT COUNT(*) as count FROM users WHERE role_id = (SELECT id FROM roles WHERE name = 'Administrateur')");
        return $stmt->fetch()['count'];
    }

    // Compter le nombre de clients
    public function countClients() {
        $stmt = $this->pdo->query("SELECT COUNT(*) as count FROM users WHERE role_id = (SELECT id FROM roles WHERE name = 'Client')");
        return $stmt->fetch()['count'];
    }

    // update profile

    public function updateUserProfile($userId, $username, $email) {
        $sql = "UPDATE users SET username = :username, email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['username' => $username, 'email' => $email,'id' => $userId]);
    }

    
}