<?php 
	include 'classes/user.php'; 
	include 'classes/meal.php';
	include 'classes/mealplan.php';
	include 'classes/orderdetail.php';
	$userObj = new User;
	$mealObj=new Meal;
	$mealplanObj=new MealPlan;
	$orderdetailObj=new OrderDetail;
	$meals = $mealObj->getMeals();
	$mealplans=array();
	$meal=array();
	
	    
	if (isset($_POST['register'])){
		$userData = array('first_name'=>$_POST["first_name"], 'last_name'=>$_POST["last_name"], 'email'=>$_POST["email"], 'address'=>$_POST["address"], 'postal_code'=>$_POST["postal_code"], 'phone_number'=>$_POST["phone_number"], 'user_type'=>2, 'password'=>md5($_POST["password"]));
	    $user = $userObj->addUser($userData);
	    // echo "<pre>"; print_r($user); die;
	}
	if (isset($_GET['meal_id']) && !empty(trim($_GET["meal_id"]))){
		$mealid =  trim($_GET["meal_id"]);
		$meal=$mealObj->getMealById($mealid);
		$mealplans=$mealplanObj->getMealPlanbyMealId($mealid);
	}
	if(isset($_GET['plan_id']) && !empty(trim($_GET["plan_id"]))){
		$planid =  trim($_GET["plan_id"]);
		$mealplan=$mealplanObj->getMealPlanById($planid);
	}
	if (isset($_POST['login'])){
		$userData = array('email'=>$_POST["email"],'password'=>md5($_POST["password"]));
		$user = $userObj->loginAdmin($userData);
		if($user["error"]==''){
			$_SESSION["user"] = $user["data"][0];
		}
	    
	}
	if (isset($_POST['checkout'])){
		$orderdetail = array('firstname'=>$_POST["firstname"],
					'lastname'=>$_POST["lastname"],
					'email'=>$_POST["email"],
					'phone_no'=>$_POST["phone_no"],
					'address'=>$_POST["address"],
					'postal_code'=>$_POST["postal_code"],
					'paymentMethod'=>$_POST["paymentMethod"],
					'amount'=>$_POST["amount"],
					'meal_plan_id'=>$_POST["meal_plan_id"],
					'user_id'=>$_SESSION["user"]["id"]
					);
		$orderdetail = $orderdetailObj->placeOrder($orderdetail);
		if($orderdetail["error"]==''){
			header('Location: orderplaced.php?orderid='.$orderdetail['data'][0]['id']);
		}
	}
	if(isset($_GET['orderid']) && !empty(trim($_GET["orderid"]))){
		$orderid=$_GET['orderid'];
	}
?>