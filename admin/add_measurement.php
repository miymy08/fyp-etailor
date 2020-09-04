<?php
include "../db.php";
error_reporting(0);
session_start();
ob_start();
if (empty($_SESSION['username']))
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
    background-image: url('images/waves.png');
    }
	 th,td {border: 1px solid #ddd;
  padding: 8px;
    }

    th, #info{
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #3b5998;
        color: white;
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
    background:white;
  /* Add shadows to create the "card" effect */
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

<div class="card">
<fieldset>
<div class="container ">
<h3>Tambah Ukuran</h3>
<br>
<form name="measurementInfo" onsubmit="return confirm('Anda pasti dengan ukuran yang ingin dimasukkan ini?');" method="post" enctype="multipart/form-data"  action="measurement_process.php">
<table align="center">
<?php 
$id_users =$_GET['id_users'];
$c = "SELECT * FROM users where id_users ='$id_users'";
$query = mysqli_query($conn,$c);
$row_c = mysqli_fetch_array($query) 
?>  
<input  name="idname" value="<?php echo $row_c['id_users']?>" hidden>
<tr><td id="info">Nama</td><td><input type='text' class='text'  value="<?php echo $row_c['f_name']; ?>" size='30' /readonly></td></tr> 
</table>




<div  id='kurung'>
	<br>
	<table align="center">
    <th>Bahagian</th><th>Inci</th>
	<tr><td>Bahu</td><td><input type='number' class='text' name="bahu" value="0" size='20' /required></td></tr>
	<tr><td>Dada</td><td><input type='number' class='text' name="dada" value="0" size='20' /required></td></tr>
	<tr><td>Labuh Baju</td><td><input type='number' class='text' name='l_baju' value="0" size='20' /required></td></tr>
	<tr><td>Labuh Depan Baju</td><td><input type='number' class='text' name='l_bjdepan' value="0" size='20' /required></td></tr>
	<tr><td>Labuh Belakang Baju</td><td><input type='number' class='text' name='l_bjblkg' value="0" size='20' /required></td></tr>
	<tr><td>Labuh Tangan</td><td><input type='number' class='text' name="l_tangan" value="0" size='20' /required></td></tr>
	<tr><td>Pergelangan Tangan</td><td><input type='number' class='text' name="lengan" value="0" size='20' /required></td></tr>
	<tr><td>Kekek</td><td><input type='number' class='text' name='kekek' value="4" size='20' /required></td></tr>
	<tr><td>Pinggang</td><td><input type='number' class='text' name='pinggang' value="0" size='20' /required></td></tr>
	<tr><td>Punggung</td><td><input type='number' class='text' name='punggung' value="0" size='20' /required></td></tr>
	<tr><td>Labuh Kain</td><td><input type='number' class='text' name='l_kain' value="0" size='20' /required></td></tr>
	</table>
	
	
</div>
&nbsp;

<center><p><input type="Submit" name="submit" Value="Tambah"></p></center>

</form>
    </div>
</fieldset>
    </div>
    
</div>
</div>



<!-- Footer -->
<footer >
<p class="w3-medium w3-center">Copyright by NAIM NAZRI</p>
</footer>
</body>
<?php
}
?>

