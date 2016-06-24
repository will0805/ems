<?php 
session_start();
if(isset($_SESSION['email'])){
}else{
include "log.php";
exit();
}
include "conn.php";
$event_id=$_COOKIE["event_id"];
$opt= $_POST["op"];
$item= $_POST["opt_desc"];
$mand= $_POST["opt_mand"];
$opti="";
for ($i=1; $i<=$opt; $i++){
$text="options"."$i";
$opti .= $_POST[$text].";";
}

$opti= substr($opti,0,strlen($opti)-1);
//echo $mand;
mysql_query("INSERT INTO customised (event_id, opt_content,item,is_opt,mandatory,is_mulchoice) VALUES ('$event_id','$opti','$item','1','$mand','0')");

//mysql_query($query) or die(mysql_error());exit;
header("Location: registration_link.php?is_save=0");
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
<?php 
include "close.php";
?>