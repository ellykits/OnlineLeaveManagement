
/* Function to get XMLHTTPObject. it returns the object otherwise null*/
function getXMLHttpObject(){
    if(window.XMLHttpRequest){
        return new XMLHttpRequest();
    }else if(window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }else {
        return null;
    }
}


//This function checks if a user already exist in the database	 
function check_email_exist(){
    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
        alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }			
				
				xmlhttp.onreadystatechange = function (){
			     	if(xmlhttp.readyState == 4){
			         	   
					if (xmlhttp.responseText === "1"){
					     
                        $.Notify({
                            type: 'warning',
                            icon: "<span class='mif-warning'></span>", 
                            caption: 'Account Existing', 
                            keepOpen: 'true',
                            content: 'The email entered is already registered with another user!!'});
                               
                           setTimeout(function(){
                                    $.Notify({type: 'info',icon: "<span class='mif-info'></span>", caption: 'Try Again', content: 'Please try registering with another email.'});
                                }, 2000);
                   
					}else{
					    setTimeout(function(){
                                    $.Notify({type: 'info',icon: "<span class='mif-warning'></span>", caption: 'Unique User', content: 'Your email is accepted!!'});
                                }, 2000);
                           
                             
                   
                       
					}
                    
				}
			};	    
				var the_email = $("#id_uname").val();
				var url = "aux_checkuser.php?em="+the_email;
                
				xmlhttp.open("GET",url,true);
				xmlhttp.send(null);

}

///Testing function
 
 // Send password to the user 
function retreive_password(){
     var xmlhttp = getXMLHttpObject() ;	
     var the_email = $("#id_uname").val();
     
                if(xmlhttp == null){
                    alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
                }			
				
				xmlhttp.onreadystatechange = function (){
			     	if(xmlhttp.readyState == 4){
					if(xmlhttp.responseText === "true"){
					   //alert("Your password has been sent to this email: "+the_email);
                       $.Notify({
                            caption: 'Password Sent',
                            content: ' Your password has been sent to this email: '+the_email,
                            type: 'success',
                            keepOpen: 'true',
                            icon: "<span class='mif-info'></span>"
                        });
                        
					}else{
					    //alert("This email: "+the_email+" is not recognized in our database. please register first to continue");
					
                        $.Notify({
                            caption: 'UNRECOGNIZED EMAIL!',
                            content: ' This email '+the_email+' is not recognized in our database. Register first to continue.',
                            type: 'alert',
                            keepOpen: 'true',
                            icon: "<span class='mif-warning'></span>"
                        });
                    }
				}
			};	    
				
				var url = "ajax/aux_forgot_password.php?em="+the_email;
               
				xmlhttp.open("GET",url,true);
				xmlhttp.send(null);
}
//Data functions 
/** This section of AJAX script deals with selection of data from the business database based on 
the beginnig letter of alphabet */
function add_branches(){

    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            //alert(xmlhttp.responseText)
            if(xmlhttp.responseText == 1){
                 var dept_code =$("#id_dept_code").val();                 
                 load_branches(dept_code);
            }else{
                
                $.Notify({
                    caption: 'ERROR ',
                    content: ' Error occured while adding the new branch',
                    type: 'alert',
                    keepOpen: 'false',
                    icon: "<span class='mif-blocked'></span>"
                });
                $.Notify({
                    caption: 'INFO ',
                    content: ' There is a branch with the same branch code already existing or You didnt save the department in the previous tab',  
                    keepOpen: 'false',                 
                    icon: "<span class='mif-warning'></span>"
                });
            }
           
        }
    };
    
    
  //Get the data to send first
    var dept_code =encodeURIComponent( $("#id_dept_code").val());
    var branch_code =encodeURIComponent( $("#id_branch_code").val());
    var branch_name =encodeURIComponent( $("#id_branch_name").val());
    
    //Open the Ajax using POST method
    var url = "ajax/aux_add_branch.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params ="dept_code="+dept_code +"&branch_code="+branch_code +"&branch_name="+branch_name;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
    
}


function add_job(){

    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
           //alert(xmlhttp.responseText)
            if(xmlhttp.responseText == 1){
                 var selected_branch_code =$("#id_branch_selection").text(); 
                 //alert(selected_branch_code) ;               
                 load_jobs(selected_branch_code);
            }else{
                
                $.Notify({
                    caption: 'ERROR ',
                    content: ' Error occured while adding the new job',
                    type: 'alert',
                    keepOpen: 'false',
                    icon: "<span class='mif-blocked'></span>"
                });
                $.Notify({
                    caption: 'INFO ',
                    content: ' There is a job with the same job code already existing or You didnt save the branch in the previous tab',  
                    keepOpen: 'false',                 
                    icon: "<span class='mif-warning'></span>"
                });
            }
           
        }
    };
    
    
  //Get the data to send first
    var job_code =encodeURIComponent( $("#id_job_code").val());
    var branch_code =encodeURIComponent( $("#id_branch_selection").val());
    var job_title =encodeURIComponent( $("#id_job_title").val());
    
    //Open the Ajax using POST method
    var url = "ajax/aux_add_job.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params ="job_code="+job_code +"&branch_code="+branch_code +"&job_title="+job_title;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
    
}

