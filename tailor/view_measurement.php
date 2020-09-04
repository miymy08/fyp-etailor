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
<title>E-Tailor | TUKANG JAHIT</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   
 <script>
  $(document).ready(function() {
      
//Baju kurung
      
  	$("#bahuk").html('<a id="bahu1" style="text-decoration:none" href="#" title="" >Bahu</a>');
   	$("#bahuk #bahu1").tooltip({ content: '<img style="height:200px;width:100%;" src="images/kurung/bahu.jpg" />' }); 
      
  	$("#dadak").html('<a id="dada1" style="text-decoration:none" href="#" title="" >Dada</a>');
   	$("#dadak #dada1").tooltip({ content: '<img style="height:200px;width:100%;" src="images/kurung/dada.jpg" />' });
      
  	$("#ptgnk").html('<a id="ptgn1" style="text-decoration:none" href="#" title="" >Panjang Tangan</a>');
   	$("#ptgnk #ptgn1").tooltip({ content: '<img src="images/kurung/p_tgn.jpg" />' });
      
  	$("#glgk").html('<a id="glg1" style="text-decoration:none" href="#" title="" >Pergelangan Tangan</a>');
   	$("#glgk #glg1").tooltip({ content: '<img src="images/kurung/gelang_tgn.jpg" />' });
      
  	$("#kekekk").html('<a id="kekek1" style="text-decoration:none" href="#" title="" >Kekek</a>');
   	$("#kekekk #kekek1").tooltip({ content: '<img style="height:200px;width:100%;" src="images/kurung/kekek.jpg" />' });
      
  	$("#psktk").html('<a id="pskt1" style="text-decoration:none" href="#" title="" >Pesak Atas</a>');
   	$("#psktk #pskt1").tooltip({ content: '<img style="height:200px;width:100%;"src="images/kurung/pesak_ats.jpg" />' });
      
  	$("#pskbk").html('<a id="pskb1" style="text-decoration:none" href="#" title="" >Pesak Bawah</a>');
   	$("#pskbk #pskb1").tooltip({ content: '<img style="height:200px;width:100%;"src="images/kurung/pesak_bwh.jpg" />' });
      
  	$("#lbk").html('<a id="lb1" style="text-decoration:none" href="#" title="" >Labuh Baju</a>');
   	$("#lbk #lb1").tooltip({ content: '<img style="height:400px;width:100%;"src="images/kurung/l_baju.jpg" />' });
      
  	$("#pingk").html('<a id="ping1" style="text-decoration:none" href="#" title="" >Pinggang</a>');
   	$("#pingk #ping1").tooltip({ content: '<img style="height:200px;width:100%;"src="images/kurung/pinggang.jpg" />' });
      
  	$("#pggk").html('<a id="pgg1" style="text-decoration:none" href="#" title="" >Pinggang</a>');
   	$("#pggk #pgg1").tooltip({ content: '<img style="height:200px;width:100%;" src="images/kurung/punggung.jpg" />' });
    
  	$("#lkk").html('<a id="lk1" style="text-decoration:none" href="#" title="" >Labuh Kain</a>');
   	$("#lkk #lk1").tooltip({ content: '<img style="height:400px;width:100%;"src="images/kurung/l_kain.jpg" />' });

//Baju Kurung Moden

    $("#bahum").html('<a id="bahu2" style="text-decoration:none" href="#" title="" >Bahu</a>');
   	$("#bahum #bahu2").tooltip({ content: '<img style="height:200px;width:100%;" src="images/moden/bahu.jpg" />' }); 
      
  	$("#dadam").html('<a id="dada2" style="text-decoration:none" href="#" title="" >Dada</a>');
   	$("#dadam #dada2").tooltip({ content: '<img style="height:200px;width:100%;" src="images/moden/dada.jpg" />' });
      
  	$("#ptgnm").html('<a id="ptgn2" style="text-decoration:none" href="#" title="" >Panjang Tangan</a>');
   	$("#ptgnm #ptgn2").tooltip({ content: '<img src="images/moden/p_tgn.jpg" />' });
      
  	$("#glgm").html('<a id="glg2" style="text-decoration:none" href="#" title="" >Pergelangan Tangan</a>');
   	$("#glgm #glg2").tooltip({ content: '<img src="images/moden/gelang_tgn.jpg" />' });
      
  	$("#lbm").html('<a id="lb2" style="text-decoration:none" href="#" title="" >Labuh Baju</a>');
   	$("#lbm #lb2").tooltip({ content: '<img style="height:200px;width:90%;" src="images/moden/l_baju.jpg" />' });
      
  	$("#pingm").html('<a id="ping2" style="text-decoration:none" href="#" title="" >Pinggang</a>');
   	$("#pingm #ping2").tooltip({ content: '<img style="height:200px;width:100%;" src="images/moden/pinggang.jpg" />' });
      
  	$("#pggm").html('<a id="pgg2" style="text-decoration:none" href="#" title="" >Pinggang</a>');
   	$("#pggm #pgg2").tooltip({ content: '<img style="height:200px;width:100%;" src="images/moden/punggung.jpg" />' });
    
  	$("#lkm").html('<a id="lk2" style="text-decoration:none" href="#" title="" >Labuh Kain</a>');
   	$("#lkm #lk2").tooltip({ content: '<img style="height:400px;width:100%;" src="images/moden/l_kain.png" />' });

	
     
    //kebaya
    $("#bahub").html('<a id="bahu3" style="text-decoration:none" href="#" title="">Bahu</a>');
   	$("#bahub #bahu3").tooltip({ content: '<img src="images/kebaya/bahu.jpg" />' }); 
      
  	$("#dadab").html('<a id="dada3" style="text-decoration:none" href="#" title="">Dada</a>');
   	$("#dadab #dada3").tooltip({ content: '<img style="height:200px;width:100%;" src="images/kebaya/dada.jpg" />' });
      
  	$("#ptgnb").html('<a id="ptgn3" style="text-decoration:none" href="#" title="">Panjang Tangan</a>');
   	$("#ptgnb #ptgn3").tooltip({ content: '<img src="images/kebaya/p_tgn.jpg" />' });
      
  	$("#glgb").html('<a id="glg3" style="text-decoration:none" href="#" title="" >Pergelangan Tangan</a>');
   	$("#glgb #glg3").tooltip({ content: '<img src="images/kebaya/gelang_tgn.jpg" />' });
      
  	$("#ldb").html('<a id="ldb3" style="text-decoration:none" href="#" title="" >Labuh Depan</a>');
   	$("#ldb #ldb3").tooltip({ content: '<img src="images/kebaya/l_depan.jpg" />' });
      
  	$("#lbb").html('<a id="lbb3" style="text-decoration:none" href="#" title="" >Labuh Belakang</a>');
   	$("#lbb #lbb3").tooltip({ content: '<img style="height:200px;width:100%;"src="images/kebaya/l_belakang.jpg" />' });
      
  	$("#pingb").html('<a id="ping3" style="text-decoration:none" href="#" title="" >Pinggang</a>');
   	$("#pingb #ping3").tooltip({ content: '<img style="height:200px;width:100%;"src="images/kebaya/pinggang.jpg" />' });
      
  	$("#pggb").html('<a id="pgg3" style="text-decoration:none" href="#" title="" >Punggung</a>');
   	$("#pggb #pgg3").tooltip({ content: '<img style="height:200px;width:100%;"src="images/kebaya/punggung.jpg" />' });
    
  	$("#lkb").html('<a id="lk3" style="text-decoration:none" href="#" title="" >Labuh Kain</a>');
   	$("#lkb #lk3").tooltip({ content: '<img style="height:400px;width:100%;"src="images/kebaya/l_kain.jpg" />' });
      
    });
     
  </script>    
    
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
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
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
        <div class="container">
