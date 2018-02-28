<?php
   session_start(); 
/**
 * @author nerdsofts
 * 
 * @copyright 2016
 */

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
    <link href="css/style.css" rel="stylesheet">
    <link href="css/paginate.css" rel="stylesheet">
    <style type="text/css">
        .bg-img {
          background-image:url(images/bg3.jpg);
          background-repeat: repeat-x;
          background-position: center;
            
        }
    </style>
</head>
<body class="bg-img bg-grayLighter">
    <div class="">
        <header class="no-margin-left no-margin-right">
      
             <div class=" app-bar red " data-role="appbar">
                    <a class="app-bar-element branding"><h3><strong>OLMS</strong></h3></a>
                    <span class="app-bar-divider"></span>
                    <ul class="app-bar-menu">                      
                        <li >
                            <a  href="" class="dropdown-toggle">Support</a>
                            <ul class="d-menu" data-role="dropdown">
                                                            
                                <li><a href="faq.html">How to use</a></li>
                                <li><a href="types_of_leave.php">Types of Leaves</a></li>
                                
                            </ul>
                        </li>
                        
                      
                    </ul>
                    
                   
                </div>
        </header>
    
    
      <div class="page-content">
        <div class=" fg-black align-center">
            <div class="container">
                <div class="no-overflow" style="padding-top: 40px">                   
                    <br />                    
                   
                    <div style="width: 35%; margin: 0px auto;">
                        <div class="cell">
                            <form data-hint-background="bg-yellow" data-hint-color="fg-white" data-hint-mode="line" data-role="validator" method="POST">
                                <div class="grid bg-white shadow  no-margin-top padding10">
                                                        <h3 class="f=align-center text-shadow text-bold">LOGIN TO SERVICE</h3>
                                                        <div class="row no-margin">
                                                            <div class="cell">                                                               
                                                                <div class="input-control modern text   full-size" data-role="input">
                                                                    <input                                                                   
                                                                    data-validate-func="email"                                                                    
                                                                    data-validate-hint="Please enter a valid email address!" type="text" id="id_uname" name="uname" />
                                                                    <span class="input-state-error mif-warning"></span>
                                                                    <span class="input-state-success mif-checkmark"></span>
                                                                    <span class="informer">Please enter your login email or username</span>
                                                                    <span class="placeholder">Input email</span>
                                                                    
                                                                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                                                                </div>
                                                            </div>                                                  
                                                        </div>
                                                        <div class="row no-margin cell">
                                                            <div class="cell">                                                               
                                                                <div class="input-control modern  password full-size" data-role="input">
                                                                    <input                                                                     
                                                                     data-validate-func="minlength" 
                                                                     data-validate-arg="6"                                                                   
                                                                     data-validate-hint="Valid password has 6 or more characters!"                                                                                                                                  
                                                                     type="password" id="id_pswd" name="pswd"/>
                                                                      <span class="input-state-error mif-warning"></span>
                                                                      <span class="input-state-success mif-checkmark"></span>
                                                                      <span class="informer">Please enter your login password</span>
                                                                        <span class="placeholder">Input password</span>
                                                                    <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                                                                </div>
                                                            </div>                                                  
                                                        </div>
                                                         <br />
                                                        <div class="row">
                                                            <div class="cell align-center">
                                                                <button type="submit" class=" button loading-pulse lighten default">Submit</button>
                                                                <button onclick="retreive_password()"class="button fg-red lighten link">Forgot password?</button>
                                                            </div>                                                                                                              
                                                        </div>
                                                    </div><!-- End of unregisterd users grid panel !-->
                                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="grid">
    </div>
    <footer class="fixed-bottom bg-darkGray">
        <div class="bottom-menu-wrapper">
            <ul class="horizontal-menu fg-white compact">
                <li><a>&copy; 2017 </a></li>                
                <li class="place-right"><a href="#">Advertise</a></li>
                <li class="place-right"><a href="#">Help</a></li>
                <li class="place-right"><a href="#">Feedback</a></li>
            </ul>
        </div>
    </footer>
    </div><!--End of container div-->
    
    
    <!-- Scripts goes here ...-->
    
    
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/data.js"></script>
    <script src="js/metro.js"></script>   
   
</body>
</html>
<?php 
require_once "lib/Database.php";
require_once "lib/Staff.php";

if(isset($_POST['uname'])&& isset($_POST['pswd'])){
    $db = new Database();
    $db_conn = $db->connectToDatabase();                                    
    $new_staff = new Staff(new $db);
    
    $uname = $db->postElements($_POST['uname']);
    $pswd = $db->postElements($_POST['pswd']);
    $new_staff->loginStaff($uname,$pswd);
}
 ob_flush();
 


?>