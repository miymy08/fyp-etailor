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
    
    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />     
    
    
<style>
body {font-family: "Lato", sans-serif;
     background-image: url('images/waves.png');
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
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:1100px" id="band" >

<div class="card">

<div class="container">
<legend> Tambah Tempahan</legend>
<br>
<form  method="post" onsubmit="return confirm('Anda pasti dengan bilangan tempahan yang dimasukkan?');" action="add_order.php" >
	Bilangan Tempahan: <input type="number" value="0" name="formnumber" required>
    <br><br>
	<input class="w3-button w3-indigo w3-hover-light-blue" type="submit" name="addform" value="Teruskan">
 
</form>

<?php 
/*
if(isset($_POST['addform'])){
	
	$addform = $_POST['addform'];

	$_SESSION['addform'] = $addform;
	header('location:add_order.php');
	
}*/

?>
<br>
<p>*Sila Tangkap Gambar Kain yang akan dimasukkan di Halaman Tambah Tempahan sebelum menekan butang "Teruskan"</p>

<br><br>
<div class="container" style="align:left">
                <form method="post" action="" onsubmit="return confirm('Anda pasti dengan gambar kain yang akan dimasukkan?');" enctype="multipart/form-data" id="myform">
               
                     <div class="row">
                      <div class="col-md-7">
                        <div id="my_camera"></div>
                         <br/>
                           <input class="w3-button w3-red w3-hover-light-red" type="button" value="Tangkap Gambar" onClick="take_snapshot()">
                           <input type="hidden" name="image" id="image<?php echo $i?>" class="image-tag">
                        </div>
                         
                          <div class="col-md-5">
                            <div name="results" id="results">Gambar yang telah ditangkap akan dipaparkan disini</div>
                            </div>
                            <div class="col-md-12 text-center">
                            <br/>
                                <button name="submit"  class="btn btn-success">Masukkan</button>
                            </div>
		                 	    </div>
                </form>
            </div>  
<br>
    
    <script>
    
    
 Webcam.set({
               width: 390,
               height: 290,
               image_format: 'png',
               jpeg_quality: 90
                });
  
              Webcam.attach( '#my_camera' );
  
               function take_snapshot<?php echo $i ?>() {
                  Webcam.snap( function(data_uri) {
                  $(".image-tag").val(data_uri);
                  document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
                  } );
                } 
    
    
    
</script>
 <?php    
  if(isset($_POST['submit'])) {
    
   

    $img = $_POST['image'];//datang dari form
    $folderPath = "snap/";//ke destinasi
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = 'Cloth '.uniqid() . '.png';//nama file
  
    $file = $folderPath . $fileName;//arah tuju file dan nama file
    $enter = file_put_contents($file, $image_base64);//kandungan gambaq
        
    if($enter){
    ?> <font color="green" style="font-weight:bold" >Gambar Berjaya dimasukkan</font> <?php
    } else { ?>
        <font color="red" style="font-weight:bold" >Gambar gagal dimasukkan</font> <?php
    }
	
        
    
  
}  
?>
    <br>
        </div>

    </div>
    
</div>
<!-- End Page Content -->
</div>

<p><?php 





 ?></p>


<!-- Footer -->
<footer >
<p class="w3-medium w3-center">Copyright by NAIM NAZRI</p>
</footer>
</body>
<?php
}
?>