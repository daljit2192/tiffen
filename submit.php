<?php 
	include 'classes/user.php'; 
	include 'classes/meal.php';
	include 'classes/mealplan.php';
	include 'classes/orderdetail.php';
	include 'classes/assignedplan.php';
	$userObj = new User;
	$mealObj=new Meal;
	$mealplanObj=new MealPlan;
	$orderdetailObj=new OrderDetail;
	$assignedplanObj=new AssignedPlan;
	$meals = $mealObj->getMeals();
	$mealplans=array();
	$meal=array();
	$assignedplans=array();
	
	    
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
		// $orderdetail = array('firstname'=>$_POST["firstname"],
		// 			'lastname'=>$_POST["lastname"],
		// 			'email'=>$_POST["email"],
		// 			'phone_no'=>$_POST["phone_no"],
		// 			'address'=>$_POST["address"],
		// 			'postal_code'=>$_POST["postal_code"],
		// 			'paymentMethod'=>$_POST["paymentMethod"],
		// 			'amount'=>$_POST["amount"],
		// 			'meal_plan_id'=>$_POST["meal_plan_id"],
		// 			'user_id'=>$_SESSION["user"]["id"]
		// 			);
		// $orderdetail = $orderdetailObj->placeOrder($orderdetail);
		// if($orderdetail["error"]==''){
		// 	header('Location: orderplaced.php?orderid='.$orderdetail['data'][0]['id']);
		// }
		$assignedplan=array(
			'user_id'=>$_SESSION["user"]["id"],
			'meal_plan_id'=>$_POST["meal_plan_id"],
			'days_left'=>$_POST["meal_plan_day"]
		);
		$assignedplan=$assignedplanObj->addAssignedPlan($assignedplan);
		header('Location: assignedplans.php?userid='.$_SESSION["user"]['id']);

	}
	if(isset($_GET['userid']) && !empty(trim($_GET["userid"]))){
		$userid=$_GET['userid'];
		$assignedplans=$assignedplanObj->getAssignedPlanByUserid($userid);
	}
	if(isset($_GET['orderid']) && !empty(trim($_GET["orderid"]))){
		$orderid=$_GET['orderid'];
	}
	if (isset($_POST['planid']) && !empty(trim($_POST["planid"]))) { 
		$assigned_plan_details=array(
			'planid'=>$_POST['planid'],
			'days_left'=>$_POST['days_left']
		);
		$assignedplan=$assignedplanObj->updateAssignedPlan($assigned_plan_details);
		echo json_encode($assignedplan);
		
	} 
?>