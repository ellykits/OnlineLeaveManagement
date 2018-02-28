<?php
    
/**
 * @author nerdsofts
 * 
 * @copyright 2016
 */
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
    
    <title>OLMS</title>
    
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
             <div class=" app-bar red" data-role="appbar">
                    <a  href="index.php" class="app-bar-element branding"><h3><strong>OLMS</strong></h3></a>
                    <span class="app-bar-divider"></span>
                    <ul class="app-bar-menu">                        
                        <li><a href="user_page.php"><span class="mif mif-home">Home</a></span></li>
                                  
                    </ul>
                    <div class="app-bar-element place-right">
                                                               
                        <a href="logout.php" class="fg-white"><span class="fg-white mif mif-exit"></span>Logout</a>
                               
                    </div>
                        
                        
             </div>
        
        
        </header> <!-- End of application bar menu --->   
        <div class="grid">
            <div class="row cells12">
                <div class="cell colspan3">
                    <ul class="v-menu darcula shadow">
                        <li class="menu-title">Welcome, <?php  echo $_SESSION['curr_user'];?></li>
                        <li><a href="user_page.php"><span class=" mif-home icon"></span>Dashboard</a></li>
                        <li><a href="staff_profile.php"><span class="mif-user icon"></span>My Profile</a></li>
                        <li class="divider"></li>
                        <li class="menu-title">Leaves </li>
                        <li><a href="request_leave.php"><span class="mif-hotel icon"></span>Request Leave</a></li>
                        <li><a href="current_leaves.php"><span class="mif-calendar icon"></span>All Requested Leaves</a></li>
                        <li><a href="staff_leave_report.php"><span class="mif-chart-bars icon"></span>My Leaves Status/Reports</a></li>
                        <li class="divider"></li>
                        
                    </ul>                    
                </div><!-- End of side bar cell -->
                
                <div class="cell colspan9">
                    <div class="grid paddin10 no-padding-top  shadow bg-white">
                        <h3 class="uppercase align-center fg-green">Leaves dashboard</h3>
                        <div class="row cells3">                            
                            <div class="cell padding10">
                                <button id="id_approve_btn" data-status="APPROVED" data-staff ="<?php echo $_SESSION['curr_staff_no'];?>"onclick="filter_leaves(this)" class="success command-button">
                                   <span class="mif-4x fg-white mif-checkmark icon"></span>     
                                    Approved 
                                    <small>Use this option to view approved leaves</small>
                                </button>                                                                                             
                            </div>
                            <div class="cell padding10">
                                <button id="id_rejected_btn" class="alert command-button" data-status="REJECTED" data-staff ="<?php echo $_SESSION['curr_staff_no'];?>" onclick="filter_leaves(this)">
                                  <span class="mif-4x fg-white mif-cancel icon"></span>  
                                    Rejected
                                    <small>Use this option view rejected leaves</small>
                                </button>
                                                                
                            </div>
                            <div class="cell padding10">
                                <button id="id_seen_btn" class="info command-button" data-status="SEEN BY SUPERVISOR" data-staff ="<?php echo $_SESSION['curr_staff_no'];?>" onclick="filter_leaves(this)">
                                    <span class="mif-4x fg-white mif-eye icon"></span>  
                                    Seen
                                    <small>Use this option to view leaves seen by supervisor</small>
                                </button>                                                                 
                            </div>
                        </div>
                        <div class="row">
                            <div id="id_filtered_leaves" class="cell bg-grayLighter padding10">
                                <p class="text-accent align-center ani-bounce">Click the buttons above to filter leaves</p>
                            </div>
                        </div>
                    </div>
                </div><!-- End of mid content cell -->
                
            </div><!-- End of row -->
        </div><!-- End of inner grid div -->
        
        <footer>
        </footer><!-- End of the footer -->
    </div><!-- End of the container -->
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/data.js"></script>
    <script src="js/metro.js"></script> 
    <script src="js/dataTables.min.js"></script> 
    <script type="text/javascript">
        function filter_leaves(btn){
              var staff = btn.getAttribute("data-staff");
              var status = btn.getAttribute("data-status");
              //alert("The  selected staff is "+staff + " and the status thereof is " + status);
              load_filtered_leaves(staff,status);
        }
        function confirm_delete(){
            var result = confirm("Are you sure you wan to cancel this leave?");
            return result;
        }
    </script>
</body>
</html>