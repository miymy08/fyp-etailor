<?php 
include "../db.php";
session_start();

$id_users = $_GET['id_users'];
$id_fashion = $_GET['id_fashion'];

$w = mysqli_query($conn, "SELECT * FROM measurement WHERE id_users = '$id_users' AND id_fashion = '$id_fashion'");
if($w) {
	
    
	$row = mysqli_fetch_array($w);
    
    $_SESSION['id_measurement'] = $row['id_measurement'];
	header("location:add_forder.php");


} else {
	
	echo "fails";
}



?>