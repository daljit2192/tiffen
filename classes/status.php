<?php 
include_once './connect.php';
class Status extends Connect{
    public $status = array('data' =>array() , 'error'=> '', 'success'=> '' );
    
	function getAllStatus(){
		$sql = "SELECT * from status";
        $result = $this->conn->query($sql); 
        
		if ($result->num_rows > 0) {
	        while($row = $result->fetch_assoc()) {
    			array_push($this->status['data'],$row);
  			}
        } else {
        	$this->status['error'] = "No status found";
        }
		return $this->status;
	}
    
}
?>