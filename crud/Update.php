<?php

require_once '../database/db_connection.php';

$sql = "UPDATE 
            users
        SET
            username = 'admin1234',
            password = 'admin1234'
        WHERE
            id = '6'
        ";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully.";
} else {
    echo "Error updaing record: " . mysqli_error($conn);
}
mysqli_close($conn);
