<?php
    
/**
 * @author nerdsofts
 * 
 * @copyright 2016
 */
 session_start();
 if(!isset($_SESSION['curr_user'])){
    header("location:index.php");
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
    
    <title>LEAVES REPORT</title>
    
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">    
    <link href="css/metro-schemes.css" rel="stylesheet">
    <link href="css/dataTables.css" rel="stylesheet"/>  
    <link rel="stylesheet" href="js/reports-plugins/buttons.dataTables.min.css"/>  
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
            
            <div class="cell bg-white shadow colspan9 padding5">
                <h3 class="uppercase align-center">LEAVES REPORT</h3>
                <div class="grid">
                    <div class="row">
                        <div class="cell">
                            <?php 
                                require_once "lib/Database.php";
                                require_once "lib/Leaves.php";
                                
                                $leave = new Leaves(new Database);
                                $leave->leaveReports();
                            ?>                        
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div><!-- End of the internal grid -->
    
    <footer>
    </footer><!-- End of the footer -->
    </div><!-- End of the container -->
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/data.js"></script>
    <script src="js/metro.js"></script> 
    <script src="js/dataTables.min.js"></script> 
    
    <script src="js/reports-plugins/dataTables.buttons.min.js"></script>
    <script src="js/reports-plugins/jszip.min.js"></script>
    <script src="js/reports-plugins/pdfmake.min.js"></script>
    <script src="js/reports-plugins/vfs_fonts.js"></script>
    <script src="js/reports-plugins/buttons.flash.min.js"></script>
    <script src="js/reports-plugins/html5.min.js"></script>
    <script src="js/reports-plugins/buttons.print.min.js"></script> 
    <script type="text/javascript">
         $(document).ready(function(){
          
            $('#id_leaves_table').DataTable({
                 dom: 'Bfrtip',
                 buttons: [
                     'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
            });   
            
        });//End of document ready function  
    </script>
</body>
</html>