<h3>Papar Ukuran</h3>


<table align="center">
<?php 
$id_users = $_GET['id_users'];
$tailor_type = $_SESSION['tailor_type'];
$c = "SELECT * FROM users where id_users ='$id_users'";
$query = mysqli_query($conn,$c);
$row_c = mysqli_fetch_array($query) 
?>
<tr><td id="info">Nama:</td><td><?php echo $row_c['f_name']; ?></td></tr>
<tr><td id="info">Jenis Pakaian:</td><td><select id='baju'>
<option value="" disabled selected>Pilih</option>
<?php
			$query = mysqli_query($conn, "SELECT * FROM fashion WHERE id_fashion = '$tailor_type'");
			while ($fashion_row = mysqli_fetch_array($query)){		
		?>
<option value="<?php echo $fashion_row['id_fashion']?>"><?php echo $fashion_row['fashion_name']?></option>
<?php } ?>
</select>

</tr>
</table>
<br>

  
<!--Baju Kurung-->
<div  style='display:none;' id='kurung'>
	<br>
<div class="row">
<div class="column">
	<h4>Baju Kurung</h4>

<div class="table">
	<table  align="center">
	
	
	
	<th>Bahagian</th>
	<th>Inci</th>
	
<?php

$m = "SELECT * FROM measurement where id_users ='$id_users' AND id_fashion ='$tailor_type' ";
$query_m = mysqli_query($conn,$m);

