
    <!-- header -->
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Digital Solutions</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="../public/script.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

        <script>
            //formualire ajouter de user
            function toggleModal() {
                const modal = document.getElementById('userModal');
                modal.classList.toggle('hidden');
                modal.classList.toggle('flex');
            }
                
            //function deconnexion 
            function toggledeconnexion(){
            const d=   document.getElementById('dropdown');
            d.classList.toggle('hidden');

            }
        </script>
        
    </head>