<?php
	 session_start();
	 
?>

<!DOCTYPE html>
<html>


<head>
	<title>Home</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> <!--Bootstrap's Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Stylesheet -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>


<body>
	<!-- Home section -->
	<div id=home-wrapper>
		 <script>swal("Welcome!", "You are in!", "success")</script>
		<p><center><h1>This is the Home Page</h1></center></p>
		<br>
		<p><center><h2 >Welcome to your Account !</h2></center></p>

		
		<!-- Welcome & Logout -->
		<form id="home-form" action="home.php" method="POST">

			<center><input type="submit" id="logout-btn" class="btn-start-order-h" name="logout" value="Logout" ></center> <!-- Back Button -->	
		
		</form>
		 <?php


		 if(isset($_POST['logout']))
		 {
		 session_destroy();
		 header('location:index.php');
		 }
	 ?>
	
	</div>
	<!-- End login -->
	
</html>