$row_m = mysqli_fetch_array($query_m);
	
	$bahu = $row_m['bahu'];
	$dada = $row_m['dada'];
	$p_tgn = $row_m['l_tangan'];
	$lengan = $row_m['lengan'];
	$kekek = $row_m['kekek'];
	$pesak_atas = $row_m['pesak_atas'];
	$pesak_bawah = $row_m['pesak_bwh'];
	$l_baju = $row_m['l_baju'];
	$pinggang = $row_m['pinggang'];
	$punggung = $row_m['punggung'];
	$l_kain = $row_m['l_kain'];
	
//Bahagian baju
$B_baju = (($bahu+2)*(($l_baju+2)*2));

//Bahagian Tangan
$B_tgn = 4*((($bahu/2)+1)*($p_tgn+2));

//Bahagian Kekek
$B_kekek = 2*(($kekek+1)*($kekek+1));

//Bahagian Pesak
$B_pesak = 4*(0.5*(($pesak_atas+1)+($pesak_bawah+1))*($l_baju-($bahu/2)+1));

//Bahagian Kain
/*
if ($punggung > $pinggang) {
	$B_kain = ($l_kain+2)*($punggung+2);
} else {
	$B_kain = ($l_kain+2)*($pinggang+2);
}*/
$B_kain = 2*($l_kain*39);


//Total
$T_inci2 = $B_baju+$B_tgn+$B_kekek+$B_pesak+$B_kain;

//Bahagi 45 inci untuk buang inci square
$T_inci = $T_inci2/45;

//Tukar kepada meter
$T_meter = $T_inci * 0.0254;
	
?>
	<tr><td><div id="bahuk"></div></td><td><input name="bahu" style="text-align:center;" value="<?php echo  $bahu;?>" readonly></td></tr>
	<tr><td><div id="dadak"></div></td><td><input name="dada" style="text-align:center;" value="<?php echo  $dada;?>" readonly></td></tr>
	<tr><td><div id="ptgnk"></div></td><td><input name="l_tangan" style="text-align:center;" value="<?php echo  $p_tgn;?>" readonly></td></tr>
	<tr><td><div id="glgk"></div></td><td><input name="lengan" style="text-align:center;" value="<?php echo  $lengan;?>" readonly></td></tr>
	<tr><td><div id="kekekk"></div></td><td><input name="kekek" style="text-align:center;" value="<?php echo  $kekek;?>" readonly></td></tr>
	<tr><td><div id="psktk"></div></td><td><input name="pesak_atas" style="text-align:center;" value="<?php echo number_format((float)$pesak_atas, 1, '.', '');?>" readonly></td></tr>
	<tr><td><div id="pskbk"></div></td><td><input name="pesak_bawah" style="text-align:center;" value="<?php echo  number_format((float)$pesak_bwh, 1, '.', '');?>" readonly></td></tr>
	<tr><td><div id="lbk"></div></td><td><input name="l_baju" style="text-align:center;" value="<?php echo  $l_baju;?>" readonly></td></tr>
	<tr><td><div id="pingk"></div></td><td><input name="pinggang" style="text-align:center;" value="<?php echo  $pinggang;?>" readonly></td></tr>
	<tr><td><div id="pggk"></div></td><td><input name="punggung" style="text-align:center;" value="<?php echo  $punggung;?>" readonly></td></tr>
	<tr><td><div id="lkk"></div></td><td><input name="l_kain" style="text-align:center;" value="<?php echo  $l_kain;?>" readonly></td></tr>

