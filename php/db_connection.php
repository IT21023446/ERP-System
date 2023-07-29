<?php
 
$host = 'root';
$username = 'root';
$password = 'root1234';
$dbname = 'assignment1';


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
