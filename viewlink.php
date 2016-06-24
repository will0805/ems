<?php
session_start();
include"conn.php";
$user=$_SESSION['email'];
$full_name=$_SESSION['full_name'];
$result = mysql_query("SELECT user_id FROM user where email='$user'");
$row = mysql_fetch_array($result);
$user_id=$row['user_id'];
$result = mysql_query("SELECT * FROM event where user_id='$user_id'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration Link</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    <link href="css/custom.css" rel="stylesheet">

  
  <link rel="stylesheet" type="text/css" href="css/default.css">
  <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/mystyle.css"> <!-- Resource style -->
  
  <script src="js/modernizr.js"></script> <!-- Modernizr -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>

</head>

<body style="
    height: 100%;
    position: relative;">

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
  <li><a href="news.php">Events Created</a></li>
      <li><a href="index.php" class="scroll-link" data-id="contact">Contact Us</a></li>
      <li class="dropdown">
       <?php
        echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">"."Welcome ".$full_name."<b class=\"caret\"></b></a>";
      ?>
        <ul class="dropdown-menu">
          <li><a href="#">My Account</a></li>

          <li class="divider"></li>
          <li><a href="logoff.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </nav>
  <div class="htmleaf-container" style="min-height:95%">
     <form class="cd-form floating-labels" style="margin-top:30px">
     		<legend>Event Registration Link</legend> 
      <fieldset>
       
        <div>
              
       <?php 
if(isset($_SESSION['email'])){
}else{
include "log.php";
exit();
}
$user=$_SESSION['email'];
include "conn.php";
  $result = mysql_query("SELECT user_id FROM user where email='$user'");
  $row = mysql_fetch_array($result);
  $user_id=$row['user_id'];
  
  $result = mysql_query("SELECT * FROM event where user_id='$user_id'");
  while($row = mysql_fetch_array($result)){
    echo "<center><u><font face='verdana'><br><a href=\"vilink.php?event_id=".$row['event_id']."\">".$row['event_title']."</a><br></font></u></center>";
  }
  
include "close.php";
?>
  
        </div>            
      </fieldset>
    </form>
  </div>
<div style="
    bottom: 0;
    width: 100%;
    height: 30px;
    clear:both;">
<center><p class="copyright text-muted small">Copyright©2016 | All Rights Reserved EMS</p></center> 
<br>             
</div>  
</body>
  
</html>