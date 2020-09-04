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
body {font-family: "Lato", sans-serif}

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
<div class="w3-content" style="max-width:2000px;margin-top:46px;">




<!-- The Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band" >

<?php 

if(isset($_POST['addform'])){
	
	$addform = $_POST['formnumber'];

	$_SESSION['addform'] = $addform;
	
	
}

    echo $_SESSION['addform'];
?>

    
    <div class="container">
                <form method="post" action="storeImage.php" enctype="multipart/form-data" id="myform">
               
                     <div class="row">
                      <div class="col-md-6">
                        <div id="my_camera<?php echo $i ?>"></div>
                         <br/>
                           <input type="button" value="Take Snapshot" onClick="take_snapshot<?php echo $i ?>()">
                           <input type="hidden" name="image<?php echo $i?>" id="image<?php echo $i?>" class="image-tag">
                        </div>
                          <div class="col-md-6">
                            <div name="results<?php echo $i?>" id="results<?php echo $i?>">Your captured image will appear here...</div>
                            </div>
                            <div class="col-md-12 text-center">
                            <br/>
                                <button name="submit"  class="btn btn-success">Submit</button>
                            </div>
		                 	    </div>
                </form>
            </div>  
    
    
    <script>
    
    
 Webcam.set({
               width: 110,
               height: 60,
               image_format: 'png',
               jpeg_quality: 90
                });
  
              Webcam.attach( '#my_camera<?php echo $i?>' );
  
               function take_snapshot<?php echo $i ?>() {
                  Webcam.snap( function(data_uri) {
                  $(".image-tag<?php echo $i?>").val(data_uri);
                  document.getElementById('results<?php echo $i ?>').innerHTML = '<img src="'+data_uri+'"/>';
                  } );
                } 
    
    
    
</script>
    
<?php 
/*
if(isset($_POST['addform'])){
	
	$addform = $_POST['addform'];

	$_SESSION['addform'] = $addform;
	header('location:add_order.php');
	
}*/

?>


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