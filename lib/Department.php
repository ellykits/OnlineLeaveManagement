<?php 
 
class Department{
    
    protected $the_database;
    protected $branches_list;
    public function __construct(Database $db){
        $this->the_database = $db;
    }
    public function insertRecord($table,array $data){
        $this->the_database->connectToDatabase();
        $fields = implode (',',array_keys($data));      
        $values = "'" .implode("','", array_values($data)) . "'";       
        $execution = $this->the_database->run("INSERT INTO {$table} ({$fields})VALUES ({$values})");
        if ($execution){
           return true;
        }else{
             echo $this->the_database->getError();
            return false;
        }
    }
   
    public function loadBranches ($dept_code){  
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT * FROM branches WHERE dept_code = ?";        
        $query  = $conn->prepare($sql);
        $query->bind_param("s",$dept_code);
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($dept_id,$branch_code,$branch_name);
            $query->store_result();
           
            if($query->num_rows > 0){
                echo "<table class='table'> 
                        <thead>
                            <th>Branch Name</th>
                            <th>Department Code</th>
                            <th>Branch Code</th> 
                                                        
                        </thead>
                    <tbody>";
                while( $query->fetch()){
                    //Polpulate the branches list to add in the select component and display in to the browser
                    echo "<tr>"."<td>".$branch_name."</td>"."<td>".$dept_id."</td> "."<td>".$branch_code. "</td> "."</tr>";                
                    
                    
                }  
                echo "</tbody>
                </table>";                           
            }else{
                echo "No records found";
            }                
    
      }else{
            return $this->conn->error();
      }
   }
   
   
   public function loadJobs ($branch_code){  
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT * FROM job_positions WHERE branch_code = ?";        
        $query  = $conn->prepare($sql);
        $query->bind_param("s",$branch_code);
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($job_code,$branch_code,$job_title);
            $query->store_result();          
            if($query->num_rows > 0){
                echo "<table class='table'> 
                        <thead>
                            <th>Job Title</th>
                            <th>Job Code</th>
                            <th>Branch Code</th> 
                            
                        </thead>
                    <tbody>";
                
                while( $query->fetch()){
                    //Polpulate the branches list to add in the select component and display in to the browser
                                       
                    echo "<tr>"."<td>".$job_title."</td>"."<td>".$job_code."</td> "."<td>".$branch_code. "</td> "."". "</tr>";  
                    
                }  
                echo "</tbody>
                </table>";                          
            }else{
                echo "No records found";
            }                
    
      }else{
            return $this->conn->error();
      }
   }
   
   //Populate departments   
   public function populateDepartments(){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT dept_code,dept_name,category FROM departments ORDER BY dept_name ASC, category";        
        $query  = $conn->prepare($sql);
        $query->bind_param("s",$dept_code);
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($dept_code,$dept_name,$category);
            $query->store_result();
            if($query->num_rows > 0){                
                while( $query->fetch()){
                    //Polpulate the branches list to add in the select component and display in to the browser                                       
                   echo "<option value ='{$dept_code}'>{$dept_name} - [{$category}]</option>";
                    
                }                            
            }else{
                echo "<option value=''>--No Departments--</option>";
            }                
    
      }else{
            return $this->conn->error();
      }
        
   }
   
   //Populate from branches table. This method uses Ajax calls
   public function populateBranches($dept_code){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT * FROM branches WHERE dept_code = ? ORDER BY branch_name ASC";        
        $query  = $conn->prepare($sql);
        $query->bind_param("s",$dept_code);
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($branch_code,$dept_id,$branch_name);
            $query->store_result();
            if($query->num_rows > 0){                
                while( $query->fetch()){
                    //Polpulate the branches list to add in the select component and display in to the browser                                       
                   echo "<option value ='{$branch_code}'>{$branch_name}</option>";
                    
                }                            
            }else{
                echo "<option value=''>--No Branches--</option>";
            }                
    
      }else{
            return $this->conn->error();
      }
        
   }
   
   //Add all brances in particular department department. This method uses ajax call
    public function populateAllBranchesInDept($dept_code){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT * FROM branches WHERE dept_code = ?";        
        $query  = $conn->prepare($sql);
        $query->bind_param("s",$dept_code);
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($branch_code,$dept_code,$branch_name);
            $query->store_result();
            if($query->num_rows > 0){                
                while( $query->fetch()){
                    //Polpulate the branches list to add in the select component and display in to the browser                                       
                   echo "<option value ='{$branch_code}'>{$branch_name}</option>";
                    
                }                            
            }else{
                echo "<option value =''>--No Branches--</option>";
            }                
    
      }else{
            return $this->conn->error();
      }
        
   }
   
   //Populate job positions ina particular branch    
   public function populateJobsInBranch($branch_code){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT * FROM job_positions WHERE branch_code = ?";        
        $query  = $conn->prepare($sql);
        $query->bind_param("s",$branch_code);
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($job_code,$branch_id,$job_title);
            $query->store_result();
            if($query->num_rows > 0){                
                while( $query->fetch()){
                    //Polpulate the branches list to add in the select component and display in to the browser                                       
                   echo "<option value ='{$job_title}'>{$job_title}</option>";
                    
                }                            
            }else{
                echo "<option value =''>--No Job Positions--</option>";
            }                
    
      }else{
            return $this->conn->error();
      }
        
   }
   
   //Delete Department 
   public function deleteDepartments($dept_code){
        $this->the_database->connectToDatabase();             
        $execution = $this->the_database->run("DELETE FROM departments WHERE dept_code = '{$dept_code}';");
        if ($execution){
           return true;
        }else{
             echo $this->the_database->getError();
            return false;
        }
   }
   //Update Department 
   public function updateRecord($table,array $array_of_fields){
        $selected_dept_code = array_shift($array_of_fields);
        $fields = array();
        
        foreach($array_of_fields as $field => $val) {
           $fields[] = "$field = '$val'";
        }

        $sql = "UPDATE {$table} SET " . join(', ', $fields) . " WHERE dept_code = '$selected_dept_code'";
        $this->the_database->connectToDatabase();             
        $execution = $this->the_database->run($sql);
        if ($execution){
           return true;
        }else{
            echo $sql;
             echo $this->the_database->getError();
            return false;
        }
   }
   
   //Function to display the departments   
   public function displayDepartments(){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT * FROM departments";        
        $query  = $conn->prepare($sql);       
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($dept_code,$dept_name,$category,$dept_desc);
            $query->store_result();
            if($query->num_rows > 0){  
                echo "";
                echo "<table id ='id_dept_table'>
                            <thead>
                                
                                <th>Dept Name</th>
                                <th>Dept Code</th>
                                <th>Category</th>                                
                                
                            </thead>
                            <tbody>";
                            
                while( $query->fetch()){
                    //Polpulate the branches list to add in the select component and display in to the browser                                       
                   echo "
                                <tr>
                                    <td>{$dept_name}</td>
                                    <td>{$dept_code}</td>                                    
                                    <td>{$category}</td>                                    
                                    
                                </tr>
                            
                   ";
                    
                }//end of while loop
                
                echo "</tbody>
                            <tfoot class=''>
                               
                            </tfoot>
                            
                            
                        </table>  ";                          
            }else{
                echo "<p class='fg-red padding10 bg-lighterGray text-bold text-accent align-center'>--No Records--</p>";
            }                
    
      }else{
            return $this->conn->error();
      }
   }
  
}
?>