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
    
    <title>APPROVE LEAVE</title>
    
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
                        <li><a href="supervisor_page.php"><span class="mif mif-home">Home</a></span></li>
                                  
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
                        <li class="menu-title align-center">Welcome, <?php  echo $_SESSION['curr_user'];?></li>
                        <li class="divider"></li>
                        <li class="menu-title">LEAVES </li>
                        <li><a href="supervisor_page.php"><span class="mif-home icon"></span>Supervisor Home</a></li>
                        <li><a href="supervisor_request.php"><span class="mif-hotel icon"></span>Request on Behalf</a></li> 
                        <li><a href="supervisor_approve.php"><span class="mif-checkmark icon"></span> Approve/Reject</a></li>
                        
                        <li class="divider"></li>
                        
                                                                                    
                        
                    </ul>                   
                </div><!-- End of side bar cell -->
                
                <div class="cell colspan9">
                    <div class="grid paddin10 no-padding-top  shadow bg-white">
                        <h3 class="uppercase align-center fg-green">Leaves </h3>
                        <div class="row ">  
                            <div class="cell padding10">                           
                                <form method="POST">
                                    
                                    <?php 
                                    require_once "lib/Database.php";
                                    require_once "lib/Leaves.php";                                                                
                                    $leave = new Leaves(new Database());
                                    $leave->showAllLeaves();
                                     ?>
                                     <input hidden="" name="leave_code" id="id_leave_code"/>
                                    <!-- <input hidden="" name="supervisor_status" id="id_supervisor_status"/>-->
                                </form>
                            </div>                           
                        </div>
                        <div class="row">
                            <div id="id_filtered_leaves" class="cell bg-grayLighter padding10">
                                <p class="text-secondary align-center">Select leaves to <strong>APPROVE/REJECT </strong>then click appropriate button</p>
                            </div>
                        </div>
                        <div class="ani-float" data-overlay-click-close="true" data-overlay-color="" data-role="dialog" data-close-button="true" data-overlay='true' data-place="top-center"id="id_leaves_dialog">
                              <div class="window text-default ">
                                <div class="window-caption bg-brown fg-white">
                                    <span class="window-caption-icon"><span class="mif-hotel"></span></span>
                                    <span class="window-caption-title">Description of Leave</span>
                                    
                                </div>
                                <div id="id_leave_description" class=" window-content paddin20" style="width:400px;">                                     
                                   
                                                                       
                                </div>
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
         $(document).ready(function(){           
            $('#id_leaves_table').DataTable();            
            
        });
        function showDialog(id){
            var dialog = $(id).data('dialog');
            dialog.open();
        }
         
        
        
    </script>
    
</body>
</html>