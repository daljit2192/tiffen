<?php 
include_once './connect.php';
class OrderDetail extends Connect{
    public $order_detail = array('data' =>array() , 'error'=> '', 'success'=> '' );
    function generateOrder($plan_array){
		for($i=0;$i<count($plan_array);$i++) {
			$planid=$plan_array[$i]['planid'];
			$count=(int)$plan_array[$i]['count'];
			$sql = "INSERT INTO order_details (assigned_plan_id,days,status_id) 
			VALUES ('".$planid."',$count,1);";
			$this->conn->query($sql); 
			
		}
		return $this->order_detail;
	}
	function getOrderDetails(){
		$sql = "SELECT od.id,od.assigned_plan_id,od.days,od.created_at,u.first_name,od.status_id,m.meal_name,mp.name FROM `order_details` as od 
				inner join `assigned_plans` as ap on od.assigned_plan_id = ap.id 
				inner join `meal_plans` as mp on ap.meal_plan_id=mp.id inner join `users` as u on ap.user_id=u.id 
				inner join `meals` as m on mp.meal_id=m.id";
        $result = $this->conn->query($sql); 
        
		if ($result->num_rows > 0) {
	        while($row = $result->fetch_assoc()) {
    			array_push($this->order_detail['data'],$row);
  			}
        } else {
        	$this->order_detail['error'] = "No orders found";
        }
		return $this->order_detail;
	}
	function updatedOrder($detail){
		$id=$detail["id"];
		$val=$detail["value"];
		$sql = "UPDATE order_details  SET status_id= $val
				where id=$id";	
		if ($this->conn->query($sql) === TRUE) {
			$sql = "SELECT * FROM order_details WHERE id = ".$id;
			$result = $this->conn->query($sql); 
			$row = $result->fetch_assoc();
			array_push($this->order_detail['data'],$row);
			$this->order_detail['success'] = "Order updated sucessfully";

		} else {
			$this->order_detail['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
		}
		return $this->order_detail;

	}
    
}
?>