function add_department(){

    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            //alert(xmlhttp.responseText)
            if(xmlhttp.responseText == 1){
                 $.Notify({
                        caption: 'Department Added',
                        content: 'Department has been added successfully!',
                        keepOpen: false
                    });
            }else{
                
                $.Notify({
                    caption: 'ERROR ',
                    content: ' Error occured while adding the new department',
                    type: 'alert',
                    keepOpen: 'false',
                    icon: "<span class='mif-blocked'></span>"
                });
                $.Notify({
                    caption: 'DEPARTMENT EXIST ',
                    content: ' There is a department with the same department code already existing',                   
                    icon: "<span class='mif-warning'></span>"
                });
            }
           
        }
    };
    
    
  //Get the data to send first
    var dept_code =encodeURIComponent( $("#id_dept_code").val());
    var dept_name =encodeURIComponent( $("#id_dept_name").val());
    var category =encodeURIComponent( $("#id_category").val());
    var dept_desc =encodeURIComponent( $("#id_dept_desc").val());
    
    //Open the Ajax using POST method
    var url = "ajax/aux_add_department.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params = "dept_desc="+dept_desc + "&dept_code="+dept_code + "&dept_name="+dept_name + "&category="+category;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
    
}

/** A function that populates a selection element or a dropdown element 
variables
    -unique_id - id for the element that contains the field you want to filter the records with from the 
    table
    -id_of_element - the id used to identify the select input/dropdown that you want to populate with records
    -flag - used to differentiate the particular action you want to perform. whethr to pupulate branches, department, employees etc
    
**/
function populate_dropdown_element(unique_id,id_of_element,flag){
    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            //alert(xmlhttp.responseText)             
            
                $(id_of_element).html("");
                $(id_of_element).append(xmlhttp.responseText);
          
           
        }
    };
    
    
  //Get the data to send first
    
    var field_code = encodeURIComponent($(unique_id).val());
   
    
    //Open the Ajax using POST method
    var url = "ajax/aux_populate_element.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params ="field_code="+field_code+"&flag="+flag;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
}


function load_branches(dept_code){
    
    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            //alert(xmlhttp.responseText)
            
                $("#id_branches_list").html(xmlhttp.responseText);  
                $('.table').DataTable();               
          
           
        }
    };
    
    
  //Get the data to send first
    var dept_code = encodeURIComponent( $("#id_dept_code").val());
   
    
    //Open the Ajax using POST method
    var url = "ajax/aux_load_branches.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params ="dept_code="+dept_code;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
}

function load_jobs(branch_code){
    
    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            //alert(xmlhttp.responseText)            
            $("#id_jobs_list").html(xmlhttp.responseText);   
            $('.table').DataTable();            
        }
    };
    
    
  //Get the data to send first
    var branch_code = encodeURIComponent( $("#id_branch_selection").val());   
    
    //Open the Ajax using POST method
    var url = "ajax/aux_load_jobs.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params ="branch_code="+branch_code;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
}
//Delete selected staff by ajax 
function deleteSelectedStaffs(){
    var selected_staffs =$('#id_del_selection').val();
   $.post('ajax/aux_delete_staffs.php',{del_selection:selected_staffs})
}
function clear_dept_details(){
     $("#id_dept_code").val("");
    $("#id_dept_name").val("");
   $("#id_category").val("");
    $("#id_dept_desc").val("");
    $("#id_dept_code").focus();
}
function clear_branch_details(){
     $("#id_branch_code").val("");
    $("#id_branch_name").val("");   
    $("#id_branch_name").focus();
}
function clear_job_details(){
     $("#id_job_title").val("");
    $("#id_job_code").val("");   
    $("#id_job_title").focus();
}

///Leaves
function load_filtered_leaves(staff,status){
    
    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            //alert(xmlhttp.responseText)            
            $("#id_filtered_leaves").html(xmlhttp.responseText); 
            $("#id_leaves_table").dataTable({
                dom: 'Bfrtip',
                 buttons: [
                     'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
            });             
        }
    };
    
    
  //Get the data to send first then encode
     
    staff = encodeURIComponent(staff);
    status = encodeURIComponent(status);
    
    //Open the Ajax using POST method
    var url = "ajax/aux_filter_leaves.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params ="staff="+staff+"&status="+status;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
}
function load_all_filtered_leaves(status){
    
    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            //alert(xmlhttp.responseText)            
            $("#id_filtered_leaves").html(xmlhttp.responseText); 
            $("#id_leaves_table").dataTable({
                dom: 'Bfrtip',
                 buttons: [
                     'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
            });             
        }
    };
    
    
  //Get the data to send first then encode     
    
    status = encodeURIComponent(status);
    
    //Open the Ajax using POST method
    var url = "ajax/aux_filter_all_leaves.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params ="status="+status;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
}

