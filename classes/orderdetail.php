<?php 
include_once './connect.php';
class OrderDetail extends Connect{
    public $orderdetail = array('data' =>array() , 'error'=> '', 'success'=> '' );

    function placeOrder($orderdetail){
        if($orderdetail["firstname"]!== "" && $orderdetail["lastname"]!== "" && $orderdetail["email"]!== "" && 
        $orderdetail["phone_no"]!="" &&  $orderdetail["address"]!="" &&  $orderdetail["postal_code"]!="" &&
        $orderdetail["paymentMethod"]!="" &&  $orderdetail["amount"]!=""){
			
				//query to insert data
				$sql = "INSERT INTO order_details ( user_id, shipping_first_name, shipping_last_name,shipping_email,
                shipping_phone_no,shipping_address,shipping_postal_code,shipping_amount,meal_plan_id,payment_method
                ) VALUES 
                ('".$orderdetail["user_id"]."','".$orderdetail["firstname"]."','".$orderdetail["lastname"]."','".$orderdetail["email"]."',
                '".$orderdetail["phone_no"]."','".$orderdetail["address"]."','".$orderdetail["postal_code"]."',
                '".$orderdetail["amount"]."','".$orderdetail["meal_plan_id"]."','".$orderdetail["paymentMethod"]."'
                );";
				
				if ($this->conn->query($sql) === TRUE) {
					$sql = "SELECT * FROM order_details WHERE id = ".$this->conn->insert_id;
					$result = $this->conn->query($sql); 
					$row = $result->fetch_assoc();
					array_push($this->orderdetail['data'],$row);
					$this->orderdetail['success'] = "Order Placed sucessfully";

				} else {
					$this->orderdetail['error'] = "Error: " . $sql . "<br>" . $this->conn->error;
				}
			
		} else {
			$this->orderdetail['error'] = "Please provide required field.";
		}
        return $this->orderdetail;
    }


}