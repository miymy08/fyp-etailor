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

 .flex-container{
	width: 80%;
	min-height: 300px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
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
    
    <h3 class="w3-padding-16"><strong>Cadangan Fesyen</strong></h3>
    
    <p>*Bahagian ini dapat memberikan cadangan fesyen yang sesuai berdasarkan ukuran badan kepada pelanggan</p>
    
<div class="flex-container">






<?php 
$id_users =$_GET['id_users'];
$c = "SELECT * FROM users where id_users ='$id_users'";
$query = mysqli_query($conn,$c);
$row_c = mysqli_fetch_array($query);
    $fname = $row_c['f_name'];
    

$m ="SELECT * FROM measurement WHERE id_users='$id_users' AND id_fashion='0'";
$query_m = mysqli_query($conn,$m);
$row_m = mysqli_fetch_array($query_m);
    $bahu = $row_m['bahu'];
    $dada = $row_m['dada'];
    $pinggang = $row_m['pinggang'];
    $punggung = $row_m['punggung'];
?>
    

<br>

<table>
    <th>Bahagian</th><th>Inci</th>
    
    <tr>
        <td>Bahu</td><td ><input class="w3-center" id="bahu" value="<?php echo $bahu ?>" readonly></td>
    </tr>
    <tr>
        <td>Dada</td><td><input class="w3-center" id="dada" value="<?php echo $dada ?>" readonly></td>
    </tr>
    <tr>
        <td>Pinggang</td><td><input class="w3-center" id="pinggang" value="<?php echo $pinggang ?>" readonly></td>
    </tr>
    <tr>
        <td>Pinggul</td><td><input class="w3-center" id="pinggul" value="<?php echo $punggung ?>" readonly></td>
    </tr>
</table>

    

<table >
    <th>Cadangan Pakaian</th><th>Bentuk Badan</th>
<?php 

        
$b = $dada;
$w = $pinggang;
$h = $punggung;

if($b<$w && $w<$h){
    
    
    ?>
    
    
    <tr>
    <td> Baju Kurung </td><td><?php echo "Diamond"; ?></td>    
    </tr>
   
    <?php
    
}else if($b==$w && $w==h && $b==$h) {
    
  
    ?>
    
   
    <tr>
    <td> Baju Kurung </td><td><?php echo "Epal"; ?></td>    
    </tr>
    
    <?php

} else if($b>$w && $b>$h) {
    

    ?>
    
    
    <tr>
    <td> Baju Kurung,Baju Kurung Moden </td><td><?php echo "Segi Tiga Terbalik"; ?></td>    
    </tr>
    
    <?php
    
}else if($w<$b && $w<$h && ($b+2)>$h){
    
    if($b==($w+1) && h==(w+1)){
        
        
    ?>
    
    
    <tr>
    <td> Baju Kurung </td><td><?php echo "Rectangle"; ?></td>    
    </tr>
   
    <?php
        
    } else if ($b==($w+2) && $h==($w+2)){
    
    
    ?>
    
    
    
    <tr>
        <td>Baju Kurung, Baju Kurung Moden, Baju Kebaya</td><td><?php echo "HourGlass"; ?></td>    
    </tr>
    
    <?php
    
    } else {
        
    ?>
    
    
    
    <tr>
    <td> Baju Kurung, Baju Kurung Moden</td><td><?php echo "Top HourGlass"; ?></td>    
    </tr>
    
    <?php
        
    } 
} else if($w<$b && $w<$h && $b<$h){
    
    if(($w+2)>$b) {
    
    
    
    ?>
    
    
    <tr>
    <td> Baju Kurung, Baju Kurung Moden, Baju Kebaya </td><td><?php echo "Pear"; ?></td>    
    </tr>
    
    <?php
        
    } else {
        

    ?>
    
    
    <tr>
    <td> Baju Kurung, Baju Kurung Moden, Baju Kebaya </td><td><?php echo "Spoon"; ?></td>    
    </tr>
    
    <?php
    }
    
}else {
    echo "Your body maybe in the other body shape category";
}
    
?>
 </table> 
</div>
    </div>
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
<?php } ?>
