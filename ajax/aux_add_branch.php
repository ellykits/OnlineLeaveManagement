<?php 
require_once "../lib/Database.php";
require_once "../lib/Department.php";

if (isset($_POST['dept_code']) && isset($_POST['branch_code']) && isset ($_POST['branch_name'])){ 
   
    $dept_code = $_POST['dept_code'];    
    $branch_name = $_POST['branch_name'];
    $branch_code = $_POST['branch_code'];

//Add the branch details to the branch table 
    $branch_details = array(
    'branch_code' => $branch_code,
    'dept_code' => $dept_code,
    'branch_name'=>$branch_name 
    );
    
    $new_branch = new Department(new Database);
    $is_branch_added = $new_branch->insertRecord("branches",$branch_details);
    echo $is_branch_added;
}
?>