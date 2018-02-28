<?php 
require_once "../lib/Database.php";
require_once "../lib/Department.php";

$new_dept = new Department(new Database);

if(isset($_POST['dept_code']) && isset($_POST['dept_name']) && isset ($_POST['category'])){
      
    $dept_code = $_POST['dept_code'];
    $dept_name = $_POST['dept_name'];
    $category = $_POST['category'];
    $description = $_POST['dept_desc'];    
   
   $dept_details = array(
    'dept_code' => $dept_code,
    'dept_name' => $dept_name,
    'category'=>$category,
    'dept_desc'=>$description
    
    );
    
    //Add the Department through the addNewDepartment function in the Department Class
    $is_dept_added = $new_dept->insertRecord("departments",$dept_details); 
    
    echo $is_dept_added;
}
?>