<?php
include ('../db.php');
if(isset($_POST['addorder'])){
    
	$username = $_POST['username'];
    $fashion = $_POST['fashion'];
    $receive_date = $_POST['receive_date'];
	$pickup_date = $_POST['pickup_date'];
	$status = $_POST['status'];
	$catatan = $_POST['catatan'];
	
    $nousername = count($username);
    $nofashion = count($fashion);
    $noreceive = count($receive_date);
	$nopickup = count($pickup_date);
	$nostatus = count($status);
	$nocatatan = count($catatan);
	
    if($nousername == $nofashion && $nousername == $noreceive && $noname == $nopickup	&& $nousername == $nostatus 
		&& $nousername == $nocatatan){
        for($i = 0; $i < $nousername; $i++){
            $str[] = "('{$username[$i]}','{$fashion[$i]}','{$receive_date[$i]}'
			,'{$pickup_date[$i]}' ,'{$status[$i]}' ,'{$catatan[$i]}')";
        }
        $s = implode(',',$str);
        $query = "INSERT INTO orders (id_users,id_fashion,receive_date,pickup_date,
		status,catatan) VALUES $s";
        if (mysql_query($query)){
            echo "Isian Order Berjaya!!";
        }else {
			echo "FAIL";
		}
    }
}
?>