<?php 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$dbname="ems";
// Connect to server 
$con = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db($dbname) or die(mysql_error());
?>
