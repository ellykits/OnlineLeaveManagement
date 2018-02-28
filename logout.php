<?php

/**
 * @author nerdsofts 
 * @copyright 2016
 */

session_start();
unset($_SESSION['curr_user']);
unset($_SESSION['curr_staff_no']);
session_destroy();
header("location:index.php");
?>