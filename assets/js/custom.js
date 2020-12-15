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
	if(scroll>407){
		$('.contact').fadeIn(2000);
		$('.contact').css('font-weight','700');
	}
	else{
		$('.contact').css("display","none");
	}
});

 function order_all(assignedplans){
	 var plan_ids_array=[];
	 assignedplans.forEach(function(item){
		var val=parseInt(document.getElementById('num_'+item.id).value);
		var ttl= parseInt(document.getElementById('left_'+item.id).value);
		var days_left=ttl-val;
		if(val>0 && val<=ttl){
			plan_ids_array.push({planid:item.id,days_left:days_left,count:ttl-days_left});
		}
	 })
	 $.ajax({
		type: "POST",
		url: "submit.php",
		data: { planid_array: plan_ids_array }
	})
	.done(function(data) {
		window.location = "orderplaced.php";
	});

 }

function add(id){
	var ttl= parseInt(document.getElementById('left_'+id).value);
	var value = parseInt(document.getElementById('num_'+id).value);
    value = isNaN(value) ? 0 : value;
    if(value<ttl){
        value++;
        document.getElementById('num_'+id).value = value;
    }
}
function sub(id){
	var value = parseInt(document.getElementById('num_'+id).value);
    value = isNaN(value) ? 0 : value;
    if(value>0){
        value--;
        document.getElementById('num_'+id).value = value;
    }
}


 