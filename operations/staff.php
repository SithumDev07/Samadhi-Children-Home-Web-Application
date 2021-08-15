<?php

if (isset($_POST['insert'])) {

    require '../includes/database.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nameWithInitials = $_POST['Namewithinitials'];
    $birthDay = $_POST['birthday'];
    $nic = $_POST['NIC'];
    $gender = $_POST['gender'];
    $phone = $_POST['ContactNumber'];
    $address = $_POST['address'];
    $email = $_POST['Email'];
    $post = $_POST['post'];

    $file = $_FILES['Image'];

    $fileName = $_FILES['Image']['name'];
    $fileTmpName = $_FILES['Image']['tmp_name'];
    $fileSize = $_FILES['Image']['size'];
    $fileError = $_FILES['Image']['error'];
    $fileType = $_FILES['Image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    // print_r($file);
    // print_r($nameWithInitials);
    // echo $firstname . $lastname . $nameWithInitials . $birthDay . $nic . $gender . $phone . $address  . $email . $post;

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 3000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../photo_uploads/staff/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                if (empty($firstname) || empty($lastname) || empty($nameWithInitials) || empty($birthDay) || empty($nic) || empty($gender) || empty($phone) || empty($address) || empty($email) || empty($post) || empty($fileNameNew)) {
                    header("Location: ../index.php?add_staff&error=empty_fields");
                    exit();
                } else {
                    $sql = "INSERT INTO staff(firstname, lastname, initialsname, birthday, nicnumber, gender, phone, address, email, post, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $statement = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($statement, $sql)) {
                        header("Location: ../index.php?add_staff&error=sql_error");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($statement, 'ssssisissss', $firstname, $lastname, $nameWithInitials, $birthDay, $nic, $gender, $phone, $address, $email, $post, $fileNameNew);
                        mysqli_stmt_execute($statement);

                        header("Location: ../index.php?overview");
                        exit();
                    }
                }
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
