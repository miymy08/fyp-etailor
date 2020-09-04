<?php
include "../db.php";
error_reporting(0);
session_start();
ob_start();
if (!empty($_SESSION['username']) AND !empty($_SESSION['password']))
{
 header('location:../index.php');

}
else
{
  
?>
<!DOCTYPE html>
<html lang="en">
<title>E-Tailor | ADMIN</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<style>
body {font-family: "Lato", sans-serif;
    background-image: url('images/waves.png');}
	 th,td,tr {border: 1px solid #ddd;
  padding: 8px;
    }

    th, #info{
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #3b5998;
        color: white;
    }
	input[type=submit] {
  width: 20%;
  background-color: #3b5998;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #324b81;
}
	footer {
    
    color:white;
    background-color: #3b5998;
    position:fixed;
    left:0px;
    bottom:0px;
    height:50px;
    width:100%;
} 
.card {
  /* Add shadows to create the "card" effect */
    background:white;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}
</style>

<body>
<?php 
include "header.php";
?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px;">

<!-- The Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band" >
<?php 
	if(isset($_GET['id_users'])){
		$user_edit = $_GET['id_users'];
		$c_edit = mysqli_query($conn,"SELECT * FROM users where id_users ='$user_edit'");
		$m_edit = mysqli_query($conn,"SELECT * FROM measurement where id_users ='$user_edit' AND id_fashion=0");
		
		$row_cedit = mysqli_fetch_array($c_edit);
		$row_fedit = mysqli_fetch_array($f_edit);
		$row_medit = mysqli_fetch_array($m_edit);	
?>
<div class="card">
<div class="container ">
<h3>Papar Ukuran</h3>

<form name ="songInfo" onsubmit="return confirm('Anda pasti dengan ukuran yang ingin dikemaskini ini?');"  method="post" enctype="multipart/form-data" action="process_kebaya.php">
<table align="center">
</table>


  	<h4>Baju Kebaya</h4>


	<table  align="center">
	<input name="id_users" type="text" hidden value="<?php echo $row_medit['id_users']; ?>">
    <th>Bahagian</th><th>Inci</th>
	<tr><td>Bahu:</td><td><input name="bahu" type="text" value="<?php echo  $row_medit['bahu'];?>" required></td></tr>
	<tr><td>Dada:</td><td><input name="dada" type="text" value="<?php echo  $row_medit['dada'];?>" required></td></tr>
	<tr><td>Panjang Tangan:</td><td><input name="l_tangan" type="text" value="<?php echo  $row_medit['l_tangan'];?>" required></td></tr>
	<tr><td>Pengelangan Tangan:</td><td><input name="lengan" type="text" value="<?php echo  $row_medit['lengan'];?>" required></td></tr>
	<tr><td>Labuh Depan Baju:</td><td><input name="l_depan" type="text" value="<?php echo  $row_medit['l_depan'];?>" required></td></tr>
	<tr><td>Labuh Belakang Baju:</td><td><input name="l_belakang" type="text" value="<?php echo  $row_medit['l_belakang'];?>" required></td></tr>
	<tr><td>Pinggang:</td><td><input name="pinggang" type="text" value="<?php echo  $row_medit['pinggang'];?>" required></td></tr>
	<tr><td>Punggung:</td><td><input name="punggung" type="text" value="<?php echo  $row_medit['punggung'];?>" required></td></tr>
	<tr><td>Labuh Kain:</td><td><input name="l_kain" type="text" value="<?php echo  $row_medit['l_kain'];?>" required></td></tr>
	
</table>
<br>
<input type="submit" name="submit" value="Kemaskini" >

</form>
<br>
</div>
    </div>
    </div>
	<?php } else 
	{ echo "Fails"; }
?>

    </div>

<!-- Footer -->
<footer>
<p class="w3-medium w3-center">Copyright by NAIM NAZRI</p>
</footer>
</body>

</html>
<?php } ?>