<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen  " style="background-color: #FFC0CB;">
    <div class="bg-white p-8  w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <form  method="POST">
            <div class="mb-4 pb-2">
                <label for="email" class="block text-black font-mono">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter email" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4 pb-2">
                <label for="password" class="block  text-black font-mono ">Password</label>
                <input type="password" name="password"  id="password" placeholder="Enter Password" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- <div class="flex justify-between items-center pb-2 mb-4">
                <a href="#" class="text-sm font-mono text-right text-gray-500 hover:text-blue-600">Forgot password?</a>
            </div> -->
            <button type="submit" class="w-full py-2 text-white bg-gradient-to-r from-[#FF2F33] to-[#0A05EB] rounded-md hover:from-red-600 hover:to-blue-600">Login</button>
        </form>
        <!-- <p class="mt-4 text-center font-sans text-gray-500">Don't have an account yet? <a href="register.php" class="text-blue-600 hover:underline">Register</a></p> -->
    </div>
</body>
</html>
