<?php

session_start();
require_once('inc/config.php');

if(!(isset($_SESSION['usertype'])&&($_SESSION['usertype']=2))){
	header("location: login.php");
}

// -----------------SELECT Quaries--------------------------------//
// Get Floral Deco Items
$fdecoitemquery="SELECT * FROM items WHERE itemType='floral-deco' LIMIT 3";
$fdecoitemcon=mysqli_query($connection, $fdecoitemquery);

// Get Stage Items
$stageitemquery="SELECT * FROM items WHERE itemType='stage-setup' LIMIT 3";
$stageitemcon=mysqli_query($connection, $stageitemquery);

// Get Tent Items
$tentitemquery="SELECT * FROM items WHERE itemType='tent' LIMIT 3";
$tentitemcon=mysqli_query($connection, $tentitemquery);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Decorations</title>
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/decorationsPage.css">
	<script type="text/javascript" src="./javascript/jquery.min.js"></script>
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
				if(mysqli_num_rows($fdecoitemcon)>0){
					while($item=mysqli_fetch_assoc($fdecoitemcon)){
						$block=$block."<div class='block' type='submit'>$item[itemName]<br>RS. $item[itemPrice]".
						"<br><br><button onclick='addToCart($item[itemID])'> ADD TO CART </button>".
						"</div>";
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
				if(mysqli_num_rows($stageitemcon)>0){
					while($item=mysqli_fetch_assoc($stageitemcon)){
						$block=$block."<div class='block' type='submit'>$item[itemName]<br>RS. $item[itemPrice]".
						"<br><br><button onclick='addToCart($item[itemID])'> ADD TO CART </button>".
						"</div>";
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
				if(mysqli_num_rows($tentitemcon)>0){
					while($item=mysqli_fetch_assoc($tentitemcon)){
						$block=$block."<div class='block' type='submit'>$item[itemName]<br>RS. $item[itemPrice]".
						"<br><br><button onclick='addToCart($item[itemID])'> ADD TO CART </button>".
						"</div>";
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
<script type="text/javascript" src="./javaScript/mycart.js"></script>
</body>
</html>