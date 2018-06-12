<?php

session_start();
require_once('inc/config.php');

if(!isset($_SESSION['usertype'])){
	header("location: login.php");
}
if($_SESSION['usertype']==2){
	header("location: index.php");
}


// -----------------SELECT Quaries--------------------------------//
// Get all Clients
$clientquery="SELECT * FROM clients";
$clientcon=mysqli_query($connection,$clientquery);
// $clints=mysqli_fetch_array($clientcon, MYSQLI_ASSOC);

// Get all customers
$cusotmerquery="SELECT * FROM customers";
$customercon=mysqli_query($connection, $cusotmerquery);

// Get all Services
$servicequery="SELECT * FROM services";
$servicecon=mysqli_query($connection, $servicequery);

// Get all Orders
$orderquery="SELECT * FROM invoices";
$ordercon=mysqli_query($connection, $orderquery);

// Get all Admin users
$adminquery="SELECT * FROM users WHERE type=0";
$admincon=mysqli_query($connection, $adminquery);

// Get all Items
$itemquery="SELECT * FROM items";
$itemcon=mysqli_query($connection, $itemquery);

//-----------------------CLIENT Quaries--------------------------//
if(isset($_POST['clientsubmit'])){
	$name=$_POST['clientname'];
	$email=$_POST['clientemail'];
	$contact=$_POST['clientcontact'];
	$username=$_POST['clientusername'];
	$password=$_POST['clientpassword'];
	$password=md5($password);

	$clientquery="INSERT INTO clients (clientName, clientEmail, clientContact) VALUES ('$name','$email','$contact')";
	$clientins=mysqli_query($connection, $clientquery);
	$user_id=mysqli_insert_id($connection);
	$userquery="INSERT INTO users (username, password, type, user_id) VALUES ('$username','$password','1','$user_id')";
	$insuser=mysqli_query($connection,$userquery);
	header("location: adminpanel.php");
}

//-----------------------CUSTOMER Quaries-----------------------//
elseif(isset($_POST['customerSubmit'])){
	$name=$_POST['customername'];
	$email=$_POST['customeremail'];
	$contact=$_POST['customercontact'];
	$username=$_POST['customerusername'];
	$password=$_POST['customerpassword'];

	$query="INSERT INTO customers (customerName, customerEmail, customerContact) VALUES ('$name','$email','$contact')";
	$insquery=mysqli_query($connection,$query);

	$user_id=mysqli_insert_id($connection);
	$userquery="INSERT INTO users (username, password, type, user_id) VALUES ('$username','$password','2','$user_id')";
	$insuser=mysqli_query($connection,$userquery);
	header("location: adminpanel.php");
}

//--------------------SERVICES Quaries--------------------------//
elseif(isset($_POST['serviceSubmit'])){
	$id=$_POST['serviceid'];
	$type=$_POST['servicetype'];
	$desc=$_POST['serviceDesc'];
	$servicequery="INSERT INTO services (serviceID, serviceType, serviceDescription) VALUES('$id','$type','$desc')";
	$insquery=mysqli_query($connection, $servicequery);
	header("location: adminpanel.php");
}

//--------------------Item Quaries--------------------------//
elseif(isset($_POST['submititem'])){
	$id=$_POST['itemid'];
	$name=$_POST['itemname'];
	$type=$_POST['itemtype'];
	$price=$_POST['itemprice'];
	$itemquery="INSERT INTO items (itemID, itemName, itemType, itemPrice) VALUES('$id', '$name','$type','$price')";
	//echo $itemquery;
	$insquery=mysqli_query($connection, $itemquery);
	header("location: adminpanel.php");
}
//-----------------------ORDER Quaries--------------------------//
elseif(isset($_POST['submitorder'])){
	$invoice=$_POST['invoiceid'];
	$item=$_POST['itemid'];
	$customerid=$_POST['customerid'];
	$itemcount=$_POST['itemcount'];

	$orderquery="INSERT INTO invoices (invoiceId, itemID, customerID, itemCount) VALUES ('$invoice','$item','$customerid','$itemcount')";
	$insquery=mysqli_query($connection, $orderquery);
	header("location: adminpanel.php");
}

//-----------------------ADMIN Quaries--------------------------//
elseif(isset($_POST['submitAdmin'])){
	$username=$_POST['username'];
	$password=$_POST['password'];

	$adminquery="INSERT INTO users (username, password, type, user_id) VALUES ('$username','$password',0,0)";
	$insadmin=mysqli_query($connection,$adminquery);
}

//-------------------------------------------------------------//
?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/adminpanel.css">
</head>

