<?php 
  session_start();
  if(isset($_SESSION['email'])){
  		 $full_name=$_SESSION['full_name'];
  }else{
  include "log.php";
  exit();
  }
include "conn.php";
$is_save=$_GET["is_save"];

if($is_save==1)
{
    $username=$_SESSION['email'];
    $result=mysql_query("SELECT user_id FROM user WHERE email='$username'"); 
    $row = mysql_fetch_array($result);
  $user_id =$row['user_id'];
	$event_title=$_POST["event_title"];
	$event_start_date=$_POST["event_start_date"];
	$event_start_time=$_POST["event_start_time"];
	$event_end_date=$_POST["event_end_date"];
	$event_end_time=$_POST["event_end_time"];
	$reg_start_date=$_POST["reg_start_date"];
	$reg_start_time=$_POST["reg_start_time"];
	$reg_end_date=$_POST["reg_end_date"];
	$reg_end_time=$_POST["reg_end_time"];
	
	$event_venue=$_POST["venue"];
	$organizer=$_POST["organizer"];
	$email=$_POST["organizer_email"];
	$event_info=stripslashes($_POST["event_info"]);
	$arry=explode("-",$event_start_date);
  $event_start=$arry[2]."-".$arry[1]."-".$arry[0]." ".$event_start_time;
  $arry=explode("-",$event_end_date);
  $event_end=$arry[2]."-".$arry[1]."-".$arry[0]." ".$event_end_time;
  $arry=explode("-",$reg_start_date);
  $reg_start=$arry[2]."-".$arry[1]."-".$arry[0]." ".$reg_start_time;
  $arry=explode("-",$reg_end_date);
  $reg_end=$arry[2]."-".$arry[1]."-".$arry[0]." ".$reg_end_time;
  //$query = "UPDATE event SET event_info = '$event_info', event_title='$event_title' WHERE event_id =$event_id;";
  $query = "INSERT INTO event (user_id, event_title,event_venue,start_date, end_date, reg_start, reg_end, organiser, org_email,event_info)
VALUES('$user_id','$event_title', '$event_venue', '$event_start', '$event_end', '$reg_start', '$reg_end', '$organizer','$email','$event_info')";
  mysql_query($query) or die(mysql_error());
  $result1=mysql_query("SELECT event_id FROM event WHERE user_id='$user_id' order by event_id desc");
	$row = mysql_fetch_array($result1);
	$event_id = $row['event_id'];
	setcookie("event_id", $event_id, time()+1800);	
}
if($is_save==0)
{$event_id=$_COOKIE["event_id"];}
if($is_save==2)
{$event_id=$_GET["event_id"];}
$result=mysql_query("SELECT * FROM event WHERE event_id =$event_id;"); 
$row = mysql_fetch_array($result);

$event_title=$row["event_title"];
$start_time=substr($row["start_date"],8,2)."-".substr($row["start_date"],5,2)."-".substr($row["start_date"],0,4)." ".substr($row["start_date"],11,5);
$end_time=substr($row["end_date"],8,2)."-".substr($row["end_date"],5,2)."-".substr($row["end_date"],0,4)." ".substr($row["end_date"],11,5);
$organiser=$row["organiser"];
$venue=$row["event_venue"];
$event_info=$row["event_info"];
$reg_start=substr($row["reg_start"],8,2)."-".substr($row["reg_start"],5,2)."-".substr($row["reg_start"],0,4)." ".substr($row["reg_start"],11,5);
$reg_end=substr($row["reg_end"],8,2)."-".substr($row["reg_end"],5,2)."-".substr($row["reg_end"],0,4)." ".substr($row["reg_end"],11,5);
$organiser_email=$row["org_email"]
?>
<script    language="JavaScript">   
  function    goto()   
   {   
       if    (document.form1.Radio[0].checked==true)   
           window.location.href=document.form1.Radio[0].value;   
       if    (document.form1.Radio[1].checked==true)   
           window.location.href=document.form1.Radio[1].value;   
       if    (document.form1.Radio[2].checked==true)  
           window.location.href=document.form1.Radio[2].value;      
           if    (document.form1.Radio[3].checked==true)  
           window.location.href=document.form1.Radio[3].value;              
   }   
</script>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Info</title>

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
<script language="javascript">
function check(){
	alert("Creat events successfully!");
	form1.submit();
}
</script>
</head>

<body style="
    min-height: 100%;
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
<div style="min-height:95%">
   <form class="cd-form floating-labels" name="form1" action="index.php">
			<fieldset>
				<legend>Registration form</legend> 
				<h4>The registration form will be created as shown below</h4> 
				<ul class="cd-form-list1">
				<li><?php echo "$event_title"; ?></li>
			    <li>Event time:  From <?php echo "$start_time"; ?> to <?php echo "$end_time"; ?></li>
                <li>Registration time:  From <?php echo "$reg_start"; ?> to <?php echo "$reg_end"; ?></li>
				<li>Organiser:  <?php echo "$organiser"; ?> (<?php echo "$organiser_email"; ?>)</li>
				<li>Venue:  <?php echo "$venue"; ?></li>
				<li>Event Information:  </li>
				<?php echo "$event_info"; ?>
			
        </ul>
<br/>
	      
 <?php
 $result=mysql_query("SELECT * FROM customised WHERE event_id='$event_id' order by custom_id asc");
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

			<fieldset>
				<legend>Other Info</legend>
                <div>
					<h4></h4>
                <ul class="cd-form-list">
						<li>
							<input type="radio" name="Radio" id="cd-radio-1" VALUE="add_selection.php?opt=3" onClick="JavaScript:goto();">
							<label for="cd-radio-1">Checkboxes</label>
						</li>
							
            <li>
              <input type="radio" name="Radio" id="cd-radio-3" VALUE="add_selection1.php?opt=3" onClick="JavaScript:goto();">
              <label for="cd-radio-3">Multiple choice</label>
            </li>

						<li>
							<input type="radio" name="Radio" id="cd-radio-2" VALUE="add_text.php?text=3" onClick="JavaScript:goto();">
							<label for="cd-radio-2">Short answer</label>
						</li>

						
						<li>
							<input type="radio" name="Radio" id="cd-radio-4" VALUE="add_document.php?opt=3" onClick="JavaScript:goto();">
							<label for="cd-radio-4">Upload documents</label>
						</li>
					</ul>
				</div>  
             

          <div>
			      	<input type="submit" value="Publish" onclick="return check()">
			    </div>
			    </fieldset>
</form>
</div>
<div style="
    bottom: 0;
    width: 100%;
    height: 30px;
    clear:both;">
<center><p class="copyright text-muted small">Copyright © 2016 | All Rights Reserved EMS</p></center>              
</div> 
</body>

</html>






    
					
					  

    
     

   

    
               

   
		                
			                

   