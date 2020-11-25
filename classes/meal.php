<?php 
include_once './connect.php';
class Meal extends Connect{
	public $meal = array('data' =>array() , 'error'=> '', 'success'=> '' );
	public $meals = array('data' =>array() , 'error'=> '', 'success'=> '' );
	public $allowTypes = array('jpg','png','jpeg');
	function getMeals(){
	
		$sql = "SELECT * FROM meals";
        $result = $this->conn->query($sql); 
        
		if ($result->num_rows > 0) {
	        while($row = $result->fetch_assoc()) {
    			array_push($this->meals['data'],$row);
  			}
        } else {
        	$this->meals['error'] = "No meals found";
        }
		return $this->meals;
	}
	function addMeal($meal_data){
		if($meal_data["meal_name"]!== "" && $meal_data["description"]!== "" && $meal_data["image"]!== "" ){
			$file_type=pathinfo($meal_data["image"],PATHINFO_EXTENSION);
			if(in_array($file_type,$this->allowTypes)){
				//query to insert data
				$sql = "INSERT INTO meals ( meal_name, description, image) VALUES ('".$meal_data["meal_name"]."','".$meal_data["description"]."','".$meal_data["image"]."');";
				
				if ($this->conn->query($sql) === TRUE) {
					$sql = "SELECT * FROM meals WHERE id = ".$this->conn->insert_id;
					$result = $this->conn->query($sql); 
					$row = $result->fetch_assoc();
					array_push($this->meal['data'],$row);
					$this->meal['success'] = "Meal added sucessfully";

				} else {
					$this->meal['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
				}
			}
			else{
				$this->meal['error'] = "Sorry, only JPG, JPEG & PNG files are allowed to upload.";
			}
		} else {
			$this->meal['error'] = "Please provide required field.";
		}
        return $this->meal;
	}

	function getMealById($id){
		$sql = "SELECT * FROM meals WHERE id = ".$id;
		$result = $this->conn->query($sql); 
		$row = $result->fetch_assoc();
		$this->meal["data"]["meal_name"] = $row["meal_name"];
		$this->meal["data"]["description"] = $row["description"];
		$this->meal["data"]["image"] = $row["image"];
		//array_push($this->meal['data'],$row[0]);
		return $this->meal;

	}
	function updateMeal($meal_data){
		if($meal_data["meal_name"]!== "" && $meal_data["description"]!== "" && $meal_data["image"]!== "" ){
			$file_type=pathinfo($meal_data["image"],PATHINFO_EXTENSION);
			if(in_array($file_type,$this->allowTypes)){
				//query to insert data
				$sql = "UPDATE meals  SET meal_name='".$meal_data["meal_name"]."',
				description='".$meal_data["description"]."',image='".$meal_data["image"]."'
				where id='".$meal_data["id"]."'";
		
				if ($this->conn->query($sql) === TRUE) {
					$sql = "SELECT * FROM meals WHERE id = ".$meal_data["id"];
					$result = $this->conn->query($sql); 
					$row = $result->fetch_assoc();
					array_push($this->meal['data'],$row);
					$this->meal['success'] = "Meal updated sucessfully";

				} else {
					$this->meal['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
				}
			}
			else{
				$this->meal['error'] = "Sorry, only JPG, JPEG & PNG files are allowed to upload.";
			}
			
		} else {
			$this->meal['error'] = "Please provide required field.";
		}
        return $this->meal;
	}

	function deleteMeal($id){
		$sql = "DELETE FROM meals WHERE id = ".$id;
		if ($this->conn->query($sql) === TRUE) {
			$this->meal['success'] = "Meal deleted sucessfully";
		}
		else{
			$this->meal['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
		}
		return $this->meal;
		
	}

}

	
?>