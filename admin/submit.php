<?php 
	require_once('../classes/user.php'); 
	require_once('../classes/meal.php');
	require_once('../classes/mealplan.php');
	$userObj = new User;
	$mealObj=new Meal;
	$mealplanObj=new MealPlan;
	$users = $userObj->getUsers();
	$meals = $mealObj->getMeals();
	$mealplans=array();
	$mealplan=array();
	$user = array();
	$meal=array();
	$delete_id='';
	if (isset($_POST['login'])){
		$userData = array('email'=>$_POST["email"],'password'=>md5($_POST["password"]));

	    $user = $userObj->loginAdmin($userData);
	    $_SESSION["user"] = $user["data"][0];
	    // echo "<pre>"; print_r($_SESSION["user"]["first_name"]);die;
	}

	//Meal
	if (isset($_POST['addmeal'])){
		$filename=$_FILES['image']['name'];
		$TargetPath=time().$filename;
		$mealData = array('meal_name'=>$_POST["meal_name"],'description'=>$_POST["description"],'image'=>$TargetPath);
		$meal = $mealObj->addMeal($mealData);
		if($meal['error']==''){
			move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$TargetPath);
		}
	}
	if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
		$id =  trim($_GET["id"]);
		$meal=$mealObj->getMealById($id);
	}
	if (isset($_POST['updatemeal'])){
		$id =  trim($_GET["id"]);
		$filename=$_FILES['image']['name'];
		$prev_img=$meal["data"]["image"];
		if(empty($filename)){
			$TargetPath=$prev_img;
		}
		else{
			$TargetPath=time().$filename;
		}
		$mealData = array('id'=>$id,'meal_name'=>$_POST["meal_name"],'description'=>$_POST["description"],'image'=>$TargetPath);
		$meal = $mealObj->updateMeal($mealData);
		if(!empty($filename)){
			move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$TargetPath);
			@unlink('uploads/'.$prev_img);
		}
	}
	if(isset($_GET['deleteid'])){
		$id=$_GET['deleteid'];
		$meal=$mealObj->deleteMeal($id);
		header("Location: meals.php");
	}


	//Meal Plan
	if(isset($_GET["mealid"]) && !empty(trim($_GET["mealid"]))){
		$mealid =  trim($_GET["mealid"]);
		$meal=$mealObj->getMealById($mealid);
		$mealplans=$mealplanObj->getMealPlanbyMealId($mealid);
	}
	if (isset($_POST['addmealplan']) && isset($_GET["mealid"])){
		$filename=$_FILES['image']['name'];
		$mealid =  trim($_GET["mealid"]);
		$TargetPath=time().$filename;
		$mealplanData = array('name'=>$_POST["name"],'description'=>$_POST["description"],'cost'=>$_POST["cost"],'image'=>$TargetPath,'mealid'=>$mealid);
		$mealplan = $mealplanObj->addMealPlan($mealplanData);
		if($mealplan['error']==''){
			move_uploaded_file($_FILES['image']['tmp_name'],'uploads/mealplan/'.$TargetPath);
		}
	}
	if(isset($_GET["id"]) && !empty(trim($_GET["id"]) && isset($_GET["mealid"]) && !empty(trim($_GET["mealid"])))){
		$id =  trim($_GET["id"]);
		$mealid =  trim($_GET["mealid"]);
		$mealplan=$mealplanObj->getMealPlanById($id);
	}
	if (isset($_POST['updatemealplan']) && isset($_GET["mealid"]) && isset($_GET["id"])){
		$id =  trim($_GET["id"]);
		$filename=$_FILES['image']['name'];
		$prev_img=$mealplan["data"]["image"];
		if(empty($filename)){
			$TargetPath=$prev_img;
		}
		else{
			$TargetPath=time().$filename;
		}
		$mealplanData = array('id'=>$id,'name'=>$_POST["name"],'description'=>$_POST["description"],'cost'=>$_POST["cost"],'image'=>$TargetPath);
		$mealplan = $mealplanObj->updateMealPlan($mealplanData);
		if(!empty($filename) && $mealplan['error']==''){
			move_uploaded_file($_FILES['image']['tmp_name'],'uploads/mealplan/'.$TargetPath);
			@unlink('uploads/mealplan/'.$prev_img);
		}
	}
	if(isset($_GET['mealplanid'])){
		$id=$_GET['mealplanid'];
		$mealid=$_GET['mealid'];
		$mealplan=$mealplanObj->deleteMealPlan($id);
		header("Location: mealplans.php?mealid=".$mealid);
	}
	
	

?>