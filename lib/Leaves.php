<?php

class Leaves{
    protected $the_database;
    
    public function __construct(Database $db){
        $this->the_database = $db;
    }
    
    //List the current leaves booked by the various staffs
    
    function displayAllLeaves(){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT staff_leave.staff_no, leave_type, start_date,end_date, staff_name FROM staff_leave JOIN staff ON staff_leave.staff_no = staff.staff_no";        
        $query  = $conn->prepare($sql);    
        if(!$query){die($conn->error);}   
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($staff_no,$leave_type,$start_date,$end_date,$staff_name);
            $query->store_result();
            if($query->num_rows > 0){  
                  echo "
                    <table id='id_leaves_table' class='table display'>
                        <thead>
                            <tr>      
                                <th>Staff Name</th>                          
                                <th>Staff No</th>
                                <th>Start Date</th> 
                                <th>End Date</th> 
                                <th>Type of Leave</th>
                            </tr>
                        </thead>
                        <tbody>";
                        while( $query->fetch()){
                            echo"<tr>
                                    <td>$staff_name</td>
                                    <td>$staff_no</td> 
                                    <td>$start_date</td>
                                    <td>$end_date</td> 
                                    <td>$leave_type</td>
                            </tr>";
                    
                        }//end of while loop
                
                   echo "</tbody>
                         <tfoot>
                         </tfoot></table>";                      
                                          
            }else{
               echo "<p class='fg-red padding10 bg-lighterGray text-bold text-accent align-center'>--No Records--</p>";
            }                
    
      }else{
            return $this->conn->error();
      }
    }
    
    //List the current leaves booked by the various staffs
    
    function showAllLeaves(){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT leave_code,staff_leave.staff_no, leave_type, start_date,end_date,reason,leave_status,approver,staff_name,email FROM staff_leave JOIN staff ON staff_leave.staff_no = staff.staff_no";        
        $query  = $conn->prepare($sql);    
        if(!$query){die($conn->error);}   
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($leave_code,$staff_no,$leave_type,$start_date,$end_date,$reason,$status,$approver,$staff_name,$email);
            $query->store_result();
            if($query->num_rows > 0){  
                  echo "
                    <table onclick='' id='id_leaves_table' class='table display'>
                        <thead>
                            <tr>                                     
                                <th>Staff Details</th> 
                                <th>Start Date</th> 
                                <th>End Date</th> 
                                <th>Supervisor</th>                                
                                <th>Type of Leave</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>";
                        while( $query->fetch()){
                            ?>                                
                               
                            <?php
                            //Use the data attribbute to pass the data to the  html5 page
                            echo"<tr id='id_selected_leave' onclick='getLeaveDetails(this)' 
                                    data-leave-reason ='$reason'
                                    data-leave-type ='$leave_type'
                                    data-staff-no ='$staff_no'
                                    data-staff-name ='$staff_name'
                                    data-start-date ='$start_date'
                                    data-end-date ='$end_date'
                                    data-leave-code ='$leave_code'
                                    > 
                                    <td onclick =\"showDialog('#id_leaves_dialog')\" 
                                        data-role='hint'                                        
                                        data-hint-mode='2'
                                        data-hint-timeout ='2000'
                                        data-hint='Click me|Click me to read more info about the leave'><a href='#'>$staff_name - $staff_no</a></td>                                    
                                    <td>$start_date</td>
                                    <td>$end_date</td> 
                                    <td>$approver</td>
                                    
                                    <td data-role='hint'                                        
                                        data-hint-mode='2'
                                        data-hint-timeout ='2000'
                                        data-hint=\"Tip|reason Click the staff name-staff no of the staff to know the reason for the leave\"
                                    >$leave_type</td>
                                    <td onclick=''>
                                        <button 
                                            data-leave-reason ='$reason'
                                            data-leave-type ='$leave_type'
                                            data-staff-no ='$staff_no'
                                            data-staff-name ='$staff_name'
                                            data-start-date ='$start_date'
                                            data-end-date ='$end_date'
                                            data-leave-code ='$leave_code' 
                                            type=\"button\" 
                                            onclick=\"getLeaveDetails(this);response_to_leave('ACCEPTED',$('#id_leave_code').val())\"  
                                            class=\"rounded button small-button success\">
                                            <span class=\"mif mif-checkmark\"></span>
                                        </button>
                                        <button 
                                            data-leave-reason ='$reason'
                                            data-leave-type ='$leave_type'
                                            data-staff-no ='$staff_no'
                                            data-staff-name ='$staff_name'
                                            data-start-date ='$start_date'
                                            data-end-date ='$end_date'
                                            data-leave-code ='$leave_code' 
                                            type=\"button\" 
                                            onclick=\"getLeaveDetails(this);response_to_leave('DECLINED',$('#id_leave_code').val())\" 
                                            class=\"button rounded small-button alert\"><span class=\"mif mif-cancel\">
                                            </span>
                                        </button>
                                    </td>
                            </tr>";
                    
                        }//end of while loop
                
                   echo "</tbody>
                         
                         </table>";                      
                                          
            }else{
               echo "<p class='fg-red padding10 bg-lighterGray text-bold text-accent align-center'>--No Records--</p>";
            }
                            
    
      }else{
            return $this->conn->error();
      }
    }//End of showAllLeaves() function 
    //List the current leaves booked by the various staffs
    
    function showAllAcceptedLeaves(){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT leave_code,staff_leave.staff_no, leave_type, start_date,end_date,reason,leave_status,approver,staff_name,email FROM staff_leave JOIN staff ON staff_leave.staff_no = staff.staff_no WHERE approver='ACCEPTED'";        
        $query  = $conn->prepare($sql);    
        if(!$query){die($conn->error);}   
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($leave_code,$staff_no,$leave_type,$start_date,$end_date,$reason,$leave_status,$approver,$staff_name,$email);
            $query->store_result();
            if($query->num_rows > 0){  
                  echo "
                    <table onclick='' id='id_leaves_table' class='table display'>
                        <thead>
                            <tr>                                     
                                <th>Staff Details</th> 
                                <th>Start Date</th> 
                                <th>End Date</th>                                                               
                                <th>Type of Leave</th>
                                <th>Final Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>";
                        while( $query->fetch()){
                            ?>                                
                               
                            <?php
                            //Use the data attribbute to pass the data to the  html5 page
                            echo"<tr id='id_selected_leave' onclick='getLeaveDetails(this)' 
                                    data-leave-reason ='$reason'
                                    data-leave-type ='$leave_type'
                                    data-staff-no ='$staff_no'
                                    data-staff-name ='$staff_name'
                                    data-staff-email ='$email'
                                    data-start-date ='$start_date'
                                    data-end-date ='$end_date'
                                    data-leave-code ='$leave_code'
                                    > 
                                    <td onclick =\"showDialog('#id_leaves_dialog')\" 
                                        data-role='hint'                                        
                                        data-hint-mode='2'
                                        data-hint-timeout ='2000'
                                        data-hint='Click me|Click me to read more info about the leave'><a href='#'>$staff_name - $staff_no</a></td>                                    
                                    <td>$start_date</td>
                                    <td>$end_date</td>                                    
                                    <td data-role='hint'                                        
                                        data-hint-mode='2'
                                        data-hint-timeout ='2000'
                                        data-hint=\"Tip|reason Click the staff name-staff no of the staff to know the reason for the leave\"
                                    >$leave_type</td>
                                    <td>$leave_status</td>
                                    <td>
                                        <button 
                                            data-leave-reason ='$reason'
                                            data-leave-type ='$leave_type'
                                            data-staff-no ='$staff_no'
                                            data-staff-name ='$staff_name'
                                            data-staff-email ='$email'
                                            data-start-date ='$start_date'                                            
                                            data-end-date ='$end_date'
                                            data-leave-code ='$leave_code' 
                                            type=\"button\" 
                                            onclick=\"getLeaveDetails(this);final_response_to_leave('APPROVED',$('#id_leave_code').val())\"  
                                            class=\"rounded button small-button success\">
                                            <span class=\"mif mif-checkmark\"></span>
                                        </button>
                                        <button 
                                            data-leave-reason ='$reason'
                                            data-leave-type ='$leave_type'
                                            data-staff-no ='$staff_no'
                                            data-staff-name ='$staff_name'
                                            data-staff-email ='$email' 
                                            data-start-date ='$start_date'
                                            data-end-date ='$end_date'
                                            data-leave-code ='$leave_code'                                            
                                            type=\"button\" 
                                            onclick=\"getLeaveDetails(this);final_response_to_leave('REJECTED',$('#id_leave_code').val())\" 
                                            class=\"button rounded small-button alert\"><span class=\"mif mif-cancel\">
                                            </span>
                                        </button>
                                    </td>
                            </tr>";
                    
                        }//end of while loop
                
                   echo "</tbody>
                         
                         </table>";                      
                                          
            }else{
               echo "<p class='fg-red padding10 bg-lighterGray text-bold text-accent align-center'>--No Records--</p>";
            }
                            
    
      }else{
            return $this->conn->error();
      }
    }//End of showAllAcceptedLeaves() function 
    
    public function displayForStaff($staff_id){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT leave_code, leave_type, start_date,end_date,leave_status,approver,reason FROM staff_leave  WHERE staff_leave.staff_no = '$staff_id'";        
        $query  = $conn->prepare($sql);    
        if(!$query){die($conn->error);}   
        $execute = $query->execute();
       
      if($execute){
            $query->bind_result($leave_code, $leave_type,$start_date,$end_date,$leaves_status,$approver,$reason);
            $query->store_result();
            if($query->num_rows > 0){  
                  echo "
                    <table  id='id_leaves_table' class='table display'>
                        <thead>
                            <tr>
                                      
                                <th>Beginning Date</th>                          
                                <th>End Date</th>
                                <th>Leave Code</th>
                                <th>Type of Leave</th> 
                                <th>Seen by Supervisor?</th> 
                                <th>Status</th>
                                <th>Cancel/Delete</th>
                            </tr>
                        </thead>
                        <tbody>";
                        while( $query->fetch()){
                            
                            echo"<tr>
                                    <td>$start_date</td>
                                    <td>$end_date</td> 
                                    <td><input id='id_selected_leave' hidden name='selected_leave' type='text'/>$leave_code</td>
                                    <td>$leave_type</td>
                                    <td>$approver</td> 
                                    <td>$leaves_status</td>
                                    <td><input id='id_cancel_selection' value=\"{$leave_code}\" name='cancel_selection[]' type='checkbox'/>
                            </tr>";
                    
                        }//end of while loop
                
                   echo "</tbody>
                         <tfoot>
                            <tr><button type='submit' onclick=\" return confirm_delete()\" class='button rounded alert '><span class='mif-cancel'> Cancel Selected</span></button>
                        </tr>
                         </tfoot></table>";                      
                                          
            }else{
                echo "<p class='fg-red padding10 bg-lighterGray text-bold text-accent align-center'>--No Records--</p>";
            }                
    
      }else{
            return $this->conn->error();
      }
    }
    function displayFilteredLeaves($staff_id,$status){
         $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT leave_code, leave_type, start_date,end_date,leave_status,approver,reason FROM staff_leave  WHERE staff_leave.staff_no = '$staff_id' AND leave_status = '$status'";        
        $query  = $conn->prepare($sql);    
        if(!$query){die($conn->error);}   
        $execute = $query->execute();
      // echo $sql;
      if($execute){
            $query->bind_result($leave_code, $leave_type,$start_date,$end_date,$leaves_status,$approver,$reason);
            $query->store_result();
            if($query->num_rows > 0){  
                  echo "
                    <table  id='id_leaves_table' class='dataTable'>
                        <thead>
                            <tr>
                                      
                                <th>Beginning Date</th>                          
                                <th>End Date</th>
                                <th>Leave Code</th>
                                <th>Type of Leave</th> 
                                <th>Seen by Supervisor?</th> 
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>";
                        while( $query->fetch()){
                            
                            echo"<tr>
                                    <td>$start_date</td>
                                    <td>$end_date</td> 
                                    <td>$leave_code</td>
                                    <td>$leave_type</td>
                                    <td>$approver</td> 
                                    <td>$leaves_status</td>
                                  
                            </tr>";
                    
                        }//end of while loop
                
                   echo "</tbody>
                        </table>";                      
                                          
            }else{
                echo "<p class='fg-red padding10 bg-lighterGray text-bold text-accent align-center'>--No Records--</p>";
            }                
    
      }else{
            return $this->conn->error();
      }
    }
     function displayAllFilteredLeaves($status){
         $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT leave_code, leave_type, start_date,end_date,leave_status,approver,reason FROM staff_leave  WHERE leave_status = '$status'";        
        $query  = $conn->prepare($sql);    
        if(!$query){die($conn->error);}   
        $execute = $query->execute();
      // echo $sql;
      if($execute){
            $query->bind_result($leave_code, $leave_type,$start_date,$end_date,$leaves_status,$approver,$reason);
            $query->store_result();
            if($query->num_rows > 0){  
                  echo "
                    <table  id='id_leaves_table' class='dataTable'>
                        <thead>
                            <tr>
                                      
                                <th>Beginning Date</th>                          
                                <th>End Date</th>
                                <th>Leave Code</th>
                                <th>Type of Leave</th> 
                                <th>Seen by Supervisor?</th> 
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>";
                        while( $query->fetch()){
                           
                            echo"<tr>
                                    <td>$start_date</td>
                                    <td>$end_date</td> 
                                    <td>$leave_code</td>
                                    <td>$leave_type</td>
                                    <td>$approver</td> 
                                    <td>$leaves_status</td>
                                  
                            </tr>";
                    
                        }//end of while loop
                
                   echo "</tbody></table>
                        ";                      
                                          
            }else{
                echo "<p class='fg-red padding10 bg-lighterGray text-bold text-accent align-center'>--No Records--</p>";
            }                
    
      }else{
            return $this->conn->error();
      }
    }
    
    //display leave reports 
    public function leaveReports(){
         $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT leave_code,staff_leave.staff_no, leave_type, start_date,end_date,reason,leave_status,approver,staff_name FROM staff_leave JOIN staff ON staff_leave.staff_no = staff.staff_no";        
        $query  = $conn->prepare($sql);    
        if(!$query){die($conn->error);}   
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($leave_code,$staff_no,$leave_type,$start_date,$end_date,$reason,$leave_status,$approver,$staff_name);
            $query->store_result();
            if($query->num_rows > 0){  
                  echo "
                    <table onclick='' id='id_leaves_table' class='table display'>
                        <thead>
                            <tr>                                     
                                <th>Staff Details</th> 
                                <th>Start Date</th> 
                                <th>End Date</th>                                                               
                                <th>Type Info</th>
                                <th>Reason</th>
                                <th>Final Status</th>                                
                            </tr>
                        </thead>
                        <tbody>";
                        while( $query->fetch()){
                            ?>                                
                               
                            <?php
                            //Use the data attribbute to pass the data to the  html5 page
                            echo"<tr> 
                                    <td>$staff_name - $staff_no</td>
                                    <td>$start_date</td>
                                    <td>$end_date</td>                                    
                                    <td>$leave_type - $leave_code</td>
                                    <td>$reason</td>
                                    <td>$leave_status</td>
                                    
                            </tr>";
                    
                        }//end of while loop
                
                   echo "</tbody>
                         
                         </table>";                      
                                          
            }else{
               echo "<p class='fg-red padding10 bg-lighterGray text-bold text-accent align-center'>--No Records--</p>";
            }
                            
      
      }else{
            return $this->conn->error();
      }
    }//end of leave reports functions 
    
     //Update any record from the staff table .
    public function updateRecord($table,array $array_of_fields){
        $selected_leave_no = array_shift($array_of_fields);
        $fields = array();
        
        foreach($array_of_fields as $field => $val) {
           $fields[] = "$field = '$val'";
        }

        $sql = "UPDATE {$table} SET " . join(', ', $fields) . " WHERE leave_code = '$selected_leave_no'";
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
}//END OF LEAVES CLASS
?>