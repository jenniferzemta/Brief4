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
<!-- sidebar -->

<div class="flex justify-center items-center flex-grow bg-gray-100">
        <div class="bg-white rounded-2xl shadow-lg w-1/3 p-4">
             <div class="flex flex-col items-center pb-4 border-b">
                <!-- <img src="https://via.placeholder.com/100" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover mb-4"> -->
                <h2 class="text-xl font-semibold"><?= htmlspecialchars($user['username']) ?></h2>
                <p class="text-gray-500"><?= htmlspecialchars($user['email']) ?></p>
            </div> 

            <div class="py-4 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-500">Nom</span>
                    <span><?= htmlspecialchars($user['username']) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Email</span>
                    <span><?= htmlspecialchars($user['email']) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Password</span>
                    <span> </span>
                </div>
                
            
            </div>

            <button class="w-1/3 mt-4 py-2 rounded-xl bg-gradient-to-r from-red-600 to-[#0A05EB] text-white font-semibold"><a href="updateProfile" class="">Modifier</a></button>
            <button class="mt-4 bg-white text-blue-900 px-6 py-3 font-semibold rounded"> <a href="home" >
                 Retour</button>
        </div>
    </div>


<?php include 'c:/wamp64/www/CRUD/views/layouts/footer.php' ?>
    </body>
    </html>