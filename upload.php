<?php
session_start();
include "conn.php";

$salu=$_POST['salut'];
$lastname=$_POST['last_name'];
$firstname=$_POST['firstname'];
$reg_email=$_POST['reg_email'];
$reg_contact=$_POST['reg_contact'];
$event_id=$_POST["ev"];
$query=("INSERT INTO reg (event_id, salutation, lastname, firstname, email, contact_no)
VALUES ('$event_id', '$salu', '$lastname', '$firstname', '$reg_email', '$reg_contact')");
mysql_query($query) or die(mysql_error());
$result=mysql_query("SELECT * from reg where email='$reg_email' order by reg_id desc");
$row = mysql_fetch_array($result);
$reg_id=$row['reg_id'];

$j=$_POST['j1'];
if($j!=0)
{
$iterm=$_POST['manopt_item'];
for($n=1;$n<=$j;$n++)
{
	$opt=$_POST['manopt'.$n];
	$item=$iterm[$n-1];
	$query=("INSERT INTO customised_reg (reg_id,event_id,iterm,opt)
VALUES ('$reg_id','$event_id', '$item', '$opt[0]')");
  mysql_query($query) or die(mysql_error());
}
}

$j=$_POST['i1'];
if($j!=0)
{
$iterm=$_POST['manmulopt_iterm'];
for($n=1;$n<=$j;$n++)
{
	$opt=$_POST['manmul_opt'.$n];
	$item=$iterm[$n-1];
	$content="";
	foreach($opt as $ans)
		{
			$content.=$ans.";";
		}
		$query=("INSERT INTO customised_reg (reg_id,event_id,iterm,opt)
VALUES ('$reg_id','$event_id', '$item', '$content')");
  mysql_query($query) or die(mysql_error());
}
}
$j=$_POST['j2'];
for($n=1;$n<=$j;$n++)
{
if(!empty($_POST['opt'.$n]))
{
 $opt=$_POST['opt'.$n];
 $array = explode(';',$opt);
 $item=$array[0];
 $option=$array[1];
 $query=("INSERT INTO customised_reg (reg_id,event_id,iterm,opt)
VALUES ('$reg_id','$event_id', '$item', '$option')");
  mysql_query($query) or die(mysql_error());
}
}

$j=$_POST['i2'];
for($n=1;$n<=$j;$n++)
{
	if(!empty($_POST['mul_opt'.$n]))
	{
		$opt=$_POST['mul_opt'.$n];
		$content='';
    foreach($opt as $ans)
    {
    	 $array = explode(';',$ans);
    	 $content.=$array[1].";";
    	 $item=$array[0];
    }
     $query=("INSERT INTO customised_reg (reg_id,event_id,iterm,opt)
VALUES ('$reg_id','$event_id', '$item', '$content')");
  mysql_query($query) or die(mysql_error());
	}
}
$is_ques1=$_POST['is_ques1'];
if($is_ques1==1)
{
	$iterm=$_POST['mannonopt_iterm'];
	$ques=$_POST['mannon_opt'];
	for($i=0;$i< count($iterm);$i++)
	{
		$item=$iterm[$i];
		$qu=$ques[$i];
	 $query=("INSERT INTO customised_reg (reg_id,event_id,iterm,opt)
VALUES ('$reg_id','$event_id', '$item', '$qu')");
  mysql_query($query) or die(mysql_error());
 }
}
$is_ques2=$_POST['is_ques2'];
if($is_ques2==1)
{
	$iterm=$_POST['nonopt_iterm'];
	$ques=$_POST['non_opt'];
	for($i=0;$i< count($iterm);$i++)
	{
		$item=$iterm[$i];
		$qu=$ques[$i];
		if($qu!="")
		{
	 $query=("INSERT INTO customised_reg (reg_id,event_id,iterm,opt)
VALUES ('$reg_id','$event_id', '$item', '$qu')");
  mysql_query($query) or die(mysql_error());
    }
 }
}

$is_d=$_POST['d'];
if($is_d==1)
{
$doc_name = $_POST['doc_name'];
$filename = $_FILES['myfile']['name'];
$doc_req=$_POST['doc_req'];
$tmp_name = $_FILES['myfile']['tmp_name'];
$j=0;
if(!empty($filename)) {
	foreach($filename as $name)
	{ 
		if(strstr($doc_name[$j],'\\'))
		{
			$array = explode('\\',$doc_name[$j]);
			mkdir ("documents/".$firstname."_".$lastname."_".$reg_id);
			$location = "documents/".$firstname."_".$lastname."_".$reg_id."/".$array[count($array)-1];
		}
		else
		{
			mkdir ("documents/".$firstname."_".$lastname."_".$reg_id);
			$location = "documents/".$firstname."_".$lastname."_".$reg_id."/".$doc_name[$j];
		}
	$req=$doc_req[$j];
	move_uploaded_file($tmp_name[$j], $location);
	$query=("INSERT INTO reg_doc (reg_id,event_id,doc,doc_req)
VALUES ('$reg_id','$event_id', '$location', '$req')");
  mysql_query($query) or die(mysql_error());
  $j++;
  }
}
}
echo "
  <script language=\"javascript\">
alert (\"Submit successfully!\");
window.location.href=\"index.php\";
</script>";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
</body>
</html>