<?php  ?>

	</table>
    </div>
    </div>
    <div class="column">
        <br><br><br><br><br><br>
        <img src="images/kurung.jpg" alt="Baju Kurung" style="width:80%">
        
    </div>
    
    </div>
<center><p>Nilai Potongan Kain yang diperlukan ialah <b><?php echo number_format((float)$T_meter, 2, '.', ''); ?> Meters.(Bidang 45)</b></p></center>
<center><p> Nilai ini merupakan nilai anggaran kain yang akan digunakan berdasarkan ukuran badan. Ukuran jarak potongan diantara setiap bahagian tidak termasuk dalam kiraan ini.</p></center>


</div>

<!--Baju Kurung Moden-->
<div  style='display:none;' id='moden'>
	<br>
<div class="row">
<div class="column">
	<h4>Baju Kurung Moden</h4>
<div class="table">
	<table  align="center">
	<th>Bahagian</th>
	<th>Inci</th>

<?php 
$m = "SELECT * FROM measurement where id_users ='$id_users' AND id_fashion ='$tailor_type'";
$query_m = mysqli_query($conn,$m);
$row_m = mysqli_fetch_array($query_m);
	
	$bahu = $row_m['bahu'];
	$dada = $row_m['dada'];
	$p_tgn = $row_m['l_tangan'];
	$lengan = $row_m['lengan'];
	$l_baju = $row_m['l_baju'];
	$pinggang = $row_m['pinggang'];
	$punggung = $row_m['punggung'];
	$l_kain = $row_m['l_kain'];
	
//Bahagian baju
$B_baju = (($bahu+2)*(($l_baju+2)*2));

//Bahagian Tangan
$B_tgn = 4*((($bahu/2)+1)*($p_tgn+2));

//Bahagian Kain
$B_kain = 2*($l_kain*39);

//Total
$T_inci2 = $B_baju+$B_tgn+$B_kain;

//Bahagi 45 inci untuk buang inci square
$T_inci = $T_inci2/45;

//Tukar kepada meter
$T_meter = $T_inci * 0.0254;
?>
	<tr><td><div id="bahum"></div></td><td><input name="bahu" style="text-align:center;" value="<?php echo  $bahu?>" readonly></td></tr>
	<tr><td><div id="dadam"></div></td><td><input name="dada" style="text-align:center;" value="<?php echo  $dada;?>" readonly></td></tr>
	<tr><td><div id="ptgnm"></div></td><td><input name="l_tangan" style="text-align:center;" value="<?php echo  $p_tgn?>" readonly></td></tr>
	<tr><td><div id="glgm"></div></td><td><input name="lengan" style="text-align:center;" value="<?php echo  $lengan;?>" readonly></td></tr>
	<tr><td><div id="lbm"></div></td><td><input name="l_baju" style="text-align:center;" value="<?php echo  $l_baju;?>" readonly></td></tr>
    <tr><td><div id="pingm"></div></td><td><input name="pinggang" style="text-align:center;" value="<?php echo  $pinggang;?>" readonly></td></tr>
	<tr><td><div id="pggm"></div></td><td><input name="punggung" style="text-align:center;" value="<?php echo  $punggung;?>" readonly></td></tr>
	<tr><td><div id="lkm"></div></td><td><input name="l_kain" style="text-align:center;" value="<?php echo  $l_kain;?>" readonly></td></tr>

	</table>
    </div>
    </div>
	<div class="column">
    <br><br><br>
    <img src="images/moden.jpg" alt="Baju Kurung Moden" style="width:70%">
    
    </div>
    </div>
<center><p>Nilai Potongan Kain yang diperlukan ialah <b><?php echo number_format((float)$T_meter, 2, '.', ''); ?> Meters.(Bidang 45)</b></p></center>
<center><p> Nilai ini merupakan nilai anggaran kain yang akan digunakan berdasarkan ukuran badan. Ukuran jarak potongan diantara setiap bahagian tidak termasuk dalam kiraan ini.</p></center>


    
</div>

<!--Baju Kebaya-->
<div  style='display:none;' id='kebaya'>
	<br>
