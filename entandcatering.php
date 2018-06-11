<?php

session_start();
require_once('inc/config.php');

if(!(isset($_SESSION['usertype'])&&($_SESSION['usertype']=2))){
	header("location: login.php");
}

// -----------------SELECT Quaries--------------------------------//
// Get DJ items
$djitemquery="SELECT * FROM items WHERE itemType='dj' LIMIT 3";
$djitemcon=mysqli_query($connection, $djitemquery);

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
	<title>Entertainments And Catering</title>
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
				ENTERTAINMENTS
			</div>
		</div>
		<div class="right">
			<div class="loginSignUp">
			  <a href="./mycart.php"><button class="loginSignUpbtn"> My Cart</button></a>
			</div>
		</div>
	</div>

	<div class="frame" style="background-color:rgba(255,103,0,0.4);">
		<div class="frame-header">DJ</div>
		<div class="frame-content">
			<?php
				$block="";
				if(mysqli_num_rows($djitemcon)>0){
					while($item=mysqli_fetch_assoc($djitemcon)){
						$block=$block."<div class='block'>$item[itemName]<br>RS. $item[itemPrice]</div>";
					}
					echo $block;
				}
			?>
		</div>
		<br>
	</div>

	<div class="frame" style="background-color:rgba(255,255,0,0.4)">
		<div class="frame-header">Entertainers</div>
		<div class="frame-content">
			<div class="block">Company 1</div>
			<div class="block">Company 2</div>
			<div class="block">Company 3</div>
		</div>
		<br>
	</div>

	<br><br>

	<div id="catering_section" class="frame" style="background-color:rgba(255,103,0,0.4);min-height: 50px;">
		<div class="siteTitle" style="font-size:30px;margin-top:20px ">
			CATERING
		</div>
		<br>
	</div>

	<div class="frame" style="background-color:rgba(255,255,0,0.4)">
		<div class="frame-content" style="margin-top: 40px;">
			<div class="block">Service 1</div>
			<div class="block">Service 2</div>
			<div class="block">Service 3</div>
		</div>
		<br>
	</div>

</div>

</body>
</html>