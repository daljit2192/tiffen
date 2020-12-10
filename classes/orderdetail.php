<?php 
include_once './connect.php';
class OrderDetail extends Connect{
    public $order_detail = array('data' =>array() , 'error'=> '', 'success'=> '' );
    function generateOrder($planid){
        $sql = "INSERT INTO order_details (assigned_plan_id) 
							VALUES ('".$planid."');";
					if ($this->conn->query($sql) === TRUE) {
						$sql = "SELECT * FROM order_details WHERE id = ".$this->conn->insert_id;
						$result = $this->conn->query($sql); 
						$row = $result->fetch_assoc();
						array_push($this->order_detail['data'],$row);
						$this->order_detail['success'] = "Order Placed Successfully";

					} else {
						$this->order_detail['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
                    }
                    return $this->order_detail;
    }
    
}
?>