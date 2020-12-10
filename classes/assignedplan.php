<?php 
include_once './connect.php';
class AssignedPlan extends Connect{
    public $assigned_plan = array('data' =>array() , 'error'=> '', 'success'=> '' );
    public $assigned_plans = array('data' =>array() , 'error'=> '', 'success'=> '' );

    function addAssignedPlan($assigned_plan){
        $sql = "INSERT INTO assigned_plans (user_id, meal_plan_id,days_left,checkout_details_id) 
                VALUES ('".$assigned_plan["user_id"]."','".$assigned_plan["meal_plan_id"]."',
                '".$assigned_plan["days_left"]."','".$assigned_plan["checkout_details_id"]."');";
        if ($this->conn->query($sql) === TRUE) {
            $sql = "SELECT * FROM assigned_plans WHERE id = ".$this->conn->insert_id;
            $result = $this->conn->query($sql); 
            $row = $result->fetch_assoc();
            array_push($this->assigned_plan['data'],$row);
            $this->assigned_plan['success'] = "Assigned Plan added sucessfully";

        } else {
            $this->assigned_plan['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
        }
        return $this->assigned_plan;
    }
    function getAssignedPlanByUserid($userid){
        $sql = "SELECT a.*,m.cost,m.day,m.name 
                FROM assigned_plans as a inner join meal_plans as m on m.id = a.meal_plan_id
                where a.user_id=".$userid;
        $result = $this->conn->query($sql); 
        
		if ($result->num_rows > 0) {
	        while($row = $result->fetch_assoc()) {
    			array_push($this->assigned_plans['data'],$row);
  			}
        } else {
        	$this->assigned_plans['error'] = "No meals found";
        }
		return $this->assigned_plans;
    }
    function updateAssignedPlan($details){
        $dayleft= $details["days_left"]-1;
        $sql = "UPDATE assigned_plans  SET days_left=$dayleft
					where id='".$details["planid"]."'";	
        if ($this->conn->query($sql) === TRUE) {
            $this->assigned_plan['success'] = "Assigned Plan updated sucessfully";

        } else {
            $this->assigned_plan['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
        }
        return $this->assigned_plan;

    }

}
?>