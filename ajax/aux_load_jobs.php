<?php 
require_once "../lib/Database.php";
require_once "../lib/Department.php";

if(isset($_POST['branch_code'])){
    
    $branch_id = $_POST['branch_code'];
    
    $new_dept = new Department(new Database);
    $list_of_jobs = $new_dept->loadJobs($branch_id);
    echo  $list_of_jobs;
}else{
    echo "something went wrong!";
}
?>