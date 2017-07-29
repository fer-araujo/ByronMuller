<?php
	
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>


<head>
	<title>Register</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> <!--Bootstrap's Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Stylesheet -->
	<script src="dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>


<body>
	<!-- Register section -->
	<div id=register-wrapper>
		<p><center><h2 >Registration Form</h2></center></p>

		<!-- User, Password & Password Confirm -->
		<form id="register-form" action="register.php" method="POST">

			<div>
				<div>
					<label class="form-label"></label><br>
					<input type="text" class="form-control green" name="user" placeholder="Type your User" required><br><!-- User label -->
				</div>
				<div>
					<label class="form-label"></label><br>
					<input type="password" class="inputvalues form-control green" name="password" placeholder="Type your Password" required><br><!-- Your Password label -->
				</div>
				<div>
					<label class="form-label"></label><br>
					<input type="password" class="inputvalues form-control green" name="confirm" placeholder="Confirm your Password" required><br><!-- Confirm Your Password label -->
				</div>
				
				<input type="submit" id="sign-up-btn" class="btn-start-order-r" name="sign_up" value="Sign Up"><!-- Sign Up Button -->
				<a href="index.php"><input type="button" id="back-btn" class="btn-start-order" name="Back" value="Back"></a> <!-- Back Button -->
			</div>	
		</form>
		<?php

			if(isset($_POST['sign_up']))
			{
				 //echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
				 
				 $username = $_POST['user'];		 //checks the value of the variable
				 $password = isset($_POST['password']) ? $_POST['password'] : ''; //checks the value of the variable
				 $confirm = isset($_POST['confirm']) ? $_POST['confirm'] : ''; //checks the value of the variable
				 
				 if($password==$confirm)//checks if the user already exists
				 {
				 $query= "select * from user WHERE username='$username'";
				 $query_run = mysqli_query($con,$query);
				 
				 	if(mysqli_num_rows($query_run)>0)
				 	{
				 		//there is already a user with the same username
				 	?>	
				 	<script > swal("User already exists.. try another username") </script>
				 	<?php
				 	}
				 	else
				 	{
				 	//if the user does not exist then the value are inserted
				 	$query= "insert into user values('$username','$password')";
				 	$query_run = mysqli_query($con,$query);
				 
				 		if($query_run)
				 		//if the values where inserted correctly then the next message appear
				 		{		
				 			 ?>
				 			 <script>swal("Good job!", "You registered your user!", "success")</script>
				 			 <?php
				 		}
				 		else
				 		//else an error will pop-up
				 		{	
				 			?>
				 			<script> swal("Oops...", "Something went wrong!", "error") </script>;
				 			<?php

				 		}
				 	}

				 }
				 else{
				 	?>
				 	<script type="text/javascript"> swal("Oops...", "Passwords are wrong!", "error")</script> 
				 	<?php
				 }
			}
			
		?>
	</div>
	<!-- End login -->

	
</html>