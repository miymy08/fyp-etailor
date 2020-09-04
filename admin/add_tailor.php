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
  text-align: center;
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

<div class="card">
<div class="container ">
<h3> Tambah Tukang Jahit</h3>
<br>
<div id="form">
<form name="customerInfo" onsubmit="return confirm('Do you confirm the data enter is right?');"method="post" enctype="multipart/form-data"  action="tailor_process.php">

        <label for="username">Nama Pengguna</label>
        <input size="40" type="text" placeholder="Nama Pengguna" name="username" autocomplete="off" required>
	<label for="password">Kata Laluan</label>
    <input size="40" type="text" placeholder="Kata Laluan" name="password" autocomplete="off" required>
    <label for="fname">Nama Penuh</label>
    <input size="40" type="text" placeholder="Salmah binti Kasim" name="f_name" required>
    <label for="phone">No Telefon</label>
    <input size="40" placeholder="0129876234" type="text" name="phone_no" autocomplete="off" required>
    <label for="fashion">Pakaian yang Dijahit</label>
    <select name="fashion" id='baju' required>
        <option value=""  disabled selected>Pilih</option>
        <?php
			$query = mysqli_query($conn, "SELECT * FROM fashion");
			while ($fashion_row = mysqli_fetch_array($query)){		
		?>
        <option value="<?php echo $fashion_row['id_fashion']?>"><?php echo $fashion_row['fashion_name']?></option>
        <?php } ?>
    </select>
    <input name="submit" type="Submit" Value="Tambah">
	
 
</form>
    
    </div>
    <br>
    </div>

</div>
</div>
<!-- End Page Content -->
</div>




<!-- Footer -->
<footer >
<p class="w3-medium w3-center">Copyright by NAIM NAZRI</p>
</footer>
</body>
<?php
}
?>