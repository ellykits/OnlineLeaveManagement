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
    
    <title>ADD DEPARTMENT</title>
    
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">    
    <link href="css/metro-schemes.css" rel="stylesheet">
    <link href="css/dataTables.css" rel="stylesheet"/> 
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
                           
                            <div class="bg-white padding10 shadow">                                 
                              <form  action="" method="POST" enctype="multipart/form-data">
                                <div class="tabcontrol2" data-role="tabcontrol">
                                     <h3 class="margin20 no-margin-left uppercase no-margin-top align-center light fg-crimson"> New Department</h3>
                                                          
                                        
                                <ul class="tabs">
                                    <li><a href="#frame_5_1">Department Details</a></li>
                                    <li><a href="#frame_5_2">Branches</a></li>
                                    <li><a href="#frame_5_3">Job Positions</a></li>
                                </ul>
                                <div class="frames">
                                    <div class="frame" id="frame_5_1">
                                        <div class="grid no-margin">  
                                                        <div class="cell">
                                                        <div class="text-secondary padding20 margin10 fg-white bg-lighterBlue no-phone">
                                                           You can use this page to add department with their branches <strong>NOTE:</strong> You can add branches to existing departments by following these steps <strong>Type the Code of Department in the input field in this tab</strong>, click <strong>branch tab</strong> to add branches
                                                        </div>
                                                    </div>                                         
                                                        <div class="row no-margin cells3">
                                                            <div class="cell">
                                                                <label for="dept_name">Department Code </label>
                                                                <div class="  input-control full-size text">
                                                                    <input required="required" type="text" id="id_dept_code" name="dept_code"/>
                                                                </div> 
                                                            </div>
                                                            <div class="cell">
                                                                <label for="dept_name">Department Name </label>
                                                                <div class="  input-control full-size text">
                                                                    <input  type="text" id="id_dept_name" name="dept_name"/>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                                <label for="category"> Category </label>
                                                                <div class="  input-control full-size text">
                                                                    <input  type="text" id="id_category" name="category"/>
                                                                </div>
                                                            </div>
                                                        </div>                                                   
                                                       
                                                        <div class="row no-margin">
                                                            <div class="cell">
                                                                <label for="dept_desc">Description </label>
                                                                <div class="  input-control full-size textarea">
                                                                    <textarea id="id_dept_desc" name="dept_desc"></textarea>                                                                
                                                                </div>
                                                            </div>                                                       
                                                        </div>
                                                        <button onclick="add_department() " type="button" class="align-center default button"><span class="mif-floppy-disk icon"></span> Save</button>
                                                        <button onclick="clear_dept_details() "  type="button" class="align-center alert button"><span class="mif-cross icon"></span> Clear</button>
                                        </div>
                                    
                                    </div>
                                    <div class="frame" id="frame_5_2" >
                                        <div class="row">
                                            <h4 class="text-bold">Branches </h4>
                                                        <div id="id_branches_list" class="row"></div>
                                                        <div class="row">
                                                            <div class="cell align-center">
                                                                    <strong>Branch Name </strong><input onfocus="load_branches($('#id_dept_code').val())" id="id_branch_name" name="branch_name" type="text " class="text"/>
                                                                    <strong>Branch Code </strong><input id="id_branch_code" name="branch_code" type="text " class="text"/>
                                                                    <br /><br />  
                                                                    <button type="button" onclick="add_branches(); "class=""><span class="mif-plus icon"></span> Add to list</button>
                                                                    <button type="button" onclick="clear_branch_details()" class=""><span class="mif-cross icon"></span> Clear</button>
                                                            </div>
                                                        </div>
                                        </div>
                                    </div>
                                    <div class="frame" id="frame_5_3">
                                        <div class="row">
                                            <h4 class="text-bold">Job Positions </h4>
                                                        <div class="row" id="id_jobs_list"  >                                                        
                                                            
                                                        </div>
                                                        <div class="row">
                                                            <div class="cell align-center">
                                                                    <strong>Select Branch  </strong>
                                                                    <select onfocus="populate_dropdown_element('#id_dept_code',this,'populate_branches')" id="id_branch_selection"name="branch_selection" class="text">
                                                                        
                                                                    </select>
                                                                    <strong>Job Title </strong><input onfocus="load_jobs($('#id_branch_selection').text())" id="id_job_title" name="job_title" type="text " class="text"/>
                                                                     <strong>Job Code </strong><input id="id_job_code" name="job_code" type="text " class="text"/>   <br /><br />                                                             
                                                                    <button type="button" onclick="add_job()" class=""><span class="mif-plus icon"></span> Add to list</button>
                                                                    <button type="button" onclick="clear_job_details()"class=""><span class="mif-cross icon"></span> Clear</button>
                                                            </div>
                                                        </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                                           
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
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/dataTables.min.js"></script>
    <script src="js/data.js"></script>
    <script src="js/metro.js"></script>      
    <script type="text/javascript">
        $(document).ready(function (){
            
        });
    </script>
</body>
</html>
