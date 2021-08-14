<?php
session_start();
// require_once './includes/database.php';
require_once './includes/register-inc.php';

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
            <form action="./includes/register-inc.php" method="POST" class="m-auto w-80 shadow-xl mt-20 bg-white flex flex-col items-center py-5 rounded-md px-3">
                <div class="input relative px-3 py-3 w-11/12 border rounded-lg border-gray-300 text-sm username-wrapper">
                    <label for="username" class="absolute floating-username">Username</label>
                    <input type="text" class="bg-transparent" name="username" id="username">
                </div>
                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 already-taken
                    <?php
                    if (!isset($_GET['error'])) {
                        echo 'hidden';
                    }
                    ?>
                "><?php if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'username_already_taken') {
                            echo 'Username is already taken. Please try another.';
                        } else {
                            echo $_GET['error'];
                        }
                    } ?></p>
                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 hidden error-message-username">Special Characters not allowed!</p>
                <div class="input relative px-3 mt-3 py-3 w-11/12 border rounded-lg border-gray-300 text-sm firstname-wrapper">
                    <label for="firstname" class="absolute floating-firstname <?php
                                                                                if (isset($_GET['firstname'])) {
                                                                                    echo 'active-lable';
                                                                                }
                                                                                ?>">First Name</label>
                    <input type="text" class="bg-transparent" name="firstname" id="firstname" value="<?php if (isset($_GET['firstname'])) {
                                                                                                            echo $_GET['firstname'];
                                                                                                        }  ?>">
                </div>
                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 hidden error-message-firstname">Special Characters not allowed!</p>
                <div class="input relative px-3 mt-3 py-3 w-11/12 border rounded-lg border-gray-300 text-sm lastname-wrapper">
                    <label for="lastname" class="absolute floating-lastname <?php
                                                                            if (isset($_GET['lastname'])) {
                                                                                echo 'active-lable';
                                                                            }
                                                                            ?>">Last Name</label>
                    <input type="text" class="bg-transparent" name="lastname" id="lastname" value="<?php if (isset($_GET['lastname'])) {
                                                                                                        echo $_GET['lastname'];
                                                                                                    }  ?>">
                </div>
                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 hidden error-message-lastname">Special Characters not allowed!</p>
                <div class="input relative px-3 mt-3 py-3 w-11/12 border rounded-lg border-gray-300 text-sm phone-wrapper">
                    <label for="phone" class="absolute floating-phone <?php
                                                                        if (isset($_GET['phone'])) {
                                                                            echo 'active-lable';
                                                                        }
                                                                        ?>">Phone Number</label>
                    <input type="number" class="bg-transparent" name="phone" id="phone" value="<?php if (isset($_GET['phone'])) {
                                                                                                    echo $_GET['phone'];
                                                                                                }  ?>">
                </div>
                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 hidden error-message-phone">Special Characters not allowed!</p>
                <div class="input relative px-3 mt-3 py-3 w-11/12 border rounded-lg border-gray-300 text-sm address-wrapper">
                    <label for="lastname" class="absolute floating-address <?php
                                                                            if (isset($_GET['address'])) {
                                                                                echo 'active-lable';
                                                                            }
                                                                            ?>">Address</label>
                    <textarea name="address" id="address" class="bg-transparent w-full"><?php if (isset($_GET['address'])) {
                                                                                            echo $_GET['address'];
                                                                                        }  ?></textarea>
                </div>
                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 hidden error-message-address">Special Characters not allowed!</p>
                <div class="input relative mt-3 px-3 py-3 w-11/12 border rounded-lg border-gray-300 text-sm password-wrapper">
                    <label for="password" class="absolute floating-password <?php
                                                                            if (isset($_GET['password'])) {
                                                                                echo 'active-lable';
                                                                            }
                                                                            ?>">Password</label>
                    <input type="password" class="bg-transparent" name="password" id="password" value="<?php if (isset($_GET['password'])) {
                                                                                                            echo $_GET['password'];
                                                                                                        }  ?>">
                </div>
                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 hidden error-message-password">Special Characters not allowed!</p>
                <div class="input relative mt-3 px-3 py-3 w-11/12 border rounded-lg border-gray-300 text-sm reentered-wrapper">
                    <label for="reentered" class="absolute floating-reentered <?php
                                                                                if (isset($_GET['password'])) {
                                                                                    echo 'active-lable';
                                                                                }
                                                                                ?>">Re-enter Password</label>
                    <input type="password" class="bg-transparent" name="reentered" id="reentered" value="<?php if (isset($_GET['password'])) {
                                                                                                                echo $_GET['password'];
                                                                                                            }  ?>">
                </div>
                <p class="text-red-500 text-xs italic text-left my-2 w-full px-3 hidden error-message-reentered">Special Characters not allowed!</p>
                <div class="w-11/12 my-3 text-sm text-center">
                    <p class="inline">By clicking register I agree to the company's </p><a href="" class="text-blue-500 font-bold">terms and conditions</a>
                </div>
                <button type="submit" id="submit" name="submit" class="bg-blue-500 text-sm mt-1 px-4 py-4 w-11/12 rounded-lg text-center text-white flex items-center justify-center transform transition duration-200 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Register
                </button>
                <div class="flex items-center mt-4 text-sm">
                    <p>Already have an account?</p>
                    <a href="#" class="ml-2 text-blue-500 font-bold">Login</a>
                </div>
            </form>
        </div>
    </main>
    <script src="./scripts/common.js"></script>
    <script src="./scripts/register.js"></script>
</body>

</html>