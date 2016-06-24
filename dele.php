<?php 
session_start();
if(isset($_SESSION['email'])){
}else{
include "log.php";
exit();
}

if(!empty($_POST["selection"]))
 {
   include "conn.php";
   foreach($_POST["selection"] as $key)
   {
   	
	 mysql_query("DELETE FROM event WHERE event_id='$key'");
	 mysql_query("DELETE FROM customised WHERE event_id='$key'");
	 mysql_query("DELETE FROM customised_reg WHERE event_id='$key'");
	 mysql_query("DELETE FROM doctype WHERE event_id='$key'");
	 mysql_query("DELETE FROM reg_doc WHERE event_id='$key'");
	 mysql_query("DELETE FROM reg WHERE event_id='$key'");
	  
	}
	echo "<script>alert('You have deleted the event!');</script>";
	include "close.php";
	}
else
{
	 echo "<script>alert('Please select the event you want to delete!');</script>";
	 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script    language="JavaScript"> 
	window.location="deleteform.php";
</script>
</head>

<body>
</body>
</html>
