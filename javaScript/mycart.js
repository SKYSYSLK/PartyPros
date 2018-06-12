function addToCart(itemid) {
	$.ajax({
		type: 'POST',
		url: './mycart.php',
		data: ({itemid:itemid}),
		success: function() {
			//alert(itemid);
		},
		error: function() {
			alert("not gone");
		}

	});
}

function clearCart() {
	$.ajax({
		type: 'POST',
		url: './clearcart.php',
		success: function() {
			location.reload();
		},
		error: function() {
			alert("not gone");
		}

	});
}

function pay() {
	alert("You have successfully place the order. \n  Thank You !");
}
