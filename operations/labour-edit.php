<?php

if (isset($_POST['update'])) {

    require '../includes/database.php';

    $nameWithInitials = $_POST['initials'];
    $fullname = $_POST['fullName'];
    $firstname = $_POST['firstname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $phone = $_POST['ContactNumber'];
    $address = $_POST['address'];
    $hiring = $_POST['Hiring'];
    $id = $_POST['id'];

    // print_r($nameWithInitials);
    echo $nameWithInitials . $fullname . $firstname . $birthday . $gender . $phone . $address . $hiring;


    if (empty($nameWithInitials) || empty($fullname) || empty($firstname) || empty($birthday) || empty($gender) || empty($phone) || empty($address) || empty($hiring) || empty($id)) {
        header("Location: ../index.php?edit_labor&error=empty_fields");
        exit();
    } else {
        $sql = "UPDATE labors SET initialsname=?, fullname=?, firstname=?, birthday=?, gender=?, phone=?, address=?, hiring=? WHERE id=?;";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("Location: ../index.php?edit_labor&error=sql_error");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, 'sssssissi', $nameWithInitials, $fullname, $firstname, $birthday, $gender, $phone, $address, $hiring, $id);
            mysqli_stmt_execute($statement);

            header("Location: ../index.php?view_labor");
            exit();
        }
    }
      
} else {
    header("Location: ../index.php?view_labor&error=resricted_area");
    exit();
}
