<!-- app/views/liste_contacts.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des contacts</title>
</head>
<body>
    <h1>Liste des contacts</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?= $contact['id'] ?></td>
            <td><?= $contact['nom'] ?></td>
            <td><?= $contact['email'] ?></td>
            <td><?= $contact['telephone'] ?></td>
            <td>
                <a href="modifierContact?id=<?= $contact['id'] ?>">Modifier</a>
                <a href="supprimerContact?id=<?= $contact['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact?')">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="ajouterContact">Ajouter un nouveau contact</a>
</body>
</html>