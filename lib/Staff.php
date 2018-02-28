<?php 
 
class Staff{
    
    protected $the_database;
    
    public function __construct(Database $db){
        $this->the_database = $db;
    }
    private function insertRecord($table,array $data){
        $this->the_database->connectToDatabase();
        $fields = implode (',',array_keys($data));      
        $values = "'" .implode("','", array_values($data)) . "'";       
        $execution = $this->the_database->run("INSERT INTO {$table} ({$fields})VALUES ({$values})");
        if ($execution){
           return true;
        }else{
            return false;
        }
    }
    public function addNewStaff($table,array $data){         
        $execution = $this->insertRecord($table,$data);
        if ($execution){
            //echo "Add successfull";
            echo "<script><!-- Success notify -->
                    $.Notify({
                        caption: 'Employee Added',
                        content: 'Employee has been added successfully!',
                        keepOpen: false
                    });
                </script>";
                return true;
        }else{
            //echo "Not successfull". $this->the_database->getError();
            echo "<script><!-- Failure notify -->
                    $.Notify({
                        type: 'alert',
                        caption: 'ERROR',
                        content: 'Operation failed due to some internal errors!',
                        keepOpen: true
                    });
                </script>";
                return false;
        }
       
    }
    public function addJobDetails($table, array $data){
        $execution = $this->insertRecord($table,$data);
        if ($execution){
            //echo "Add successfull";
            echo "<script><!-- Success notify -->
                    $.Notify({
                        caption: 'Job Details Updated',
                        content: 'Job details have been updated successfully!',
                        keepOpen: false
                    });
                </script>";
                return true;
        }else{
            //echo "Not successfull". $this->the_database->getError();
            echo "<script><!-- Failure notify -->
                    $.Notify({
                        type: 'alert',
                        caption: 'ERROR',
                        content: 'Operation failed due to some internal errors!',
                        keepOpen: true
                    });
                </script>";
                return false;
        }
    }
    //Delete Staff
    public function deleteStaff (){
        
    }
    //Update any record from the staff table .
    public function updateRecord($table,array $array_of_fields){
        $selected_staff_no = array_shift($array_of_fields);
        $fields = array();
        
        foreach($array_of_fields as $field => $val) {
           $fields[] = "$field = '$val'";
        }

        $sql = "UPDATE {$table} SET " . join(', ', $fields) . " WHERE staff_no = '$selected_staff_no'";
        $this->the_database->connectToDatabase();             
        $execution = $this->the_database->run($sql);
        if ($execution){
            //die($sql);
          
           return true;
        }else{
             echo "Take a look at this sql please: ".$sql;
             echo $this->the_database->getError();
            return false;
        }
   }
   
   //Function to display the departments 
   
