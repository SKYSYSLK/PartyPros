<?php

require_once('../inc/config.php');
session_start();

$serviceid="";
$type="";
$desc="";

if(isset($_GET['service'])){
	$serviceid=$_GET['service'];
	$_SESSION['service']=$serviceid;
	$query="SELECT * FROM services WHERE serviceID=$serviceid";
	$result=mysqli_query($connection, $query);
	$service=mysqli_fetch_assoc($result);

	$type=$service['serviceType'];
	$desc=$service['serviceDescription'];
}
if(isset($_POST['servicesedit'])){
	$serviceid=$_SESSION['service'];
	$type=$_POST['servicetype'];
	$desc=$_POST['servicedesc'];

	$upq="UPDATE services SET serviceType='$type', serviceDescription='$desc' WHERE serviceID='$serviceid'";
	//echo $upq;
	$upq=mysqli_query($connection, $upq);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Services</title>
	<link rel="stylesheet" type="text/css" href="./../css/styles.css">
	<link rel="stylesheet" type="text/css" href="./../css/adminpanel.css">
</head>
<body>

<div class="modal-content">
	<form method="POST" action="services.php">
		<div class="modal-header"> Edit the Service </div>
		<div class="modal-body">
			<div class="modal-property">Service Type<input type="text" name="servicetype" value=<?php echo $type; ?> ></div>
			<div class="modal-property">Description<input type="text" name="servicedesc" value=<?php echo $desc; ?>></div>
		</div>
		<div class="modal-footer">
			<button>Cancel</button>
			<button type="submit" name="servicesedit">Edit</button>
		</div>
	</form>
</div>

</body>
</html>

