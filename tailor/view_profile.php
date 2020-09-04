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
	
$id_tailor =$_SESSION['id'];
$t = "SELECT * FROM tailor where id_tailor ='$id_tailor'";
$query = mysqli_query($conn,$t);
$row_t = mysqli_fetch_array($query);
    $id_fashion =$row_t['tailor_type'];
  
?><!DOCTYPE html>
<html lang="en">
<title>E-Tailor | TUKANG JAHIT</title>
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

    th, #info{
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #3b5998;
        color: white;
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
  footer {
    
    color:white;
    background-color: #3b5998;
    position:fixed;
    left:0px;
    bottom:0px;
    height:50px;
    width:100%;
}     
    

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
<div class="w3-content" style="max-width:2000px;margin-top:100px;">

<!-- The Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band" >
<div class="card">
        <div class="container">

<h3>Papar Profil</h3>

<table id="myTable"align="center">


<tr>
	<td id="info">Nama:</td><td><?php echo $row_t['f_tailor'];?></td>
</tr>
<tr>
	<td id="info">No. Telefon:</td><td><?php echo $row_t['phone_no'];?> </td>
</tr>
<tr>
    <td id="info">Jenis Pakaian:</td>
    <td>
    <?php 
    $f = "SELECT * FROM fashion WHERE id_fashion='$id_fashion'";
    $query_f = mysqli_query($conn,$f);
    $row_f = mysqli_fetch_array($query_f);
    $fashion_name = $row_f['fashion_name'];       
    echo $fashion_name;
    ?>
    </td>
</tr>

</table>
<br>
    <button class="w3-button w3-indigo w3-hover-light-blue"><a style="text-decoration: none;" onclick="return confirm('Adakah anda ingin mengemaskini profil?');" href="edit_profile.php?id_tailor=<?php echo $row_t['id_tailor']; ?>">
    Kemaskini</a></button>

<b></b><br>
        <br>
    </div>
    </div>
</div>
</div>



<!-- Footer -->
<footer>
<p class="w3-medium w3-center">Copyright by NAIM NAZRI</p>
</footer>
</body>
<?php
}

?>
</html>
