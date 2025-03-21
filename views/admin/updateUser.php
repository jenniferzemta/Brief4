

<?php
include "C:/wamp64/www/CRUD/views/layouts/header.php";
    ?>

<!-- --edit-- -->
<div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center">
<div class="bg-white p-6 rounded-lg w-1/3 max-h-[90vh] overflow-y-auto">
        <h2 class="text-2xl font-bold mb-6 text-center">Update</h2>
        <form method="post">
            <div class="mb-4 pb-2">
                <label for="name" class="block font-mono text-black">Nom</label>
                <input type="text" name="username" id="usernameu" placeholder="Votre nom"  value="<?= $user['username'] ?>"  class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4 pb-2">
                <label for="email" class="block font-mono text-black">Email</label>
                <input type="email" name="email" id="emailu" placeholder="Votre email"  value="<?= $user['email'] ?>"  class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4 pb-2 ">
                <label for="role" class="block  font-mono text-black">Role</label>
                <select name="role_id" id="role_idu"  value="<?= $user['role_id'] ?>"  class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php foreach ($roles as $role): ?>
                    <option>  </option>
            <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
        <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4 pb-2">
                <label for="password" class="block font-mono text-black">Mot de passe</label>
                <input type="password" name="password" id="passwordu"   placeholder="Votre mot de passe" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"  value="<?= $user['password'] ?>">
            </div>
            <!-- <div class="mb-4 pb-2">
                <label for="confirm-password" class="block font-mono text-black">Confirm mdp</label>
                <input type="password" id="confirm-password" placeholder="Confirmez le mot de passe" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div> -->
            <div class="mb-6 pb-2">
                <label for="status" class="block text-black  font-mono">Status</label>
                <select id="statusu"   value="<?= $user['status'] ?>"  class="w-full p-2 mt-2  border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Actif</option>
                    <option>Inactif</option>
              
                </select>
            </div>
            <button class="bg-red-500 text-white p-2 rounded" onclick="toggleModal()">Cancel</button>
            <button type="submit" class="w-48 py-2 font-mono text-white bg-gradient-to-r from-[#FF2F33] to-[#0A05EB] rounded-md hover:from-red-600 hover:to-blue-600">Modifier</button>
        </form>
    </div>
    </div>


    <?php
include "C:/wamp64/www/CRUD/views/layouts/footer.php";
    ?>

