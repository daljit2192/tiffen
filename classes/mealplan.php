<?php 
include_once './connect.php';
class MealPlan extends Connect{
	public $mealplan = array('data' =>array() , 'error'=> '', 'success'=> '' );
	public $mealplans = array('data' =>array() , 'error'=> '', 'success'=> '' );
	public $allowTypes = array('jpg','png','jpeg');
	function getMealPlanbyMealId($id){
	
		$sql = "SELECT * FROM meal_plans where meal_id=".$id;
        $result = $this->conn->query($sql); 
        
		if ($result->num_rows > 0) {
	        while($row = $result->fetch_assoc()) {
    			array_push($this->mealplans['data'],$row);
  			}
        } else {
        	$this->mealplans['error'] = "No meals found";
        }
		return $this->mealplans;
	}
	function addMealPlan($mealplan_data){
		if($mealplan_data["name"]!== "" && $mealplan_data["description"]!== "" && $mealplan_data["image"]!== "" ){
			$file_type=pathinfo($mealplan_data["image"],PATHINFO_EXTENSION);
			if(in_array($file_type,$this->allowTypes)){
				//query to insert data
				$sql = "INSERT INTO meal_plans (name, description, image,meal_id) VALUES ('".$mealplan_data["name"]."','".$mealplan_data["description"]."','".$mealplan_data["image"]."','".$mealplan_data["mealid"]."');";
				
				if ($this->conn->query($sql) === TRUE) {
					$sql = "SELECT * FROM meal_plans WHERE id = ".$this->conn->insert_id;
					$result = $this->conn->query($sql); 
					$row = $result->fetch_assoc();
					array_push($this->mealplan['data'],$row);
					$this->mealplan['success'] = "Meal Plan added sucessfully";

				} else {
					$this->mealplan['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
				}
			}
			else{
				$this->mealplan['error'] = "Sorry, only JPG, JPEG & PNG files are allowed to upload.";
			}
		} else {
			$this->mealplan['error'] = "Please provide required field.";
		}
        return $this->mealplan;
	}

	function getMealPlanById($id){
		$sql = "SELECT * FROM meal_plans WHERE id = ".$id;
		$result = $this->conn->query($sql); 
		$row = $result->fetch_assoc();
		$this->mealplan["data"]["name"] = $row["name"];
		$this->mealplan["data"]["description"] = $row["description"];
		$this->mealplan["data"]["image"] = $row["image"];
		$this->mealplan["data"]["id"] = $row["id"];
		$this->mealplan["data"]["mealid"] = $row["meal_id"];
		//array_push($this->meal['data'],$row[0]);
		return $this->mealplan;
	}
	function updateMealPlan($mealplan_data){
		if($mealplan_data["name"]!== "" && $mealplan_data["description"]!== "" && $mealplan_data["image"]!== "" ){
			$file_type=pathinfo($mealplan_data["image"],PATHINFO_EXTENSION);
			if(in_array($file_type,$this->allowTypes)){
				//query to update data
				$sql = "UPDATE meal_plans  SET name='".$mealplan_data["name"]."',
				description='".$mealplan_data["description"]."',image='".$mealplan_data["image"]."'
				where id='".$mealplan_data["id"]."'";
		
				if ($this->conn->query($sql) === TRUE) {
					$sql = "SELECT * FROM meal_plans WHERE id = ".$mealplan_data["id"];
					$result = $this->conn->query($sql); 
					$row = $result->fetch_assoc();
					array_push($this->mealplan['data'],$row);
					$this->mealplan['success'] = "Meal Plan updated sucessfully";

				} else {
					$this->mealplan['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
				}
			}
			else{
				$this->mealplan['error'] = "Sorry, only JPG, JPEG & PNG files are allowed to upload.";
			}
			
		} else {
			$this->mealplan['error'] = "Please provide required field.";
		}
        return $this->mealplan;
	}

	function deleteMealPlan($id){
		$sql = "DELETE FROM meal_plans WHERE id = ".$id;
		if ($this->conn->query($sql) === TRUE) {
			$this->mealplan['success'] = "MealPlan deleted sucessfully";
		}
		else{
			$this->mealplan['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
		}
		return $this->mealplan;
		
	}

}

	
?>