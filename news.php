<?php
session_start();
$full_name=$_SESSION['full_name'];
$event_id=$_GET['event_id'];
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
		
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Central List</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/re.css">
    <link rel="stylesheet" href="css/mystyle.css">
  
    <script src="js/modernizr.js"></script>
    <script src="js/Chart.js"> </script>
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>


<style type="text/css"> 
.table-container
{
width: 100%;
overflow-y: auto;
_overflow: auto;
margin: 0 0 1em;
}
 h1 {
  font-size: 18px;
  color:black;
    }
 legend {
  margin-bottom: 20px;
  padding-bottom: 10px;
  font-size: 22px;
  border-bottom: 1px solid #ecf0f1;
  display: block;
  width: 100%;
}
</style> 
</head>


<body style="
    min-height: 100%;">
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">EMS</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
     <li><a href="index.php">Home</a></li>
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Go& <strong>Create</strong> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="event_info.php">Create New Form</a></li>
          <li><a href="edit.php">Edit/View Form</a></li>
          <li><a href="deleteform.php">Delete Form</a></li>
          <li><a href="viewlink.php">View Registration link</a></li>
          <li><a href="view_participent.php">Participant Attendance</a></li>
        </ul>
      </li> 
      <li><a href="index.php#about">About Us</a></li>
      <li><a href="index.php#contact">Contact Us</a></li>
      <li class="dropdown">
       <?php
      	echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">"."Welcome ".$full_name."<b class=\"caret\"></b></a>";
      ?>
        <ul class="dropdown-menu">
          <li><a href="logoff.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </nav>
<br>

<center>
<br><br><legend style="margin:0 auto;">Event Central List</legend><br>
<div class="table-container" >	
<table border="1">
<tbody>
	<tr>
		<td align="center" style="padding:5px"><p style="color:red;">Event Title</p></font></td> 
		<td align="center" style="padding:5px"><p style="color:red;"> Organizer </p></font></td> 
		<td align="center" style="padding:5px"><p style="color:red;">Start Time</p></font></td>
    <td align="center" style="padding:5px"><p style="color:red;">End Time</p></font></td>
		<td align="center" style="padding:5px"><p style="color:red;">Event Info</p></font></td>
		<td align="center" style="padding:5px"><p style="color:red;">email</p></font></td>
		
		
  </tr>
<!--the export_report.php takes one variable called fn as GET parameter which is name of the file to be generated, if you pass member_report as a value, then the name of the generated file would be member_report.php
 -->
 <?php
 $username=$_SESSION['email'];
$result=mysql_query("SELECT user_id FROM user WHERE email='$username'"); 
 $row = mysql_fetch_array($result);
  $user_id = $row['user_id'];
  $result1=mysql_query("SELECT event_id FROM event WHERE user_id='$user_id' order by event_id desc");
   $row = mysql_fetch_array($result1);
  $event_id = $row['event_id'];
  
$result=mysql_query("SELECT * FROM event WHERE event_id =$event_id;"); 
while($row = mysql_fetch_array($result))
{
  
 	echo "<tr>";
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\"><a href=\"edit.php\">".$row['event_title']."</a></p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['organiser']."</p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['start_date']."</p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['end_date']."</p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['event_info']."</p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['org_email']."</p></font></td>"; 
  echo "</tr>";
}


$counter=1;
  $event_id = $event_id - $counter;
  $result2=mysql_query("SELECT * FROM event WHERE event_id =$event_id;"); 
$row2= mysql_fetch_array($result2);


  echo "<tr>";
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\"><a href=\"edit.php\">".$row2['event_title']."</p></font></td>"; 
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row2['organiser']."</p></font></td>"; 
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row2['start_date']."</p></font></td>"; 
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row2['end_date']."</p></font></td>"; 
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row2['event_info']."</p></font></td>"; 
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row2['org_email']."</p></font></td>"; 
  echo "</tr>";

$counter=1;
  $event_id = $event_id - $counter;
  $result3=mysql_query("SELECT * FROM event WHERE event_id =$event_id;"); 
$row3= mysql_fetch_array($result3);


  echo "<tr>";
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\"><a href=\"edit.php\">".$row3['event_title']."</p></font></td>"; 
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row3['organiser']."</p></font></td>"; 
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row3['start_date']."</p></font></td>"; 
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row3['end_date']."</p></font></td>"; 
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row3['event_info']."</p></font></td>"; 
  echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row3['org_email']."</p></font></td>"; 
  echo "</tr>";
   
 ?>
</tbody>
</table>
</div>
</center>



<br>
<input style="margin-left:40%" type="button" class="btn btn-success"  name="BACK" value="Back" onclick="self.history.back();">
<input class="btn btn-success"  onclick="parent.location='export_report.php?fn=Registration_report'" type="submit" value="Export to Excel">
</div>
<div style="
    bottom: 0;
    width: 100%;
    height: 30px;
    clear:both;">
<center><p class="copyright text-muted small">Copyright©2016| All Rights Reserved EMS</p></center>              
</div>
</body>

</html>