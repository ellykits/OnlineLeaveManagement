<?php 
require_once "../lib/Database.php";
require_once "../lib/Department.php";
require_once "../lib/Staff.php";

if(isset($_POST['field_code'])&& isset($_POST['flag'])){
    
    $primary_key = $_POST['field_code'];    
    $new_dept = new Department(new Database);
    $new_staff = new Staff(new Database);
    
    $returned_list = "--displaying--";
     
    if($_POST['flag'] ==='populate_branches'){  
        $returned_list = $new_dept->populateBranches($primary_key);
        echo  $returned_list;
    }else if($_POST['flag'] ==='populate_all_branches'){
        $returned_list = $new_dept->populateAllBranchesInDept($primary_key);
        echo  $returned_list;
    }else if($_POST['flag'] ==='populate_all_jobs'){
        $returned_list = $new_dept->populateJobsInBranch($primary_key);
        echo  $returned_list;
    }
    
}else{
    echo "something went wrong!";
}
?>