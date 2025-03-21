<!-- app/views/modifier_contact.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un contact</title>
</head>
<body>
    <h1>Modifier un contact</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?= $contact['nom'] ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $contact['email'] ?>" required><br><br>
        <label for="telephone">Téléphone:</label>
        <input type="text" id="telephone" name="telephone" value="<?= $contact['telephone'] ?>" required><br><br>
        <button type="submit">Modifier</button>
    </form>
    <br>
    <a href="listeContacts">Retour à la liste des contacts</a>
</body>
</html>