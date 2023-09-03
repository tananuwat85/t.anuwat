<?php
$servername = "localhost";
$username = "root";
$password = "root"; //xampp ไม่ต้องใส่่ $password = "";
$dbname = "db_anuwat"; //ชื่อจริงไม่มีเว้นวรรค
$port = "8889"; //port ในการเชื่อมต่อฐานข้อมูลส่วนใหญ่จะเป็น 3306 
//ถ้าหากมีการเปลี่ยนจำเป็นต้องกำหนด port ในการเชื่อมต่อ

//create a new MySQLi connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

//Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/*  */
// else {
//     echo "Connection successfully.";
// }