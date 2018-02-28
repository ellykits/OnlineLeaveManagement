<?php 
require_once "../lib/Database.php";
require_once "../lib/Department.php";

if (isset($_POST['job_code']) && isset($_POST['branch_code']) && isset ($_POST['job_title'])){ 
   
    $branch_code = $_POST['branch_code'];    
    $job_code = $_POST['job_code'];
    $job_title = $_POST['job_title'];

//Add the job details to the job_position table 
    $job_details = array(
        'job_code' => $job_code,
        'branch_code' => $branch_code,    
        'job_title'=>$job_title 
    );
    
    $new_dept = new Department(new Database);
    $is_job_added = $new_dept->insertRecord("job_positions",$job_details);
    echo $is_job_added;
}
?>