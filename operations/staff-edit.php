<?php

if (isset($_POST['update'])) {

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
    $id = $_POST['id'];

    $file = $_FILES['Image'];

    if(is_uploaded_file($_FILES['Image']['tmp_name'])) {

        $prevFile = $_GET['prev_file'];
        $fileName = $_FILES['Image']['name'];
        $fileTmpName = $_FILES['Image']['tmp_name'];
        $fileSize = $_FILES['Image']['size'];
        $fileError = $_FILES['Image']['error'];
        $fileType = $_FILES['Image']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 3000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../photo_uploads/staff/' . $fileNameNew;
                    $prevFileDestination = '../photo_uploads/staff/' . $prevFile;
                    if (!unlink($prevFileDestination)) { 
                        echo ("$prevFileDestination cannot be deleted due to an error"); 
                        header("Location: ../index.php?view_staff&error=previous_image_cant_delete");
                        exit();
                    } 
                    else { 
                        echo ("$prevFileDestination has been deleted"); 
                    } 
                    move_uploaded_file($fileTmpName, $fileDestination);

                    if (empty($firstname) || empty($lastname) || empty($nameWithInitials) || empty($birthDay) || empty($nic) || empty($gender) || empty($phone) || empty($address) || empty($email) || empty($post) || empty($fileNameNew) || empty($id)) {
                        header("Location: ../index.php?view_staff&error=empty_fields");
                        exit();
                    } else {
                        $sql = "UPDATE staff SET firstname=?, lastname=?, initialsname=?, birthday=?, nicnumber=?, gender=?, phone=?, address=?, email=?, post=?, image=? WHERE id=?";
                        $statement = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($statement, $sql)) {
                            header("Location: ../index.php?view_staff&error=sql_error");
                            exit();
                        } else {
                            mysqli_stmt_bind_param($statement, 'ssssisissssi', $firstname, $lastname, $nameWithInitials, $birthDay, $nic, $gender, $phone, $address, $email, $post, $fileNameNew, $id);
                            mysqli_stmt_execute($statement);

                            header("Location: ../index.php?view_staff");
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
    } else {
        if (empty($firstname) || empty($lastname) || empty($nameWithInitials) || empty($birthDay) || empty($nic) || empty($gender) || empty($phone) || empty($address) || empty($email) || empty($post) || empty($id)) {
            header("Location: ../index.php?view_staff&error=empty_fields");
            exit();
        } else {
            $sql = "UPDATE staff SET firstname=?, lastname=?, initialsname=?, birthday=?, nicnumber=?, gender=?, phone=?, address=?, email=?, post=? WHERE id=?";
            $statement = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($statement, $sql)) {
                header("Location: ../index.php?view_staff&error=sql_error");
                exit();
            } else {
                mysqli_stmt_bind_param($statement, 'ssssisisssi', $firstname, $lastname, $nameWithInitials, $birthDay, $nic, $gender, $phone, $address, $email, $post, $id);
                mysqli_stmt_execute($statement);

                header("Location: ../index.php?view_staff");
                exit();
            }
        }
    }

    
}
