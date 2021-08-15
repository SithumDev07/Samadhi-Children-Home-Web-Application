<?php

if (isset($_POST['update'])) {

    

    require '../includes/database.php';

    $nameWithInitials = $_POST['Name'];
    $fullName = $_POST['fullName'];
    $birthDay = $_POST['birthday'];
    $gender = $_POST['gender'];
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
                    $fileDestination = '../photo_uploads/children/' . $fileNameNew;
                    $prevFileDestination = '../photo_uploads/children/' . $prevFile;
                    if (!unlink($prevFileDestination)) { 
                        echo ("$prevFileDestination cannot be deleted due to an error"); 
                    } 
                    else { 
                        echo ("$prevFileDestination has been deleted"); 
                    } 
                    move_uploaded_file($fileTmpName, $fileDestination);
                
    
                    if (empty($nameWithInitials) || empty($fullName) || empty($birthDay) || empty($gender) || empty($id)) {
                        header("Location: ../index.php?view_child&error=empty_fields");
                        exit();
                    } else {
                        $sql = "UPDATE children SET name_with_initials=?, full_name=?, birthday=?, gender=?, photo=? WHERE id=?;";
                        $statement = mysqli_stmt_init($conn);
    
                        if (!mysqli_stmt_prepare($statement, $sql)) {
                            header("Location: ../index.php?view_child&error=sql_error");
                            exit();
                        } else {
                            mysqli_stmt_bind_param($statement, 'sssssi', $nameWithInitials, $fullName, $birthDay, $gender, $fileNameNew, $id);
                            mysqli_stmt_execute($statement);
    
                            header("Location: ../index.php?view_children");
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
        if (empty($nameWithInitials) || empty($fullName) || empty($birthDay) || empty($gender) || empty($id)) {
            header("Location: ../index.php?view_child&error=empty_fields");
            exit();
        } else {
            $sql = "UPDATE children SET name_with_initials=?, full_name=?, birthday=?, gender=? WHERE id=?;";
            $statement = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($statement, $sql)) {
                header("Location: ../index.php?view_child&error=sql_error");
                exit();
            } else {
                mysqli_stmt_bind_param($statement, 'ssssi', $nameWithInitials, $fullName, $birthDay, $gender, $id);
                mysqli_stmt_execute($statement);

                header("Location: ../index.php?view_children");
                exit();
            }
        }
    }
    
} else {
    header("Location: ../index.php?view_children?error=restricted_area");
    exit();
}