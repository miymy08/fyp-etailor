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
  
?><!DOCTYPE html>
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
#myTable{border:1px solid #ddd;}

.table {border:1px solid #ddd;}
#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 8px 8px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 35%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 6px 20px 6px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 8px; /* Add some space below the input */
	
	
	
	

</style>

<body>
<?php 
include "header.php";
?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px;">

<!-- The Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band" >


<h3>View Measurement</h3>
<br>
<center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Contact Number"></center>
<br>

<table align="center">
<?php 
$id_users =$_GET['id_users'];
$c = "SELECT * FROM users where id_users ='$id_users'";
$query = mysqli_query($conn,$c);
$row_c = mysqli_fetch_array($query) 
?>
<tr><td>Name:</td><td><?php echo $row_c['f_name']; ?></td></tr>
<tr><td>Jenis Pakaian:</td><td><select id='baju'>
<option value="" disabled selected>Pilih</option>
<?php
			$query = mysqli_query($conn, "SELECT * FROM fashion");
			while ($fashion_row = mysqli_fetch_array($query)){		
		?>
<option value="<?php echo $fashion_row['id_fashion']?>"><?php echo $fashion_row['fashion_name']?></option>
<?php } ?>
</select>

</tr>
</table>
<br>

  
<!--Baju Kurung-->
<div  style='display:none;' id='kurung'>
	<br></br>
	<h2>Baju Kurung</h2>

<div class="table">
	<table  align="center">
	
	<th>No</th>
	<th>Bahu</th>
	<th>Dada</th>
	<th>Panjang Tangan</th>
	<th>Pengelangan Tangan</th>
	<th>Kekek</th>
	<th>Pesak</th>
	<th>Labuh Baju</th>
	<th>Pinggang</th>
	<th>Punggung</th>
	<th>Labuh Kain</th>
<?php 
$m = "SELECT * FROM measurement where id_users ='$id_users' AND id_fashion ='1'";
$query_m = mysqli_query($conn,$m);
while($row_m = mysqli_fetch_array($query_m)){
	
?>
	<tr>
	<td>No</td>
	<td>Bahu</td>
	<td>Dada</td>
	<td>Panjang Tangan</td>
	<td>Pengelangan Tangan</td>
	<td>Labuh Baju</td>
	<td>Pinggang</td>
	<td>Punggung</td>
	<td>Labuh Kain</td>
	</tr>
<?php } ?>

	</table>
</div>
</div>

<!--Baju Kurung Moden-->
<div  style='display:none;' id='moden'>
	<br></br>
	<h4>Baju Kurung Moden</h4>
<div class="table">
	<table  align="center">
	<th>No</th>
	<th>Bahu</th>
	<th>Dada</th>
	<th>Panjang Tangan</th>
	<th>Pengelangan Tangan</th>
	<th>Labuh Baju</th>
	<th>Pinggang</th>
	<th>Punggung</th>
	<th>Labuh Kain</th>
<?php 
$m = "SELECT * FROM measurement where id_users ='$id_users' AND id_fashion ='2'";
$query_m = mysqli_query($conn,$m);
while($row_m = mysqli_fetch_array($query_m)){
	
?>
	<tr>
	<td>No</td>
	<td>Bahu</td>
	<td>Dada</td>
	<td>Panjang Tangan</td>
	<td>Pengelangan Tangan</td>
	<td>Labuh Baju</td>
	<td>Pinggang</td>
	<td>Punggung</td>
	<td>Labuh Kain</td>
	</tr>
<?php } ?>
	</table>
</div>
</div>

<!--Baju Kebaya-->
<div  style='display:none;' id='kebaya'>
	<br></br>
	<h4>Baju Kebaya</h4>
<div class="table">
	<table  align="center">
	<th>No</th>
	<th>Bahu</th>
	<th>Dada</th>
	<th>Panjang Tangan</th>
	<th>Pengelangan Tangan</th>
	<th>Labuh Baju</th>
	<th>Pinggang</th>
	<th>Punggung</th>
	<th>Labuh Kain</th>
<?php 
$m = "SELECT * FROM measurement where id_users ='$id_users' AND id_fashion ='2'";
$query_m = mysqli_query($conn,$m);
while($row_m = mysqli_fetch_array($query_m)){
	
?>
	<tr>
	<td>No</td>
	<td>Bahu</td>
	<td>Dada</td>
	<td>Panjang Tangan</td>
	<td>Pengelangan Tangan</td>
	<td>Labuh Baju</td>
	<td>Pinggang</td>
	<td>Punggung</td>
	<td>Labuh Kain</td>
	</tr>
<?php } ?>
	</table>
</div>
</div>


<br>



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
</html>
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

$('#baju').on('change', function () {
    if (this.value == '1') {
        $("#kurung").show();
		$("#kebaya").hide();
		$("#moden").hide();
    } else if (this.value == '2'){
        $("#kurung").hide();
		$("#moden").show();
		$("#kebaya").hide();
    } else if (this.value == '3'){
		$("#moden").hide();
		$("#kurung").hide();
		$("#kebaya").show();
	}

});
</script>