///Supervisors and Aminidtrator  scripts
function getLeaveDetails(element){
            //Set the leave_code via data attribute for purposes reference in the database.
            //NOTE: This is very important.
            var l_code =  element.getAttribute('data-leave-code');          
             $("#id_leave_code").val(l_code); 
              var l_code =  element.getAttribute('data-leave-code');          
             $("#id_staff_email").val(l_code); 
              
            var reason = element.getAttribute('data-leave-reason');
            var leave_type = element.getAttribute('data-leave-type');
            var staff_name = element.getAttribute('data-staff-name');
            var staff_no = element.getAttribute('data-staff-no');
            var start_date = element.getAttribute('data-start-date');
            var end_date = element.getAttribute('data-end-date');
             //Update the div with records about the leave
             $('#id_leave_description').html("<h4 class='align-center uppercase'>"+leave_type+" Request</h4><hr class='thin bg-brown'/>'");
             $('#id_leave_description').append("<p class='uppercasealign-justify'><strong>Name of Staff: </strong>"+staff_name+"</p>");
             $('#id_leave_description').append("<p class='uppercasealign-justify'><strong>Staff Number: </strong>"+staff_no+"</p>");
             $('#id_leave_description').append("<p><strong> BEGINING <span class='fg-green'> "+start_date+" </span></strong> <strong> TO <span class='fg-red'>"+end_date+"</span></strong></p>");                    
             $('#id_leave_description').append("<p class='uppercase align-center text-bold'>Reason(s)</p>") ; 
             $('#id_leave_description').append("<p class='align-justify text-dashed text-italic padding10'>"+reason+"</p>") ;                        
         }
function response_to_leave(supa_response,leave_code){
    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            // alert(xmlhttp.responseText);
            if(xmlhttp.responseText =="1"){
               
                 window.location = "supervisor_approve.php";
                $("#id_leaves_table").dataTable(); 
            }else{
               $.Notify({
                    caption: 'ERROR IN SUBMISSION',
                    content: ' Error occured while submitting your respone',
                    type: 'alert',
                    keepOpen: 'false',
                    icon: "<span class='mif-blocked'></span>"
                }); 
            }
                       
        }
    };
    
    
  //Get the data to send first then encode     
   // $('#id_supervisor_response').val("ACCEPTED");
   // $('#id_supervisor_status').val("SEEN BY SUPERVISOR");
    //var supervisor_response = $('#id_supervisor_response').val();
   // var supervisor_status = $('#id_supervisor_status').val();
    leave_code = encodeURIComponent(leave_code);
    supa_response = encodeURIComponent(supa_response);
    //supa_status = encodeURIComponent(supervisor_status);
    
    //Open the Ajax using POST method
    var url = "ajax/aux_supervisor_response.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params ="response="+supa_response+"&leave_code="+leave_code;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
   
    //alert (supervisor_response);
}
function final_response_to_leave(admin_response,leave_code){
    var xmlhttp = getXMLHttpObject() ;	
    if(xmlhttp == null){
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
    }	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            // alert(xmlhttp.responseText);
            if(xmlhttp.responseText =="1"){
               $.Notify({
                        type:'success',
                        caption: 'Email Sent',
                        content: 'An email notification has been sent to the user about their final status of leave request',
                        keepOpen: false
                    });
                 window.location = "leave_approve.php";
                $("#id_leaves_table").dataTable(); 
            }else{
               $.Notify({
                    caption: 'ERROR IN SUBMISSION',
                    content: ' Error occured while submitting your respone',
                    type: 'alert',
                    keepOpen: 'false',
                    icon: "<span class='mif-blocked'></span>"
                }); 
            }
                       
        }
    };
    
    
  //Get the data to send first then encode     
   // $('#id_supervisor_response').val("ACCEPTED");
   // $('#id_supervisor_status').val("SEEN BY SUPERVISOR");
    //var supervisor_response = $('#id_supervisor_response').val();
   // var supervisor_status = $('#id_supervisor_status').val();
    leave_code = encodeURIComponent(leave_code);
    admin_response = encodeURIComponent(admin_response);
    var staff_email = encodeURIComponent($('#id_staff_email').val()); //This email address will be used to send email to the employee to inform them about the final status of their leave request
    //supa_status = encodeURIComponent(supervisor_status);
    
    //Open the Ajax using POST method
    var url = "ajax/aux_admin_response.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params ="response="+admin_response+"&leave_code="+leave_code+"&staff_email="+staff_email;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
   
    //alert (supervisor_response);
}


 