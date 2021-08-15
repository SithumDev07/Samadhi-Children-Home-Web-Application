<?php

if(isset($_GET['id'])) {

        require '../includes/database.php';

        $sql = "SELECT * FROM staff WHERE id=" . $_GET['id'] .';';
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        if($resultCheck > 0) {
            $photo;
            while($row = mysqli_fetch_assoc($results)) {
                $photo = $row['image'];
            }

            $prevFileDestination = '../photo_uploads/staff/' . $photo;
            if (!unlink($prevFileDestination)) { 
                echo ("$prevFileDestination cannot be deleted due to an error"); 
            } 
            else { 
                echo ("$prevFileDestination has been deleted"); 
            } 

            $id = $_GET['id'];
            $sql = "DELETE FROM staff WHERE id=?;";
            $statement = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($statement, $sql)) {
                header("Location: ../index.php?view_staff&error=sql_error");
                exit();
            } else {
                mysqli_stmt_bind_param($statement, 'i', $id);
                mysqli_stmt_execute($statement);

                header("Location: ../index.php?view_staff");
                exit();
            }

        } else {
            header("Location: ../index.php?view_staff&error=resricted_area");
            exit();

        }

        
} else {
    header("Location: ../index.php?view_staff&error=resricted_area");
    exit();
}