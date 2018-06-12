<?php

require_once('../inc/config.php');

if(isset($_GET['client'])){
	$client=$_GET['client'];
	$deleq="DELETE FROM clients WHERE clientID=$client";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../adminpanel.php");
}elseif(isset($_GET['customer'])){
	$customer=$_GET['customer'];
	$deleq="DELETE FROM customers WHERE customerID=$customer";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../adminpanel.php");
}elseif(isset($_GET['service'])){
	$service=$_GET['service'];
	$deleq="DELETE FROM services WHERE serviceID='$service'";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../adminpanel.php");
}elseif(isset($_GET['item'])){
	$item=$_GET['item'];
	$deleq="DELETE FROM items WHERE itemID=$item";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../adminpanel.php");
}elseif(isset($_GET['order'])){
	$order=$_GET['order'];
	$deleq="DELETE FROM invoices WHERE invoiceId=$order";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../adminpanel.php");
}elseif(isset($_GET['admin'])){
	$admin=$_GET['admin'];
	$deleq="DELETE FROM users WHERE username='$admin'";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../adminpanel.php");
}

?>