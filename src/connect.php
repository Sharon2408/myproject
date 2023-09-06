<?php 
$servername = "localhost:3307";
$username = "root";
$password = "CG-vak123";
$dbname = "sha";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
   //  echo "Connection Successful";
}

?>