<?php 
	include 'classes/user.php'; 
	include 'classes/meal.php';
	include 'classes/mealplan.php';
	include 'classes/checkoutdetail.php';
	include 'classes/assignedplan.php';
	include 'classes/orderdetail.php';
	$userObj = new User;
	$mealObj=new Meal;
	$mealplanObj=new MealPlan;
	$checkoutdetailObj=new CheckoutDetail;
	$assignedplanObj=new AssignedPlan;
	$orderdetailObj=new OrderDetail;
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
		
		$orderdetail = array('firstname'=>$_POST["firstname"],
					'lastname'=>$_POST["lastname"],
					'email'=>$_POST["email"],
					'phone_no'=>$_POST["phone_no"],
					'address'=>$_POST["address"],
					'postal_code'=>$_POST["postal_code"],
					'paymentMethod'=>$_POST["paymentMethod"],
					'amount'=>$_POST["amount"],
					'user_id'=>$_SESSION["user"]["id"]
					);
		$orderdetail = $checkoutdetailObj->placeOrder($orderdetail);
		if($orderdetail['error']==''){
			$assignedplan=array(
				'user_id'=>$_SESSION["user"]["id"],
				'meal_plan_id'=>$_POST["meal_plan_id"],
				'days_left'=>$_POST["meal_plan_day"],
				'checkout_details_id'=>$orderdetail["data"][0]["id"]
			);
			$assignedplan=$assignedplanObj->addAssignedPlan($assignedplan);
			header('Location: assignedplans.php?userid='.$_SESSION["user"]['id']);
		}
	}
	if(isset($_GET['userid']) && !empty(trim($_GET["userid"]))){
		$userid=$_GET['userid'];
		$assignedplans=$assignedplanObj->getAssignedPlanByUserid($userid);
	}
	if (isset($_POST['planid_array'])) { 
		$assignedplans=$assignedplanObj->updateAssignedPlan($_POST['planid_array']);
		$order=$orderdetailObj->generateOrder($_POST['planid_array']);
		echo json_encode($assignedplans);
	}
?>