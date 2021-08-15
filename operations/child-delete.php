<?php

if(isset($_GET['id'])) {

        require '../includes/database.php';

        $sql = "SELECT * FROM children WHERE id=" . $_GET['id'] .';';
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        if($resultCheck > 0) {
            $photo;
            while($row = mysqli_fetch_assoc($results)) {
                $photo = $row['photo'];
            }

            $prevFileDestination = '../photo_uploads/children/' . $photo;
            if (!unlink($prevFileDestination)) { 
                echo ("$prevFileDestination cannot be deleted due to an error"); 
            } 
            else { 
                echo ("$prevFileDestination has been deleted"); 
            } 

            $id = $_GET['id'];
            $sql = "DELETE FROM children WHERE id=?;";
            $statement = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($statement, $sql)) {
                header("Location: ../index.php?view_children&error=sql_error");
                exit();
            } else {
                mysqli_stmt_bind_param($statement, 'i', $id);
                mysqli_stmt_execute($statement);

                header("Location: ../index.php?view_children");
                exit();
            }

        } else {
            header("Location: ../index.php?view_children&error=resricted_area");
            exit();

        }

        
} else {
    header("Location: ../index.php?view_children&error=resricted_area");
    exit();
}