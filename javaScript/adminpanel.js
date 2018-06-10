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

/* function for add clients model */
function showAddClient() {
	var model = document.getElementById("addclient");
	model.style.display = "block";
}

function closeAddClient() {
	var model = document.getElementById("addclient");
	model.style.display = "none";
}