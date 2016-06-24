<?php 
session_start();
if(isset($_SESSION['email'])){
}else{
include "log.php";
exit();
}
$event_id=$_COOKIE["event_id"];
$text= $_POST["tt"];
include "conn.php";
for ($i=1; $i<=$text; $i++){
$tex="opt_desc"."$i";
$mad="opt_mand"."$i";
$opt=$_POST["$tex"];
$mand=$_POST["$mad"];

$query = "INSERT INTO customised(event_id,item,is_opt,mandatory) VALUES ('$event_id','$opt','0','$mand')";
mysql_query($query) or die(mysql_error());
header("Location: registration_link.php?is_save=0");
}

include "close.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
