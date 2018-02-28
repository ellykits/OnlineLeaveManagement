<?php 
require_once "../lib/Database.php";
require_once "../lib/Leaves.php";

if(isset($_POST['leave_code'])&& isset($_POST['response'])){
    $response = $_POST['response'];
    $leave_code = $_POST['leave_code'];
    
    $leave = new Leaves(new Database());
    $response_array = array(
        "leave_code" => $leave_code,
        "leave_status"=>$response      
        
    );
    $value = $leave->updateRecord("staff_leave",$response_array);
    
            $beginning_remarks = 'CONGRATULATIONS REQUEST APPROVED!';
            $mid_remarks = " We are glad to inform you that your request was SUCCESSFUL. ";
            $final_remarks ="\r\nHave a Good time!";
            
            if($response == "REJECTED"){
                $beginning_remarks = "SORRY REQUEST WAS REJECTED ";
                $final_remarks ="\r\nTry Next Time!";
                $mid_remarks =" HOWEVER your request was declined by the administration. ";
            }
            $recipient = $_POST['staff_email'];
            $subject ="OLMS LEAVE REQUEST";              
            $message = "Greetings!\r\n".$beginning_remarks." \r\nYou requested for leave using the Online Leave Management System (OLMS). 
            You posted the request it was seen and accepted by your supervisor.";
            $message = $message.$mid_remarks ;
            $message= $message."Here is the Final status for your request: <strong>". $response. " </strong> as decided by the administration.\r\n";    
           
            $message = $message."\r\n "."<strong>: ".$final_remarks."</strong>";    
           
            //Send the email to the spefied address 
            
            $header = "from: postmaster@localhost\r\n";
            $header .= "Content-Type: text/html\r\n";           
            $mail_success = mail($recipient,$subject,$message,$header);
            if($value && $mail_success){
                 echo "1";
            }else{
                echo "0";
            }        
}

?>