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

// Get Entertainer items
$entitemquery="SELECT * FROM items WHERE itemType='entertainer' LIMIT 3";
$entitemcon=mysqli_query($connection, $entitemquery);

// Get Catering items
$catitemquery="SELECT * FROM items WHERE itemType='catering' LIMIT 3";
$catitemcon=mysqli_query($connection, $catitemquery);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Entertainments And Catering</title>
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
		<div class="frame-header">Entertainers</div>
		<div class="frame-content">

			<?php
				$block="";
				if(mysqli_num_rows($entitemcon)>0){
					while($item=mysqli_fetch_assoc($entitemcon)){
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

	<br><br>

	<div id="catering_section" class="frame" style="background-color:rgba(255,103,0,0.4);min-height: 50px;">
		<div class="siteTitle" style="font-size:30px;margin-top:20px ">
			CATERING
		</div>
		<br>
	</div>

	<div class="frame" style="background-color:rgba(255,255,0,0.4)">
		<div class="frame-content" style="margin-top: 40px;">

			<?php
				$block="";
				if(mysqli_num_rows($catitemcon)>0){
					while($item=mysqli_fetch_assoc($catitemcon)){
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

</div>
<script type="text/javascript" src="./javaScript/mycart.js"></script>
</body>
</html>