<?php 

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"travels");


// Check connection
if($conn){
  mysqli_query($conn,"SET NAMES 'utf8'");
}else{
  die("Connection failed: " . mysqli_connect_error());
}


	
 ?>