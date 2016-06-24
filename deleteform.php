<?php 
session_start();
if(isset($_SESSION['email'])){
	 $full_name=$_SESSION['full_name'];
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Delete</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
   

    <!-- Add custom CSS here -->
    <link href="css/custom.css" rel="stylesheet">

  <link rel="stylesheet" href="css/cebianlan.css" media="screen" type="text/css" />
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

<body>

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
    <ul class="nav navbar-nav navbar-right" align="center">
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
    <!-- 
    <form class="navbar-form navbar-right" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    -->
  </div><!-- /.navbar-collapse -->
  
  </nav>
    <div class="htmleaf-container" style="min-height:95%">
       <form class="cd-form floating-labels" action="dele.php" method="post" name=form1>
			<fieldset>
				<legend>Delete form</legend> 
				<h4>Please choose the following can be deleted </h4> 
                <div>
                <ul class="cd-form-list1">
             <?php
             while($row = mysql_fetch_array($result)){
             	
						echo "<li>";
						echo "<input type=\"checkbox\" id=\"cd-checkbox-1\" name=\"selection[]\" value=\"".$row['event_id']."\">";
						echo "<label><a href=\"registration_link.php?is_save=2&event_id=".$row['event_id']."\">".$row['event_title']."</a></label>";
						echo "</li>";
						echo "<li>".$row['event_info']."</li>";
						echo "</br>";
					}
					include "close.php";
						?>
					      </ul>
                </div>

                <div>
			      	<input type="submit" value="Delete" onclick="this.submit()">
			      	
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
</div>      
</body>

</html>
