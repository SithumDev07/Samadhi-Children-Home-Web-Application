<?php
session_start();
// require_once './includes/database.php';
require_once './includes/register-inc.php';
require_once './includes/login-inc.php';

if (!isset($_SESSION['sessionId'])) {
    header("Location: ./login.php");
    exit();
}

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
    <link rel="stylesheet" href="./styles/add_forms_style.css">
    <link rel="stylesheet" href="./styles/side_bar_styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
</head>

<body>
    <main class="h-screen overflow-hidden">
        <nav class="bg-gray-900 shadow-xl fixed top-0 left-0 right-0 z-50">
            <div class="w-11/12 mx-auto flex items-center justify-between p-5">
                <div class="logo">
                    <a href="/" class="text-3xl text-gray-200 fonst font-semibold">Samadhi Children Home</a>
                </div>
                <ul class="links flex items-center">
                    <li><a href="./register.php" class="text-blue-200 text-sm">
                            <?php
                            if (!isset($_SESSION['sessionId'])) {
                            ?>
                                Register
                            <?php
                            } else {
                                echo $_SESSION['sessionUser'];
                            }
                            ?></a></li>

                    <?php
                    if (!isset($_SESSION['sessionId'])) {
                    ?>
                        <li><a href="./login.php" class="bg-blue-500 text-sm px-5 py-3 rounded-full ml-4 text-gray-200 transform transition duration-200 hover:bg-blue-600">Login</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <section class="flex h-screen">
            <aside class="bg-gray-900 text-gray-200 w-72 px-4 overflow-y-auto">
                <!-- <div class="container"> -->
                <a href="./index.php?overview" class="flex items-center justify-start p-4 mt-20">
                    <i class="fas fa-tachometer-alt"></i>
                    <h2 class="ml-2">Overview</h2>
                </a>
                <a href="#" id="Donations" class="flex items-center justify-start p-4">
                    <i class="fas fa-money-bill-alt"></i>
                    <h2 class="mx-2">Donations</h2>
                    <i class="fas fa-sort-down"></i>
                </a>
                <ul class="donations-menu">
                    <li><a href="./index.php?add_donar">Add Donations</a></li>
                    <li><a href="./index.php?view_donars">View Donations</a></li>
                </ul>
                <a href="#" id="Staff" class="flex items-center justify-start p-4">
                    <i class="fas fa-users"></i>
                    <h2 class="mx-2">Staff</h2>
                    <i class="fas fa-sort-down"></i>
                </a>
                <ul class=" staff-menu">
                    <li><a href="./index.php?add_staff">Add Staff</a></li>
                    <li><a href="./index.php?view_staff">View Staff</a></li>
                </ul>
                <a href="#" id="Children" class="flex items-center justify-start p-4">
                    <i class="fas fa-child"></i>
                    <h2 class="mx-2">Child</h2>
                    <i class="fas fa-sort-down"></i>
                </a>
                <ul class="child-menu">
                    <li><a href="./index.php?add_child">Add Child</a></li>
                    <li><a href="#">View Child</a></li>
                </ul>
                <a href="#" id="Labors" class="flex items-center justify-start p-4">
                    <i class="fas fa-male"></i>
                    <h2 class="mx-2">Labors</h2>
                    <i class="fas fa-sort-down"></i>
                </a>
                <ul class="labors-menu">
                    <li><a href="./index.php?add_labor">Add Labors</a></li>
                    <li><a href="#">View Labors</a></li>
                    <li><a href="#">View Labor Salary</a></li>
                </ul>
                <a href="./login.php" class="flex items-center justify-start p-4">
                    <i class="fas fa-power-off"></i>
                    <h2 class="ml-2">Log Out</h2>
                </a>
                <!-- </div> -->
            </aside>
            <div class="flex-1 bg-white overflow-y-auto p-10">
                <?php

                if (isset($_GET['overview'])) {

                ?>
                    <header class="mt-16">
                        <h1 class="text-2xl font-semibold text-gray-700">Overview</h1>
                    </header>
                    <div class="cards flex flex-wrap">
                        <div class="card text-gray-200 p-5 rounded-md bg-white shadow-xl mr-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <h2>Total Donations</h2>
                            <h3>Rs. 104, 500.00</h3>
                        </div>

                        <div class="card text-gray-200 p-5 rounded-md bg-white shadow-xl mr-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                            <h2>Total Children</h2>
                            <h3>8</h3>
                        </div>

                        <div class="card text-gray-200 p-5 rounded-md bg-white shadow-xl mr-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <h2>Staff</h2>
                            <h3>20</h3>
                        </div>

                        <div class="card text-gray-200 p-5 rounded-md bg-white shadow-xl mr-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                            <h2>Staff</h2>
                            <h3>20</h3>
                        </div>
                    </div>

                    <p class="text-lg text-left font-bold m-5">Cash Donations</p>
                    <table class="rounded-t-lg w-full bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3">Donar Name</th>
                            <th class="px-4 py-3">Fund Amount</th>
                            <th class="px-4 py-3">Contact Number</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>

                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">Jill</td>
                            <td class="px-4 py-3">Rs.5800.00</td>
                            <td class="px-4 py-3">0766108500</td>
                            <td class="px-4 py-3">2020-04-20</td>
                        </tr>
                        <!-- each row -->
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">Jill</td>
                            <td class="px-4 py-3">Rs.5800.00</td>
                            <td class="px-4 py-3">0766108500</td>
                            <td class="px-4 py-3">2020-04-20</td>
                        </tr>
                        <!-- each row -->
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">Jill</td>
                            <td class="px-4 py-3">Rs.5800.00</td>
                            <td class="px-4 py-3">0766108500</td>
                            <td class="px-4 py-3">2020-04-20</td>
                        </tr>
                        <!-- each row -->

                    </table>

                    <!-- classic design -->
                <?php

                } else if (isset($_GET['add_labor'])) {
                ?>

                    <div class="mt-16">
                        <div class="header max-width-form mx-auto h-20 bg-gray-200">
                            <h1 class="font-semibold">Add Labor</h1>
                        </div>
                        <form class="max-width-form mx-auto border">
                            <div class="name content">
                                <label for="Name" class="label-align">Name with initials</label>
                                <input type="text" name="Name" placeholder="Enter Name With Initials">
                            </div>
                            <div class="fullName content">
                                <label for="fullName" class="label-align">Full Name</label>
                                <input type="text" name="fullName" placeholder="Enter Full Name">
                            </div>
                            <div class="firstname content">
                                <label for="firstname" class="label-align">First Name</label>
                                <input type="text" name="firstname" placeholder="First Name">
                            </div>
                            <div class="birthday content">
                                <label for="birthday" class="label-align">Birthday</label>
                                <input type="date" name="birthday" placeholder="Enter Full Name">
                            </div>
                            <div class="gender-wrapper content">
                                <label for="gender" name="gender" class="gender label-align">Gender</label>
                                <div class="radio-wrapper">
                                    <div class="male mr-3">
                                        <input type="radio" name="gender">
                                        <label for="gender" name="gender">Male</label>
                                    </div>
                                    <div class="female">
                                        <input type="radio" name="gender">
                                        <label for="gender" name="gender">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="ContactNumber content">
                                <label for="ContactNumber" class="label-align">Contact Number</label>
                                <input type="number" name="ContactNumber" placeholder="Enter Contact Number" maxlength="10">
                            </div>
                            <div class="PermanentAddress content">
                                <label for="PermanentAddress" class="label-align">Permanent Address</label>
                                <textarea name="name"></textarea>
                            </div>
                            <div class="Hiring content">
                                <label for="Hiring" class="label-align">Name of Hiring Company</label>
                                <select id="Hiring" name="Hiring" class="HiringSelect">
                                    <option value="admin">Sunshine</option>
                                    <option value="principal">Moonlight</option>
                                </select>
                            </div>
                            <input type="submit" name="insert" value="Insert" class="content">

                        </form>
                    </div>


                <?php
                } else if (isset($_GET['add_staff'])) {

                ?>

                    <div class="mt-16">
                        <div class="header max-width-form mx-auto h-20 bg-gray-200">
                            <h1 class="font-semibold">Add Staff</h1>
                        </div>
                        <form class="max-width-form mx-auto border">
                            <div class="firstname content">
                                <label for="firstname" class="label-align">First Name</label>
                                <input type="text" name="firstname" placeholder="First Name">
                            </div>
                            <div class="lastname content">
                                <label for="lastname" class="label-align">Last Name</label>
                                <input type="text" name="lastname" placeholder="Last Name">
                            </div>
                            <div class="name content">
                                <label for="Name" class="label-align">Name with initials</label>
                                <input type="text" name="Name" placeholder="Enter Name With Initials">
                            </div>
                            <div class="birthday content">
                                <label for="birthday" class="label-align">Birthday</label>
                                <input type="date" name="birthday" placeholder="Enter Full Name">
                            </div>
                            <div class="NIC content">
                                <label for="NIC" class="label-align">NIC Number</label>
                                <input type="text" name="NIC" placeholder="Enter NIC Number" maxlength="12">
                            </div>
                            <div class="gender-wrapper content">
                                <label for="gender" name="gender" class="gender label-align">Gender</label>
                                <select id="cars" name="gender" class="genderSelect">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="ContactNumber content">
                                <label for="ContactNumber" class="label-align">Contact Number</label>
                                <input type="number" name="ContactNumber" placeholder="Enter Contact Number" maxlength="10">
                            </div>
                            <div class="PermanentAddress content">
                                <label for="PermanentAddress" class="label-align">Permanent Address</label>
                                <textarea name="name"></textarea>
                            </div>
                            <div class="Email content">
                                <label for="Email" class="label-align">Email Address</label>
                                <input type="email" name="Email" placeholder="Enter Email Address">
                            </div>
                            <div class="POST content">
                                <label for="POST" class="label-align">POST</label>
                                <select id="post" name="post" class="postSelect">
                                    <option value="admin">Admin</option>
                                    <option value="principal">Principal</option>
                                    <option value="matron">Matron</option>
                                </select>
                            </div>
                            <div class="Image content">
                                <label for="Image" class="label-align">Upload Image</label>
                                <input type="file" name="Image" placeholder="Choose File">
                            </div>
                            <input type="submit" name="insert" value="Insert" class="content">

                        </form>
                    </div>

                <?php
                } else if (isset($_GET['add_child'])) {
                ?>

                    <div class="mt-16">
                        <div class="header max-width-form mx-auto h-20 bg-gray-200">
                            <h1 class="font-semibold">Add Child</h1>
                        </div>

                        <!-- <form onsubmit="return validate(this);"> -->
                        <form class="max-width-form mx-auto border" action="./operations/child.php" method="POST" enctype="multipart/form-data">
                            <div class="name content">
                                <label for="Name" class="label-align">Name with initials</label>
                                <input type="text" name="Name" placeholder="Enter Name With Initials (Ex: B A S D Basnayake)" id="InitialName" class="select initials-wrapper border">
                            </div>
                            <div class="fullName content">
                                <label for="fullName" class="label-align">Full Name</label>
                                <input type="text" name="fullName" placeholder="Enter Full Name" id="fullName" class="fullname-wrapper border">
                            </div>
                            <div class="birthday content">
                                <label for="birthday" class="label-align">Birthday</label>
                                <input type="date" name="birthday" placeholder="Enter Full Name" id="birthdate">
                            </div>

                            <div class="gender-wrapper content">
                                <label for="gender" name="gender" class="gender label-align">Gender</label>
                                <div class="radio-wrapper">
                                    <div class="male mr-3">
                                        <input type="radio" name="gender" value="male" checked="checked">
                                        <label for="gender" name="gender">Male</label>
                                    </div>
                                    <div class="female">
                                        <input type="radio" name="gender" value="female">
                                        <label for="gender" name="gender">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="Image content">
                                <label for="Image" class="label-align">Upload Image</label>
                                <input type="file" name="Image" placeholder="Choose File" id="insertChildImage">
                            </div>
                            <!-- <input type="submit" name="insert" value="Insert" class="content" id="submit"> -->
                            <input name="insert" value="Insert" class="content" id="submitChild" type="submit">
                            <!-- <input type="submit" name="insert" value="Insert" class="content"> -->

                        </form>
                    </div>

                <?php
                } else if (isset($_GET['add_donar'])) {
                ?>

                    <div class="mt-16">
                        <div class="header max-width-form mx-auto h-20 bg-gray-200">
                            <h1 class="font-semibold">Add Donar</h1>
                        </div>

                        <!-- <form onsubmit="return validate(this);"> -->
                        <form class="max-width-form mx-auto border">
                            <div class="name content">
                                <label for="Name" class="label-align">Donar Name</label>
                                <input type="text" name="Name" placeholder="Enter Your Name" id="InitialName" class="select">
                            </div>
                            <div class="fullName content">
                                <label for="fullName" class="label-align">Contact Number</label>
                                <input type="number" name="fullName" placeholder="Enter Contact Number" id="fullName">
                            </div>
                            <div class="PermanentAddress content">
                                <label for="PermanentAddress" class="label-align">Permanent Address</label>
                                <textarea name="name"></textarea>
                            </div>
                            <div class="POST content">
                                <label for="POST" class="label-align">Donation Type</label>
                                <select id="post" name="post" class="postSelect">
                                    <option value="admin">Cash</option>
                                    <option value="principal">Items</option>
                                    <option value="matron">Both</option>
                                </select>
                            </div>
                            <input name="insert" value="Insert" class="content" id="submit" type="submit">

                        </form>
                    </div>

                <?php
                } else if (isset($_GET['view_donars'])) {
                ?>
                    <p class="text-lg text-left font-bold m-5 mt-16">Cash Donations</p>

                    <div class="relative mt-3 mb-10 w-11/12 mx-auto">
                        <input type="search" class="bg-purple-white shadow rounded border-0 p-3 w-full" placeholder="Search by name...">
                        <div class="absolute pin-r pin-t mt-3 mr-4 text-purple-lighter top-0 right-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>

                        </div>
                    </div>

                    <table class="rounded-t-lg w-full bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3">Donar Name</th>
                            <th class="px-4 py-3">Fund Amount</th>
                            <th class="px-4 py-3">Contact Number</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>

                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">Jill</td>
                            <td class="px-4 py-3">Rs.5800.00</td>
                            <td class="px-4 py-3">0766108500</td>
                            <td class="px-4 py-3">2020-04-20</td>
                        </tr>
                        <!-- each row -->
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">Jill</td>
                            <td class="px-4 py-3">Rs.5800.00</td>
                            <td class="px-4 py-3">0766108500</td>
                            <td class="px-4 py-3">2020-04-20</td>
                        </tr>
                        <!-- each row -->
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">Jill</td>
                            <td class="px-4 py-3">Rs.5800.00</td>
                            <td class="px-4 py-3">0766108500</td>
                            <td class="px-4 py-3">2020-04-20</td>
                        </tr>
                        <!-- each row -->

                    </table>
                <?php
                } else if (isset($_GET['view_staff'])) {
                ?>

                    <p class="text-lg text-left font-bold m-5 mt-16">Staff</p>

                    <div class="relative mt-3 mb-10 w-11/12 mx-auto">
                        <input type="search" class="bg-purple-white shadow rounded border-0 p-3 w-full" placeholder="Search by name...">
                        <div class="absolute pin-r pin-t mt-3 mr-4 text-purple-lighter top-0 right-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>

                        </div>
                    </div>

                    <table class="rounded-t-lg w-full bg-gray-200 text-gray-800 table-auto">
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3">NO</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Contact</th>
                            <th class="px-4 py-3">Address</th>
                            <th class="px-4 py-3">Edit</th>
                            <th class="px-4 py-3">Delete</th>
                        </tr>

                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">01</td>
                            <td class="px-4 py-3">Jill</td>
                            <td class="px-4 py-3">0766108500</td>
                            <td class="px-4 py-3">School Lane, Gampaha</td>
                            <td class="px-4 py-3">
                                <a href="" class="flex items-center text-green-500">
                                    Edit
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                <a href="" class="flex items-center text-red-500">
                                    Delete
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <!-- each row -->
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">02</td>
                            <td class="px-4 py-3">Jill</td>
                            <td class="px-4 py-3">0766108500</td>
                            <td class="px-4 py-3">School Lane, Gampaha</td>
                            <td class="px-4 py-3">
                                <a href="" class="flex items-center text-green-500">
                                    Edit
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                <a href="" class="flex items-center text-red-500">
                                    Delete
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <!-- each row -->
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">03</td>
                            <td class="px-4 py-3">Jill</td>
                            <td class="px-4 py-3">0766108500</td>
                            <td class="px-4 py-3">School Lane, Gampaha</td>
                            <td class="px-4 py-3">
                                <a href="" class="flex items-center text-green-500">
                                    Edit
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                <a href="" class="flex items-center text-red-500">
                                    Delete
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <!-- each row -->

                    </table>
                <?php
                }
                ?>
            </div>
        </section>
    </main>
    <script src="./scripts/common.js"></script>
    <script src="./scripts/addChild.js"></script>
    <script>
        const Donations = document.querySelector('#Donations');
        const Staff = document.querySelector('#Staff');
        const Children = document.querySelector('#Children');
        const Labors = document.querySelector('#Labors');

        Donations.addEventListener('click', () => {
            document.querySelector('.donations-menu').classList.toggle('menu-active');
            Donations.classList.toggle('active-link');
        });
        Staff.addEventListener('click', () => {
            document.querySelector('.staff-menu').classList.toggle('menu-active');
            Staff.classList.toggle('active-link');
        });
        Children.addEventListener('click', () => {
            document.querySelector('.child-menu').classList.toggle('menu-active');
            Children.classList.toggle('active-link');
        });
        Labors.addEventListener('click', () => {
            document.querySelector('.labors-menu').classList.toggle('menu-active-labors');
            Labors.classList.toggle('active-link');
        });
    </script>
</body>

</html>