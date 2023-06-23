<?php
$servername = "localhost";
$database = "foodfaas_webr";
$username = "foodfaas_webr";
$password = "84FyuD5JZNrk72dt";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//mysqli_close($conn);
?>