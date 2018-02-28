<?php 
require_once "../lib/Database.php";
require_once "../lib/Leaves.php";

if(isset($_POST['status'])){
    
    $status = $_POST['status'];
  
    $leave = new Leaves(new Database);
    $response = $leave->displayAllFilteredLeaves($status);
    echo  $response;
}else{
    echo "something went wrong!";
}
?>