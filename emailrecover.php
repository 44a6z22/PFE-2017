<?php
include 'php/config.php';
  if(isset( $_SESSION['username']) || isset($_COOKIE['username']) ) {
             header('location:home.php');
         }
	if(isset($_POST['submit'])){
			$Email=$_POST['Email'];
		check_email($Email);
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account recovery</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> <link rel="icon" type="image/png" href="img/Ts.png">

</head>
<body>
		<h1 style="text-align: center">Forgot password</h1>
	<form class="forms " method="POST">
	<div class="login-info">
		<div class="group_form" >
					<input class="form_control" type="Email" name="Email" id="Emailrcover" placeholder="Insert Your Email  ...">
	 			</div>
	</div>
					
		<input id="Send" class="buttons" type="submit" name="submit" value="Send" >

	</form>
</body>
</html>