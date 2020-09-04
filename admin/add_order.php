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
<title>E-Tailor | ADMIN</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">

</head>
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
<div class="w3-container w3-content  w3-padding-64 w3-center" style="max-width:1200px" id="band" >
<div class="card">
    <div class="coontainer">
    <br>
<label><h4>Nama:  <?php echo $_SESSION['f_name'] ?></h4></label><br>
<label><h4>Pakaian:  <?php echo $_SESSION['fashion_name'] ?></h4></label> 
<?php
	if(isset($_POST['addform'])){
		
		$_SESSION['number'] = $_POST['formnumber'];
        $number = $_POST['formnumber'];
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$ord_code = substr(str_shuffle($permitted_chars), 0, 10);
        for ($i = 1; $i <= $number; $i++){
		
		
        
       

?>

<script type="text/javascript">
$(document).ready(function (e) {
	$("#data<?php echo $i ?>").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "order_process.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
             $('#success_message<?php echo $i?>').fadeIn().html(data); 
			$("#targetLayer<?php echo $i?>").html(data);
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
});


    

</script>    
    
<div class="container">
<br />
  <h4>Tempahan <?php echo $i ?></h4>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $i?>">Buka</button>
  <span id="success_message<?php echo $i?>" class="text-success"></span> 
    



  <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $i?>" role="dialog">
    <div class="modal-dialog">
    

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <!--  <button type="button" class="close" data-dismiss="modal">&times;</button>-->
          <h4 class="modal-title">Order No: <?php echo $i ?> </h4>
        </div>
          

           <div class="container" style="width:500px;">  
                <form id="data<?php echo $i?>" method="POST" enctype="multipart/form-data">
                     <label>Kod Tempahan:</label>  
                     <input type="text" name="order_code" id="order_code<?php echo $i?>" p value="<?php echo $ord_code ?>" class="form-control" readonly/>  
                     <br />
                     <label>Tarikh Terima:</label>  
                     <input type="date" name="receive_date" id="receive_date<?php echo $i?>"  class="form-control"/ required>  
                     <br />
                     <label>Tarikh Ambil:</label>  
                     <input type="date" name="pickup_date" id="pickup_date<?php echo $i?>"  class="form-control"/ required>  
                     <br />
                     <label>Status:</label>  
                     <select name="status" id="status<?php echo $i?>" class="form-control" required>
					              <option value="Dalam progress" >Dalam progress</option>
				              	<option value="Dah siap" >Dah siap</option>
                      </select>
                     <br />
                     <label>Catatan:</label>  
                     <textarea name="catatan" id="catatan<?php echo $i ?>" class="form-control" required></textarea>  
                     <br />
                     <div id="targetLayer<?php echo $i?>">No Image</div>
                    <br />
                     <label>Pilih Gambar:</label>
                     <input class="w3-button w3-indigo w3-hover-light-blue" name="userImage" type="file" id="file<?php echo $i?>"  class="inputFile" /><br/>
                    
                    
                     <input class="w3-button w3-indigo w3-hover-light-blue"  type="submit" id="submit<?php echo $i?>" value="Masukkan" class="btnSubmit" /> 
                       
               </form>
           </div> 
           
          <br>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</div>
          <?php }
                    }
          ?>

       

<br>
<button class="w3-button w3-indigo w3-hover-light-blue" ><a style="text-decoration: none;" onclick="return confirm('Adakah anda telah selesai mengisi tempahan?');" href="add_payment.php?order_code=<?php echo $ord_code;?>">Bayar</a></button>

<br><br>
    
    
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





  
