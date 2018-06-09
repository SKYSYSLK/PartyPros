<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/registrationPage.css">
	<link rel="stylesheet" type="text/css" href="./css/homePage.css">
	<script src="./javaScript/register.js" type="text/javascript"></script>

</head>

<body>

<div class="page">

	<!-- Title bar -->
	<div class="header">
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
	  <form action="/action_page.php">
	    <label for="fname">Full Name</label>
	    <input type="text" id="fname" name="fullname" placeholder="Your name..">

	    <label for="email">Email Address</label>
	    <input type="text" id="email" name="email" placeholder="email address..">

	    <label for="contactNo">Contact No</label>
	    <input type="text" id="contactNo" name="contactNo" placeholder="contact No..">

	    <label for="userName">User Name</label>
	    <input type="text" id="userName" name="userName" placeholder="user name..">

	    <label for="password">Password</label>
	    <input type="password" id="password" name="password" placeholder="password..">

	    <input type="submit" value="Submit">
	  </form>
</div>
<!-- Customer form-->

<div id="div2" class="form" style="display: none;>
	  <form action="/action_page.php">
	    <label for="fname">Full Name Client</label>
	    <input type="text" id="fname" name="fullname" placeholder="Your name..">

	    <label for="email">Email Address</label>
	    <input type="text" id="email" name="email" placeholder="email address..">

	    <label for="contactNo">Contact No</label>
	    <input type="text" id="contactNo" name="contactNo" placeholder="contact No..">

	    <label for="userName">User Name</label>
	    <input type="text" id="userName" name="userName" placeholder="user name..">

	    <label for="password">Password</label>
	    <input type="password" id="password" name="password" placeholder="password..">

	    <input type="submit" value="Submit">
	  </form>
</div>

</div>

</body>
</html>