<?php
session_start();
// require_once './includes/database.php';
require_once './includes/login-inc.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samadhi</title>
    <link rel="stylesheet" href="./public/style.css">
    <link rel="stylesheet" href="./styles/loginStyle.css">
</head>

<body>
    <main class="h-screen">
        <nav class="bg-white shadow-xl">
            <div class="container mx-auto flex items-center justify-between p-5">
                <div class="logo">
                    <img src="" alt="">
                </div>
                <ul class="links flex items-center">
                    <li><a href="./register.php" class="text-blue-800 text-sm">Register</a></li>
                    <li><a href="./login.php" class="bg-blue-500 text-sm px-5 py-3 rounded-full ml-4 text-gray-200 transform transition duration-200 hover:bg-blue-600">Login</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <form action="./includes/login-inc.php" method="POST" class="m-auto w-80 shadow-xl mt-20 bg-white flex flex-col items-center py-5 rounded-md px-3">
                <div class="input relative px-3 py-3 w-11/12 border rounded-lg border-gray-300 text-sm username-wrapper">
                    <label for="username" class="absolute floating-username <?php
                                                                            if (isset($_GET['username'])) {
                                                                                echo 'active-lable';
                                                                            }
                                                                            ?>">Username</label>
                    <input type="text" class="bg-transparent" name="username" id="username" value="<?php
                                                                                                    if (isset($_GET['username'])) {
                                                                                                        echo $_GET['username'];
                                                                                                    }
                                                                                                    ?>">
                </div>

                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 hidden error-message-username">Special Characters not allowed!</p>
                <div class="input relative mt-3 px-3 py-3 w-11/12 border rounded-lg border-gray-300 text-sm password-wrapper">
                    <label for="password" class="absolute floating-password">Password</label>
                    <input type="password" class="bg-transparent" name="password" id="password">
                </div>
                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 wrong-password
                    <?php
                    if (!isset($_GET['error'])) {
                        echo 'hidden';
                    }
                    ?>
                "><?php if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'wrong_pass') {
                            echo "Password is wrong. Please try again.";
                        } else if ($_GET['error'] == 'no_user_found') {
                            echo 'Username is wrong.';
                        } else {
                            echo $_GET['error'];
                        }
                    } ?></p>
                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 hidden error-message-password">Special Characters not allowed!</p>
                <div class="flex items-center w-11/12 my-3">
                    <input type="checkbox" class="mr-2">
                    <p>Remember me</p>
                </div>
                <button name="submit" id="submit" type="submit" class="bg-blue-500 text-sm mt-1 px-4 py-4 w-11/12 rounded-lg text-center text-white flex items-center justify-center transform transition duration-200 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Login
                </button>
                <div class="flex items-center mt-4 text-sm">
                    <p>Don't have an account?</p>
                    <a href="#" class="ml-2 text-blue-500 font-bold">Register</a>
                </div>
            </form>
        </div>
    </main>
    <script src="./scripts/common.js"></script>
    <script src="./scripts/loginForm.js"></script>
</body>

</html>