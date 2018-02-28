<?php
session_start();
if(!isset($_SESSION['curr_user'])){
    header("location:index.php");
 }else{
    $curr_user =$_SESSION['curr_user'];
 }


 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Nerdsofts">
    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />
    
    <title>STAFF EDIT</title>
    
    <link href="css/metro.css" rel="stylesheet"/>
    <link href="css/metro-icons.css" rel="stylesheet"/>
    <link href="css/metro-responsive.css" rel="stylesheet"/>    
    <link href="css/metro-schemes.css" rel="stylesheet"/> 
    <link href="css/dataTables.css" rel="stylesheet"/>      
     
</head>
<body class="bg-grayLighter text-secondary">
    <div class="container">
        <header class="text-secondary no-margin-left no-margin-right">      
             <div class=" app-bar red " data-role="appbar">
                    <a href="admin_page.php" class="app-bar-element branding"><h3><strong>OLMS</strong></h3></a>
                    <span class="app-bar-divider"></span>
                    <ul class="app-bar-menu">
                        <li><a href="staff_edit.php"><span class="mif mif-arrow-left"> BACK</a></span></li>                     
                    </ul>                   
                   
                </div>
        </header> <!-- End of application bar menu --->   
   
    <div class="grid" style="width: 80%; margin: 0px auto;" >
        <div class="row cells1">            
            <div class="cell padding5">
              
                <div class="grid shadow bg-white padding10">
                    <div class="row">
                        <div class="cell">
                            <div  id="id_editor_form">                                
                                <?php 
                                     if(isset($_GET['staff_id'])){
                                        $staff_id = $_GET['staff_id'];
                                     }
                                    require_once 'lib/Database.php';
                                    $db = new Database();
                                    $conn =$db->connectToDatabase();
                                    $sql = "SELECT * FROM  staff INNER JOIN job_details ON staff.staff_no = job_details.staff_no WHERE staff.staff_no = '{$staff_id}'";        
    
                                    $query  = $conn->query($sql);       
                                  
                                  if($query){
                                        while($row = $query->fetch_assoc()){
                                            $f_staff_no = $row['staff_no'];
                                            $f_staff_name  = $row['staff_name'];
                                            $f_phone_no  = $row['phone_no'];
                                            $f_email  = $row['email'];
                                            $f_p_add  = $row['p_address'];
                                            $f_p_code = $row['p_code'];
                                            $f_town = $row['town'];
                                            $f_nat_id  = $row['nat_id'];
                                            $f_gender = $row['gender'];
                                            $f_marital_stat = $row['marital_stat'];
                                            $f_job_title = $row['job_title'];
                                            $f_branch = $row['branch'];
                                            $f_dept  = $row['dept'];
                                            $f_pay_rate = $row['pay_rate'];
                                            $f_pay_pethod = $row['pay_method'];
                                            $f_pay_status = $row['pay_status'];
                                            $f_contract = $row['contract'];
                                            $f_emp_date = $row['emp_date'];
                                            $f_nhif = $row['nhif'];
                                            $f_nssf = $row['nssf'];
                                            $f_kra = $row['kra'];
                                            $f_role = $row['role'];
                                        }         
                                
                                  }else{
                                        return $this->conn->error();
                                  }
                                    
                                ?>
                                <div class="bg-white padding10 no-padding-bottom shadow">
                                <form  action="" method="POST" enctype="multipart/form-data">
                                            <div class="wizard" data-role="wizard" data-type="cycle" data-buttons='{"next": "true", "prior": "true"}'
                                                         data-stepper-clickable="true">
                                                <div class="steps ">
                                                    <div class="step">
                                                    <h3 class="margin20 no-margin-left no-margin-top align-center light fg-crimson"> Update Personal Information</h3>
                                                      
                                            <div class="grid no-margin">
                                           
                                            <div class="row no-margin cells2">
                                                <div class="cell">
                                                    <label for="staff_no">Employee Number </label>
                                                    <div class="  input-control full-size text">
                                                        
                                                        <input readonly="" value="<?php echo $staff_id;?>" type="text" id="id_staff_no" name="staff_no"/>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="staff_name"> *Employee Name </label>
                                                    <div class="  input-control full-size text">
                                                        <input required value="<?php echo $f_staff_name; ?>"  type="text" id="" name="staff_name"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row no-margin cells2">
                                                <div class="cell">
                                                    <label for="phone_no">*Phone Number </label>
                                                    <div class="  input-control full-size text">
                                                        <input required value="<?php echo $f_phone_no; ?>" type="text" id="" name="phone_no"/>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="email"> Email </label>
                                                    <div class="  input-control full-size text">
                                                        <input value="<?php echo $f_email; ?>"  type="text" id="" name="email"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row no-margin cells2">
                                                <div class="cell">
                                                    <label for="p_address">Permanent Address </label>
                                                    <div class="  input-control full-size text">
                                                        <input value="<?php echo $f_p_add; ?>"  type="text" id="" name="p_address"/>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="p_code">Postal Code </label>
                                                    <div class="  input-control full-size text">
                                                        <input value="<?php echo $f_p_code; ?>" type="text" id="" name="p_code"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row no-margin cells2">
                                                <div class="cell">
                                                    <label for="town">Town/City </label>
                                                    <div class="  input-control full-size text">
                                                        <input value="<?php echo $f_town; ?>"  type="text" id="" name="town"/>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="nat_id"> *National ID </label>
                                                    <div class="  input-control full-size text">
                                                        <input value="<?php echo $f_nat_id; ?>"required type="text" id="nat_id" name="nat_id"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row no-margin cells2">
                                                <div class="cell">
                                                    <label for="gender">Gender <small>(Pick from list)</small></label>
                                                     <div class="  input-control full-size text">                                                
                                                            <select  name="gender">                                                   
                                                            	<option >Female</option>
                                                            	<option >Male</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                 <div class="cell">
                                                    <label for="marital_stat">Marital Status <small>(Pick from list)</small></label>
                                                     <div class="  input-control full-size text">                                                
                                                            <select  name="marital_stat">
                                                                <option >Single</option>                                                   
                                                            	<option >Married</option>
                                                            	<option >Separated</option>
                                                                <option >Divorced</option>
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div class="cell">
                                                        <div class="text-small padding20 bg-grayLighter no-phone">
                                                           Enter the employee's personal details. <strong>NOTE:</strong> Fields with marked with asterix (*) are <strong>Mandatory</strong>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div><!--End of required details grid--!>
                                            
                                            
                                    </div><!--End of first step--!>
                                           
                                    <div class="step">
                                       
                                       <h3 class="align-center margin20 no-margin-left no-margin-top light fg-crimson"> Update Employment Details</h3>
                                            <div class="grid">
                                                <div class="row no-margin cells4">
                                                <div class="cell colspan2">
                                                    <label for="dept">Department <small>(format: Department - [Category])</small></label>
                                                     <div class="  input-control full-size text">                                                
                                                             <select id="id_dept_name" name="dept_name">
                                                               <?php 
                                                                   require_once "lib/Database.php";
                                                                   require_once "lib/Department.php";
                                                                   $new_dept = new Department(new Database);
                                                                   $new_dept->populateDepartments();
                                                                ?>
                                                                
                                                            </select>
                                                        </div>
                                                </div>
                                                
                                                
                                                 <div class="cell">
                                                    <label for="branch">Branch <small>(e.g set Location)</small></label>
                                                     <div class=" input-control full-size text">                                                
                                                             <select id="id_dept_branch" onfocus="populate_dropdown_element('#id_dept_name','#id_dept_branch','populate_all_branches')" name="dept_branch">
                                                                <option selected="" value="null" >--Select--</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="job_title">Job Title</label>
                                                     <div class="  input-control full-size text">                                                
                                                            <select id="id_job_title" onfocus="populate_dropdown_element('#id_dept_branch','#id_job_title','populate_all_jobs')" name="job_title">
                                                                <option selected="" value="null" >--Select--</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                 
                                                </div>
                                                <div class="row no-margin cells4">
                                                <div class="cell">
                                                    <label for="pay_rate">Pay Rate</label>
                                                     <div class="  input-control full-size text">                                                
                                                            <select id="id_pay_rate" name="pay_rate">
                                                                <option selected="" value="null" >--Select--</option>    
                                                                <option >Daily</option>                                                 
                                                            	<option >Weekly</option>
                                                            	<option >Monthly</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                 <div class="cell">
                                                    <label for="pay_method">Pay Method <small>(Pick from list)</small></label>
                                                     <div class="  input-control full-size text">                                                
                                                            <select id="id_pay_method"  name="pay_method">
                                                                <option >Bank</option>                                                   
                                                            	<option >Cashier</option>                                                	
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="pay_status">Pay Status <small>(Pick from list)</small></label>
                                                     <div class="  input-control full-size text">                                                
                                                            <select id="id_pay_status" name="pay_status">                                                   
                                                            	<option >Active</option>
                                                            	<option >In-Active</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                 <div class="cell">
                                                    <label for="contract">Contract <small>(Pick from list)</small></label>
                                                     <div class="  input-control full-size text">                                                
                                                            <select id="id_contract"  name="contract">
                                                            	<option >No</option>
                                                                <option >Yes</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                </div>
                                               <div class="row no-margin cells4">
                                                    <div class="cell">
                                                        <label for="emp_date">Employement Date </label>
                                                        <div class="input-control text full-size" id="datepicker" data-role="datepicker" data-date="1972-12-21" data-format="mmmm d, yyyy">
                                                            <input value="<?php echo $f_emp_date; ?>" type="text" id="id_emp_date" name="emp_date" required >
                                                            <button class="button"><span class="mif-calendar"></span></button>
                                                        </div>
                                                    </div>
                                                <div class="cell">
                                                    <label for="nhif">NHIF</label>
                                                    <div class="  input-control full-size text">
                                                        <input value="<?php echo $f_nhif; ?>" type="text" id="id_nhif" name="nhif"/>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="nssf"> NSSF </label>
                                                    <div class="  input-control full-size text">
                                                        <input value="<?php echo $f_nssf; ?>" type="text" id="id_nssf" name="nssf"/>
                                                    </div>
                                                </div>
                                                 <div class="cell">
                                                    <label for="kra"> KRA PIN </label>
                                                    <div class="  input-control full-size text">
                                                        <input value="<?php echo $f_kra; ?>" type="text" id="id_kra" name="kra"/>
                                                    </div>
                                                </div>
                                            </div>
                                               
                                                <div class="row">
                                                    <div class="cell">
                                                        <div class="text-small padding20 bg-grayLighter no-phone">
                                                           Enter the government details. 
                                                        </div>
                                                    </div>
                                                </div>
                    
                                            </div><!-- End of paper formatting grid--!>
                                                  
                                        </div><!-- End of second step --!>
                                        <div class="step">
                                           
                                            <h3 class="align-center margin20 no-margin-left no-margin-top light fg-crimson">Finalize</h3>
                                            <div class="cell align-center">
                                                    
                                                        <!-- Radio button -->
                                                        <h4>Assign role</h4>
                                                    <label class="input-control radio small-check">
                                                        <input value="employee" name="role" checked="checked" type="radio">
                                                        <span class="check"></span>
                                                        <span class="caption">Employee</span>
                                                    </label>
                                                    <label class="input-control radio small-check">
                                                        <input  value="supervisor" name="role" type="radio">
                                                        <span class="check"></span>
                                                        <span class="caption">Supervisor/Manager</span>
                                                    </label>                                                    

                                                </div>
                                           
                                            <div class="grid">                                    
                                               <div class="row">
                                                    <div class="cell">
                                                        <div class="text-small padding20 bg-grayLighter no-phone">
                                                           <strong>Supervisor/Manager</strong> are given the previllage of <strong>Approving</strong> and <strong>Cancelling</strong> leave requests
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-center">
                                                    <div class="cell">
                                                        <div class="input-control full-size">
                                                            <button type="submit" class=" button primary" name="continue"><span class="mif-keyboard-return"> SUBMIT</span></button>
                                                            <button type="reset" class=" button alert" name="reset"><span class="mif-cross"> RESET</span></button>
                                                        </div>                                           
                                                    </div>
                                                </div>
                                                
                                            </div><!--End of additional information grid --!>
                                            </div><!--End of third step --!>
                                        </div><!--End of all steps div --!>
                                    </div><!--End of wizard div --!>
                                </form>
                            </div>
                            </div>                     
                        </div>
                    </div>
                    
                </div><!-- End of grid in the mid content -->
            </div><!-- End of mid content div-->
        </div>
    </div><!-- End of the internal grid -->
    
    <footer>
    </footer><!-- End of the footer -->
    </div><!-- End of the container -->
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/dataTables.min.js"></script>
    <script src="js/data.js"></script>
    <script src="js/metro.js"></script>
    
    <!--Custom scripts -->     
    <script type="text/javascript">                 
        $(document).ready(function(){
             
           // $('#id_staff_table').DataTable();
            
        });
    </script>
