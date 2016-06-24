<?php  
session_start(); 
$_SESSION['email'] = NULL; 
$_SESSION['full_name'] = NULL; 
// End All Session ID'S 
$_SESSION = array(); 
// KILL ALL SESSIONS 
session_destroy(); 
//Rdirect User our 
echo "
<script language=\"javascript\">
alert (\"Log out successfully!\");
</script>";

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<script language="javascript">
window.location.href="index.php";
</script>;
</body>
</html>
