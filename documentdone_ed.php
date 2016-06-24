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
$doc_req=$_POST["doc_req"."$i"];
if(!empty($_POST["doctype"."$i"]))
{
	 $type=$_POST["doctype"."$i"];
   //$type= substr($type,0,strlen($type)-1);
   $query = "INSERT INTO doctype(event_id,doc_type,doc_req) VALUES ('$event_id','$type[0]','$doc_req')";
   mysql_query($query) or die(mysql_error());
}
}
header("Location: edit_content.php?event_id=".$event_id);
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