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
body {font-family: "Lato", sans-serif;
    background-image: url('images/waves.png');}
    
th,td {border: 1px solid #ddd;
  padding: 8px;
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

    th{
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #3b5998;
        color: white;
    }    
    
#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 8px 8px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 25%; /* Full-width */
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
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:1000px" id="band" >

<div class="card">
<div class="container ">
<h3>Senarai Pelanggan</h3>
<br>
<center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Berdasarkan No IC"></center>

    <p>* Pernambahan tempahan boleh dilakukan selepas memilih jenis pakaian melalui butang "<strong>Papar Ukuran</strong>".</p>
    
<table id="myTable" align="center">

<th>Nama</th><th>No IC</th><th>No Telefon</th><th>Alamat</th><th>Ukuran</th><th>Cadangan</th><th>Tempahan</th>

<?php 
	$c = "SELECT * FROM users";
	$query = mysqli_query($conn,$c);
	while($row_c = mysqli_fetch_array($query)){
		$f_name = $row_c['f_name']; 
        $ic = $row_c['ic_no'];
        $phone = $row_c['phone_no']; $alamat = $row_c['alamat'];
	
	?>
<tr>
	<td><?php echo $f_name ?></td><td><?php echo $ic ?></td><td><?php echo $phone ?></td><td style="text-align:left;"><?php echo $alamat ?></td>
	<td>
	<button class="w3-button w3-indigo w3-hover-light-blue"><a style="text-decoration:none" href="view_measurement.php?id_users=<?php echo $row_c['id_users']?>">Papar</a></button>
	</td>
    <td><button class="w3-button w3-indigo w3-hover-light-blue"><a style="text-decoration:none" href="view_suggest.php?id_users=<?php echo $row_c['id_users']?>">Cadangan</a></button></td>
	<td><button class="w3-button w3-indigo w3-hover-light-blue"><a style="text-decoration:none" href="view_corder.php?id_users=<?php echo $row_c['id_users']?>">Papar</a></button></td>
</tr>
<?php 


}
?>
</table>


<br>



</div>
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
</script>