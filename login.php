<?php
	session_start();
	require 'dbinfo/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
	<link rel="shortcut icon" type="img/png" href="img/img.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image:url('login/images/1.jpg');">
			<div class="wrap-login100">
				<form action="login.php" class="login100-form validate-form" method="post" >
					
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter ID">
						<input class="input100" type="text" name="id" placeholder="Enter ID">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="login" value="Login">
		
					</div>
					<?php

				if(isset($_POST['login']))
				{
					//echo '<script type="text/javascript">alert("login button clicked")</script>';
					$id=$_POST['id'];
					$password=$_POST['password'];
					if($id=='admin'AND $password=='thorodinson')
					{
						header('location:homepage/admin.php');
					}
					else
					{	
						$query="select * from user WHERE id='$id' AND password='$password'";
						$query_run=mysqli_query($conn,$query);
						
						if(mysqli_num_rows($query_run)>0)
						{
							 $_SESSION['sec']=$password;
							 $_SESSION['id']=$id; 

							header('location:homepage/index.php');
						}
						else
						{
							echo '<script type="text/javascript">alert("Invalid login")</script>';
						}
					}
				}
		?>

					<div class="text-center p-t-90">
						<a class="txt1" href="registration.php">
							New User Register Here....!
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>
