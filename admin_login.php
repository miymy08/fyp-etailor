<?php
include "db.php";
error_reporting(0);
session_start();
ob_start();
if (!empty($_SESSION['username']) AND !empty($_SESSION['password']))
{
 header('location:admin_login.php');

}
else
{
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<title>E-Tailor</title>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<style>
.form{
    color: black;
    
    margin-top: 14%;
    margin-bottom: 14%;
    margin-left: 40%;
    margin-right: 40%;
    align-content: center;
    background-size: 1380px 700px;
	background-repeat:no-repeat;
    
}


</style>
<body>

			
	
<center><h1>E-Tailor</h1></center>

<center>
<div class="form">
    <div id="user">   
        <fieldset><h3>ADMIN LOGIN</h3>
        <form action="admin_process.php" method="post">
			<table>
				<tr>
					<td>Username:</td>
					<td><input name="username" type="username"required autocomplete="off"/></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input name="password" type="password"required autocomplete="off"/></td>
				</tr>
                <tr></tr>
				<tr>
					<td></td>
                    <td><button id="signup" name="name" >Log In</button></td>
				</tr>
				<tr>
				</tr>
				<tr>
                <tr>
					<td></td>
			</table>
        </form>
    </fieldset>
    </div>
	<br>
    <a href="index.php"><button>Users Login</button></a>
</div> 
</center>
</body>
</html>
<?php
}
?>