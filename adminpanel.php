<?php

session_start();
require_once('inc/config.php');

if(!isset($_SESSION['usertype'])&&($_SESSION['usertype']==2)){
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
$admins=mysqli_fetch_array($admincon, MYSQLI_ASSOC);

//-----------------------CLIENT Quaries--------------------------//
if(isset($_POST['clientsubmit'])){
	$
}

//-----------------------CUSTOMER Quaries-----------------------//


//--------------------SERVICES Quaries--------------------------//


//-----------------------ORDER Quaries--------------------------//

//-----------------------ADMIN Quaries--------------------------//

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
									<button id='btnEditClient'>EDIT</button>
									<button>DELETE</button>
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
									<button id='btnEditCustomer'>EDIT</button>
									<button>DELETE</button>
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
									<button id='btnEditService'>EDIT</button>
									<button>DELETE</button>
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
					<th>Item</th>
					<th>Customer</th>
					<th>count</th>
					<th>price</th>
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
									<button id='btnEditOrder'>EDIT</button>
									<button>DELETE</button>
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
							$row=$row."<tr>
								<td>$admin[username]</td>
								<td>
									<button id='btnEditAdmin'>EDIT</button>
									<button>DELETE</button>
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
			</div>
			<div class="modal-footer">
				<button id="btnCancelAddClient">Cancel</button>
				<button type="submit" name="clientsubmit">Save</button>
			</div>
		</form>
	</div>
</div>

<!-- Client editing model box -->
<div id="editclient" class="model">
	<div class="modal-content">
		<div class="modal-header"> Edit the Client </div>
		<div class="modal-body">
			<div class="modal-property">Client Name<input type="text" name="txtName"></div>
			<div class="modal-property">Email Address<input type="text" name="txtName"></div>
			<div class="modal-property">Contact Number<input type="text" name="txtName"></div>
		</div>
		<div class="modal-footer">
			<button id="btnCancelEditClient">Cancel</button>
			<button>Submit</button>
		</div>
	</div>
</div>

<!-- Customer adding model box -->
<div id="addcustomer" class="model">
	<div class="modal-content">
		<div class="modal-header"> Add a New Customer </div>
		<div class="modal-body">
			<div class="modal-property">Customer Name<input type="text" name="txtName"></div>
			<div class="modal-property">Email Address<input type="text" name="txtName"></div>
			<div class="modal-property">Contact Number<input type="text" name="txtName"></div>
		</div>
		<div class="modal-footer">
			<button id="btnCancelAddCustomer">Cancel</button>
			<button>Submit</button>
		</div>
	</div>
</div>

<!-- Customer editing model box -->
<div id="editcustomer" class="model">
	<div class="modal-content">
		<div class="modal-header"> Edit the Customer </div>
		<div class="modal-body">
			<div class="modal-property">Customer Name<input type="text" name="txtName"></div>
			<div class="modal-property">Email Address<input type="text" name="txtName"></div>
			<div class="modal-property">Contact Number<input type="text" name="txtName"></div>
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
		<div class="modal-header"> Add a New Service </div>
		<div class="modal-body">
			<div class="modal-property">Service ID<input type="text" name="txtName"></div>
			<div class="modal-property">Type<input type="text" name="txtName"></div>
			<div class="modal-property">Description<input type="text" name="txtName"></div>
		</div>
		<div class="modal-footer">
			<button id="btnCancelAddService">Cancel</button>
			<button>Submit</button>
		</div>
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
		<div class="modal-body">
			<div class="modal-property">Service ID<input type="text" name="txtName"></div>
			<div class="modal-property">Type<input type="text" name="txtName"></div>
			<div class="modal-property">Description<input type="text" name="txtName"></div>
		</div>
		<div class="modal-footer">
			<button id="btnCancelAddService">Cancel</button>
			<button>Submit</button>
		</div>
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
		<div class="modal-body">
			<div class="modal-property">Admin Name<input type="text" name="txtName"></div>
			<div class="modal-property">Password<input type="password" name="txtName"></div>
		</div>
		<div class="modal-footer">
			<button id="btnCancelAddAdmin">Cancel</button>
			<button>Submit</button>
		</div>
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
</body>
</html>