
<form id="form<?php echo $i?>" method="post" action="order_process.php"enctype="multipart/form-data">
                     <label>Code Order:</label>  
                     <input type="text" name="order_code<?php echo $i?>" id="order_code<?php echo $i?>" value="<?php echo $ord_code ?>" class="form-control" readonly required/>  
                     <br />
                     <label>Receive Date:</label>  
                     <input type="date" name="receive_date<?php echo $i?>" id="receive_date<?php echo $i?>"  class="form-control" required/>  
                     <br />
                     <label>Pickup Date:</label>  
                     <input type="date" name="pickup_date<?php echo $i?>" id="pickup_date<?php echo $i?>"  class="form-control" required/>  
                     <br />
                     <label>Status:</label>  
                     <select name="status<?php echo $i?>" id="status<?php echo $i?>" class="form-control">
				     <option value="Dalam progress" >Dalam progress</option>
				              	<option value="Dah siap" >Dah siap</option>
                      </select>
                     <br />
                     <label>Catatan:</label>  
                     <textarea name="catatan<?php echo $i ?>" id="catatan<?php echo $i ?>" class="form-control" required></textarea>  
                    <br />
                     <label>Pilih Gambar:</label>
                                       
                        <input id="uploadImage<?php echo $i ?>" type="file" accept="image/*<?php echo $i ?>" name="image<?php echo $i ?>" />
                          <br />                
                     <input type="button"   class="btn btn-info" value="Submit" />  
                     <span id="error_message<?php echo $i?>" class="text-danger"></span>   
               </form>
               <div id="err<?php echo $i?>"></div>


















<?php  
 //insert.php  
 $conn = mysqli_connect("localhost", "root", "", "etailor");  
 session_start();
 if(isset($_POST["order_code"]))  
 {  
      $order_code = mysqli_real_escape_string($conn, $_POST["order_code"]);  
      $receive_date = mysqli_real_escape_string($conn, $_POST["receive_date"]);
      $pickup_date = mysqli_real_escape_string($conn, $_POST["pickup_date"]);
      $status = mysqli_real_escape_string($conn, $_POST["status"]);
      $catatan = mysqli_real_escape_string($conn, $_POST["catatan"]);
      $notice = 'Belum';
      $id_users = $_SESSION['id_users'];
      $id_fashion = $_SESSION['id_fashion'];
      $id_measurement = $_SESSION['id_measurement'];
     
    
        $img = $_FILES["image"]["name"]; #stores the original filename from the client
        $tmp = $_FILES["image"]["tmp_name"]; #stores the name of the designated temporary file
        $errorimg = $_FILES["image"]["error"]; #stores any error code resulting from the transfer



        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
        $path = 'uploads/'; // upload directory
        if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image'])
        {
        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000,1000000).$img;
        // check's valid format
        if(in_array($ext, $valid_extensions)) 
        { 
        $path = $path.strtolower($final_image); 
      
      if(move_uploaded_file($tmp,$path)) 
      {
          echo "<img src='$path' />";




      $sql = "INSERT INTO orders (order_code, receive_date, pickup_date, status, 
      catatan, notice, image, id_users, id_fashion, id_measurement) VALUES ('$order_code', '$receive_date'
      , '$pickup_date', '$status', '$catatan','$notice', '$path', '$id_users', '$id_fashion','$id_measurement')";  
      if(mysqli_query($conn, $sql))  
      {  
           echo "Message Saved";  
      }  
 }  
        }else {
            echo 'invalid';
        }
        }
 }
 ?> 












<script>
$(document).ready(function(){  
                  $('#submit<?php echo $i?>').click(function(){  
                       event.preventDefault();
                       var order_code = $('#order_code<?php echo $i?>').val();
                       var receive_date = $('#receive_date<?php echo $i?>').val();  
                       var pickup_date = $('#pickup_date<?php echo $i?>').val();
                       var status = $('#status<?php echo $i?>').val();
                       var catatan = $('#catatan<?php echo $i?>').val();

                       
                       var image = $('#image<?php echo $i?>').val();
                       if(order_code == '' || receive_date == '' || pickup_date == ''
                       || status == '' || catatan == '' || image == '')  
                       {  
                            $('#error_message<?php echo $i?>').html("All Fields are required");  
                       }  
                       else  
                       {  
                            $('#error_message<?php echo $i?>').html('');  
                            $.ajax({  
                                 url:"order_process.php",  
                                 method:"POST",  
                                 data:{order_code:order_code, receive_date:receive_date, pickup_date:pickup_date, status:status,
                                 catatan:catatan, image:image},  
                                 success:function(data){  
                                      /*$("form").trigger("reset");  */
                                      $('#success_message<?php echo $i?>').fadeIn().html(data);  
                                    /* setTimeout(function(){  
                                           $('#success_message').fadeOut("Slow");  
                                      }, 2000);  */
                                 }  
                            });  
                       }  
                  });  
             });  
    </script>












