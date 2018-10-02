<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tugas";

$conn = mysqli_connect($servername, $username, $password, $database);

if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
?>