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
    
    <title>STAFF ADD</title>
    
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">    
    <link href="css/metro-schemes.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/paginate.css" rel="stylesheet">
<style type="text/css">
        .bg-img {
          background-image:url(images/bg.jpg);
          background-repeat: repeat;
          background-position: center;
            
        }
    </style>
</head>
<body class="bg-img bg-grayLighter text-secondary">
    <div class="container">
        <header class="text-secondary no-margin-left no-margin-right">      
             <div class=" app-bar red " data-role="appbar">
                    <a class="app-bar-element branding"><h3><strong>OLMS</strong></h3></a>
                    <span class="app-bar-divider"></span>
                    <ul class="app-bar-menu">                        
                        <li><a href="admin_page.php"><span class="mif mif-home">Home</a></span></li>
                                         
                    </ul>
                    <div class="app-bar-element place-right">
                                        
                            <div><a href="" class="fg-white dropdown-toggle"><span class="mif mif-user"></span> Account</a>
                                <ul class="d-menu" data-role="dropdown">
                                    <li><a href="admin_account.php" class="fg-white"><span class="fg-white mif mif-pencil"></span> Reset Password</a></li>
                                    <li><a href="logout.php" class="fg-white"><span class="fg-white mif mif-exit"></span>Logout</a></li>
                                </ul>
                            </div>
                        
                        
                    </div>
                   
                </div>
        </header> <!-- End of application bar menu --->   
   
    <div class="grid">
        <div class="row cells12">
            <div class="cell colspan3  ">
                <ul class="v-menu darcula shadow">
                        <li class="menu-title align-center">Welcome, <?php  echo $_SESSION['curr_user'];?></li>
                        <li class="divider"></li>
                        <li class="menu-title">LEAVES </li>
                        <li><a href="admin_page.php"><span class="mif-home icon"></span> Dashboard</a></li>
                        <li><a href="leave_approve.php"><span class="mif-checkmark icon"></span> Approve/Reject</a></li>
                        <li><a href="leave_reports.php"><span class="mif-chart-bars icon"></span>List/Reports</a></li> 
                        <li class="divider"></li>
                        <li class="menu-title">DEPARTMENTS </li>
                         <li><a href="department_add.php" ><span class="mif-plus icon"></span> Add Department</a></li>
                         <li><a href="department_edit.php" ><span class="mif-pencil icon"></span> Edit Department</a></li>
                         <li><a href="department_report.php"><span class="mif-chart-bars icon"></span> List/Report</a></li>
                         <li class="menu-title">STAFF </li>    
                         <li><a href="staff_add.php"><span class="mif-user-plus icon"></span> Add Employee</a></li>
                         <li><a href="staff_edit.php" ><span class="mif-pencil icon"></span> Edit Employee</a></li>
                         <li><a href="staff_report.php"><span class="mif-chart-bars icon"></span> List/Report</a></li>
                                                                                    
                        
                    </ul>
            </div><!-- End of the first column in the grid -->
            
            <div class="cell colspan9 padding5">
                <div class="grid">
                    <div class="row">
                        <div class="cell">
                            
                            <div class="bg-white padding10 no-padding-bottom shadow">
                                <form  action="" method="POST" enctype="multipart/form-data">
                                <div class="wizard" data-role="wizard" data-type="cycle" data-buttons='{"next": "true", "prior": "true"}'
                                                         data-stepper-clickable="true">
                                                <div class="steps ">
                                                    <div class="step">
                                                    <h3 class="margin20 no-margin-left no-margin-top align-center uppercase light fg-crimson"> Personal Information</h3>
                                                      
                                            <div class="grid no-margin">
                                           
                                            <div class="row no-margin cells2">
                                                <div class="cell">
                                                    <label for="staff_no">Employee Number </label>
                                                    <div class="  input-control full-size text">
                                                        <?php $random_no = "EMP/".rand(0,10000)."/".date("Y");?>
                                                        <input readonly="" value="<?php echo $random_no; ?>" type="text" id="id_staff_no" name="staff_no"/>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="staff_name"> *Employee Name </label>
                                                    <div class="  input-control full-size text">
                                                        <input required  type="text" id="" name="staff_name"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row no-margin cells2">
                                                <div class="cell">
                                                    <label for="phone_no">*Phone Number </label>
                                                    <div class="  input-control full-size text">
                                                        <input required  type="text" id="" name="phone_no"/>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="email">*Email </label>
                                                    <div class=" lowercase   input-control full-size text">
                                                        <input required type="text" id="" name="email"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row no-margin cells2">
                                                <div class="cell">
                                                    <label for="p_address">Permanent Address </label>
                                                    <div class="  input-control full-size text">
                                                        <input  type="text" id="" name="p_address"/>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="p_code">Postal Code </label>
                                                    <div class="  input-control full-size text">
                                                        <input  type="text" id="" name="p_code"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row no-margin cells2">
                                                <div class="cell">
                                                    <label for="town">Town/City </label>
                                                    <div class="  input-control full-size text">
                                                        <input  type="text" id="" name="town"/>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="nat_id"> *National ID </label>
                                                    <div class="  input-control full-size text">
                                                        <input required type="text" id="nat_id" name="nat_id"/>
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
                                       
                                       <h3 class="align-center margin20 no-margin-left no-margin-top uppercase light fg-crimson"> Employment Details</h3>
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
                                                                <option  value="" >--Select--</option>    
                                                                <option >Daily</option>                                                 
                                                            	<option >Weekly</option>
                                                            	<option selected="" >Monthly</option>
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
                                                            <input  type="text" id="id_emp_date" name="emp_date" required >
                                                            <button class="button"><span class="mif-calendar"></span></button>
                                                        </div>
                                                    </div>
                                                <div class="cell">
                                                    <label for="nhif">NHIF</label>
                                                    <div class="  input-control full-size text">
                                                        <input  type="text" id="id_nhif" name="nhif"/>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <label for="nssf"> NSSF </label>
                                                    <div class="  input-control full-size text">
                                                        <input  type="text" id="id_nssf" name="nssf"/>
                                                    </div>
                                                </div>
                                                 <div class="cell">
                                                    <label for="kra"> KRA PIN </label>
                                                    <div class="  input-control full-size text">
                                                        <input  type="text" id="id_kra" name="kra"/>
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
                                           
                                            <h3 class="align-center margin20 no-margin-left uppercase no-margin-top light fg-crimson">Finalize</h3>
                                            <div class="cell align-center">                                                    
                                                        <!-- Radio button -->
                                                        <h4>Assign role</h4>
                                                    <label class="input-control radio small-check">
                                                        <input  value="employee" name="role" checked="checked" type="radio">
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
                </div><!-- End of grid in the mid content -->
            </div><!-- End of mid content div-->
        </div>
    </div><!-- End of the internal grid -->
    
    <footer>
    </footer><!-- End of the footer -->
    </div><!-- End of the container -->
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/data.js"></script>
    <script src="js/metro.js"></script>      
    <script type="text/javascript">
        
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
    $staff_no = $random_no;
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
    $new_employee->addNewStaff("staff",$employee_details); 
    
    
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
    
    $new_employee->addJobDetails("job_details",$job_details);
    
}
 ?> 