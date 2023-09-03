<?php
// session start
session_start();

// ตั้งค่าตัวแปร session
$_SESSION['username'] = "john_doe";
$_SESSION['email'] = "john@example.com";

// เข้าถึงค่าใน session
$username = $_SESSION['username'];
$email = $_SESSION['email'];


echo "Username: "  . $username . "<br>";
echo "Email: "  . $email . "<br>";

if (true) {
    header("Location: https://www.google.com");
}
// close session
session_destroy();