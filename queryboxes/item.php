<?php

require_once('../inc/config.php');
session_start();

$id="";
$name="";
$type="";
$price="";

if(isset($_GET['item'])){
	$itemid=$_GET['item'];
	$_SESSION['item']=$itemid;
	$query="SELECT * FROM items WHERE itemID=$itemid";
	$result=mysqli_query($connection, $query);
	$item=mysqli_fetch_assoc($result);

	$name=$item['itemName'];
	$type=$item['itemType'];
	$price= $item['itemPrice'];
}
if(isset($_POST['itemedit'])){
	$itemid=$_SESSION['item'];
	$name=$_POST['name'];
	$type=$_POST['type'];
	$price=$_POST['price'];

	$upq="UPDATE items SET itemName='$name', itemType='$type', itemPrice='$price' WHERE itemID='$itemid'";
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
	<form method="POST" action="item.php">
		<div class="modal-header"> Edit the Item </div>
		<div class="modal-body">
			<div class="modal-property">Item Name<input type="text" name="name" value=<?php echo $name; ?> ></div>
			<div class="modal-property">Type<input type="text" name="type" value=<?php echo $type; ?>></div>
			<div class="modal-property">Price<input type="text" name="price" value=<?php echo $price; ?>></div>
		</div>
		<div class="modal-footer">
			<button>Cancel</button>
			<button type="submit" name="itemedit">Edit</button>
		</div>
	</form>
</div>

</body>
</html>

