<?php

session_start();
require_once('inc/config.php');

if(!(isset($_SESSION['usertype'])&&($_SESSION['usertype']=2))){
	header("location: login.php");
}

// -----------------SELECT Quaries--------------------------------//
// Get Deco Services
$decoservicequery="SELECT * FROM services WHERE serviceType='floral-deco' LIMIT 3";
$decoservicecon=mysqli_query($connection, $decoservicequery);

// Get Stage Services
$stageservicequery="SELECT * FROM services WHERE serviceType='stage-setup' LIMIT 3";
$stageservicecon=mysqli_query($connection, $stageservicequery);

// Get Tent Services
$tentservicequery="SELECT * FROM services WHERE serviceType='tent' LIMIT 3";
$tentservicecon=mysqli_query($connection, $tentservicequery);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Decorations</title>
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/decorationsPage.css">
</head>

<body>
<div class="page">

	<!-- Title bar -->
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
		<div class="siteTitle">
			EXTRAVAGANCE
			<div class="siteTitle" style="font-size:30px;margin-top:20px ">
				DECORATIONS
			</div>
		</div>
		<div class="right">
			<div class="loginSignUp">
			  <a href="./mycart.php"><button class="loginSignUpbtn"> My Cart</button></a>
			</div>
		</div>
	</div>

	<div class="frame" style="background-color:rgba(255,103,0,0.4);">
		<div class="frame-header">Floral Decorations</div>
		<div class="frame-content">

			<?php
				$block="";
				if(mysqli_num_rows($decoservicecon)>0){
					while($service=mysqli_fetch_assoc($decoservicecon)){
						$block=$block."<div class='block'>$service[serviceDescription]</div>";
					}
					echo $block;
				}
			?>
		</div>
		<br>
	</div>

	<div class="frame" style="background-color:rgba(255,255,0,0.4)">
		<div class="frame-header">Stage Setup</div>
		<div class="frame-content">

			<?php
				$block="";
				if(mysqli_num_rows($stageservicecon)>0){
					while($service=mysqli_fetch_assoc($stageservicecon)){
						$block=$block."<div class='block'>$service[serviceDescription]</div>";
					}
					echo $block;
				}
			?>
		</div>
		<br>
	</div>

	<div class="frame" style="background-color:rgba(255,103,0,0.4)">
		<div class="frame-header">Tents</div>
		<div class="frame-content">
			<?php
				$block="";
				if(mysqli_num_rows($tentservicecon)>0){
					while($service=mysqli_fetch_assoc($tentservicecon)){
						$block=$block."<div class='block'>$service[serviceDescription]</div>";
					}
					echo $block;
				}
			?>
		</div>
		<br>
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