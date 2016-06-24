<?php 
session_start();
$full_name=$_SESSION['full_name'];
if(isset($_SESSION['email'])){
}else{
include "log.php";
exit();
}
include "conn.php";
$is_save=$_GET["is_save"];
$user=$_SESSION['email'];


if($is_save==3)



  $event_id=$_GET["event_id"];

  $event_title=$_POST["event_title"];
  $event_start=$_POST["start_of_event"];
  $event_end=$_POST["end_of_event"];
  $event_venue=$_POST["venue"];
  $reg_start=$_POST["start_of_registration"];
  $reg_end=$_POST["end_of_registration"];
  $organizer=$_POST["organizer"];
  $email=$_POST["organizer_email"];
  $event_info=$_POST["event_info"];
  
  //$query = "UPDATE event SET event_info = '$event_info', event_title='$event_title' WHERE event_id =$event_id;";
  $query = "UPDATE event SET event_title = '$event_title' ,event_venue = '$event_venue' ,start_date = '$event_start', end_date = '$event_end', reg_start = '$reg_start', reg_end = '$reg_end' , organiser = '$organizer', org_email = '$email' ,event_info = '$event_info' WHERE event_id = '$event_id' ";

  mysql_query($query) or die(mysql_error());
  
  



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    <link href="css/custom.css" rel="stylesheet">

  <link rel="stylesheet" href="css/cebianlan.css" media="screen" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/default.css">
  <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/mystyle.css"> <!-- Resource style -->

  <!-- form style -->
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="form/css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="form/css/mystyle.css"> <!-- Resource style -->

<script src="form/js/modernizr.js"></script>
  
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

    <a class="navbar-brand" href="#">Edit Form</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php" class="scroll-link" data-id="home">Home</a></li>
      <li><a href="index.php" class="scroll-link" data-id="about">About Us</a></li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Go&Create <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="event_info.php">Create New Form</a></li>
          <li><a href="deleteform.php">Delete Form</a></li>
          <li><a href="edit.php">Edit/View Form</a></li>
          <li><a href="viewlink.php">View Registration link</a></li>
          <!--<li class="divider"></li>-->
          <li><a href="view.php">Participant Attendance</a></li>
          <li><a href="download_file.php">Download Documents</a></li>
        </ul>
      </li>      
      
      
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
    <!-- 
    <form class="navbar-form navbar-right" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    -->
  </div><!-- /.navbar-collapse -->
  <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" ></a></div>
  </nav>
  <!-- Code for Login / Signup Popup -->
  <!-- Modal Log in -->
	
      
    </div>
    <br>
        <form class="cd-form floating-labels" name="form1" action="successful.php">
      <fieldset>
        <legend>Registration form</legend> 
        <h4>The updated event information is shown below</h4> 
        <ul class="cd-form-list1">
        <li><?php echo "$event_title"; ?></li>
          <li>Event time:  From <?php echo "$event_start"; ?> to <?php echo   "$event_end"; ?></li>
                <li>Registration time:  From <?php echo "$reg_start"; ?> to <?php echo "$reg_end"; ?></li>
        <li>Organiser:  <?php echo "$organizer"; ?> (<?php echo "$email"; ?>)</li>
        <li>Venue:  <?php echo  "$event_venue"; ?></li>
        <li>Event Information:  <?php echo "$event_info"; ?></li>
      

        </ul>
<br/>
        
 <?php
 $result=mysql_query("SELECT * FROM customised WHERE event_id='$event_id' order by seq asc");
 while($row = mysql_fetch_array($result)){
  if ($row['is_opt']==1)
  {
    echo "<ul class=\"cd-form-list1\">";
    if($row["mandatory"]==1)
    { 
    echo "<li>".$row["item"]."*</li>";
    }
    else
    {
    echo "<li>".$row["item"]."</li>";
      }
   $arr=explode(";",$row['opt_content']);
   foreach ($arr as &$value){
    echo "<li> ✓ ".$value."</li>";
  }
   echo "</ul>"; 
  }
  else
  {
    echo "<ul class=\"cd-form-list1\">";
    if($row["mandatory"]==1)
    { 
    echo "<li>".$row["item"]."*:______________________</li>";
    }
    else
    {
    echo "<li>".$row["item"].":______________________</li>";
    }
    echo "</ul>"; 
  }
                
              }
   $result1=mysql_query("SELECT * FROM doctype WHERE event_id =$event_id;"); 
                echo "<div>
                     <ul class=\"cd-form-list1\">";
    while($row = mysql_fetch_array($result1)){
                 
                echo "<li>".$row["doc_req"]."  ( ".$row["doc_type"]." )</li>";          
    }    
      echo "</ul>
       </div>"; 
include "close.php";
?>                
      </fieldset>

      

          <div>
              <input type="submit" value="Publish" onclick="this.form1.submit()">
          </div>
          </fieldset>
</form>

            <script src="js/jquery-2.1.1.js"></script>
  <script src="js/main.js"></script> <!-- Resource jQuery -->
              
              
    

</body>

</html>
