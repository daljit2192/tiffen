<?php 
	include 'classes/user.php'; 
	include 'classes/meal.php';
	include 'classes/mealplan.php';
	$userObj = new User;
	$mealObj=new Meal;
	$mealplanObj=new MealPlan;
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
?>