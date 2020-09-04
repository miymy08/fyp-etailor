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
body {font-family: "Lato", sans-serif}
  #form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
    
input[type=text], textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #3b5998;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
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

<?php 
	if(isset($_GET['id_payment'])){
		$id_p = $_GET['id_payment'];
		$query_p = mysqli_query($conn,"SELECT * FROM payment where id_payment ='$id_p'");
		
		$row_p = mysqli_fetch_array($query_p);
        $id_pay = $row_p['id_payment'];
        $payment_code = $row_p['payment_code'];
        $order_code = $row_p['order_code'];
        $id_fashion = $row_p['id_fashion'];
        $kuantiti = $row_p['kuantiti'];
        $jumlah = $row_p['jumlah'];
        $deposit = $row_p['deposit'];
        $baki = $row_p['baki'];
        
        
        $f = "SELECT * FROM fashion WHERE id_fashion='$id_fashion'";
        $query_f = mysqli_query($conn,$f);
        $row_f =mysqli_fetch_array($query_f);
        $fashion_name = $row_f['fashion_name'];
        $fashion_price = $row_f['fashion_price'];
        
        $o = "SELECT * FROM orders WHERE order_code='$order_code'";
         $query_o = mysqli_query($conn,$o);
        $row_o = mysqli_fetch_array($query_o);
        $id_users = $row_o['id_users'];
        
        $c = "SELECT * FROM users WHERE id_users='$id_users'";
        $query_c = mysqli_query ($conn,$c);
        $row_c = mysqli_fetch_array($query_c);
        $f_name = $row_c['f_name'];
        $ic = $row_c['ic_no'];

        
?> 
    
    
<div class="card">
<div class="container ">   
    

<h3>Kemaskini Pembayaran</h3>
<form name ="paymentInfo" onsubmit="return confirm('Anda pasti dengan maklumat pembayaran yang akan dikemaskini ini?');" method="post" enctype="multipart/form-data" action="ecpayment_process.php">
<input name="id_payment"  hidden value="<?php echo $id_pay; ?>" hidden>
    <div id="form">
    <input hidden name="id_users" value="<?php echo $id_users ?>"/>
    <label for="fname">Nama:</label><input type="text" value="<?php echo $f_name ?>" readonly>
    <label for="ic">Nombor IC:</label><input type="text"value="<?php echo $ic ?>" readonly>
    <label for="paycode">Payment Code:</label><input type="text"value="<?php echo $payment_code ?>" readonly>
    <label>Order_code:</label><input type="text"value="<?php echo $order_code ?>" readonly>
    <label>Jenis Pakaian:</label><input type="text"value="<?php echo $id_fashion ?>" readonly>
    <label>Kuantiti:</label><input type="text" value="<?php echo $order_code ?>" readonly>
    <label>Jumlah Harga:</label>
    <input type="text" value="<?php echo $jumlah ?>" readonly>
    <label>Baki: </label>
    <input class="w3-center" size="70" id="old" type="text"  onchange="calculate()" value="<?php echo $baki ?>">
    <label>Pembayaran Tambahan: </label>
    <input class="w3-center" size="70" id="add" type="text"  onchange="calculate()" value="0">
    <label>Baki Baru: </label>
    <input class="w3-center" size="70" name="baki" id="baki" type="text"  value="<?php echo $baki ?>">

    <br>
<input type="submit" name="submit" value="Submit" >
    </div>
</form>
    <br>
    </div>
    </div>
</div>
</div>

<?php } else 
	{ echo "Fails"; }
?>

<!-- Footer -->
<footer>
<p class="w3-medium w3-center">Copyright by NAIM NAZRI</p>
</footer>
</body>
<?php
}

?>
</html>
<script type="text/javascript">
    
function calculate() {
    var old = parseInt(document.getElementById("old").value);
    
    var add = parseInt(document.getElementById("add").value);
    // to make sure that they are numbers
    if (!old) { old = 0; }
    if (!add) { add = 0; }
    
    
    
    var total = document.getElementById("baki");
    total.value = old - add;
}
    
</script>
