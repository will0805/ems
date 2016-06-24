<?php 
session_start();
include "conn.php";
$email = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user where email='$email' and pwd='$password'";

$result = mysql_query($query);

if (mysql_num_rows($result) != 1) { 
	echo "
<script language=\"javascript\">
alert (\"The email or password is not correct!\");
</script>";
}
 else {
 	$row = mysql_fetch_array($result);
  $first_name=$row["firstname"];
  $last_name=$row["lastname"];
  $full_name=$first_name." ".$last_name;
    $_SESSION['email'] = $email;
    $_SESSION['full_name'] =  $full_name;
    echo "
  <script language=\"javascript\">
alert (\"You have logged in successfully!\");
</script>";
}
    include "close.php";
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log in</title>

</head>

<body>
<script language="javascript">
window.location.href="index.php";
</script>;	
</body>
</html>