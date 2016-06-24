<?php 
session_start();
if(isset($_SESSION['email'])){
}else{
include "log.php";
exit();
}
include "conn.php";
$id=$_GET["id"];
$event_id=$_GET['event_id'];
mysql_query("DELETE FROM customised WHERE custom_id='$id'");
include "close.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script    language="JavaScript"> 
	window.location="edit_content.php?event_id=<?php echo $event_id ?>";
</script>
</head>

<body>
</body>
</html>
