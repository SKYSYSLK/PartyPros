/* function for table selection */
function showTable(tn) {

	var tableClients = document.getElementById("client_table");
	var tableCustomers = document.getElementById("customer_table");
	var tableServices = document.getElementById("service_table");
	var tableAdmins = document.getElementById("admin_table");
	var tableOrders = document.getElementById("order_table");
	var panelWelcome = document.getElementById("welcome_panel");

	if(tn === 1) {
		tableClients.style.display = "block";
		tableCustomers.style.display = "none";
		tableServices.style.display = "none";
		tableAdmins.style.display = "none";
		tableOrders.style.display = "none";
		panelWelcome.style.display = "none";

	} 
	if(tn === 2) {
		tableClients.style.display = "none";
		tableCustomers.style.display = "block";
		tableServices.style.display = "none";
		tableAdmins.style.display = "none";
		tableOrders.style.display = "none";
		panelWelcome.style.display = "none";
	} 
	if(tn === 3) {
		tableClients.style.display = "none";
		tableCustomers.style.display = "none";
		tableServices.style.display = "block";
		tableAdmins.style.display = "none";
		tableOrders.style.display = "none";
		panelWelcome.style.display = "none";
	} 
	if(tn === 4) {
		tableClients.style.display = "none";
		tableCustomers.style.display = "none";
		tableServices.style.display = "none";
		tableAdmins.style.display = "block";
		tableOrders.style.display = "none";
		panelWelcome.style.display = "none";
	} 
	if(tn === 5) {
		tableClients.style.display = "none";
		tableCustomers.style.display = "none";
		tableServices.style.display = "none";
		tableAdmins.style.display = "none";
		tableOrders.style.display = "block";
		panelWelcome.style.display = "none";
	} 

}

/* initialising */

var mdlAddClient = document.getElementById("addclient");
var mdlEditClient = document.getElementById("editclient");
var mdlAddCustomer = document.getElementById("addcustomer");
var mdlEditCustomer = document.getElementById("editcustomer");
var mdlAddService = document.getElementById("addservice");
var mdlEditService = document.getElementById("editservice");
var mdlAddOrder=document.getElementById("addorder");
var mdlAddAdmin = document.getElementById("addadmin");
var mdlEditAdmin = document.getElementById("editadmin");

var btnAddClient = document.getElementById("btnAddClient");
//var btnEditClient = document.getElementById("btnEditClient");
var btnAddCustomer = document.getElementById("btnAddCustomer");
//var btnEditCustomer = document.getElementById("btnEditCustomer");
var btnAddService = document.getElementById("btnAddService");
var btnAddOrder = document.getElementById("btnAddOrder");
//var btnEditService = document.getElementById("btnEditService");
var btnAddAdmin = document.getElementById("btnAddAdmin");
//var btnEditAdmin = document.getElementById("btnEditAdmin");

var btnCancelAddClient = document.getElementById("btnCancelAddClient");
var btnCancelEditClient = document.getElementById("btnCancelEditClient");
var btnCancelAddCustomer = document.getElementById("btnCancelAddCustomer");
var btnCancelEditCustomer = document.getElementById("btnCancelEditCustomer");
var btnCancelAddService = document.getElementById("btnCancelAddService");
var btnCancelEditService = document.getElementById("btnCancelEditService");
var btnCalcelAddOrder = document.getElementById("btnCancelAddOrder");
var btnCancelAddAdmin = document.getElementById("btnCancelAddAdmin");
var btnCancelEditAdmin = document.getElementById("btnCancelEditAdmin");


/* function for add clients model */

btnAddClient.onclick = function() {
	mdlAddClient.style.display = "block";
}

// btnEditClient.onclick = function() {
// 	mdlEditClient.style.display = "block";
// }

btnCancelAddClient.onclick = function() {
	mdlAddClient.style.display = "none";
}

btnCancelEditClient.onclick = function() {
	mdlEditClient.style.display = "none";
}


/* function for add customer model */

btnAddCustomer.onclick = function() {
	mdlAddCustomer.style.display = "block";
}

// btnEditCustomer.onclick = function() {
// 	mdlEditCustomer.style.display = "block";
// }

btnCancelAddCustomer.onclick = function() {
	mdlAddCustomer.style.display = "none";
}

btnCancelEditCustomer.onclick = function() {
	mdlEditCustomer.style.display = "none";
}

/* function for add service model */

btnAddService.onclick = function() {
	mdlAddService.style.display = "block";
}


// btnEditService.onclick = function() {
// 	mdlEditService.style.display = "block";
// }

btnCancelAddService.onclick = function() {
	mdlAddService.style.display = "none";
}

btnCancelEditService.onclick = function() {
	mdlEditService.style.display = "none";
}

/* function for order model */
btnAddOrder.onclick = function() {
	mdlAddOrder.style.display="block";
}
btnCancelAddOrder.onclick = function() {
	mdlAddOrder.style.display="none";
}

/* function for add service model */

btnAddAdmin.onclick = function() {
	mdlAddAdmin.style.display = "block";
}

// btnEditAdmin.onclick = function() {
// 	mdlEditAdmin.style.display = "block";
// }

btnCancelAddAdmin.onclick = function() {
	mdlAddAdmin.style.display = "none";
}

btnCancelEditAdmin.onclick = function() {
	mdlEditAdmin.style.display = "none";
}