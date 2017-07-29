<?php
	session_start();
	include 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>


<head>
	<title>Login & Register</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> <!--Bootstrap's Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Stylesheet -->
	<script src="dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>


<body>
	<!-- Login section -->
	<div id=login-wrapper>
		<p><center><h2 >Welcome!</h2></center></p>

		<!-- User & Password -->
		<form id="login-form"  action="index.php" method="POST">

			
				<div>
					<label class="form-label"></label><br>
					<input type="text" class="inputvalues form-control blue" name="user" placeholder="Type your User"><br><!-- User label -->
				</div>
				<div>
					<label class="form-label"></label><br>
					<input type="password" class="inputvalues form-control blue" name="password" placeholder="Type your Password"><br> <!-- Password label -->
				</div>
				
				<button type="submit" id="login-btn" class="btn-start-order" name="login" > Login </button> <!-- Login Button -->

				<a href="register.php"><input type="button" id="register-btn" class="btn-start-order-r" name="register" value="register"></a> <!-- Register Button -->
			
			
		</form>
	</div>
	<!-- End login -->
	<?php


	 if(isset($_POST['login']))
	 {
	 $username=$_POST['user'];
	 $password = isset($_POST['password']) ? $_POST['password'] : ''; 
	 
	 $query="select * from user WHERE username='$username' AND password='$password'";
	 
	 $query_run = mysqli_query($con,$query);
	 if(mysqli_num_rows($query_run)>0)
	 {
	 // valid
	 $_SESSION['username']= $username;
	 header('location:home.php');
	 
	 }
	 else
	 {
	 // invalid

	 ?>
	 <script type="text/javascript">  swal("Oops...", "Something went wrong! Try Again!", "error") </script>
	 <?php
	 }
	 
	 }
	 
	?>
	
<script>

		$(document).ready(function(){


			$("#login-wrapper").click(function(){

				$(this).animate({height:"350px",width:"500px"});
				$(this).children("p").animate({fontSize:"25px"});


				$("#login-form").delay(1000).fadeIn();
			})


    	

			
		})
	</script>
</body>	
</html>


