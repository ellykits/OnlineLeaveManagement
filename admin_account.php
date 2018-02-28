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
    
    <title>OLMS</title>
    
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
<body class="container bg-img bg-grayLighter text-secondary">
    <div style="width: 30%;margin: 0px auto;margin-top: 15%;" class="align-center bg-white block-shadow-error padding50">
        <span class="mif-4x mif-info fg-red"></span>
        <h4>Contact Database Administrator to update your account details</h4>
    </div>
</body>
</html>