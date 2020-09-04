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
    
 #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}

@keyframes zoom {
  from {transform: scale(0.1)} 
  to {transform: scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
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
<div class="w3-content" style="max-width:2000px;margin-top:46px;">

<!-- The Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:1100px" id="band" >

<div class="card">
<div class="container">
<?php 
    $id_users =$_GET['id_users'];
    $c = "SELECT * FROM users where id_users ='$id_users'";
    $query_c = mysqli_query($conn,$c);
    $row_c = mysqli_fetch_array($query_c);
        $f_name = $row_c['f_name'];
?>
<h3>Senarai Tempahan untuk <?php echo $f_name ?></h3>
<br>
<table align="center">
<tr><td id="info">Status Pakaian</td><td><select id='baju'>
<option value="1">Dalam Progress</option>
<option value="2">Dah Siap</option>

</select>
    </td>
    </tr>
    </table>
<br>
<center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Carian Berdasarkan Kod Tempahan"></center>
<br>
<div id='belum'>
<table id="myTable"align="center">

<th>Kod Tempahan</th><th>Tarikh Terima</th><th>Tarikh Ambil</th><th>Status</th><th>Catatan</th><th>Gambar Kain</th><th>Baki Pembayaran (RM)</th><th></th>

<?php 
    
    $order = "SELECT * FROM orders where id_users = '$id_users' AND status='Dalam Progress'";
    $i=1;
	$query_o = mysqli_query($conn,$order);
	while($row_o = mysqli_fetch_array($query_o)){
        
        $order_code = $row_o['order_code'];
        $receive_date = $row_o['receive_date'];
        $pickup_date = $row_o['pickup_date'];
        $status = $row_o['status'];
        $catatan = $row_o['catatan'];
        $image = $row_o['image'];
        
        

        
        

        
    $p = "SELECT * FROM payment WHERE order_code='$order_code'";
    $query_p = mysqli_query($conn,$p);
    while($row_p = mysqli_fetch_array($query_p)){
        $id_payment = $row_p['id_payment'];
        $baki = $row_p['baki'];
		
        
        
	
	?>
<tr>
	<input hidden value="<?php echo $id_payment ?>"/>
    <td><?php echo $order_code ?></td>
    <td ><?php echo $receive_date ?></td>
	<td ><?php echo $pickup_date ?> </td>
    <td ><font style="font-weight:bold" color="red"><?php echo $status ?></font></td>
    <td ><?php echo $catatan ?></td>
    <td >
        
        
        
        <img id="myImg<?php echo $i?>" src="upload/<?php echo $image ?>" class="w3-left w3-margin-right" style="width:100px"/>
    </td>

    <!-- The Modal -->
    <div id="myModal<?php echo $i?>" class="modal">
    <span class="close">×</span>
    <img class="modal-content" id="img01<?php echo $i?>">
</div>
<script>
    
    // Get the modal
var modal = document.getElementById('myModal<?php echo $i?>');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg<?php echo $i?>');
var modalImg = document.getElementById("img01<?php echo $i?>");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    </script>
    
    
    
    
    
    <td ><?php echo $baki ?></td>
    <td>
	<button class="w3-button w3-indigo w3-hover-light-blue"><a style="text-decoration:none" onclick="return confirm('Adakah anda ingin mengemaskini pembayaran?');" href="edit_cpayment.php?id_payment=<?php echo $row_p['id_payment']; ?>">Kemaskini</a></button>
	</td>
	
</tr>
<?php 
    
    }
   
  $i++;}
    
         

?>
</table>
    

<br>
</div>
 <div style='display:none;' id="dah">
<table id="myTable"align="center">

<th>Kod Tempahan</th><th>Tarikh Terima</th><th>Tarikh Ambil</th><th>Status</th><th>Catatan</th><th>Gambar Kain</th><th>Baki Pembayaran (RM)</th><th>Kemaskini</th>

<?php 
    
    $order = "SELECT * FROM orders where id_users = '$id_users' AND status='Dah siap'";
    $i=1;
	$query_o = mysqli_query($conn,$order);
	while($row_o = mysqli_fetch_array($query_o)){
        
        $order_code = $row_o['order_code'];
        $receive_date = $row_o['receive_date'];
        $pickup_date = $row_o['pickup_date'];
        $status = $row_o['status'];
        $catatan = $row_o['catatan'];
        $image = $row_o['image'];
        
        

        
        

        
    $p = "SELECT * FROM payment WHERE order_code='$order_code'";
    $query_p = mysqli_query($conn,$p);
    while($row_p = mysqli_fetch_array($query_p)){
        $baki = $row_p['baki'];
		
        
        
	
	?>
<tr>
	
    <td><?php echo $order_code ?></td>
    <td ><?php echo $receive_date ?></td>
	<td ><?php echo $pickup_date ?> </td>
    <td ><font style="font-weight:bold" color="green"><?php echo $status ?></font></td>
    <td ><?php echo $catatan ?></td>
    <td >
        
        
        
        <img id="myImg<?php echo $i?>" src="upload/<?php echo $image ?>" class="w3-left w3-margin-right" style="width:100px"/>
    </td>

    <!-- The Modal -->
    <div id="myModal<?php echo $i?>" class="modal">
    <span class="close">×</span>
    <img class="modal-content" id="img01<?php echo $i?>">
</div>
<script>
    
    // Get the modal
var modal = document.getElementById('myModal<?php echo $i?>');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg<?php echo $i?>');
var modalImg = document.getElementById("img01<?php echo $i?>");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    </script>
    
    
    
    
    
    <td ><?php 
        
        if ($baki == 0){
            ?> <font color="green" style="font-weight:bold">Selesai</font> <?php 
        }else {
            echo $baki;
        }
        
         ?></td>
    <?php 
       if ($baki == 0){
           ?> <td>Tidak Perlu</td> <?php
       }else {
           ?>
    <td>
        
	<button class="w3-button w3-indigo w3-hover-light-blue"><a style="text-decoration:none" href="#">Kemaskini</a></button>
	</td>
    <?php } ?>
        
	
</tr>
<?php 
    
    }
   
  $i++;}
    
         

?>
</table>
    

<br>
    </div>

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

$('#baju').on('change', function () {
    if (this.value == '1') {
        $("#belum").show();
		$("#dah").hide();
    } else if (this.value == '2'){
        $("#belum").hide();
		$("#dah").show();
    } 

});
</script>