
<?php include "../layouts/header.php"; ?>
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
<?php include "../layouts/sidebar.php"; ?>
       
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Historique des Connexions</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <table class="min-w-full bg-white">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">Date</th>
                    <th class="py-3 px-6 text-left">logintime</th>
                    <th class="py-3 px-6 text-left">logouttime</th>
                </tr>
            </thead>

            <tbody class="text-gray-600 text-sm font-light">
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">1</td>
                    <td class="py-3 px-6">Dupont</td>
                    <td class="py-3 px-6">20/03/2025</td>
                    <td class="py-3 px-6">08:30</td>
                    <td class="py-3 px-6">16:45</td>

                </tr>
                <?php foreach ($logs as $log): ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100" >
                        <td class="py-3 px-6"><?= $log['username'] ?></td>
                        <td class="py-3 px-6"><?= $log['login_time'] ?></td>
                        <td class="py-3 px-6">
                            <span class="px-2 py-1 rounded-full <?= $log['status'] === 'success' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' ?>">
                                <?= $log['status'] === 'success' ? 'Réussi' : 'Échoué' ?>
                            </span>
                        </td>
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

    </div>
<?php include "../layouts/footer.php";?>
</body>
</html>
