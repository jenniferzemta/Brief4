<!-- app/views/ajout_contact.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un contact</title>
</head>
<body>
    <h1>Ajouter un contact</h1>
    <form method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="telephone">Téléphone:</label>
        <input type="text" id="telephone" name="telephone" required><br><br>
        <button type="submit">Ajouter</button>
    </form>
    <br>
    <a href="listeContacts">Voir la liste des contacts</a>
</body>
</html>