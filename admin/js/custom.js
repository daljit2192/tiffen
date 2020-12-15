function onChangeStatus(orderid){
    var value=parseInt($('#status_'+orderid).find(":selected").val());
    var order_status={id:orderid,value:value};
    $.ajax({
		type: "POST",
		url: "submit.php",
		data: { order_status: order_status }
	})
	.done(function(data) {
		window.location = "orders.php";
	});

    
}