<?php

require_once('../inc/config.php');
session_start();

$name="";
$email="";
$contact="";

if(isset($_GET['customer'])){
	$userid=$_GET['customer'];
	$_SESSION['userid']=$userid;
	$query="SELECT * FROM customers WHERE customerID=$userid";
	$result=mysqli_query($connection, $query);
	$customer=mysqli_fetch_assoc($result);

	$name=$customer['customerName'];
	$email=$customer['customerEmail'];
	$contact=$customer['customerContact'];
}
if(isset($_POST['customeredit'])){
	$userid=$_SESSION['userid'];
	$name=$_POST['customername'];
	$email=$_POST['customeremail'];
	$contact=$_POST['customercontact'];

	$upq="UPDATE customers SET customerName='$name', customerEmail='$email', customerContact='$contact' WHERE customerID='$userid'";
	$upq=mysqli_query($connection, $upq);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Customer</title>
	<link rel="stylesheet" type="text/css" href="./../css/styles.css">
	<link rel="stylesheet" type="text/css" href="./../css/adminpanel.css">
</head>
<body>

<div class="modal-content">
	<form method="POST" action="customer.php">
		<div class="modal-header"> Edit the Customer </div>
		<div class="modal-body">
			<div class="modal-property">Customer Name<input type="text" name="customername" value=<?php echo $name; ?>></div>
			<div class="modal-property">Email Address<input type="text" name="customeremail" value=<?php echo $email; ?> ></div>
			<div class="modal-property">Contact Number<input type="text" name="customercontact" value=<?php echo $contact; ?>></div>
		</div>
		<div class="modal-footer">
			<button>Cancel</button>
			<button type="submit" name="customeredit">Edit</button>
		</div>
	</form>
</div>

</body>
</html>

