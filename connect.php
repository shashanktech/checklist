<?
//error_reporting(0);
$conn = new mysqli("localhost","root","","app");
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
$conn->query("set time_zone = '+00:00' ");
?>