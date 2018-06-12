<?php

require_once('../inc/config.php');
session_start();

$name="";

if(isset($_GET['admin'])){
	//$username=$_GET['admin'];
	$_SESSION['adminuser']=$username;
}
if(isset($_POST['adminedit'])){
	$username=$_SESSION['adminuser'];

	$upq="UPDATE admin SET username='$username' WHERE username='$username'";
	$upq=mysqli_query($connection, $upq);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Admin</title>
	<link rel="stylesheet" type="text/css" href="./../css/styles.css">
	<link rel="stylesheet" type="text/css" href="./../css/adminpanel.css">
</head>
<body>

<div class="modal-content">
	<form method="POST" action="admin.php">
		<div class="modal-header"> Edit the Admin </div>
		<div class="modal-body">
			<div class="modal-property">Username<input type="text" name="customername" value=<?php echo $username; ?>></div>
		</div>
		<div class="modal-footer">
			<button>Cancel</button>
			<button type="submit" name="adminedit">Edit</button>
		</div>
	</form>
</div>

</body>
</html>

