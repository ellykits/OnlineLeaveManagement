<?php 
require_once "../lib/Database.php";
require_once "../lib/Leaves.php";

if(isset($_POST['leave_code'])&& isset($_POST['response'])){
    $response = $_POST['response'];
    $leave_code = $_POST['leave_code'];
    
    $leave = new Leaves(new Database());
    $response_array = array(
        "leave_code" => $leave_code,
        "leave_status"=>"SEEN BY SUPERVISOR",
        "approver"=>$response
        
    );
    $value = $leave->updateRecord("staff_leave",$response_array);
    if($value == true){
        echo "1";
    }else{
        echo "0";
    }    
    
}

?>