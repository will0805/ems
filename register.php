<?php 
include 'conn.php';
$email = $_POST['email'];    
$password = md5($_POST['password']);
$first_name = $_POST['first_name'];
$last_name =$_POST['last_name'];

$checkuser = mysql_query("SELECT * FROM user WHERE email='$email'"); 

$username_exist = mysql_num_rows($checkuser);

if($username_exist > 0){
    echo "
     <script language=\"javascript\">
alert(\"the email you specified has already been taken.  Please pick another one.\")
window.location.href=\"index.php\";
     </script>";
    unset($email);
    
    exit();
}
$query = "INSERT INTO user (email, pwd,firstname,lastname)
VALUES('$email', '$password', '$first_name', '$last_name')";
mysql_query($query) or die(mysql_error());
mysql_close();
echo "
<script language=\"javascript\">
alert (\"You have successfully Registered!\");
window.location.href=\"index.php\";
</script>";
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