<div class="row">
<div class="column">
	<h4>Baju Kebaya</h4>
<div class="table">
	<table  align="center">
	<th>Bahagian</th>
	<th>Inci</th>

<?php 
$m = "SELECT * FROM measurement where id_users ='$id_users' AND id_fashion ='$tailor_type'";
$query_m = mysqli_query($conn,$m);
$row_m = mysqli_fetch_array($query_m);
	
	$bahu = $row_m['bahu'];
	$dada = $row_m['dada'];
	$p_tgn = $row_m['l_tangan'];
	$lengan = $row_m['lengan'];
	$l_depan = $row_m['l_depan'];
	$l_belakang = $row_m['l_belakang'];
	$pinggang = $row_m['pinggang'];
	$punggung = $row_m['punggung'];
	$l_kain = $row_m['l_kain'];

//Bahagian baju
if($l_depan > $l_belakang){
    $B_kebaya = (($bahu+2)*(($l_depan+2)*2));
    
} else {
   $B_kebaya =  (($bahu+2)*(($l_belakang+2)*2));
    
}

//Bahagian Tangan
$B_tgn = 4*((($bahu/2)+1)*($p_tgn+2));

//Bahagian Kain
$B_kain = 2*($l_kain*39);

//Total
$T_inci2 = $B_baju+$B_tgn+$B_kain;

//Bahagi 45 inci untuk buang inci square
$T_inci = $T_inci2/45;

//Tukar kepada meter
$T_meter = $T_inci * 0.0254;
?>
	<tr><td><div id="bahub"></div></td><td><input name="bahu" style="text-align:center;" value="<?php echo  $bahu;?>" readonly></td></tr>
	<tr><td><div id="dadab"></div></td><td><input name="dada" style="text-align:center;" value="<?php echo  $dada;?>" readonly></td></tr>
	<tr><td><div id="ptgnb"></div></td><td><input name="l_tangan" style="text-align:center;" value="<?php echo  $p_tgn;?>" readonly></td></tr>
	<tr><td><div id="ldb"></div></td><td><input name="l_depan"  style="text-align:center;"value="<?php echo  $l_depan;?>" readonly></td></tr>
	<tr><td><div id="lbb"></div></td><td><input name="l_belakang" style="text-align:center;" value="<?php echo  $l_belakang;?>" readonly></td></tr>
	<tr><td><div id="glgb"></div></td><td><input name="lengan" style="text-align:center;" value="<?php echo  $lengan?>" readonly></td></tr>
	<tr><td><div id="pingb"></div></td><td><input name="pinggang" style="text-align:center;" value="<?php echo  $pinggang;?>" readonly></td></tr>
	<tr><td><div id="pggb"></div></td><td><input name="punggung" style="text-align:center;" value="<?php echo  $punggung;?>" readonly></td></tr>
	<tr><td><div id="lkb"></div></td><td><input name="l_kain" style="text-align:center;"value="<?php echo  $l_kain;?>" readonly></td></tr>

	</table>
    </div>
    </div>
    <div class="column">
        <br><br><br>
    <img src="images/kebaya.jpg" alt="Baju Kebaya" style="width:80%">
    </div>
    </div>
	<center><p>Nilai Potongan Kain yang diperlukan ialah <b><?php echo number_format((float)$T_meter, 2, '.', ''); ?> Meters. (Bidang 45)</b></p></center>
	<center><p> Nilai ini merupakan nilai anggaran kain yang akan digunakan berdasarkan ukuran badan. Ukuran jarak potongan diantara setiap bahagian tidak termasuk dalam kiraan ini.</p></center>
	

</div>


<br>


    </div>
    </div>
</div>
    




<!-- Footer -->
<footer>
<p class="w3-medium w3-center">Copyright by NAIM NAZRI</p>
</footer>
</body>
<?php
}
?>
</html>
<script>
$('#baju').on('change', function () {
    if (this.value == '1') {
        $("#kurung").show();
		$("#kebaya").hide();
		$("#moden").hide();
    } else if (this.value == '2'){
        $("#kurung").hide();
		$("#moden").show();
		$("#kebaya").hide();
    } else if (this.value == '3'){
		$("#moden").hide();
		$("#kurung").hide();
		$("#kebaya").show();
	}

});
</script>
