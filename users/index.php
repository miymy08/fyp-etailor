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
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" href="../css/font.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	
<title>E-Tailor | PELANGGAN</title>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<style>

body {font-family: "Lato", sans-serif;
     background-image: url('images/waves.png');}
.mySlides {display: none}

.form{
    color: black;
    
    margin-top: 14%;
    margin-bottom: 14%;
    margin-left: 40%;
    margin-right: 40%;
    align-content: center;
    background-size: 1380px 700px;
	background-repeat:no-repeat;

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

</style>
<body>

<?php 
include "header.php";
?>		
	

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">


<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:600px" id="band" >
    <div class="card">
        <div class="container">
    <img src="images/etailor2.png" width="500px">
    <p class="w3-opacity"><i>SISTEM PENGURUSAN TUKANG JAHIT ATAS TALIAN</i></p>
    <center>
	<p>HI <?php echo $_SESSION['f_name']; ?></p>
	
	</center>
        </div>
    </div>
</div>

</div>

<!-- Footer -->
<footer >
  <p class="w3-medium w3-center">Copyright by NAIM NAZRI</p>
</footer>

</body>
</html>
<?php
}
?>