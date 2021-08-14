<?php

if (isset($_POST['insert'])) {

    require '../includes/database.php';

    $donarName = $_POST['donarName'];
    $donarPhone = $_POST['donarPhone'];
    $donarAddress = $_POST['donarAddress'];
    $donationType = $_POST['donationType'];
    $donarAmount = $_POST['donarAmount'];

    // print_r($nameWithInitials);
    echo $donarName . $donarPhone . $donarAddress . $donationType . $donarAmount;


    if (empty($donarName) || empty($donarPhone) || empty($donarAddress) || empty($donationType) || empty($donarAmount)) {
        header("Location: ../index.php?add_donard&error=empty_fields");
        exit();
    } else {
        $sql = "INSERT INTO donars(donar_name, contact_number, address, donation_type, amount) VALUES (?, ?, ?, ?, ?)";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("Location: ../index.php?add_donar&error=sql_error");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, 'sissi', $donarName, $donarPhone, $donarAddress, $donationType, $donarAmount);
            mysqli_stmt_execute($statement);

            header("Location: ../index.php?overview");
            exit();
        }
    }
      
}
