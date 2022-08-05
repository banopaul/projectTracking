<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

 
define("SITEURL","http://localhost/ProjectTrackingSystem/");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

?>