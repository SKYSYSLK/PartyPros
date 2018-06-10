<?php

session_start();

if(!(isset($_SESSION['usertype'])&&($_SESSION['usertype']=2))){
	header("location: login.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/mycartPage.css">
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
				MY CART
			</div>
		</div>
	</div>

	<div class="frame" style="background-color:rgba(255,103,0,0.4);">
		<div class="frame-content">
			<div class="block">Shop 1</div>
			<div class="block">Shop 2</div>
			<div class="block">Shop 3</div>
		</div>
		<br>
	</div>

	<div class="frame" style="background-color:rgba(255,255,0,0.4);min-height: 80px;">
		<div class="frame-content" style="text-align: center;">
			<button class="btn">Clear the List</button>
			<button class="btn">Place the Order</button>
		</div>
		</div>
		<br>
	</div>

</div>
</body>
</html>