   public function displayStaff(){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT staff.staff_no,staff_name,nat_id,p_address,role FROM staff,job_details WHERE staff.staff_no = job_details.staff_no";        
        $query  = $conn->prepare($sql);    
        if(!$query){die($conn->error);}   
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($staff_no,$staff_name,$id,$address,$role);
            $query->store_result();
            if($query->num_rows > 0){  
                  echo "
                    <table id='id_staff_table' class='display'>
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Name</th>
                                <th>Staff No</th>                                
                                <th>ID</th> 
                                <th>Address</th> 
                                <th>Role</th> 
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>";
                        while( $query->fetch()){
                            echo"<tr>
                                    <td><input id='id_del_selection' value=\"{$staff_no}\" name='del_selection[]' type='checkbox'/>
                                    <td>$staff_name</td>
                                    <td>$staff_no</td>                                    
                                    <td>$id</td>
                                    <td>$address</td>
                                    <td>$role</td> 
                                    <td><a class='button rounded success small-button' href=update_staff.php?staff_id=$staff_no>Edit</a></td>
                            </tr>";
                    
                        }//end of while loop
                
                   echo "</tbody>
                         <tfoot>
                            <button type='submit' onclick=\" return confirmDelete(this)\" class='button rounded alert '>Delete Selected</button>
                         </tfoot></table>";                      
                                          
            }else{
                echo "<p class='fg-red padding10 bg-lighterGray text-bold text-accent align-center'>--No Records--</p>";
            }                
    
      }else{
            return $this->conn->error();
      }
   }
   
   //Report for staff
   function listStaff(){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT staff.staff_no,staff_name,nat_id,p_address,phone_no,email,dept,job_title,role FROM staff,job_details WHERE staff.staff_no = job_details.staff_no";        
        $query  = $conn->prepare($sql);    
        if(!$query){die($conn->error);}   
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($staff_no,$staff_name,$id,$address,$phone_no,$email,$dept,$job_title,$role);
            $query->store_result();
            if($query->num_rows > 0){  
                  echo "
                    <table id='id_staff_table' class='display'>
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Staff No</th>                                
                                <th>National ID</th> 
                                <th>Address</th> 
                                <th>Contacts</th>
                                <th>Job Info</th>                               
                                <th>Role</th> 
                                
                            </tr>
                        </thead>
                        <tbody>";
                        while( $query->fetch()){
                            echo"<tr>
                                    <td>$staff_name</td>
                                    <td>$staff_no</td>                                    
                                    <td>$id</td>
                                    <td>$address</td>
                                    <td>($phone_no; $email)</td> 
                                    <td>$job_title [$dept]</td> 
                                    <td>$role</td> 
                            </tr>";
                    
                        }//end of while loop
                
                   echo "</tbody><table>";                      
                                          
            }else{
                echo "<p class='fg-red padding10 bg-lighterGray text-bold text-accent align-center'>--No Records--</p>";
            }                
    
      }else{
            return $this->conn->error();
      }
   }
   
   //Report for staff
   function getProfile($staff_id){
      $conn = $this->the_database->connectToDatabase();      
      $sql = "SELECT * FROM  staff INNER JOIN job_details ON staff.staff_no = job_details.staff_no WHERE staff.staff_no = '{$staff_id}'";        
      
      $results = array();
      $query  = $conn->query($sql);       
                                  
                                  if($query){
                                    
                                        $row = $query->fetch_assoc();
                                            $results = $row;
                                           
                                            #$results['staff_no'] = $row['staff_no'];
#                                            $results['staff_name']  = $row['staff_name'];
#                                            $f_phone_no  = $row['phone_no'];
#                                            $f_email  = $row['email'];
#                                            $f_p_add  = $row['p_address'];
#                                            $f_p_code = $row['p_code'];
#                                            $f_town = $row['town'];
#                                            $f_nat_id  = $row['nat_id'];
#                                            $f_gender = $row['gender'];
#                                            $f_marital_stat = $row['marital_stat'];
#                                            $f_job_title = $row['job_title'];
#                                            $f_branch = $row['branch'];
#                                            $f_dept  = $row['dept'];
#                                            $f_pay_rate = $row['pay_rate'];
#                                            $f_pay_pethod = $row['pay_method'];
#                                            $f_pay_status = $row['pay_status'];
#                                            $f_contract = $row['contract'];
#                                            $f_emp_date = $row['emp_date'];
#                                            $f_nhif = $row['nhif'];
#                                            $f_nssf = $row['nssf'];
#                                            $f_kra = $row['kra'];
#                                            $f_role = $row['role'];
                                        
            return $results;             
                                
        }else{
            return $this->conn->error();
        }  
   }
   function loginStaff($email, $nat_id){
      $conn = $this->the_database->connectToDatabase();      
      $sql = "SELECT staff_name, email,staff.staff_no,nat_id, role FROM  staff  JOIN job_details ON staff.staff_no = job_details.staff_no  WHERE nat_id = '{$nat_id}' AND email ='$email'";        
      
      $results = array();
      $query  = $conn->query($sql);       
                                  
            if($query){
                  if($query->num_rows > 0){                   
                        $results = $query->fetch_assoc();
                        $_SESSION['curr_staff_no'] = $results['staff_no'];
                        $_SESSION['curr_user'] = $results['staff_name'];
                        
                       // echo "A user has been found";
                       
                        if($results['role']=='supervisor'){
                            //echo "ROLE = ".$results['role']; 
                            echo "<script> setTimeout(function(){
                                    $.Notify({type: 'success',icon: \"<span class='mif-checkmark'></span>\", caption: 'Access Granted', content: 'You have logged in successfully!'});
                                     }, 2000);
                       
                                    setTimeout(function(){
                                        window.location ='supervisor_page.php' }, 4000);
                                 </script>";
                           
                        }else if($results['role']=='employee'){
                            //echo "ROLE = ".$results['role'];
                            echo "<script> setTimeout(function(){
                                    $.Notify({type: 'success',icon: \"<span class='mif-checkmark'></span>\", caption: 'Access Granted', content: 'You have logged in successfully!'});
                                     }, 2000);
                       
                                    setTimeout(function(){
                                        window.location ='user_page.php' }, 4000);
                                 </script>";
                        }else if($results['role']=='admin'){
                            echo "<script> setTimeout(function(){
                                    $.Notify({type: 'success',icon: \"<span class='mif-checkmark'></span>\", caption: 'Access Granted', content: 'You have logged in successfully!'});
                                     }, 2000);
                       
                                    setTimeout(function(){
                                        window.location ='admin_page.php' }, 4000);
                                 </script>";
                        }else{
                            echo "<script> setTimeout(function(){
                                    $.Notify({type: 'warning',icon: \"<span class='mif-block'></span>\", caption: 'Access Denied', content: 'This user is not recognized in the system!'});
                                     }, 2000);
                       
                                    setTimeout(function(){
                                        window.location ='index.php' }, 4000);
                                 </script>";
                        }
                    
                  } else{
                    //echo "NO RECORDS found for particular user";
                     echo "<script> setTimeout(function(){
                                    $.Notify({type: 'warning',icon: \"<span class='mif-warning'></span>\", caption: 'Access Denied', content: 'Your login failed. Contact Administrator or check your credentials and try again. Click forgot password to retrieve yours via email !!!'});
                                     }, 2000);
                                   
                                    
                                 </script>";
                  }          
                 return true;
                 ob_flush();               
            }else{
                return $this->conn->error();
            }  
   }
   
   //Request Leave 
   public function requestLeave($table,array $data){
     $execution = $this->insertRecord($table,$data);
        if ($execution){
            //echo "Add successfull";
            echo "<script><!-- Success notify -->
                    $.Notify({
                        caption: 'Request Posted',
                        type: 'success',
                        content: 'Your request has been received successfully!',
                        keepOpen: false
                    });
                    $.Notify({
                        caption: 'View Request',                        
                        content: 'You can always view the requests via your account!',
                        keepOpen: true
                    });
                </script>";
                return true;
        }else{
            //echo "Not successfull". $this->the_database->getError();
            echo "<script><!-- Failure notify -->
                    $.Notify({
                        type: 'alert',
                        caption: 'ERROR',
                        content: 'Operation failed due to some internal errors!',
                        keepOpen: true
                    });
                </script>";
                return false;
        }
   } 
    //Populate Staff   
   public function populateStaffs(){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT staff_no,staff_name FROM staff ORDER BY staff_name ASC";        
        $query  = $conn->prepare($sql);       
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($staff_no,$staff_name);
            $query->store_result();
            if($query->num_rows > 0){                
                while( $query->fetch()){
                    //Polpulate the branches list to add in the select component and display in to the browser                                       
                   echo "<option value ='{$staff_no}'>{$staff_name} - [{$staff_no}]</option>";
                    
                }                            
            }else{
                echo "<option value=''>--No Subbordinates--</option>";
            }                
    
      }else{
            return $this->conn->error();
      }
        
   }
}//End of class 
?>