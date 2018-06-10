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
				<tr>
					<td>Client 01</td>
					<td></td>
					<td></td>
					<td>
						<button onclick="showAddClient()">ADD</button>
						<button>EDIT</button>
						<button>DELETE</button>
					</td>
				</tr>
				<!------------------->
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
				<!------------------->
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
				<!------------------->
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
				<!------------------->
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
				<!------------------->
			</table>
		</div>

	</div>

</div>

<!-- Client adding model box -->
<div id="addclient" class="model">
	<div class="modal-content">
		<div class="modal-header"> Add a New Client </div>
		<div class="modal-body">content</div>
		<div class="modal-footer">
			<button onclick="closeAddClient()">Cancel</button>
			<button>Submit</button>
		</div>
	</div>
</div>

<!-- JavaScript linking -->
<script src="./javaScript/adminpanel.js" type="text/javascript"></script>
</body>
</html>