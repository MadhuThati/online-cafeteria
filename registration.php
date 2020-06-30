<?php
	require 'dbinfo/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration Page</title>
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
		<script>
				function validateForm() 
				{
  					var x = document.forms["myForm"]["Role"].value;
  					if (x == "role") 
  					{
    					alert("Please Select a Valid User Type");
    					return false;
    				}
		</script>
</head>
<body style="background-image:url('login/images/1.jpg');">
	
	<div class="limiter">
		<div class="container-login100" style="background-image:url('login/images/1.jpg');">
			<div class="wrap-login100">
				<form name="myForm" class="login100-form validate-form" action="registration.php" onsubmit="return validateForm()" method="post" -->
				<form name="myForm" action="registration.php" onsubmit="return validateForm()" method="post">	
					<span class="login100-form-title p-b-34 p-t-27">
						Registration
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter ID">
						<input class="input100" type="text" name="id" placeholder="Enter ID">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter Username">
						<input class="input100" type="text" name="username" placeholder="Enter Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Role">
							<select class="input100" name="Role" type="text" placeholder="Role"> 
								<option value="role">--Type Of User--</option>
								<option value="Student">Student</option>
								<option value="Faculty">Faculty</option>
						</select>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter Mobile No">
						<input class="input100" type="text" name="phoneno" placeholder="Enter Mobile No">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div> 
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="confirm password">
						<input class="input100" type="password" name="cpassword" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="submit" onclick="Move()" value="Register">
							
					</div>

				</form>
			</div>
		</div>
	</div>
	<?php
			if(isset($_POST['submit']))
			{
				//echo '<script type="text/javascript"> alert("Sign up button clicked")</script>';
				$id = $_POST['id'];
				$username = $_POST['username'];
				$role = $_POST['Role'];
				$phoneno = $_POST['phoneno'];				
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				$_SESSION['username']=$username;

				if($role=='role')
				{
					echo '<script type="text/javascript"> alert("Please select proper user type ")</script>';
				}
				else
				{
					if($password == $cpassword)
					{
						$query="select * from user WHERE id='$id'";
						$query_run = mysqli_query($conn,$query);

						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript"> alert("ID Already Exists Try Correct ID ")</script>';
						
						}
						else
						{	
							
							$query = "insert into user values('$id','$username','$role','$phoneno','$password')";
							$query_run= mysqli_query($conn,$query);

							if($query_run)
							{
								 echo '<script type="text/javascript"> alert("Registration Done ")</script>'.'<meta http-equiv="refresh" content="1; URL=login.php" />';
								

							}
							else
							{
								echo '<script type="text/javascript"> alert("Error Occured")</script>';
							}
						}

					}
					else
					{
						echo '<script type="text/javascript"> alert("Password Mismatch")</script>';
					}
					
				}
			}


		?>
	

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
