<?php 
include "../db.php";

$username = $_GET['username'];

$w = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");
if($w) {
	
	$row = mysqli_fetch_array($w);
	header("location:add_measurement.php?id_users=$row[id_users]");


} else {
	
	echo "fails";
}



?>