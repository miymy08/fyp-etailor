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
body {font-family: "Lato", sans-serif}

</style>

<body>
<?php 
include "header.php";
?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px;">




<!-- The Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band" >

<fieldset>
<legend>Add Measurement</legend>
<br>
<form name="measurementInfo" onsubmit="return confirm('Do you really want to submit this measurement?');"method="post" enctype="multipart/form-data"  action="measurement_process.php">
<table align="center">
<?php 
$id_users =$_GET['id_users'];
$c = "SELECT * FROM users where id_users ='$id_users'";
$query = mysqli_query($conn,$c);
$row_c = mysqli_fetch_array($query) 
?>  
<tr><td>User ID:</td><td><input  name="idname" value="<?php echo $row_c['id_users']?>"></td>
<tr><td>Name:</td><td><input type='text' class='text'  value="<?php echo $row_c['f_name']; ?>" size='30' /></td></tr> 
<tr><td>Jenis Pakaian:</td><td><select name="fashion" id='baju'>
<option value="" disabled selected>Pilih</option>
<?php
			$query = mysqli_query($conn, "SELECT * FROM fashion");
			while ($fashion_row = mysqli_fetch_array($query)){		
		?>
<option value="<?php echo $fashion_row['id_fashion']?>"><?php echo $fashion_row['fashion_name']?></option>
<?php } ?>
</select>
<td>
</tr>
</table>




<div style='display:none;' id='kurung'>
	<br></br>
	<table align="center">
	<tr><td>Bahu:</td><td><input type='text' class='text' name="bahu" value size='20' /></td></tr>
	<tr><td>Dada:</td><td><input type='text' class='text' name="dada" value size='20' /></td></tr>
	<tr><td>Panjang Tangan:</td><td><input type='text' class='text' name="l_tangan" value size='20' /></td></tr>
	<tr><td>Pengelangan Tangan:</td><td><input type='text' class='text' name="lengan" value size='20' /></td></tr>
	<tr><td>Labuh Baju:</td><td><input type='text' class='text' name='l_baju' value size='20' /></td></tr>
	<tr><td>Pinggang:</td><td><input type='text' class='text' name='pinggang' value size='20' /></td></tr>
	<tr><td>Punggung:</td><td><input type='text' class='text' name='punggung' value size='20' /></td></tr>
	<tr><td>Labuh Kain:</td><td><input type='text' class='text' name='l_kain' value size='20' /></td></tr>
	</table>
	
	
       
</div>

<div style='display:none;' id='moden'>
	<br></br>
	<table align="center">
	<tr><td>Bahu:</td><td><input type='text' class='text' name='bahu' value size='20' /></td></tr>
	<tr><td>Dada:</td><td><input type='text' class='text' name='dada' value size='20' /></td></tr>
	<tr><td>Panjang Tangan:</td><td><input type='text' class='text' name='p_tangan' value size='20' /></td></tr>
	<tr><td>Pengelangan Tangan:</td><td><input type='text' class='text' name='pglg_tgn' value size='20' /></td></tr>
	<tr><td>Labuh Baju:</td><td><input type='text' class='text' name='l_baju' value size='20' /></td></tr>
	<tr><td>Pinggang:</td><td><input type='text' class='text' name='pinggang' value size='20' /></td></tr>
	<tr><td>Punggung:</td><td><input type='text' class='text' name='punggung' value size='20' /></td></tr>
	<tr><td>Labuh Kain:</td><td><input type='text' class='text' name='l_kain' value size='20' /></td></tr>
	</table>
	
	
</div>

<div style='display:none;' id='kebaya'>
	<br></br>
	<table align="center">
	<tr><td>Bahu:</td><td><input type='text' class='text' name='bahu' value size='20' /></td></tr>
	<tr><td>Dada:</td><td><input type='text' class='text' name='dada' value size='20' /></td></tr>
	<tr><td>Panjang Tangan:</td><td><input type='text' class='text' name='p_tangan' value size='20' /></td></tr>
	<tr><td>Pengelangan Tangan:</td><td><input type='text' class='text' name='pglg_tgn' value size='20' /></td></tr>
	<tr><td>Labuh Depan Baju:</td><td><input type='text' class='text' name='l_bjdepan' value size='20' /></td></tr>
	<tr><td>Labuh Belakang Baju:</td><td><input type='text' class='text' name='l_bjblkg' value size='20' /></td></tr>
	</table>
	
	
</div>
&nbsp;

<center><p><input type="Submit" name="submit" Value="Submit"></p></center>

</form>
</fieldset>
</div>
</div>



<!-- Footer -->
<footer class="w3-container w3-padding-16 w3-center  w3-special-blue w3-xlarge" style="margin-top:165px;">
<p class="w3-medium">Copyright by NAIM NAZRI</p>
</footer>
</body>
<?php
}
?>
<script>
$('#baju').on('change', function () {
    if (this.value == '1') {
        $("#kurung").show();
		$("#kebaya").hide();
		$("#moden").hide();
    } else if (this.value == '2'){
        $("#kurung").hide();
		$("#moden").show();
		$("#kebaya").hide();
    } else {
		$("#moden").hide();
		$("#kurung").hide();
		$("#kebaya").show();
	}

});
</script>
