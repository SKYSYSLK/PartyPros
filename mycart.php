<?php

session_start();
require_once('inc/config.php');

if(!(isset($_SESSION['usertype'])&&($_SESSION['usertype']=2))){
	header("location: login.php");
}

$itemid=0;
if(isset($_POST['itemid'])) {
	$itemid=$_POST['itemid'];
}

$countquery="SELECT itemCount FROM mycart WHERE itemID='$itemid'";
$con=mysqli_query($connection, $countquery);
$row=mysqli_fetch_assoc($con);

if($row['itemCount'] > 0){
	$query="UPDATE mycart SET itemCount=".($row['itemCount'] + 1)." WHERE itemID='$itemid'";
} else {
	$query="INSERT INTO mycart(itemID,itemCount) VALUES ('".$itemid."',1)";
}

$con=mysqli_query($connection, $query);

// Get Cart List
$cartquery="SELECT items.itemName,mycart.itemCount,items.itemPrice FROM mycart,items WHERE mycart.itemID=items.itemID;";
$cartcon=mysqli_query($connection, $cartquery);

// Get total price
$tquery="SELECT mycart.itemCount*items.itemPrice AS totalPrice FROM mycart,items WHERE mycart.itemID=items.itemID;";
$tcon=mysqli_query($connection, $tquery);
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/mycartPage.css">
	<script src="./javaScript/hidepanels.js" type="text/javascript"></script>
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
			<div class="siteTitle" style="font-size:30px; margin-top:20px ">
				MY CART
			</div>
		</div>
	</div>

	<div class="frame" style="background-color:rgba(255,103,0,0.4);">
		<div class="frame-content">
			<table>
				<tr>
					<th>Item Name</th>
					<th>Item Count</th>
					<th>Item Price</th>
				</tr>
				<?php
					$row="";
					if(mysqli_num_rows($cartcon)>0){
						while($item=mysqli_fetch_assoc($cartcon)){
							$row=$row."<tr>
								<td>$item[itemName]</td>
								<td>$item[itemCount]</td>
								<td>$item[itemPrice]</td>
							</tr>";
						}
						echo $row;
					}
				?>
			</table>
		</div>
		<br>
	</div>

	<div class="frame" style="background-color:rgba(255,255,0,0.4);min-height: 80px;">
		<div class="frame-content" style="text-align: center;">
			<button class="btn" onclick="clearCart()">Clear the List</button>
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
		    
		    <?php
				$row=0;
				if(mysqli_num_rows($tcon)>0){
					while($item=mysqli_fetch_assoc($tcon)){
						$row=$row + intval($item['totalPrice']);
					}
					echo "<input type='text' id='total' name='total' value='Rs. "."$row".".00' disabled>";
				}
			?>

		    <input type="button" value="Place My Order" name="order" onclick="pay()">
		  </form>
		</div>
	</div>

</div>
<script type="text/javascript" src="./javaScript/mycart.js"></script>
</body>
</html>
