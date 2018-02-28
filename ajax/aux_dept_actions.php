<?php 
require_once '../lib/Database.php';
require_once '../lib/Department.php';

try
{
    $db = new Database();    
    $dbc = $db->connectToDatabase();
    $new_dept  = new Department($db);
    
	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		$jSorting = $_GET["jtSorting"] ;
        $jStartIndex = $_GET["jtStartIndex"];
        $jPageSize = $_GET["jtPageSize"];
      //	$jSorting = "dept_code" ;
//        $jStartIndex = 0;
//        $jPageSize = 4;
      
      		//Get record count
        //$recordCount = $query->num_rows; -----If you use num_rows of the executed query then it only returns the results from the current query execution
		$result = $dbc->query("SELECT COUNT(*) AS RecordCount FROM departments;");
		$row = $result->fetch_array();
		$recordCount = $row['RecordCount'];
      
		//Get records from database
		$query = $dbc->query("SELECT * FROM departments ORDER BY " .$jSorting. " LIMIT " . $jStartIndex . "," . $jPageSize . ";");
		
		//Add all records to an array
        $array_of_rows =array();
		while($row =$query->fetch_array()){
		  $array_of_rows[]=$row;
		}
	
       
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $recordCount;
		$jTableResult['Records'] = $array_of_rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database	
		$dept_code = $_POST['dept_code'];
        $dept_name = $_POST['dept_name'];
        $category = $_POST['category'];
        $description = $_POST['dept_desc'];
        
       // $dept_code = 'DeptTet';
//        $dept_name = 'Blah blah';
//        $category = 'Category';
//        $description = 'Testing desc'; 
		if(isset($dept_code) && isset($dept_name) && isset ($category)){           
           $dept_details = array(
            'dept_code' => $dept_code,
            'dept_name' => $dept_name,
            'category'=>$category,
            'dept_desc'=>$description
    
            );
            
            //Add the Department through the addNewDepartment function in the Department Class
            $new_dept->insertRecord("departments",$dept_details); 
            //Get last inserted record (to return to jTable)
            $result = $dbc->query("SELECT * FROM departments WHERE dept_code = LAST_INSERT_ID();");
            $row = $result->fetch_array();
            //Return result to jTable
    		$jTableResult = array();
    		$jTableResult['Result'] = "OK";
    		$jTableResult['Record'] = $row;
    		print json_encode($jTableResult);
        }else{
            echo "Nothing is set";
        }        
	}
    
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
	   $ids =array (
	       "dept_code"=>"DEP22",
           "dept_name"=>"Example of name",
           "category"=>"Category smaple",
           "dept_desc"=>"description text"
	   );
		//Update record in database
		$new_dept->updateRecord("departments",$ids);
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
        $selected_dept_id = $_POST["dept_code"];
        	//Testing 
        //$selected_dept_id = '1';
        if(isset($selected_dept_id)){
            $new_dept->deleteDepartments($selected_dept_id);
        }else{
            echo "No department selected";
        }
	    
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	$dbc->close();

}
catch(exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getErrors();
	print json_encode($jTableResult);
}
	
?>
