
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
       
        <?php if (isset($_SESSION['user_id'])):?> 
        <div class="flex items-center space-x-2">
        <div class="relative">
            <input type="text" placeholder="Search here" class="p-2 pl-20 rounded-lg text-black border border-gray-300" />
            <i class="fas fa-search absolute right-3 top-3 text-gray-500"></i>
        </div>
        
            <span>Zemta<?= $_SESSION['username'] ?></span>
            <i class="fas fa-user-circle fa-lg"></i>
            <i class="fas fa-chevron-down"></i>
        </div>
        <?php endif ?>
    </div>
   

    <!-- sidebar -->
<?php
include "C:/wamp64/www/CRUD/views/layouts/sidebar.php";
    ?>
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-green-500 p-6 text-white rounded-lg shadow-lg">
                    <i class="fas fa-user-shield fa-2x"></i>
                    <h2 class="mt-2">Admins</h2>
                    <p class="text-3xl"><?= $adminCount ?></p>
                </div>
                <div class="bg-pink-400 p-6 text-white rounded-lg shadow-lg">
                    <i class="fas fa-users fa-2x"></i>
                    <h2 class="mt-2">Clients</h2>
                    <p class="text-3xl"><?= $clientCount ?></p>
                </div>
         
              
                
            </div>
        </main>
    </div>

 
    
    <?php
include "C:/wamp64/www/CRUD/views/layouts/footer.php";
    ?>

</body>
</html>
