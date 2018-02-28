<?php

/**
 * @author nerdsofts
 * 
 * @copyright 2016
 */
require_once "../lib/Database.php";
$the_email = stripcslashes($_GET['em']);
$str = "";
$dbc = new Database();
$query = $dbc->query('
            SELECT
                email
            FROM
                staff
            WHERE
                email = ?
           
        ', array($the_email));

/*Check if there is a record retreived from the database
If a record is found return a false statement to prevent submiting the form 
otherwise return true to submit the form 
*/
$row = $query->num_rows;
if( $row >0){
        global $str;
        //There is a user with that email existing therefore do not submit. but request for password. 
        $str = "1"  
            
        ;
    }else{
         //There is NO user with that email already existing . create account and then send email.
        $str = "0";
    }
   
    echo $str;


?>