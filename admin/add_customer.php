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
    
input[type=text], textarea {
  width: 100%;
  text-align: center;
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
/* Response */
.response{
    padding: 6px;
    display: none;
}

.not-exists{
    color: green;
}

.exists{
    color: red;
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
<h3 class="w3-center">Tambah Pelanggan</h3>
<br>
<div id="form">
<form name="customerInfo" onsubmit="return confirm('Anda pasti dengan maklumat yang dimasukkan betul?');"method="post" enctype="multipart/form-data">
    
    <label for="username">Nama Pengguna</label>
    
    
    <input size="40" type="text" placeholder="Nama Pengguna" name="username" id="username" autocomplete="off" required>
    <div id="uname_response" class="response"></div>
    
    <label for="password">Kata Laluan</label>
    <input size="40" type="text" placeholder="Kata Laluan" name="password" autocomplete="off" required>
    <label for="fname">Nama Penuh</label>
    <input size="40" type="text" placeholder="Salmah binti Kasim" name="f_name" autocomplete="off" required>
    <label for="ic">Nombor IC</label>
    <input size="40" type="text" placeholder="97062802xxxx" name="ic" required>
    <label for="phone">Nombor Telefon</label>
    <input size="40" type="text" autocomplete="off" placeholder="0198772456" name="phone_no" required>
    <label for="alamat">Alamat</label>
    <textarea rows="6" cols="40"  name="alamat" placeholder="Masukkan alamat" autocomplete="off" required></textarea>
    <input name="submit" type="Submit" Value="Tambah">
 
</form>
</div>
<br>
</div>
</div>
</div>
<!-- End Page Content -->
</div>
<?php
    
if (isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$f_name = $_POST['f_name'];
		$ic = $_POST['ic'];
		$phone = $_POST['phone_no'];
		$alamat = $_POST['alamat'];
		
        $checkuser = mysqli_query($conn,"SELECT username, ic_no FROM users WHERE username='$username'");
        $row_check = mysqli_fetch_array($checkuser);
        $usercheck = $row_check['username'];
        $iccheck = $row_check['ic_no'];
    
    
        if(($username != $usercheck) || ($ic != $iccheck) ){
            
        $query = mysqli_query($conn,"INSERT INTO users (username, password, 
		f_name, phone_no, alamat, ic_no ) VALUES ('$username','$password','$f_name','$phone',
		'$alamat','$ic')");
		if ($query) {
			echo "Anda berjaya menambah pelanggan";
			header("location:c2.php?username=$username");	
		
		  }else{
			echo "Anda gagal menambah pelanggan.";
		  }
        }else {
?>
    <div id="fail" class="w3-modal w3-text-black" style="display:block;">
      <div class="w3-modal-content w3-round-large w3-center w3-animate-bottom" style="margin-top:150px;">
        <header class="w3-container w3-red"> 
          <span onclick="document.getElementById('fail').style.display='none'" 
          class="w3-button w3-display-topright">&times;</span>
          <h2>Penambahan Gagal</h2>
        </header>
        <div class="w3-container">
          <p>Pelanggan ini telah berdaftar.</p>
        </div>
      </div>
    </div>
    <?php
        }
      }
    ?>
<script>
var modal = document.getElementById('fail');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
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