#secondversion
<?php  
session_start();

 $img = $_FILES["image"]["name"]; #stores the original filename from the client
        $tmp = $_FILES["image"]["tmp_name"]; #stores the name of the designated temporary file
        $errorimg = $_FILES["image"]["error"]; #stores any error code resulting from the transfer



        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
        $path = 'upload/'; // upload directory
        if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image'])
        {
        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000,1000000).$img;
        // check's valid format
        if(in_array($ext, $valid_extensions)) 
        { 
        $path = $path.strtolower($final_image); 
      
      if(move_uploaded_file($tmp,$path)) 
      {
          echo "<img src='$path' />";

 
      $order_code = $_POST["order_code"];  
      $receive_date = $_POST["receive_date"];
      $pickup_date = $_POST["pickup_date"];
      $status = $_POST["status"];
      $catatan = $_POST["catatan"];
      $notice = 'Belum';
      $id_users = $_SESSION['id_users'];
      $id_fashion = $_SESSION['id_fashion'];
      $id_measurement = $_SESSION['id_measurement'];
     
    
       
      include_once '../db.php';


      $sql = "INSERT INTO orders (order_code, receive_date, pickup_date, status, 
      catatan, notice, image, id_users, id_fashion, id_measurement) VALUES ('$order_code', '$receive_date'
      , '$pickup_date', '$status', '$catatan','$notice', '$path', '$id_users', '$id_fashion','$id_measurement')";  
      if(mysqli_query($conn, $sql))  
      {  
           echo "Message Saved";  
      }  
    }else {
            echo 'invalid';
        }
        }
        }
 ?> 











#lama
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

<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">

</head>
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
<div class="w3-container w3-content  w3-padding-64" style="max-width:1200px" id="band" >

