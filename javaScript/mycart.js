function addToCart(itemid) {
	$.ajax({
		type: 'POST',
		url: './mycart.php',
		data: {itemid:itemid},
		success: function() {
			//alert("gone");
		},
		error: function() {
			alert("not gone");
		}

	});
}