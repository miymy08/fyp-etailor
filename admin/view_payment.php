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
#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 8px 8px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 20%; /* Full-width */
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
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:1300px" id="band" >

<div class="card">
<div class="container ">
<h3>Senarai Pembayaran</h3>

<br>
<table align="center">
<tr><td id="info">Status Pembayaran</td><td><select id='baju'>
<option value="1">Belum</option>
<option value="2">Dah</option>

</select>
    </td>
    </tr>
    </table>
<br>
<center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Berdasarkan No IC"></center>
<br>

    
    

<div id='belum'>
<table id="myTable"align="center">

<th>Nama</th><th>No IC</th><th>Kod Pembayaran</th><th>Kod Tempahan</th><th>Jenis Pakaian</th><th>Kuantiti</th><th>Jumlah Harga (RM)</th><th>Deposit (RM) </th><th>Baki (RM)</th><th>Status Pembayaran</th><th></th>

<?php 
    $payment = "SELECT * FROM payment WHERE status_p='Belum' ";
	$query_p = mysqli_query($conn,$payment);
	while($row_p = mysqli_fetch_array($query_p)){
        
        $id_p = $row_p['id_payment'];
        $p_code = $row_p['payment_code'];
        $order_code = $row_p['order_code'];
        $id_fashion = $row_p['id_fashion'];
        $kuantiti = $row_p['kuantiti'];
        $jumlah = $row_p['jumlah'];
        $deposit = $row_p['deposit'];
        $baki = $row_p['baki'];
        $status = $row_p['status_p'];
        
        
    
    $fashion = "SELECT * FROM fashion WHERE id_fashion='$id_fashion'";
            $query_f = mysqli_query ($conn,$fashion);
            while($row_f = mysqli_fetch_array($query_f)){
            $fashion_name = $row_f['fashion_name'];
        
    $order = "SELECT id_users FROM orders where order_code='$order_code'";
        $query_o = mysqli_query($conn,$order);
        ;$row_o = mysqli_fetch_array($query_o);
        $id_users = $row_o['id_users'];
        
    
                
	$c = "SELECT * FROM users where id_users ='$id_users'";
    $query_c = mysqli_query($conn,$c);
    while($row_c = mysqli_fetch_array($query_c)){
        $f_name = $row_c['f_name'];
        $ic = $row_c['ic_no'];
        
    
		
        
	?>
<tr>
	<td><?php echo $f_name ?></td>
    <td><?php echo $ic ?></td>
    <td><?php echo $p_code ?></td>
    <td><?php echo $order_code ?></td>
    <td ><?php echo $fashion_name ?></td>
	<td ><?php echo $kuantiti ?> </td>
    <td ><?php echo $jumlah ?></td>
    <td ><?php echo $deposit ?></td>
    <td ><?php echo $baki ?></td>
    <td ><font style="font-weight:bold" color="red"><?php echo $status ?></font></td>
    <td>
        <button class="w3-button w3-indigo w3-hover-light-blue"><a style="text-decoration: none;" onclick="return confirm('Adakah anda ingin mengemaskini pembayaran?');" href="edit_payment.php?id_payment=<?php echo $row_p['id_payment']; ?>" >Kemaskini</a></button>
	</td>
	
</tr>
<?php 

    
            }
        }
}
?>
</table>
<br>
</div>


<div style='display:none;' id='dah'>
<table id="myTable"align="center">

<th>Nama</th><th>No IC</th><th>Kod Pembayaran</th><th>Kod Tempahan</th><th>Jenis Pakaian</th><th>Kuantiti</th><th>Jumlah Harga (RM)</th><th>Deposit (RM) </th><th>Status Pembayaran</th><th>Tarikh Selesai Bayar</th>

<?php 
    $payment = "SELECT * FROM payment WHERE status_p='Dah'";
	$query_p = mysqli_query($conn,$payment);
	while($row_p = mysqli_fetch_array($query_p)){
        
        $id_p = $row_p['id_payment'];
        $p_code = $row_p['payment_code'];
        $order_code = $row_p['order_code'];
        $id_fashion = $row_p['id_fashion'];
        $kuantiti = $row_p['kuantiti'];
        $jumlah = $row_p['jumlah'];
        $deposit = $row_p['deposit'];
        $baki = $row_p['baki'];
        $status = $row_p['status_p'];
        $times = $row_p['time_done'];
        
        
    
    $fashion = "SELECT * FROM fashion WHERE id_fashion='$id_fashion'";
            $query_f = mysqli_query ($conn,$fashion);
            while($row_f = mysqli_fetch_array($query_f)){
            $fashion_name = $row_f['fashion_name'];
        
    $order = "SELECT id_users FROM orders where order_code='$order_code'";
        $query_o = mysqli_query($conn,$order);
        ;$row_o = mysqli_fetch_array($query_o);
        $id_users = $row_o['id_users'];
        
    
                
	$c = "SELECT * FROM users where id_users ='$id_users'";
    $query_c = mysqli_query($conn,$c);
    while($row_c = mysqli_fetch_array($query_c)){
        $f_name = $row_c['f_name'];
        $ic = $row_c['ic_no'];
        
    
		
        
	?>
<tr>
	<td><?php echo $f_name ?></td>
    <td><?php echo $ic ?></td>
    <td><?php echo $p_code ?></td>
    <td><?php echo $order_code ?></td>
    <td ><?php echo $fashion_name ?></td>
	<td ><?php echo $kuantiti ?> </td>
    <td ><?php echo $jumlah ?></td>
    <td ><?php echo $deposit ?></td>
    <td ><font style="font-weight:bold" color="green"><?php echo $status ?></font></td>
    <td ><?php echo $times ?></td>
    

	
</tr>
<?php 

    
            }
        }
}
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