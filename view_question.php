<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <!--<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" href="css/re.css"> <!-- CSS reset -->
  <!--<link rel="stylesheet" href="css/mystyle.css"> <!-- Resource style -->

<style type="text/css">
	li
	{
		margin-top:15px;
		margin-bottom:10px;
	}
	p
	{
		margin-top:10px;
	}
	h1 {
  font-size: 22px;
  color:black;
    }
    h2 {
  font-size: 20px;
  color:#808080;
    }
    h3 {
  font-size: 18px;
  color:red;
    } 
 legend {
 	font-weight:bold;
  margin-bottom: 20px;
  padding-bottom: 10px;
  font-size: 2rem;
  border-bottom: 1px solid #ecf0f1;
  display: block;
  width: 100%;
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Other Information</title>
<script type="application/javascript" src="js/awesomechart.js"> </script>
</head>

<body>
	
<div style="margin:0 auto;width:90%;max-width: 700px;min-height:95%">
<legend>Other information</legend>	
<?php
include "conn.php";
$event_id=$_GET['event_id'];
$reg_id=$_GET['reg_id'];
$result = mysql_query("SELECT * FROM reg where reg_id='$reg_id'");
$row = mysql_fetch_array($result);
$full_name=$row['firstname']."  ".$row['lastname'];
echo "<li><h1>Registration information</h1></li>";
echo "<p><h3>Name: ".$full_name."</h3></p>";
echo "<p><h3>Registration ID: ".$row['reg_id']."</h3></p>";
echo "<li><h1>Questionare</h1></li>";
$number=0;
$result = mysql_query("SELECT * FROM customised where event_id='$event_id' and is_opt=0");
while($row = mysql_fetch_array($result)){
	$number++;
	$item=$row['item'];
	echo "<p><h1>".$number.". ".$item."</h1><p>";
	$result1 = mysql_query("SELECT * FROM customised_reg where reg_id='$reg_id' and event_id='$event_id' and iterm='$item'");
	if($row1 = mysql_fetch_array($result1))
	{
		echo "<p><h3>&nbsp&nbsp".$row1['opt']."</h3></p>";
	}
	else
	{
	echo "<p><h3>&nbsp&nbspNo answer.</h3></p>";
	}
}

$result = mysql_query("SELECT * FROM customised where event_id='$event_id'");
while($row = mysql_fetch_array($result)){
	$number++;
	$item=$row['item'];
	$opt=$row['opt_content'];
	$option=explode(';',$opt);
	echo "<p><h1>".$number.". ".$item."</h1></p>";
	$result1 = mysql_query("SELECT * FROM customised_reg where reg_id='$reg_id' and event_id='$event_id' and iterm='$item'");
	if($row1 = mysql_fetch_array($result1))
	{
	echo "<p><h3>&nbsp&nbspAnswer:&nbsp".$row1['opt']."</h3></p>";
  }
  else
	{
	echo "<p><h3>&nbsp&nbspNo selection</h3></p>";
	}
}
 
?>
</div>
<div style="
    bottom: 0;
    width: 100%;
    height: 60px;
    clear:both;">
<center><h2 class="copyright text-muted small">Copyright©2016 | All Rights Reserved EMS</h2></center>              
</div>        
</body>
</html>