<label><h4>Name:  <?php echo $_SESSION['f_name'] ?></h4></label><br>
<label><h4>Fashion:  <?php echo $_SESSION['fashion_name'] ?></h4></label> 
<?php
	if(isset($_POST['addform'])){
		
		$_SESSION['number'] = $_POST['formnumber'];
        $number = $_POST['formnumber'];
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$ord_code = substr(str_shuffle($permitted_chars), 0, 10);
        for ($i = 1; $i <= $number; $i++){
		
		
        
       

?>

<div class="container">
<br />
  <h4>Orders <?php echo $i ?></h4>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $i?>">Open Modal</button>
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
                <form id="data<?php echo $i?>" method="post" enctype="multipart/form-data">
                     <label>Code Order:</label>  
                     <input type="text" name="order_code<?php echo $i?>" id="order_code<?php echo $i?>" value="<?php echo $ord_code ?>" class="form-control" readonly/>  
                     <br />
                     <label>Receive Date:</label>  
                     <input type="date" name="receive_date<?php echo $i?>" id="receive_date<?php echo $i?>"  class="form-control"/>  
                     <br />
                     <label>Pickup Date:</label>  
                     <input type="date" name="pickup_date<?php echo $i?>" id="pickup_date<?php echo $i?>"  class="form-control"/>  
                     <br />
                     <label>Status:</label>  
                     <select name="status<?php echo $i?>" id="status<?php echo $i?>" class="form-control">
					              <option value="Dalam progress" >Dalam progress</option>
				              	<option value="Dah siap" >Dah siap</option>
                      </select>
                     <br />
                     <label>Catatan:</label>  
                     <textarea name="catatan<?php echo $i ?>" id="catatan<?php echo $i ?>" class="form-control"></textarea>  
                     <br />
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
                            </div>
		                 	    </div>
                                          
                     <input type="button" name="submit<?php echo $i?>" id="submit<?php echo $i?>" class="btn btn-info" value="Submit" />  
                     <span id="error_message<?php echo $i?>" class="text-danger"></span>   
               </form>
           </div> 
           
          <br>
          
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
             
             
             
             $("form#data<?php echo $i ?>").submit(function(e) {
                 e.preventDefault();
                 var formData = new FormData(this);
                 
                 $.ajax({
                     url: window.location.pathname,
                     type: "POST",
                     data: "formData",
                     success: function (data) {
                         alert(data)
                     },
                     cache:"false",
                     contentType: "false",
                     processType: "false"
                 });
             });
             
        /*     $(document).ready(function(){  
                  $('#submit<?php /*echo $i?>').click(function(){  
                       event.preventDefault();
                       var order_code = $('#order_code<?php echo $i?>').val();
                       var receive_date = $('#receive_date<?php echo $i?>').val();  
                       var pickup_date = $('#pickup_date<?php echo $i?>').val();
                       var status = $('#status<?php echo $i?>').val();
                       var catatan = $('#catatan<?php echo $i?>').val();

                       var image = $('#image<?php echo $i?>').files;
                       if(order_code == '' || receive_date == '' || pickup_date == ''
                       || status == '' || catatan == '')  
                       {  
                            $('#error_message<?php echo $i?>').html("All Fields are required");  
                       }  
                       else  
                       {  
                            $('#error_message<?php echo $i?>').html('');  
                            $.ajax({  
                                 url:"order_process.php",  
                                 method:"POST",  
                                 data:{order_code:order_code, receive_date:receive_date, pickup_date:pickup_date, status:status,
                                 catatan:catatan, image:image},  
                                 success:function(data){  
                                      /*$("form").trigger("reset");  */
                                    /*  $('#success_message<?php echo $i */ ?>').fadeIn().html(data);  
                                    /* setTimeout(function(){  
                                           $('#success_message').fadeOut("Slow");  
                                      }, 2000);  */
                                 }  
                            });  
                       }  
                  });  
             });  */
             </script> 
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>
          <?php }
                    }
          ?>

       

    
<button><a style="text-decoration: none;" onclick="return confirm('Do you have finish the order form submission?');" href="add_payment.php?order_code=<?php echo $ord_code;?>">Payment</a></button>


    
    


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


#php lama
    
<?php  
 //insert.php  
 $conn = mysqli_connect("localhost", "root", "", "etailor");  
 session_start();
 if(isset($_POST["order_code"]))  
 {  
      $order_code = mysqli_real_escape_string($conn, $_POST["order_code"]);  
      $receive_date = mysqli_real_escape_string($conn, $_POST["receive_date"]);
      $pickup_date = mysqli_real_escape_string($conn, $_POST["pickup_date"]);
      $status = mysqli_real_escape_string($conn, $_POST["status"]);
      $catatan = mysqli_real_escape_string($conn, $_POST["catatan"]);
      $notice = 'Belum';
      $image = mysqli_real_escape_string($conn, $_POST["image"]);
      
     
      
      $folderPath = "upload/";//ke destinasi
      $image_parts = explode(";base64,", $image);
      $image_type_aux = explode("image/", $image_parts[0]);
      $image_type = $image_type_aux[0];
  
      $image_base64 = base64_decode($image_parts[0]);
      $fileName = 'Cloth '.uniqid() . '.jpeg';//nama file
  
      $file = $folderPath . $fileName;//arah tuju file dan nama file
      file_put_contents($file, $image_base64);//kandungan gambaq
      
      $id_users = $_SESSION['id_users'];
      $id_fashion = $_SESSION['id_fashion'];
      $id_measurement = $_SESSION['id_measurement'];




      $sql = "INSERT INTO orders (order_code, receive_date, pickup_date, status, 
      catatan, notice, image, id_users, id_fashion, id_measurement) VALUES ('$order_code', '$receive_date'
      , '$pickup_date', '$status', '$catatan','$notice', '$fileName', '$id_users', '$id_fashion','$id_measurement')";  
      if(mysqli_query($conn, $sql))  
      {  
           echo "Message Saved";  
      }  
 }  
 ?> 


  
