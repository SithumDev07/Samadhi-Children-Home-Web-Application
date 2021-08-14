<?php


if (isset($_POST['submit'])) {

    require './database.php';

    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    if (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
        $location = "Location: ../register.php?error=invalid_username&firstname=" . $firstname . "&lastname=" . $lastname . "&phone=" . $phone . "&address=" . $address . "&password=" . $password;
        $location = str_replace(PHP_EOL, '', $location);
        header($location);
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username = ?";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, "s", $username);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            $rowCount = mysqli_stmt_num_rows($statement); //If output is 1, there is a row in database

            if ($rowCount > 0) {
                $location = "Location: ../register.php?error=username_already_taken&firstname=" . $firstname . "&lastname=" . $lastname . "&phone=" . $phone . "&address=" . $address . "&password=" . $password;
                $location = str_replace(PHP_EOL, '', $location);
                header($location);
                exit();
            } else {
                $sql = "INSERT INTO users (username, fullname, phonenumber, address, password) VALUES (?, ?, ?, ?, ?)";
                $statement = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($statement, $sql)) {
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                } else {

                    $hashPass = password_hash($password, PASSWORD_DEFAULT);

                    $fullname = $firstname . ' ' . $lastname;

                    mysqli_stmt_bind_param($statement, "ssiss", $username, $fullname, $phone, $address, $hashPass);
                    mysqli_stmt_execute($statement);
                    session_start();
                    $_SESSION['sessionId'] = 1;
                    $_SESSION['sessionUser'] = $username;
                    header("Location: ../index.php?success=registered");
                    exit();
                }
            }

            // $result = mysqli_stmt_get_result($statement);

            // if ($row = mysqli_fetch_assoc($result)) {
            //     $location = "Location: ../register.php?error=username_already_taken&firstname=" . $firstname . "&lastname=" . $lastname . "&phone=" . $phone . "&address=" . $address . "&password=" . $password;
            //     $location = str_replace(PHP_EOL, '', $location);
            //     header($location);
            //     exit();
            // } else {
            //     header("Location: ../register.php?success=registered");
            //     exit();
            // }
        }
    }
    mysqli_stmt_close($statement);
    mysqli_close($conn);
} else {
    // header("Location: ../register.php?success=registered");
    // exit();
}
