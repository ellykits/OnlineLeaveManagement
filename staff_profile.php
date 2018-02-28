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
    
    <title>STAFF PROFILE</title>
    
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
                         <div class="row">
                                                    <div class="cell">
                                                        <div class="text-secondary padding20 fg-white bg-lighterBlue no-phone">
                                                           Below are your personal details. <strong>NOTE:</strong> In case the details are not correct, contact your <strong>Supervisor or Head of Human Resource</strong> to make the necessary changes
                                                        </div>
                                                    </div>
                                            </div>
                        <div class="row">
                            <div class="cell padding10">
                                    
                                 <?php  
                                    require_once "lib/Database.php";
                                    require_once "lib/Staff.php";                                    
                                    $staff = new Staff(new Database);
                                    $results = $staff->getProfile($_SESSION['curr_staff_no']);
                                    
                                  ?>
                                  <div class="grid">
                                    <div class="row cells2 padding5">
                                        <div class="cell">
                                             <h5 class="fg-crimson align-center " >Personal Details</h5><hr class="thin bg-brown"/> 
                                              <p class="text-default capital"><strong>Name: </strong><?php echo $results['staff_name'];?></p>
                                              <p class="text-default capital"><strong>Employee No: </strong><?php echo $results['staff_no'];?></p>  
                                              <p class="text-default capital"><strong>Gender: </strong><?php echo $results['gender'];?></p>  
                                              <p class="text-default capital"><strong>Marital Status: </strong><?php echo $results['marital_stat'];?></p>  
                                              <p class="text-default capital"><strong>Employee No: </strong><?php echo $results['staff_no'];?></p>  
                                 
                                        </div>
                                        <div class="cell">
                                             <h5  class="fg-crimson align-center ">Contact Details</h5><hr class="thin bg-brown"/>
                                              <p class="text-default capital"><strong>Physical Address: </strong><?php echo $results['p_address'];?></p>
                                              <p class="text-default capital"><strong>Postal Code: </strong><?php echo $results['p_code'];?></p>  
                                              <p class="text-default capital"><strong>Town/City: </strong><?php echo $results['town'];?></p>  
                                              <p class="text-default capital"><strong>Phone NO.: </strong><?php echo $results['phone_no'];?></p>  
                                              <p class="text-default capital"><strong>Email address: </strong><span class="lowercase"><?php echo $results['email'];?></span></p>  
                                  
                                        </div>
                                    </div>
                                    <div class="row cells2 padding5 bg-grayLighter">
                                        <div class="cell">
                                             <h5 class="fg-crimson align-center" >Job Details</h5><hr class="thin bg-brown"/> 
                                              <p class="text-default capital"><strong>Job Title: </strong><span class="capital"><?php echo $results['job_title'];?></span></p>
                                              <p class="text-default capital"><strong>Branch Code: </strong><?php echo $results['branch'];?></p>  
                                              <p class="text-default capital"><strong>Deptartment Code: </strong><?php echo $results['dept'];?></p>  
                                              <p class="text-default capital"><strong>Date Employed: </strong><?php echo $results['emp_date'];?></p>  
                                              <p class="text-default capital"><strong>Role: </strong><?php echo $results['role'];?></p>
                                              <p class="text-default capital"><strong>KRA No: </strong><span class="uppercase"><?php echo $results['kra'];?></span></p>  
                                 
                                        </div>
                                        <div class="cell">
                                             <h5  class="fg-crimson align-center ">Other Details</h5><hr class="thin bg-brown"/>
                                              <p class="text-default capital"><strong>Pay Rate: </strong><?php echo $results['pay_rate'];?></p>
                                              <p class="text-default capital"><strong>Pay Method: </strong><?php echo $results['pay_method'];?></p>  
                                              <p class="text-default capital"><strong>Pay Status: </strong><?php echo $results['pay_status'];?></p>  
                                              <p class="text-default capital"><strong>Contract: </strong><?php echo $results['contract'];?></p> 
                                              <p class="text-default capital"><strong>NHIF: </strong><span class="lowercase"><?php echo $results['nhif'];?></span></p> 
                                              <p class="text-default capital"><strong>NSSF: </strong><span class="uppercase"><?php echo $results['nssf'];?></span></p>
                                                
                                  
                                        </div>
                                    </div>
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
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/data.js"></script>
    <script src="js/metro.js"></script> 
      
    <script type="text/javascript">
        
    </script>
</body>
</html>