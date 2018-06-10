<?php

require_once('inc/config.php');

// Get all Clients
$clientquery="SELECT * FROM clients";
$clientcon=mysqli_query($connection,$clientquery);

// Get all customers
$cusotmerquery="SELECT * FROM customers";
$customercon=mysqli_query($connection, $cusotmerquery);

// Get all Services
$servicequery="SELECT * FROM services";
$servicecon=mysqli_query($connection, $servicequery);
$services=mysqli_fetch_array($servicecon, MYSQLI_ASSOC);

// Get all Orders
$orderquery="SELECT * FROM invoices";
$ordercon=mysqli_query($connection, $orderquery);
$orders=mysqli_fetch_array($ordercon, MYSQLI_ASSOC);

// Get all Admin users
$adminquery="SELECT * FROM users WHERE type=0";
$admincon=mysqli_query($connection, $adminquery);
$admins=mysqli_fetch_array($admincon, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/adminpanel.css">
	<script src="./javaScript/adminpanel.js" type="text/javascript"></script>
</head>

<body>
<div class="page">

	<div class="tab-panel left">
		<div class="tab-header">EXTRAVAGANCE</div>
		<div id="tabClients" class="tab" onclick="showTable(1)">Clients</div>
		<div id="tabCustomers" class="tab" onclick="showTable(2)">Customers</div>
		<div id="tabServices" class="tab" onclick="showTable(3)">Services</div>
		<div id="tabAdmins" class="tab" onclick="showTable(4)">Admins</div>
		<div id="tabOrders" class="tab" onclick="showTable(5)">Orders</div>
	</div>

	<div class="table-panel right">

		<div id="welcome_panel" style="display: block;">
			Welcome
		</div>

		<div id="client_table" style="display: none;">
			<div class="table-title">Clients Managing</div>
			<table>
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
								<td>".$client['clientName']."</td>
								<td>".$client['clientEmail']."</td>
								<td>".$client['clientContact']."</td>
								<td></td>
							</tr>";
							echo $row;
						}
					}
				?>
				<tr>
					<td>Client 01</td>
					<td></td>
					<td></td>
					<td>
						<button>ADD</button>
						<button>EDIT</button>
						<button>DELETE</button>
					</td>
				</tr>
			</table>
		</div>

		<div id="customer_table" style="display: none;">
			<div class="table-title">Customers Managing</div>
			<table>
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
								<td>".$customer['customerName']."</td>
								<td>".$customer['customerEmail']."</td>
								<td>".$customer['customerContact']."</td>
								<td></td>
							</tr>";
							echo $row;
						}
					}
				?>
				<tr>
					<td>Client 01</td>
					<td></td>
					<td></td>
					<td>
						<button>ADD</button>
						<button>EDIT</button>
						<button>DELETE</button>
					</td>
				</tr>
			</table>
		</div>

		<div id="service_table" style="display: none;">
			<div class="table-title">Services Managing</div>
			<table>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Action</th>
				</tr>
				<!--Get table data from the DB-->
				<tr>
					<td>Client 01</td>
					<td></td>
					<td></td>
					<td>
						<button>ADD</button>
						<button>EDIT</button>
						<button>DELETE</button>
					</td>
				</tr>
			</table>
		</div>

		<div id="admin_table" style="display: none;">
			<div class="table-title">Admins Managing</div>
			<table>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Action</th>
				</tr>
				<!--Get table data from the DB-->
				<tr>
					<td>Client 01</td>
					<td></td>
					<td></td>
					<td>
						<button>ADD</button>
						<button>EDIT</button>
						<button>DELETE</button>
					</td>
				</tr>
			</table>
		</div>

		<div id="order_table" style="display: none;">
			<div class="table-title">Orders Managing</div>
			<table>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Action</th>
				</tr>
				<!--Get table data from the DB-->
				<tr>
					<td>Client 01</td>
					<td></td>
					<td></td>
					<td>
						<button>ADD</button>
						<button>EDIT</button>
						<button>DELETE</button>
					</td>
				</tr>
			</table>
		</div>

	</div>

</div>
</body>
</html>