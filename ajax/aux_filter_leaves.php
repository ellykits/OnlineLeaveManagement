<?php 
require_once "../lib/Database.php";
require_once "../lib/Leaves.php";

if(isset($_POST['status']) && isset($_POST['staff'])){
    
    $status = $_POST['status'];
    $staff = $_POST['staff'];
    
    $leave = new Leaves(new Database);
    $response = $leave->displayFilteredLeaves($staff,$status);
    echo  $response;
}else{
    echo "something went wrong!";
}
?>