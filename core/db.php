<?php
//connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "auth";

$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
