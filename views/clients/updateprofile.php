

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

            <span><?= htmlspecialchars($user['username']) ?></span>
            <i class="fas fa-user-circle fa-lg"></i>
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
<!--formulaire-->

<div class="flex justify-center items-center flex-grow bg-gray-100">
    <div class="bg-white rounded-2xl shadow-lg w-1/3 p-4">
        <div class="flex flex-col items-center pb-4 border-b">
            <h2 class="text-xl font-semibold"><?= htmlspecialchars($user['username']) ?></h2>
            <p class="text-gray-500"><?= htmlspecialchars($user['email']) ?></p>
        </div>
        <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?= htmlspecialchars($_SESSION['error']) ?></span>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
        <form method="POST">
            <div class="py-4 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-500">Nom</span>
                    <input type="text" name="username" minlength="4"  value="<?= htmlspecialchars($user['username']) ?>" class="border rounded p-1">
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Email</span>
                    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="border rounded p-1">
                </div>
                
            
            </div>
            <div class="py-4 space-y-3">
   

</div>
            <button type="submit" class="w-1/3 mt-4 py-2 rounded-xl bg-gradient-to-r from-[#FF2F33] to-[#0A05EB] text-white font-semibold">Modifier</button>
            <button class="mt-4 bg-white text-blue-900 px-6 py-3 font-semibold rounded"> <a href="profile" >
            Annuler</button>
        </form>
    </div>
</div>

<?php include 'c:/wamp64/www/CRUD/views/layouts/footer.php' ?>
    </body>
    </html>