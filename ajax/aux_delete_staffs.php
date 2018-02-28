<?php
require_once "../lib/Database.php";
$db = new Database();
$db_conn = $db->connectToDatabase();			
if(isset($_POST['del_selection'])){
    
    $id =$_POST['del_selection'];
    $count= count($_POST['del_selection']);
    
    for($i=0;$i<$count ;$i++){
        
        $col=trim($id);
        $stmt="DELETE FROM staff WHERE staff_no='".$col."'";
        $db_conn->multi_query($stmt);
        header("location:staff_edit.php");
        //echo $stmt;							
       
    }
    						
    }else{
    						
    						
    }
						
				
?>