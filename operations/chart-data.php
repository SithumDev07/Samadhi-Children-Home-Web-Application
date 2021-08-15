<?php

require '../includes/database.php';


$sql = " SELECT SUM(amount) FROM donars;";
$results = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($results);
$january;

if($resultCheck > 0) {
    while($row = mysqli_fetch_assoc($results)) {
        $january = $row['SUM(amount)'];
    }

}