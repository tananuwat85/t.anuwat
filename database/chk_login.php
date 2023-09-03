<?php

//chk_login.php
// session_start();
//import the database connection file.
require_once 'db_connection.php';

//Get the submitted username and password.
$username = $_POST['username'];
$password = $_POST['password'];

// Perform the authentication check.
$sql = "SELECT 
            * 
        FROM 
            users
        WHERE 
            username = '$username' 
        AND 
            password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    // Authentication successful.
    echo "Login successful.";
} else {
    // Authentication failed.
    echo "wrong username or password.";
}

// Close the database connection.
mysqli_close($conn);