<body>
<div class="page">

	<div class="tab-panel left">
		<div class="tab-header">EXTRAVAGANCE</div>
		<div id="tabClients" class="tab" onclick="showTable(1)">Clients</div>
		<div id="tabCustomers" class="tab" onclick="showTable(2)">Customers</div>
		<div id="tabServices" class="tab" onclick="showTable(3)">Services</div>
		<div id="tabItems" class="tab" onclick="showTable(6)">Items</div>
		<div id="tabOrders" class="tab" onclick="showTable(5)">Orders</div>
		<div id="tabAdmins" class="tab" onclick="showTable(4)">Admins</div>
	</div>

	<div class="table-panel right">

		<div id="welcome_panel" style="display: block;">
			Welcome
		</div>

		<div id="client_table" style="display: none;">
			<div class="table-title">Clients Managing</div>
			<table>
				<tr><button id="btnAddClient" class="btnAddition">ADD A NEW CLIENT</button></tr>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Action</th>
				</tr>

				<!--Get table data from the DB-->
				<?php
					$row="";
					if(mysqli_num_rows($clientcon)>0){
						while($client=mysqli_fetch_assoc($clientcon)){
							$row=$row."<tr>
								<td>$client[clientName]</td>
								<td>$client[clientEmail]</td>
								<td>$client[clientContact]</td>
								<td>
									<button onclick='editclient($client[clientID])'>EDIT</a>
									<a href='queryboxes/delete.php?client=$client[clientID]'><button>DELETE</button></a>
								</td>
							</tr>";
						}
						echo $row;
					}
				?>
			</table>
		</div>

		<div id="customer_table" style="display: none;">
			<div class="table-title">Customers Managing</div>
			<table>
				<tr><button id="btnAddCustomer" class="btnAddition">ADD A NEW CUSTOMER</button></tr>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Action</th>
				</tr>
				<!--Get table data from the DB-->
				<?php
					$row="";
					if(mysqli_num_rows($customercon)>0){
						while($customer=mysqli_fetch_assoc($customercon)){
							$row=$row."<tr>
								<td>$customer[customerName]</td>
								<td>$customer[customerEmail]</td>
								<td>$customer[customerContact].</td>
								<td>
									<button onclick='editcustomer($customer[customerID])'>EDIT</button>
									<a href='queryboxes/delete.php?customer=$customer[customerID]'><button>DELETE</button></a>
								</td>
							</tr>";
						}
						echo $row;
					}
				?>
			</table>
		</div>

		<div id="service_table" style="display: none;">
			<div class="table-title">Services Managing</div>
			<table>
				<tr><button id="btnAddService" class="btnAddition">ADD A NEW SERVICE</button></tr>
				<tr>
					<th>ID</th>
					<th>Type</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
				<!--Get table data from the DB-->
				<?php
					$row="";
					if(mysqli_num_rows($servicecon)>0){
						while($service=mysqli_fetch_assoc($servicecon)){
							$row=$row."<tr>
								<td>$service[serviceID]</td>
								<td>$service[serviceType]</td>
								<td>$service[serviceDescription]</td>
								<td>
									<button onclick='editservice($service[serviceID])'>EDIT</button>
									<a href='queryboxes/delete.php?service=$service[serviceID]'><button>DELETE</button></a>
								</td>
							</tr>";
						}
						echo $row;
					}
				?>
			</table>
		</div>

		<div id="items_table" style="display: none;">
			<div class="table-title">Items Managing</div>
			<table>
				<tr><button id="btnAddItem" class="btnAddition">ADD A NEW ITEM</button></tr>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Type</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
				<!--Get table data from the DB-->
				<?php
					$row="";
					if(mysqli_num_rows($servicecon)>0){
						while($item=mysqli_fetch_assoc($itemcon)){
							$row=$row."<tr>
								<td>$item[itemID]</td>
								<td>$item[itemName]</td>
								<td>$item[itemType]</td>
								<td>$item[itemPrice]</td>
								<td>
									<button onclick='edititem($item[itemID])'>EDIT</button>
									<a href='queryboxes/delete.php?item=$item[itemID]'><button>DELETE</button></a>
								</td>
							</tr>";
						}
						echo $row;
					}
				?>
			</table>
		</div>

		<div id="order_table" style="display: none;">
			<div class="table-title">Orders Managing</div>
			<table>
				<tr><button id="btnAddOrder" class="btnAddition">ADD A NEW ORDER</button></tr>
				<tr>
					<th>Invoice No</th>
					<th>Item ID</th>
					<th>Customer ID</th>
					<th>Count</th>
					<th>Action</th>
				</tr>
				<!--Get table data from the DB-->
				<?php
					$row="";
					if(mysqli_num_rows($ordercon)>0){
						while($order=mysqli_fetch_assoc($ordercon)){
							// var_dump($order);
							$row=$row."<tr>
								<td>".$order['invoiceId']."</td>
								<td>".$order['itemID']."</td>
								<td>".$order['customerID']."</td>
								<td>".$order['itemCount']."</td>
								<td>
									<button onclick='editinvoice($order[invoiceId])'>EDIT</button>
									<a href='queryboxes/delete.php?order=$order[invoiceId]'><button>DELETE</button></a>
								</td>
							</tr>";
						}
						echo $row;
					}
				?>
			</table>
		</div>

		<div id="admin_table" style="display: none;">
			<div class="table-title">Admins Managing</div>
			<table>
				<tr><button id="btnAddAdmin" class="btnAddition">ADD A NEW ADMIN</button></tr>
				<tr>
					<th>Name</th>
					<th>Action</th>
				</tr>
				<!--Get table data from the DB-->
				<?php
					$row="";
					if(mysqli_num_rows($admincon)>0){
						while($admin=mysqli_fetch_assoc($admincon)){
							$_SESSION['adminuser']=$admin['username'];
							$row=$row."<tr>
								<td>$admin[username]</td>
								<td>
									<button onclick='editadmin()'>EDIT</button>
									<a href='queryboxes/delete.php?admin=$admin[username]'><button>DELETE</button></a>
								</td>
							</tr>";
							echo $row;
						}
					}
				?>
			</table>
		</div>
	</div>
