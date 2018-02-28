<?php 
require_once "../lib/Database.php";
require_once "../lib/Department.php";

if(isset($_POST['dept_code'])){
    
    $dept_id = $_POST['dept_code'];
    
    $new_dept = new Department(new Database);
    $list_of_branches = $new_dept->loadBranches($dept_id);
    echo  $list_of_branches;
}else{
    echo "something went wrong!";
}
?>