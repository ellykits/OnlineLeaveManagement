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
    
    <title>REQUEST LEAVE </title>
    
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
                        <div class="row">
                            <div class="cell padding10">
                               <form class='bg-lighterGray padding5'method="POST" style="width: 70%; margin: 0px auto;">
                                <div class="grid no-margin"> 
                                        <h3 class="align-center">Description of leave </h3> <hr class="thin bg-brown" />   <br />                                      
                                                        <div class="row no-margin cells2">
                                                            
                                                            <div class="cell">
                                                                <label for="staff_no">Staff No </label>
                                                                <div class="  input-control full-size text">
                                                                    <select id="id_staff_no" name="staff_no">
                                                                       <?php 
                                                                           require_once "lib/Database.php";
                                                                           require_once "lib/Staff.php";
                                                                           $staff = new Staff(new Database);
                                                                           $staff->populateStaffs();
                                                                        ?>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                             <div class="cell">
                                                                <label for="leave_type"> *Type of Leave  </label>
                                                                <div class="  input-control full-size text">
                                                                    <select  id="id_leave_type" name="leave_type">
                                                                        <option selected="selected" value="">--select--</option>
                                                                        <option>Maternity/Parternity Leave</option>
                                                                        <option>Special Leave</option>
                                                                        <option>Study Leave</option>
                                                                        <option>Sick Leave</option>
                                                                        <option>Sabbatical Leave</option>
                                                                        <option>Leave of Absence</option>
                                                                        <option>Annual Leave</option>
                                                                        <option>Family Responsibility Leave</option>
                                                                        <option>Religious Holiday Leave</option>
                                                                        <option>Unpaid Leave</option>                                                                        
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>  
                                                            
                                                        </div>                                                   
                                                       
                                                        <div class="row cells2 no-margin">
                                                            <div class="cell">
                                                                <label for="start_date"> *Start Date </label>
                                                                <div class="input-control text full-size" id="datepicker" data-role="datepicker" data-date="1972-12-21" data-format="mmmm d, yyyy">
                                                                    <input required type="text" id="id_start_date" name="start_date" required >
                                                                    <button class="button"><span class="mif-calendar"></span></button>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                                <label for="end_date"> *End Date </label>
                                                                <div class="input-control text full-size" id="datepicker" data-role="datepicker" data-date="1972-12-21" data-format="mmmm d, yyyy">
                                                                    <input required type="text" id="id_end_date" name="end_date" required >
                                                                    <button class="button"><span class="mif-calendar"></span></button>
                                                                </div>
                                                            </div>
                                                                                                               
                                                        </div>
                                                         <div class="row cells1 no-margin">
                                                           
                                                            <div class="cell">
                                                                <label for="reason">Reason<span class="text-small">(1000 characters only)</span> </label>
                                                                <div class="  input-control full-size textarea">
                                                                    <textarea id="id_reason" name="reason"></textarea>                                                                
                                                                </div>
                                                            </div>                                                       
                                                        </div>
                                                        <button type="submit" class="align-center default button"><span class="mif-return-key icon"></span> Submit</button>
                                                        <button type="reset" class="align-center alert button"><span class="mif-cross icon"></span> Clear</button>
                                        </div>
                               </form> 
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
       
    </script>
</body>
</html>
<?php
require_once "lib/Database.php";
require_once "lib/Staff.php";

$new_employee = new Staff(new Database);


if(isset($_POST['leave_type']) && isset($_POST['start_date']) && isset ($_POST['end_date'])){
    $staff_no = $_POST['staff_no'];
    $start_date = date("Y-m-d",strtotime($_POST['start_date']));
    $end_date = date("Y-m-d",strtotime($_POST['end_date']));
    $leave_type = $_POST['leave_type'];
    $reason = $_POST['reason'];
    $leave_id = "LEV/".rand(0,1000)."/".date("ymd");
    $approver = "ACCEPTED";
    
   
   $leave_details = array(
    'leave_code' => $leave_id,
    'staff_no' => $staff_no,
    'leave_type'=>$leave_type,
    'start_date'=>$start_date,
    'end_date'=>$end_date,
    'reason'=>$reason,
    'leave_status'=>'POSTED',
    'approver'=>$approver
   
    );
    
    //Add the leave details to the staff_leaves table
    $new_employee->requestLeave("staff_leave",$leave_details); 
   
    
}

?>