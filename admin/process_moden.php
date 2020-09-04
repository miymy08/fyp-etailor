<?php
  include("../db.php");
  if(isset($_POST['submit'])){
    $id_users = $_POST['id_users'];
    $bahu = $_POST['bahu'];
    $dada = $_POST['dada'];
    $l_tangan = $_POST['l_tangan'];
    $lengan = $_POST['lengan'];
    $l_baju = $_POST['l_baju'];
    $pinggang = $_POST['pinggang'];
    $punggung = $_POST['punggung'];
    $l_kain = $_POST['l_kain'];
    
    
    $ukuran 	= mysqli_query($conn,"UPDATE measurement SET bahu='$bahu', 
	dada ='$dada', l_tangan='$l_tangan', lengan='$lengan', 
	l_baju='$l_baju', pinggang='$pinggang' , punggung='$punggung' , 
    l_kain='$l_kain' WHERE id_users='$id_users' AND id_fashion='0'");
    
   if ($ukuran){
      echo "<SCRIPT LANGUAGE='Javascript'>
		window.alert('Berjaya Dikemaskini')
		window.location.href='view_measurement.php?id_users=$id_users'
		</SCRIPT>";
    }else{
      echo "FELLLL";
    }
  }else{
    echo "fail";
  }
?>
<?php echo $row_c['id_users'] ?>