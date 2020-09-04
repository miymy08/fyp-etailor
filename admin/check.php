<?php
	include "../db.php";
	

    
        $username = $_POST['username'];
    
		$check = "SELECT * FROM users WHERE username='$username'";

        $check_q = mysqli_query($conn,$check);
        
        $row = mysqli_fetch_row($check_q);

        

        echo $row;
?>