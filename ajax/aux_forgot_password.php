<?php
require_once "../lib/Database.php";
    $db = new Database();
    $dbc =$db->connectToDatabase();
    $found_password = "false";
    if(isset($_GET['em'])){
     
     $username = stripcslashes($_GET['em']);
     
     global $dbc;  
    
     $query = $dbc->query("SELECT nat_id FROM staff WHERE email = '$username'");
 
      if(!$query){
         die("SQL Error".$dbc->error);
      }else {
        
       if($query->num_rows > 0){
            global $found_password;
            $row = $query->fetch_assoc();
             
              //Get the password to send to the user
            $the_password = $row['nat_id'];
            $recipient = $_GET['em'];
            $subject ="Retrieve your forgotten password (Expert Essay)";       
            $message = "Here is your user password. use this to login to your account next time\r\n You can always change this password later in your account";    
            $message = $message."\r\n "."password: ". $the_password;    
  
            //Send the eamil to the spefied address and direct to the place order page;    
            $header = "from: postmaster@localhost\r\n";
            $header .= "Content-Type: text/html\r\n";
           //Send the email
            $mail_success = mail($recipient,$subject,$message,$header);
            if($mail_success){
                global $found_password;
                 $found_password = "true";
            }
        
            
      }else{
          $found_password = "false";
      }
      echo $found_password;
    
    }
 }
 ?>