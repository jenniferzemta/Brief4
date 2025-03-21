<?php
include 'dbconn.php';

// Vérifier si l'ID de l'étudiant à modifier est présent dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations de l'étudiant à partir de la base de données
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $email = $_POST['email'];

        // Mettre à jour les informations de l'étudiant dans la base de données
        $sql = "UPDATE students SET nom = '$nom', prenom = '$prenom', age = $age, email = '$email' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Étudiant mis à jour avec succès.";
            header("Location: create.php"); // Rediriger vers la page d'accueil
            exit;
        } else {
            echo "Erreur lors de la mise à jour de l'étudiant: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un étudiant</title>
</head>
<body>
    <div class="container">
    <h1>Modifier un étudiant</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $row['nom']; ?>"><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $row['prenom']; ?>"><br>

        <label for="age">Âge:</label>
        <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>

        <input type="submit" value="Update">
    </form>

    <a href="create.php">Return</a>
    </div>
</body>

<style>
  body {
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    background-color: #87CEEB; /* Bleu ciel */
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    max-width: 500px;
    width: 100%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: #ffffff;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input, .form-group select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}

 button {
    padding: 10px 15px;
    background-color: green;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

 button:hover {
    background-color: #0056b3;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
  color: #555;
}

input[type="text"], input[type="number"], input[type="email"] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 16px;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

/* Style the return link */
a {
  display: block;
  text-align: center;
  color: #007bff;
  text-decoration: none;
  margin-top: 20px;
}

a:hover {
  color: #0056b3;
}
</style>

</html>

<?php
    $conn->close();
}
?>