</div>

<!-- Model Box start -->

<!-- Client adding model box -->
<div id="addclient" class="model">
	<div class="modal-content">
		<form method="POST" action="adminpanel.php">
			<div class="modal-header"> Add a New Client </div>
			<div class="modal-body">
				<div class="modal-property">Client Name<input type="text" name="clientname"></div>
				<div class="modal-property">Email Address<input type="text" name="clientemail"></div>
				<div class="modal-property">Contact Number<input type="text" name="clientcontact"></div>
				<div class="modal-property">Username<input type="text" name="clientusername"></div>
				<div class="modal-property">Password<input type="text" name="clientpassword"></div>
			</div>
			<div class="modal-footer">
				<button id="btnCancelAddClient">Cancel</button>
				<button type="submit" name="clientsubmit">Save</button>
			</div>
		</form>
	</div>
</div>

<!-- Customer editing model box -->
<div id="editclient" class="model">
	<div class="modal-content">
		<form method="POST" action="adminpanel.php">
			<div class="modal-header"> Edit the Client </div>
			<div class="modal-body">
				<div class="modal-property">Client Name<input type="text" name="clientname"></div>
				<div class="modal-property">Email Address<input type="text" name="clientemail"></div>
				<div class="modal-property">Contact Number<input type="text" name="clientcontact"></div>
			</div>
			<div class="modal-footer">
				<button id="btnCancelEditClient">Cancel</button>
				<button type="submit" name="clientedit">Submit</button>
			</div>
		</form>
	</div>
</div>

<!-- Customer adding model box -->
<div id="addcustomer" class="model">
	<div class="modal-content">
		<div class="modal-header"> Add a New Customer </div>
		<form method="POST" action="adminpanel.php">
			<div class="modal-body">
				<div class="modal-property">Customer Name<input type="text" name="customername"></div>
				<div class="modal-property">Email Address<input type="text" name="customeremail"></div>
				<div class="modal-property">Contact Number<input type="text" name="customercontact"></div>
				<div class="modal-property">username<input type="text" name="customerusername"></div>
				<div class="modal-property">password<input type="text" name="customerpassword"></div>
			</div>
			<div class="modal-footer">
				<button id="btnCancelAddCustomer">Cancel</button>
				<button type="submit" name="customerSubmit">Save</button>
			</div>
		</form>
	</div>
</div>

<!-- Customer editing model box -->
<div id="editcustomer" class="model">
	<div class="modal-content">
		<div class="modal-header"> Edit the Customer </div>
		<div class="modal-body">
			<div class="modal-property">Customer Name<input type="text" name="customername"></div>
			<div class="modal-property">Email Address<input type="text" name="customeremail"></div>
			<div class="modal-property">Contact Number<input type="text" name="customeremail"></div>
		</div>
		<div class="modal-footer">
			<button id="btnCancelEditCustomer">Cancel</button>
			<button>Submit</button>
		</div>
	</div>
</div>

<!-- Service adding model box -->
<div id="addservice" class="model">
	<div class="modal-content">
		<form method="POST" action="adminpanel.php">
			<div class="modal-header"> Add a New Service </div>
			<div class="modal-body">
				<div class="modal-property">Service ID<input type="text" name="serviceid"></div>
				<div class="modal-property">Type<input type="text" name="servicetype"></div>
				<div class="modal-property">Description<input type="text" name="serviceDesc"></div>
			</div>
			<div class="modal-footer">
				<button id="btnCancelAddService">Cancel</button>
				<button type="submit" name="serviceSubmit">Save</button>
			</div>
		</form>
	</div>
