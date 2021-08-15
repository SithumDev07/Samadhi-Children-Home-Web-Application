<?php

if (isset($_POST['insert'])) {

    require '../includes/database.php';

    $nameWithInitials = $_POST['initials'];
    $fullname = $_POST['fullName'];
    $firstname = $_POST['firstname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $phone = $_POST['ContactNumber'];
    $address = $_POST['address'];
    $hiring = $_POST['Hiring'];

    // print_r($nameWithInitials);
    echo $nameWithInitials . $fullname . $firstname . $birthday . $gender . $phone . $address . $hiring;


    if (empty($nameWithInitials) || empty($fullname) || empty($firstname) || empty($birthday) || empty($gender) || empty($phone) || empty($address) || empty($hiring)) {
        header("Location: ../index.php?add_labor&error=empty_fields");
        exit();
    } else {
        $sql = "INSERT INTO labors(initialsname, fullname, firstname, birthday, gender, phone, address, hiring) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("Location: ../index.php?add_labor&error=sql_error");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, 'sssssiss', $nameWithInitials, $fullname, $firstname, $birthday, $gender, $phone, $address, $hiring);
            mysqli_stmt_execute($statement);

            header("Location: ../index.php?view_labor");
            exit();
        }
    }
      
}
