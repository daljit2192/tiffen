<?php 
	require_once('../classes/user.php'); 
	require_once('../classes/meal.php');
	$userObj = new User;
	$mealObj=new Meal;
	$users = $userObj->getUsers();
	$meals = $mealObj->getMeals();

	$user = array();
	$meal=array();
	$delete_id='';
	if (isset($_POST['login'])){
		$userData = array('email'=>$_POST["email"],'password'=>md5($_POST["password"]));

	    $user = $userObj->loginAdmin($userData);
	    $_SESSION["user"] = $user["data"][0];
	    // echo "<pre>"; print_r($_SESSION["user"]["first_name"]);die;
	}
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
		if(empty($filename)){
			$TargetPath=$meal["data"]["image"];
		}
		else{
			$TargetPath=time().$filename;
		}
		$mealData = array('id'=>$id,'meal_name'=>$_POST["meal_name"],'description'=>$_POST["description"],'image'=>$TargetPath);
		$meal = $mealObj->updateMeal($mealData);
		if(!empty($filename)){
			move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$TargetPath);
		}
		else{
			@unlink('uploads/'.$TargetPath);
		}
	}
	if(isset($_GET['deleteid'])){
		$id=$_GET['deleteid'];
		$meal=$mealObj->deleteMeal($id);
		header("Location: meals.php");
	}
	
	

?>