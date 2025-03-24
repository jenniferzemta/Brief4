<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="css/tailwind.css" class="">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="css/style.css" class="">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <!-- <script src="js/accueil.js"></script> -->

    </head>
    <body class="bg-gray-100">
        <!-- Navbar -->
    <nav class="bg-[#3886F2] mx-auto text-white py-4">
        <div class="container mx-auto  flex justify-between  px-6">
            <!-- Logo -->
            <a href="#" class="text-2xl font-bold flex items-center">
                Digital Solutions <span class="text-yellow-500"></span>
            </a>

            <!-- Menu -->
            <div class=" md:flex space-x-6">
                <a href="home" class="hover:text-blue-300">Accueil</a>
                <a href="#cv-carousel" class="hover:text-blue-300">Modèles de CV</a>
                <a href="profile" class="hover:text-blue-300">Profile</a>
                <a href="history" class="hover:text-blue-300">Logs</a>
                <span>Bienvenue</span> <span class="text-green-500"> <?= htmlspecialchars($user['username']) ?> </span>
            </div>

            <!-- Bouton de connexion
            <a href="login.html" class="bg-white text-blue-600 px-4 py-2 rounded font-semibold hover:bg-blue-100 transition duration-300">
                Connexion
            </a> -->
        </div>

    
    
            <div class="container mx-auto m-10 py-6 text-center">
                <h1 class="text-4xl font-bold">Générez votre CV professionnel en un clic</h1>
                <p class="mt-2 text-lg">Choisissez un modèle et créez un CV percutant facilement</p>
            </div>
        
        </nav>
        <!-- Section modèles de CV -->
        <section class="container mx-auto py-10 px-6">
            <h2 class="text-3xl font-bold text-center mb-8">Nos modèles de CV</h2>
            <div id="cv-carousel" class="grid md:grid-cols-3 gap-8 overflow-hidden">
                <div class="cv-model bg-white p-4 shadow-lg rounded-lg text-center">
                    <img src="../public/assets/images/p2.jpg" alt="Modèle 2" class="w-full h-64 object-cover rounded-lg">
                    <h3 class="text-xl font-semibold mt-4">Modèle Moderne</h3>
                    <button class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded"><a href="../cv2.html">Choisir</a></button>
                </div>

                <div class="cv-model bg-white p-4 shadow-lg rounded-lg text-center">
                    <img src="../public/assets/images/p.jpg" alt="Modèle 3" class="w-full h-64 object-cover rounded-lg">
                    <h3 class="text-xl font-semibold mt-4">Modèle Classique</h3>
                    <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded"><a href="../in.html">Choisir</a></button>
                </div>
                
                <div class="cv-model bg-white p-4 shadow-lg rounded-lg text-center">
                    <img src="../public/assets/images/p1.jpg" alt="Modèle 1" class="w-full h-64 object-cover rounded-lg">
                    <h3 class="text-xl font-semibold mt-4">Modèle Élégant</h3>
                    <button class="mt-4 bg-gray-900 text-white px-4 py-2 rounded"><a href= "../cv.html">Choisir</a></button>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="bg-gray-900 text-white py-10  m-10 text-center">
            <h2 class="text-3xl font-bold">Prêt à créer votre CV ?</h2>
            <p class="mt-2">Commencez dès maintenant et mettez en valeur votre parcours</p>
            <button class="mt-4 bg-white text-blue-900 px-6 py-3 font-semibold rounded">Démarrer</button>
        </section>
    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Section Logo et description -->
                <div>   
                    <a href="#" class="text-2xl font-bold flex items-center">
                    Digital Solutions<span class="font-bold text-yellow-600" > </span>
                    </a>
                    <p class="mt-4 text-gray-300">
                        Nous vous aidons à créer des CV professionnels en quelques clics. Choisissez parmi nos modèles et démarquez-vous.
                    </p>
                </div>

                <!-- Liens rapides -->
                <div>
                    <h3 class="text-xl font-bold">Liens rapides</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="hover:text-blue-300">Accueil</a></li>
                        <li><a href="#cv-carousel" class="hover:text-blue-300">Modèles de CV</a></li>
                        <li><a href="#" class="hover:text-blue-300">À propos</a></li>
                        <li><a href="#" class="hover:text-blue-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-xl font-bold">Contact</h3>
                    <ul class="mt-4 space-y-2">
                        <li class="text-gray-300">Email: contact@webnova.com</li>
                        <li class="text-gray-300">Téléphone: 676 33 05 21</li>
                        <li class="text-gray-300">Adresse: AKWA , CAMEROUN</li>
                    </ul>
                </div>
            </div>

            <!-- Réseaux sociaux -->
            <div class="mt-8 border-t border-gray-700 pt-8 text-center">
                <div class="flex justify-center space-x-6">
                    <a href="#" class="text-gray-300 hover:text-blue-300">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-blue-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-blue-300">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-blue-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <p class="mt-4 text-gray-300">&copy; 2025 Digital Solutions Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    
    </body>
    </html>
