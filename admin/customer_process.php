<?php
	include "../db.php";
	

if (isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$f_name = $_POST['f_name'];
		$ic = $_POST['ic'];
		$phone = $_POST['phone_no'];
		$alamat = $_POST['alamat'];
		
    

		$query = mysqli_query($conn,"INSERT INTO users (username, password, 
		f_name, phone_no, alamat, ic_no ) VALUES ('$username','$password','$f_name','$phone',
		'$alamat','$ic')");
		
	

		
		if ($query) {
			
			header("location:c2.php?username=$username");	
		
		  }else{
			echo "Anda gagal menambah pelanggan";
		  }
	   
        
    }
?>

<!--if (confirm('Are you sure you want to save this thing into the database?')) {
    // Save it!
} else {
    // Do nothing!
}-->