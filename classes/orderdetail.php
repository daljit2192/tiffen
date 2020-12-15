<?php 
include_once './connect.php';
class OrderDetail extends Connect{
    public $order_detail = array('data' =>array() , 'error'=> '', 'success'=> '' );
    function generateOrder($plan_array){
		for($i=0;$i<count($plan_array);$i++) {
			$planid=$plan_array[$i]['planid'];
			for($j=0;$j<$plan_array[$i]['count'];$j++){
				$sql = "INSERT INTO order_details (assigned_plan_id) 
				VALUES ('".$planid."');";
				$this->conn->query($sql); 
			}
		}
		return $this->order_detail;
    }
    
}
?>