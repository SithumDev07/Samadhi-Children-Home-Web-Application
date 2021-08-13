<?php

if (isset($_POST['insert'])) {
    $file = $_FILES['Image'];

    $fileName = $_FILES['Image']['name'];
    $fileTmpName = $_FILES['Image']['tmp_name'];
    $fileSize = $_FILES['Image']['size'];
    $fileError = $_FILES['Image']['error'];
    $fileType = $_FILES['Image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg, jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                $fileDestination = 'photo_uploads/children/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: ../index.php?overview");
                exit();
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
