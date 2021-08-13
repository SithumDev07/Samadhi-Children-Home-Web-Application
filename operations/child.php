<?php

if (isset($_POST['insert'])) {

    require '../includes/database.php';

    $nameWithInitials = $_POST['Name'];
    $fullName = $_POST['fullName'];
    $birthDay = $_POST['birthday'];
    $gender = $_POST['gender'];

    $file = $_FILES['Image'];

    $fileName = $_FILES['Image']['name'];
    $fileTmpName = $_FILES['Image']['tmp_name'];
    $fileSize = $_FILES['Image']['size'];
    $fileError = $_FILES['Image']['error'];
    $fileType = $_FILES['Image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    print_r($file);
    // print_r($nameWithInitials);
    echo $nameWithInitials . $fullName . $birthDay . $gender;

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../photo_uploads/children/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                if (empty($nameWithInitials) || empty($fullName) || empty($birthDay) || empty($gender)) {
                    header("Location: ../index.php?add_child&error=empty_fields");
                    exit();
                } else {
                    $sql = "INSERT INTO children(name_with_initials, full_name, birthday, gender, photo) VALUES (?, ?, ?, ?, ?)";
                    $statement = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($statement, $sql)) {
                        header("Location: ../index.php?add_child&error=sql_error");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($statement, 'sssss', $nameWithInitials, $fullName, $birthDay, $gender, $fileNameNew);
                        mysqli_stmt_execute($statement);

                        header("Location: ../index.php?overview");
                        exit();
                    }
                }


                // header("Location: ../index.php?overview");
                // exit();
            } else {
                echo "File is too large.";
            }
        } else {
            echo "There was an error.";
        }
    } else {
        echo "You cannot upload files of " . $fileActualExt . " type";
    }
}
