<?php

session_start();
require_once('inc/config.php');

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
	<script src="./javaScript/hidepanels.js" type="text/javascript"></script>

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
			<div class="siteTitle" style="font-size:30px; margin-top:20px ">
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
			<button class="btn" onclick="showPayment()">Place the Order</button>
		</div>
	</div>
		<br>

	<div id="payment" class="frame" style="background-color:rgba(0,0,0,0.2);display: none;">
		<div id="orderTitle" class="siteTitle">
			Proceed Order
		</div>

		<div><img id="paymentimg" src="Assets/paymentMethod.png"></div>

		<div id="div1" class="form">
		  <form action="register.php" method="POST">
		    <label for="cNumber">Card Number</label>
		    <input type="text" id="cNum" name="cardnumber" placeholder="Enter your Card Number..">

		    <label for="expDate">Expires On</label>
		    <input type="date" id="expDate" name="expiredate">

		    <label for="address">Address</label>
		    <input type="text" id="address" name="address" placeholder="Enter your address..">

		    <label for="postalcode">Postal Code</label>
		    <input type="text" id="postalcode" name="postalcode" placeholder="Enter your postal code..">

		    <label for="total" id="total">Total Amount to Pay</label>
		    <input type="number" id="total" name="total">

		    <input type="submit" value="Place My Order" name="order">
		  </form>
		</div>
	</div>

</div>

</body>
</html>
