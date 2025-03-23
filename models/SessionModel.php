<?php
class SessionModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Enregistrer une session de connexion
    public function logLogin($user_id) {
        $stmt = $this->pdo->prepare("INSERT INTO sessions (user_id) VALUES (?)");
        return $stmt->execute([$user_id]);
    }

    // Enregistrer une session de déconnexion
    public function logLogout($user_id) {
        $stmt = $this->pdo->prepare("UPDATE sessions SET logout_time = NOW() WHERE user_id = ? AND logout_time IS NULL");
        return $stmt->execute([$user_id]);
    }

    // Récupérer les logs de connexion
    public function getLogs() {
        $stmt = $this->pdo->query("SELECT sessions.*, users.username FROM sessions JOIN users ON sessions.user_id = users.id ORDER BY sessions.login_time DESC");
        return $stmt->fetchAll();
    }
}