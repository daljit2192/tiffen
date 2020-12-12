$(document).ready(function(){
	$("._signup").on("click",function(){
		// alert();
		$("#loginModal").modal("hide");
		// $("#signUpModal").modal("show");
	});
});

//for fadin effect on meals
$(window).scroll(function (event) {
	var scroll = $(window).scrollTop();
	if(scroll>10){
		$('.meals').fadeIn(2000);
	}
	else{
		$('.meals').css("display","none");
	}

});
function order(planid,days_left) {
	$.ajax({
		type: "POST",
		url: "submit.php",
		data: { planid: planid,days_left:days_left }
	})
	.done(function(data) {
		var order_id=parseInt(data);
		window.location = "orderplaced.php?orderid="+order_id;
	});
};


 