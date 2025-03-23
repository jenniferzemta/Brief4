

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-[#FFC0CB]">
    <div class="bg-white p-8 input-validator m-10 w-96">
        <h2 class="text-2xl font-bold mb-6  text-center">Register</h2>
        <form  method="post">
            <div class="mb-4 pb-2">
                <label for="name" class="block font-mono text-black">Nom</label>
                <input type="text" name="username" id="name" placeholder="Votre nom" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4 pb-2">
                <label for="email" class="block font-mono text-black">Email</label>
                <input type="email"  name="email" id="email" placeholder="Votre email" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4 pb-2 ">
                <label for="role" class="block  font-mono text-black">Role</label>
                <select id="role" name="role_id" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php foreach ($roles as $role): ?>
                    <option>  </option>
            <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
        <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4 pb-2">
                <label for="password" class="block font-mono text-black">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- <div class="mb-4 pb-2">
                <label for="confirm-password" class="block font-mono text-black">Confirm mdp</label>
                <input type="password" id="confirm-password" placeholder="Confirmez le mot de passe" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div> -->
            <div class="mb-6 pb-2">
                <label for="status" class="block text-black  font-mono">Status</label>
                <select id="status" name="status" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Actif</option>
                    <option>Inactif</option>
                </select>
            </div>
            <button type="submit" class="w-full py-2 font-mono text-white bg-gradient-to-r from-[#FF2F33] to-[#0A05EB] rounded-md hover:from-red-600 hover:to-blue-600">S'inscrire</button>
        </form>
        <p class="mt-4 text-center font-sans text-gray-500">Already have an account ? <a href="login.php" class="text-blue-600 hover:underline">Login</a></p>
    </div>
</body>
</html>
