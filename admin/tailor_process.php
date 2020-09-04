<?php
	include "../db.php";
	if (isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$f_name = $_POST['f_name'];
		$phone = $_POST['phone_no'];
		$fashion = $_POST['fashion'];
		
		
		$query = mysqli_query($conn,"INSERT INTO tailor (username, password, 
		f_tailor, phone_no, tailor_type ) VALUES ('$username','$password','$f_name','$phone',
		'$fashion')");
		
	
		if ($query) {
			
            header("location:view_tailor.php");
            
			
		
		}else{
			echo "FAIL";
		}
	} else{
		echo "fail";
	}		
?>

<!--if (confirm('Are you sure you want to save this thing into the database?')) {
    // Save it!
} else {
    // Do nothing!
}-->