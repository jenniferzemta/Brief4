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