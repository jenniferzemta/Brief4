

<?php
include "C:/wamp64/www/CRUD/views/layouts/header.php";
    ?>

    
<body class="bg-white">
    <!-- Navbar -->
    <div class="flex font-mono justify-between items-center bg-[#3886F2] p-4 text-white">
        <div class="flex items-center space-x-2">
            <i class="fas fa-cogs fa-lg"></i>
            <span class="font-bold text-xl">Digital Solutions</span>
        </div>
       

        <div class="flex items-center space-x-2">
        <div class="relative">
            <input type="text" placeholder="Search here" class="p-2 pl-20 rounded-lg text-black border border-gray-300" />
            <i class="fas fa-search absolute right-3 top-3 text-gray-500"></i>
        </div>

            <span>Zemta Jennifer</span>
            <i class="fas fa-user-circle fa-lg"></i>
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
<!-- sidebar -->
<?php
include "C:/wamp64/www/CRUD/views/layouts/sidebar.php";
    ?>


<div class="bg-white p-6 rounded-lg ">
        <h2 class="text-2xl font-semibold mb-4">User Management</h2>
        
        <div class="flex space-x-4 mb-4">
            <input type="text" placeholder="Staff Name" class="border p-2 rounded w-1/4">
            <input type="text" placeholder="Role Name" class="border p-2 rounded w-1/4">
            <input type="text" placeholder="Status" class="border p-2 rounded w-1/4">
            <button class="bg-green-500 text-white p-2 rounded">SEARCH</button>
            <!-- <button id="ajouter" type="submit" class="w-48 py-2 text-white bg-gradient-to-r from-[#FF2F33] to-[#0A05EB] rounded-md hover:from-red-600 hover:to-blue-600" onclick="toggleModal()" >Ajouter</button> -->
        </div>

<!-- --edit-- -->
<div  class="flex bg-gray-100  justify-center bg-opacity-50 items-center">
<div class=" container bg-white p-6 rounded-lg w-1/2 max-h-[70vh] overflow-y-auto">
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
                <select id="status"  name="status" value="<?= $user['status'] ?>"  class="w-full p-2 mt-2  border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Active</option>
                    <option>Inactive</option>
              
                </select>
            </div>
            <button class="bg-red-500 text-white p-2 rounded" onclick="toggleModal()">Cancel</button>
            <button type="submit" class="w-48 py-2 font-mono text-white bg-gradient-to-r from-[#FF2F33] to-[#0A05EB] rounded-md hover:from-red-600 hover:to-blue-600">Modifier</button>
        </form>
    </div>
    </div>



</div>
                </div>

<?php
include "C:/wamp64/www/CRUD/views/layouts/footer.php";
    ?>
</body>
</html>