</div>

<!-- item adding model box -->
<div id="additem" class="model">
	<div class="modal-content">
		<form method="POST" action="adminpanel.php">
			<div class="modal-header"> Add a New item </div>
			<div class="modal-body">
				<div class="modal-property">Item ID<input type="text" name="itemid"></div>
				<div class="modal-property">Name<input type="text" name="itemname"></div>
				<div class="modal-property">Type<input type="text" name="itemtype"></div>
				<div class="modal-property">price<input type="text" name="itemprice"></div>
			</div>
			<div class="modal-footer">
				<button id="btnCancelAdditem">Cancel</button>
				<button type="submit" name="submititem">Save</button>
			</div>
		</form>
	</div>
</div>

<!-- Service editing model box -->
<div id="editservice" class="model">
	<div class="modal-content">
		<div class="modal-header"> Edit the Service </div>
		<div class="modal-body">
			<div class="modal-property">Service ID<input type="text" name="txtName"></div>
			<div class="modal-property">Type<input type="text" name="txtName"></div>
			<div class="modal-property">Description<input type="text" name="txtName"></div>
		</div>
		<div class="modal-footer">
			<button id="btnCancelEditService">Cancel</button>
			<button>Submit</button>
		</div>
	</div>
</div>

<!-- Some issue -->

<!-- Order adding model box -->
<div id="addorder" class="model">
	<div class="modal-content">
		<div class="modal-header"> Add a New Order </div>
		<form method="POST" action="adminpanel.php">
			<div class="modal-body">
				<div class="modal-property">Invoice ID<input type="text" name="invoiceid"></div>
				<div class="modal-property">Item ID<input type="text" name="itemid"></div>
				<div class="modal-property">Customer ID<input type="text" name="customerid"></div>
				<div class="modal-property">Item Count<input type="text" name="itemcount"></div>
			</div>
			<div class="modal-footer">
				<button id="btnCancelAddOrder">Cancel</button>
				<button type="submit" name="submitorder">Submit</button>
			</div>
		</form>
	</div>
</div>

<!-- Order editing model box -->
<div id="editservice" class="model">
	<div class="modal-content">
		<div class="modal-header"> Edit the Service </div>
		<div class="modal-body">
			<div class="modal-property">Service ID<input type="text" name="txtName"></div>
			<div class="modal-property">Type<input type="text" name="txtName"></div>
			<div class="modal-property">Description<input type="text" name="txtName"></div>
		</div>
		<div class="modal-footer">
			<button id="btnCancelEditService">Cancel</button>
			<button>Submit</button>
		</div>
	</div>
</div>
<!-- Some issue -->

<!-- Admin adding model box -->
<div id="addadmin" class="model">
	<div class="modal-content">
		<div class="modal-header"> Add a New Admin </div>
		<form method="POST" action="adminpanel.php">
			<div class="modal-body">
				<div class="modal-property">username<input type="text" name="username"></div>
				<div class="modal-property">Password<input type="password" name="password"></div>
			</div>
			<div class="modal-footer">
				<button id="btnCancelAddAdmin">Cancel</button>
				<button type="submit" name="submitAdmin">Submit</button>
			</div>
		</form>
	</div>
</div>

<!-- Admin editing model box -->
<div id="editadmin" class="model">
	<div class="modal-content">
		<div class="modal-header"> Edit the Admin </div>
		<div class="modal-body">
			<div class="modal-property">Admin Name<input type="text" name="txtName"></div>
			<div class="modal-property">Password<input type="password" name="txtName"></div>
		</div>
		<div class="modal-footer">
			<button id="btnCancelEditAdmin">Cancel</button>
			<button>Submit</button>
		</div>
	</div>
</div>

<!-- Model Box end -->

<!-- JavaScript linking -->
<script src="./javaScript/adminpanel.js" type="text/javascript"></script>

<script>
function editclient(id) {
	var url="queryboxes/client.php?client="+id;
    var myWindow = window.open(url, "", "width=700,height=400");
}
function editcustomer(id) {
	var url="queryboxes/customer.php?customer="+id;
    var myWindow = window.open(url, "", "width=700,height=400");
}
function editservice(id) {
	var url="queryboxes/services.php?service="+id;
    var myWindow = window.open(url, "", "width=700,height=400");
}
function edititem(id) {
	var url="queryboxes/item.php?item="+id;
    var myWindow = window.open(url, "", "width=700,height=400");
}
function editinvoice(id) {
	var url="queryboxes/orders.php?invoice="+id;
    var myWindow = window.open(url, "", "width=700,height=400");
}
function editadmin() {
	var url="queryboxes/admin.php?admin=";
    var myWindow = window.open(url, "", "width=700,height=400");
}
</script>

</body>
</html>