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
    
    <title>EDIT DEPARTMENT</title>
    
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">    
    <link href="css/metro-schemes.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="js/jtable/themes/lightcolor/red/jtable.css" rel="stylesheet"/>
      
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
                        <li><a href="admin_page.php"><span class="mif mif-home">Home</span></a></li>
                                          
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
                                 <h3 class="margin20 no-margin-left uppercase no-margin-top align-center light fg-crimson"> Edit Department</h3>
                                
                                  <div class="grid">                                    
                                    <div class="row">
                                        <div id="DeptsTableContainer"> 
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
    <script src="js/data.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jtable/jquery.jtable.js"></script>
    
    <script type="text/javascript">
    
        function populate_depts(){                     
            $.ajax({                                                    
                url: 'ajax/aux_display_depts.php',
                type: 'GET',
                data:{'page':1},                                                    
                beforeSend: function(x) {
                if (x && x.overrideMimeType) {
                    x.overrideMimeType("application/j-son;charset=UTF-8");
                    }
                },
                success: function(result) {                                                        
                    $('#DeptsTableContainer').html('<p>'+result+'</p>');
                },
                error: function(jqxhr,textStatus,errorThrown) {
                    // alert('There is FAILURE here');
                    $('#DeptsTableContainer').html("<h3 class='fg-red no-margin-bottom'>Errors encountered</h3>"+
                    "<p class='fg-white padding5 bg-lightRed'>[-] "+ textStatus + "<br/>[-] "+errorThrown.message+"</p>"
                    );
                    console.log(jqxhr);
                }
                                                   
            });
        }
         $(document).ready(function(){
            
            
            
			$('#DeptsTableContainer').jtable({
				title: 'Table of Departments',
                selecting:true,
                selectingCheckboxes:true,
                multiselect:true,
				paging: true,
                pageSize:10,
                pageList:'normal',			
				sorting: true,
				defaultSorting: 'dept_name ASC',
				actions: {
					listAction: 'ajax/aux_dept_actions.php?action=list',
					createAction: 'ajax/aux_dept_actions.php?action=create',
					updateAction: 'ajax/aux_dept_actions.php?action=update',
					deleteAction: 'ajax/aux_dept_actions.php?action=delete'
				},
				fields: {
					dept_code: {
                        key:true,
						list: true,
                        width:'20%',
                        title:'Dept Code/No.',
                        create: true,
						edit: true
					},
					dept_name: {
						title: 'Name of Department',
						width: '30%'
					},
					category: {
						title: 'Category',
						width: '20%'
					},
					dept_desc: {
						title: 'Description',
						width: '30%',
						type: 'textarea',
						create: true,
						edit: true,
                        list:false
					}
				}
			});		
             $('#DeptsTableContainer').jtable('load');            
             $('#DeptsTableContainer').jtable('option', 'paging', true);
  	});	           
    </script>   
  
     
   
</body>
</html>