</body>
</html>
<?php
    
/**
 * @author nerdsofts
 * @copyright 2016
 */
 require_once "lib/Database.php";
 require_once "lib/Staff.php";

$new_employee = new Staff(new Database);


if(isset($_POST['staff_name']) && isset($_POST['phone_no']) && isset ($_POST['nat_id'])){
    $staff_no = $_POST['staff_no'];
    $staff_name = $_POST['staff_name'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $p_address = $_POST['p_address'];
    $p_code = $_POST['p_code'];    
    $town = $_POST['town'];
    $nat_id = $_POST['nat_id'];
    $gender = $_POST['gender'];
    $marital_stat = $_POST['marital_stat'];   
   
    
   
   $employee_details = array(
    'staff_no' => $staff_no,
    'staff_name' => $staff_name,
    'phone_no'=>$phone_no,
    'email'=>$email,
    'p_address'=>$p_address,
    'p_code'=>$p_code,
    'town'=>$town,
    'nat_id'=>$nat_id,
    'gender'=>$gender,
    'marital_stat'=>$marital_stat
    
    );
    
    //Add the employeee through the addNewStaff function in the Staff Class
   if( $new_employee->updateRecord("staff",$employee_details)){
         echo "<script><!-- Success notify -->
                    $.Notify({
                        caption: 'Employee Update',
                        content: 'Employee details have been updated successfully!',
                        keepOpen: false
                    });
                </script>";
   }
    
    
    $dept_name = $_POST['dept_name'];
    $dept_branch = $_POST['dept_branch'];
    $job_title = $_POST['job_title'];
    $pay_rate = $_POST['pay_rate'];
    $pay_method = $_POST['pay_method'];    
    $pay_status = $_POST['pay_status'];
    $contract = $_POST['contract'];
    $emp_date = date("Y-m-d",strtotime($_POST['emp_date']));
    $nhif = $_POST['nhif'];
    $nssf = $_POST['nssf'];
    $kra = $_POST['kra'];
     $role = $_POST['role'];
     
    //Add the employment details to the jobs table using the addJobDetails function from the Staff class
    $job_details = array(
    'staff_no' => $staff_no,
    'job_title' => $job_title,
    'branch'=>$dept_branch,
    'dept'=>$dept_name,    
    'pay_rate'=>$pay_rate,
    'pay_method'=>$pay_method,
    'pay_status'=>$pay_status,
    'contract'=>$contract,
    'emp_date'=>$emp_date,
    'nhif'=>$nhif,
    'nssf'=>$nssf,
    'kra'=>$kra,
    'role'=>$role
    );
    
    if($new_employee->updateRecord("job_details",$job_details)){
         echo "<script><!-- Success notify -->
                    $.Notify({
                        caption: 'Job details update ',
                        content: 'Employee job details have been updated successfully!',
                        keepOpen: false
                    });
                </script>";
                ?> 
                <script type="text/javascript">
                    
                        window.location= "staff_edit.php";  
                   
                </script>
                <?php
    }
    
}



 ?>



