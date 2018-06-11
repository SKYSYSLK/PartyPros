<?php

session_start();

if(isset($_SESSION['usertype'])){
    header("location: index.php");
}

// Check if Submit button is pressed
if(isset($_POST['client'])||isset($_POST['customer'])){

	require_once('inc/config.php');

	$name=$_POST['fullname'];
	$email=$_POST['email'];
	$contact=$_POST['contactNo'];
	$username=$_POST['userName'];
	$password=$_POST['password'];

	// Hash the password
	$password=md5($password);

// if Client Registation is submitted
	if(isset($_POST['client'])){

		// Mysql Query
		$query="INSERT INTO clients (clientName, clientEmail, clientContact) VALUES ('$name','$email','$contact')";

		//echo $query;

		$insquery=mysqli_query($connection,$query);

		$user_id=mysqli_insert_id($connection);
		$userquery="INSERT INTO users (username, password, type, user_id) VALUES ('$username','$password','1','$user_id')";
		//echo $userquery;
		$insuser=mysqli_query($connection,$userquery);

		if($insquery&&$insuser){
			echo "<script>alert('Successfully Saved')</script>";
			header("location: login.php");
		}

// if Customer Registation is submitted
	}elseif(isset($_POST['customer'])){
		$query="INSERT INTO customers (customerName, customerEmail, customerContact) VALUES ('$name','$email','$contact')";

		// echo $query;

		$insquery=mysqli_query($connection,$query);

		$user_id=mysqli_insert_id($connection);
		$userquery="INSERT INTO users (username, password, type, user_id) VALUES ('$username','$password','2','$user_id')";
		//echo $userquery;
		$insuser=mysqli_query($connection,$userquery);

		if($insquery&&$insuser){
			echo "<script>alert('Successfully Saved')</script>";
			header("location: login.php");
		}
	}

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/registrationPage.css">
	<link rel="stylesheet" type="text/css" href="./css/homePage.css">
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
			REGISTRATION
			<div class="siteTitle" style="font-size:30px;margin-top:20px ">
				Proffessionals in Event Management
			</div>
		</div>
	</div>

	<div class="subheader">
		<div class="subRegTopics">
			Do You Want to be Our Partner..?
		</div>
		<button class="regbtn" style="margin-top: -50px" onclick="client()"> Client</button>

		<div class="subRegTopics">
			Are You Interested in Arranging a Special Event..?
		</div>
		<button class="regbtn" style="margin-top: -55px;margin-left: 1000px" onclick="customer()"> Customer</button>
	</div>
<!-- Client form-->
	<div id="div1" class="form" style="display: none;">
	  <form action="register.php" method="POST">
	    <label for="fname">Full Name</label>
	    <input type="text" id="fname" name="fullname" placeholder="Your name..">

	    <label for="email">Email Address</label>
	    <input type="email" id="email" name="email" placeholder="email address..">

	    <label for="contactNo">Contact No</label>
	    <input type="text" id="contactNo" name="contactNo" placeholder="contact No..">

	    <label for="userName">User Name</label>
	    <input type="text" id="userName" name="userName" placeholder="user name..">

	    <label for="password">Password</label>
	    <input type="password" id="password" name="password" placeholder="password..">

	    <input type="submit" value="Submit" name="client">
	  </form>
</div>
<!-- Customer form-->

<div id="div2" class="form" style="display: none;">
	  <form action="register.php" method="POST">
	    <label for="fname">Full Name Client</label>
	    <input type="text" id="fname" name="fullname" placeholder="Your name..">

	    <label for="email">Email Address</label>
	    <input type="email" id="email" name="email" placeholder="email address..">

	    <label for="contactNo">Contact No</label>
	    <input type="text" id="contactNo" name="contactNo" placeholder="contact No..">

	    <label for="userName">User Name</label>
	    <input type="text" id="userName" name="userName" placeholder="user name..">

	    <label for="password">Password</label>
	    <input type="password" id="password" name="password" placeholder="password..">

	    <input type="submit" value="Submit" name="customer">
	  </form>
</div>

</div>

</body>
</html>