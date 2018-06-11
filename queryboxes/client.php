<?php

require_once('../inc/config.php');
session_start();

$name="";
$email="";
$contact="";

if(isset($_GET['client'])){
	$userid=$_GET['client'];
	$_SESSION['userid']=$userid;
	$query="SELECT * FROM clients WHERE clientID=$userid";
	$result=mysqli_query($connection, $query);
	$client=mysqli_fetch_assoc($result);

	$name=$client['clientName'];
	$email=$client['clientEmail'];
	$contact=$client['clientContact'];
}
if(isset($_POST['clientedit'])){
	$userid=$_SESSION['userid'];
	$name=$_POST['clientname'];
	$email=$_POST['clientemail'];
	$contact=$_POST['clientcontact'];

	$upq="UPDATE clients SET clientName='$name', clientEmail='$email', clientContact='$contact' WHERE clientID='$userid'";
	//echo $upq;
	$upq=mysqli_query($connection, $upq);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Client</title>
	<link rel="stylesheet" type="text/css" href="./../css/styles.css">
	<link rel="stylesheet" type="text/css" href="./../css/adminpanel.css">
</head>
<body>

<div class="modal-content">
	<form method="POST" action="client.php">
		<div class="modal-header"> Edit the Client </div>
		<div class="modal-body">
			<div class="modal-property">Client Name<input type="text" name="clientname" value=<?php echo $name; ?>></div>
			<div class="modal-property">Email Address<input type="text" name="clientemail" value=<?php echo $email; ?> ></div>
			<div class="modal-property">Contact Number<input type="text" name="clientcontact" value=<?php echo $contact; ?>></div>
		</div>
		<div class="modal-footer">
			<button>Cancel</button>
			<button type="submit" name="clientedit">Edit</button>
		</div>
	</form>
</div>

</body>
</html>

