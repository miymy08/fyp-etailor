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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif;
    background-image: url('images/waves.png');
    }
#form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
    
input[type=text], select {
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
    
<?php 
    
$ord_code =$_GET['order_code'];
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
$pay_code = substr(str_shuffle($permitted_chars), 0, 10);

$order = "SELECT * FROM orders WHERE order_code='$ord_code'";
$query_o = mysqli_query($conn,$order);
$row_o = mysqli_fetch_array($query_o);
    $id_fashion = $row_o['id_fashion'];

    
    
$fashion = "SELECT * FROM fashion WHERE id_fashion='$id_fashion'";
$query_f = mysqli_query($conn,$fashion);
$row_f = mysqli_fetch_array($query_f);
    $fashion_name = $row_f['fashion_name'];
    $f_price = $row_f['fashion_price'];
    
$order_bil = $_SESSION['number'];

$jumlah = $order_bil * $f_price;


?>
<div class="card">

    <div class="container ">
<h3> Tambah Pembayaran</h3>
<br>
<form name="paymentInfo" id="payment" onsubmit="return confirm('Adakah anda pasti dengan maklumat yang telah dimasukkan?');"method="post" enctype="multipart/form-data"  action="payment_process.php">
<div id="form">
    <label for="paycode">Kod Pembayaran:</label>
    <input size="40" type="text" name="payment_code" value="<?php echo $pay_code; ?>" readonly>
    <label for="ordercode">Kod Tempahan:</label>
    <input size="40" type="text" name="order_code" value="<?php echo $ord_code; ?>" readonly>
    <label for="fashion">Jenis Pakaian:</label>
    <input size="40" type="text" value="<?php echo $fashion_name; ?>"   readonly>
    <input name="id_fashion" value="<?php echo $id_fashion; ?>" hidden><?php echo $fashion_name; ?>
    <label for="kuantiti">Kuantiti:</label>
    <input size="40" type="text" name="kuantiti" value="<?php echo $order_bil; ?>" readonly>
    <label for="price">Jumlah Harga (RM)</label>
    <input size="40" type="text" name="jumlah" id="jumlah" onchange="calculate()" value="<?php echo $jumlah; ?>" readonly>
    <label>Deposit (RM)</label>
    <input size="40" type="text" placeholder="Masukkan nilai deposit" name="deposit" id="deposit" onchange="calculate()" value="0" required>
    <label for="baki">Baki Pembayaran (RM) </label>
    <input size="40" type="text" name="baki" placeholder="Baki" id="baki" value="<?php echo $jumlah; ?>" readonly>
    <input name="submit" type="Submit" Value="Tambah">
  
    </div>
    <br>
</form>
        
    </div>

    </div>
</div>
<!-- End Page Content -->
</div>
<script type="text/javascript">
    
function calculate() {
    var jumlah = parseInt(document.getElementById("jumlah").value);
    var deposit = parseInt(document.getElementById("deposit").value);
    // to make sure that they are numbers
    if (!jumlah) { jumlah = 0; }
    if (!deposit) { deposit = 0; }
    var total = document.getElementById("baki");
    total.value = jumlah - deposit;
}
    
</script>
<!-- Footer -->
<footer >
<p class="w3-medium w3-center">Copyright by NAIM NAZRI</p>
</footer>
</body>
<?php
}
?>