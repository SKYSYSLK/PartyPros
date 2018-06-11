<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/homePage.css">
</head>

<body>

<div class="page">

	<!-- Header -->
	<div class="header">
		<div class="left">
			<div class="dropdown">
			  <button class="dropbtn">Menu</button>
			  <div class="dropdown-content">
			    <a href="./index.php">Home</a>
			    <a href="./aboutus.php">About us</a>
			    <a href="./contactus.php">Contact us</a>
	  			</div>
			</div>
		</div>
	<!-- Login and SignUp Buttons -->
	<?php
	if(!isset($_SESSION["usertype"])){
		echo "
		<div class='right'>
			<div class='loginSignUp'>
			  <a href='./login.php'><button class='loginSignUpbtn'> Login</button></a>
			  <a href='./register.php'><button class='loginSignUpbtn'> Register</button></a>
			</div>
		</div>";
	}elseif($_SESSION["usertype"]!=2){
		echo "
		<div class='right'>
			<div class='loginSignUp'>
			  <a href='./adminpanel.php'><button class='loginSignUpbtn'> Adminpanel</button></a>
			  <a href='./logout.php'><button class='loginSignUpbtn'> Logout</button></a>
			</div>
		</div>";
	}else{
		echo"
		<div class='right'>
			<div class='loginSignUp'>
			  <a href='./logout.php'><button class='loginSignUpbtn'> Logout</button></a>
			</div>
		</div>
		";
	}
	?>
	<!--Site Title -->
		<div class="siteTitle">
			EXTRAVAGANCE
			<div class="siteTitle" style="font-size:30px;margin-top:20px ">
				Proffessionals in Event Management
			</div>
		</div>
		<div class="right">
			<div class="loginSignUp">
			  <a href="./mycart.php"><button class="loginSignUpbtn"> My Cart</button></a>
			</div>
		</div>
	</div>

	<!--subTopics-->
	<div class="subTopicsFrame" style="background-color:rgba(255,103,0,0.4);">
		<div class="subTopics">
			<a href="./venueselection.php">Venue Selection</a>
		</div>
	</div>

	<div class="subTopicsFrame" style="background-color:rgba(255,255,0,0.4)">
		<div class="subTopics">
			<a href="./deco.php">Decorations</a>
		</div>
	</div>

	<div class="subTopicsFrame" style="background-color:rgba(255,103,0,0.4)">
		<div class="subTopics">
			<a href="./entandcatering.php">Entertainments</a>
		</div>
	</div>

	<div class="subTopicsFrame" style="background-color:rgba(255,255,0,0.4)">
		<div class="subTopics">
			<a href="./entandcatering.php#catering_section">Catering</a>
		</div>
	</div>
	<!--Footer-->
	<div>
		<div class="footer" style="background-color:rgba(255,255,0,0.4)">
			<a href="./aboutus.php">About Us</a>
			<a href="./contactus.php">Contact Us</a>
		</div>
	</div>

</div>

</body>

</html>