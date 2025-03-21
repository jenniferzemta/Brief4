 <!-- <div class="mb-4 pb-2">
                <label for="confirm-password" class="block font-mono text-black">Confirm mdp</label>
                <input type="password" id="confirm-password" placeholder="Confirmez le mot de passe" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div> -->



creaation bd




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