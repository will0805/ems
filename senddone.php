<?php 
session_start();
$name=$post["name"];
$email_add=$post["email"];
$message=$post["message"];
mail($email_add,"Contact information from ".$name,$message,$name);						
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script    language="JavaScript">   
	alert ("Your emails have been sent!");
	window.location="index.php";
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
