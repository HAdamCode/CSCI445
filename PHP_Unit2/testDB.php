<?php
$servername = "localhost";
$username = "hadam"; // put your user name here. Should match your mines multipass.
$password = "Passw0rd"; // put your password here
$database = "hadam"; // put your database name here 

// luna ONLY
error_reporting(E_ALL);
ini_set('display_errors', True);

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
  
// Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 