<?php

require_once('../inc/config.php');
session_start();

$itemid="";
$customerid="";
$count="";
$price="";

if(isset($_GET['invoice'])){
	$invoiceid=$_GET['invoice'];
	$_SESSION['invoice']=$invoiceid;
	$query="SELECT * FROM invoices WHERE invoiceId=$invoiceid";
	$result=mysqli_query($connection, $query);
	$order=mysqli_fetch_assoc($result);

	$itemid=$order['itemID'];
	$customerid=$order['customerID'];
	$count=$order['itemCount'];

	$itemq="SELECT itemPrice FROM items WHERE itemID=$itemid";
	$itemresult=mysqli_query($connection,$itemq);
	$itempricearr=mysqli_fetch_assoc($itemresult);
	$itemprice=$itempricearr['itemPrice'];

	$price= (int)$itemprice * (int)$count;
}
if(isset($_POST['orderedit'])){
	$invoiceid=$_SESSION['invoice'];
	$itemid=$_POST['itemid'];
	$customerid=$_POST['customerid'];
	$count=$_POST['count'];

	$upq="UPDATE invoices SET itemID='$itemid', customerID='$customerid', itemCount='$count' WHERE invoiceId='$invoiceid'";
	//echo $upq;
	$upq=mysqli_query($connection, $upq);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Orders</title>
	<link rel="stylesheet" type="text/css" href="./../css/styles.css">
	<link rel="stylesheet" type="text/css" href="./../css/adminpanel.css">
</head>
<body>

<div class="modal-content">
	<form method="POST" action="orders.php">
		<div class="modal-header"> Edit the Orders </div>
		<div class="modal-body">
			<div class="modal-property">Item ID<input type="text" name="itemid" value=<?php echo $itemid; ?> ></div>
			<div class="modal-property">Customer ID<input type="text" name="customerid" value=<?php echo $customerid; ?>></div>
			<div class="modal-property">Count<input type="text" name="count" value=<?php echo $count; ?>></div>
		</div>
		<div class="modal-footer">
			<button>Cancel</button>
			<button type="submit" name="orderedit">Edit</button>
		</div>
	</form>
</div>

</body>
</html>

