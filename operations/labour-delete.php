<?php

if(isset($_GET['id'])) {

        require '../includes/database.php';

        $id = $_GET['id'];
        $sql = "DELETE FROM labors WHERE id=?;";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("Location: ../index.php?view_labor&error=sql_error");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, 'i', $id);
            mysqli_stmt_execute($statement);

            header("Location: ../index.php?view_labor");
            exit();
        }
} else {
    header("Location: ../index.php?view_labor&error=resricted_area");
    exit();
}