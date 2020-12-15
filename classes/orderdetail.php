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
	
    
}
?>