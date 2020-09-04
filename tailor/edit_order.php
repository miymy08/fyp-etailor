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
	if(isset($_GET['id_orders'])){
        $id_o = $_GET['id_orders'];
        $tailor_type = $_SESSION['tailor_type']; 
        
		
		$o_edit = mysqli_query($conn,"SELECT * FROM orders where id_orders ='$id_o' AND id_fashion='$tailor_type'");
		
		$row_oedit = mysqli_fetch_array($o_edit);
        $id_users = $row_oedit['id_users'];
        
        
        $c_edit = mysqli_query($conn,"SELECT * FROM users where id_users ='$id_users'");
        
        $row_cedit = mysqli_fetch_array($c_edit);
?>
<div class="card">
        <div class="container">
<h4>Kemaskini Tempahan</h4>

<form name ="orderInfo" method="post" enctype="multipart/form-data" action="process_order.php">
<table align="center">
</table>
<br>

  	


	<table  align="center">
        
        
	    <input name="id_orders" type="text" hidden value="<?php echo $id_o; ?>" hidden>
       <input name="tailor_type" type="text" hidden value="<?php echo $row_oedit['id_fashion']; ?>"hidden>
	    <tr><td id="info">Nama:</td><td><input name="f_name" type="text" value="<?php echo $row_cedit['f_name'];?>" readonly></td></tr>
        <tr><td id="info">No IC:</td><td><input name="ic" type="text" value="<?php echo $row_cedit['ic_no'];?>" readonly></td></tr>
        <tr><td id="info">Kod Tempahan:</td><td><input name="order_code" type="text" value="<?php echo $row_oedit['order_code'];?>" readonly></td></tr>
        <tr><td id="info">Tarikh Terima:</td><td><input name="receive_date" type="date" value="<?php echo $row_oedit['receive_date'];?>" readonly></td></tr>
        <tr><td id="info">*Tarikh Ambil:</td><td><input name="pickup_date" type="date" value="<?php echo $row_oedit['pickup_date'];?>" ></td></tr>
        <tr><td id="info">*Status:</td>
        <td><select name="status" id="status" class="form-control">
            <option value="<?php echo $row_oedit['status'];?>" ><?php echo $row_oedit['status'];?></option>
            <option value="Dah siap" >Dah siap</option>
            </select>
            </td>
        <tr><td id="info">Catatan:</td><td><input name="catatan" type="text" value="<?php echo $row_oedit['catatan'];?>" readonly></td></tr>
        <tr><td id="info">Gambar:</td><td><img src="../admin/upload/<?php echo $row_oedit['image'];?>" class="w3-left w3-margin-right" style="width:100px" /></td></tr>
	    
	
    </table>
<br>
<input class="w3-button w3-indigo w3-hover-light-blue" type="submit" name="submit" value="Kemaskini" >

</form>
            <br>
    </div>
    </div>
    

	<?php } else 
	{ echo "Fails"; }
?>
</div>
    </div>


<!-- Footer -->
<footer>
<p class="w3-medium w3-center">Copyright by NAIM NAZRI</p>
</footer>
</body>

</html>
<?php } ?>