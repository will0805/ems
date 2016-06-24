<?php 
session_start();
$full_name=$_SESSION['full_name'];
if(isset($_SESSION['email'])){
}else{
include "log.php";
exit();
}
include "conn.php";
$event_id=$_GET["event_id"];
$result=mysql_query("SELECT * FROM event WHERE event_id ='$event_id'");
$row = mysql_fetch_array($result);


$event_title=$row["event_title"];

$start_time=substr($row["start_date"],0,16);
$end_time=substr($row["end_date"],0,16);
$organiser=$row["organiser"];
$venue=$row["event_venue"];
$event_info=$row["event_info"];
$reg_start=substr($row["reg_start"],0,16);
$reg_end=substr($row["reg_end"],0,16);
$organiser_email=$row["org_email"];
setcookie("event_id", $event_id, time()+1800);
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
<link rel="stylesheet" href="form/css/mystyle2.css"> <!-- Resource style -->

<script src="form/js/modernizr.js"></script>
  
  <script src="js/modernizr.js"></script> <!-- Modernizr -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
<script    language="JavaScript">   
  function confirmation()
  {
  	if (window.confirm("Are you sure to delete the iterm?")) 
  	{
    } 
else {
    	return false;
     }
  }
 </script>       
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
    <a class="navbar-brand" href="#">Event Info</a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php" class="scroll-link" data-id="home">Home</a></li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Event<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="event_info.php">Create New Event</a></li>
          <li><a href="deleteform.php">Delete Event</a></li>
          <li><a href="edit.php">Edit Event</a></li>
          <li><a href="viewlink.php">View Registration Link</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Participation<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="view_participent.php">Participant Attendance</a></li>
          <li><a href="cus.php">Customized Chart</a></li>
          <li><a href="download_file.php">Download Documents</a></li>
        </ul>
      </li> 
      <li class="dropdown">
       <?php
        echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">"."".$full_name."<b class=\"caret\"></b></a>";
        ?>
        <ul class="dropdown-menu">
          <li><a href="logoff.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </nav>
    </div>-->
       <form class="cd-form floating-labels" action="edited_new_info.php?is_save=3&event_id=<?php echo $event_id ?>" name="form1" method="post">
      <fieldset>
        <legend>Edit Event</legend>  
        <ul class="cd-form-list1">
        <li>Event Title: <input class="a" type="text" name="event_title" id="cd-title" value="<?php echo "$event_title"; ?>" /> </li>
          <li>Event Time:  From <input class="a" type="text" name="start_of_event" id="cd-title" value="<?php echo "$start_time"; ?>" /> </li>
          <li>To <input class="a" type="text" name="end_of_event" id="cd-title" value="<?php echo "$end_time"; ?>" /></li>
                <li>Registration Time:  From <input class="a" type="text" name="start_of_registration" id="cd-title" value="<?php echo "$reg_start"; ?>"/>  To <input class="a" type="text" name="end_of_registration" id="cd-title" value="<?php echo "$reg_end"; ?>"/></li>
        <li>Organizer:  <input class="a" type="text" name="organizer" id="cd-title"  value="<?php echo "$organiser"; ?>"/> Organizer Email:<input class="a" type="text" name="organizer_email" id="cd-title"  value="<?php echo "$organiser_email"; ?>"/></li>
        <li>Venue:  <input class="a" type="text" name="venue" id="cd-title" value="<?php echo "$venue"; ?>"/></li>
        <li>Detailed Information:  
        	<textarea class="a" type="text" name="event_info" id="cd-title"><?php echo "$event_info"; ?></textarea></li>
      

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
    echo "<li> • ".$row["item"]."*  <a href=\"delete_iterm.php?event_id=$event_id&id=".$row["custom_id"]."\" onclick=\"return confirmation(); false\"><img src=\"img/trash.png\"/></a></li>";
    }
    else
    {
    echo "<li> • ".$row["item"]."   <a href=\"delete_iterm.php?event_id=$event_id&id=".$row["custom_id"]."\" onclick=\"return confirmation(); false\"><img src=\"img/trash.png\"/></a></li>";
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
    echo "<li> • ".$row["item"]."* :_____________________   <a href=\"delete_iterm.php?event_id=$event_id&id=".$row["custom_id"]."\" onclick=\"return confirmation(); false\"><img src=\"img/trash.png\"/></a></li>";
    }
    else
    {
    echo "<li> • ".$row["item"]." :______________________   <a href=\"delete_iterm.php?event_id=$event_id&id=".$row["custom_id"]."\" onclick=\"return confirmation(); false\"><img src=\"img/trash.png\"/></a></li>";
    }
    echo "</ul>"; 
  }
                
              }
   $result1=mysql_query("SELECT * FROM doctype WHERE event_id =$event_id;"); 
                echo "<div>
                     <ul class=\"cd-form-list1\">";
    while($row = mysql_fetch_array($result1)){
                 
                echo "<li> • ".$row["doc_req"]."  ( ".$row["doc_type"]." ) <a href=\"delete_doc.php?event_id=$event_id&id=".$row["doctype_id"]."\" onclick=\"return confirmation(); false\"><img src=\"img/trash.png\"/></a></li>";          
    }    
      echo "</ul>
       </div>"; 
include "close.php";
?>                
      </fieldset>

      <fieldset>
        <legend>Customized Information</legend>
                <div>
                <ul class="cd-form-list">
            <li>
              <input type="radio" name="Radio" id="cd-radio-1" VALUE="add_selection1.php?opt=3" onClick="JavaScript:goto();">
              <label for="cd-radio-1">Single Choice</label>
            </li>
              
            <li>
              <input type="radio" name="Radio" id="cd-radio-2" VALUE="add_text.php?text=3" onClick="JavaScript:goto();">
              <label for="cd-radio-2">Short Answer</label>
            </li>

            <li>
              <input type="radio" name="Radio" id="cd-radio-3" VALUE="add_selection.php?opt=3" onClick="JavaScript:goto();">
              <label for="cd-radio-3">Multiple Choice</label>
            </li>
            <li>
              <input type="radio" name="Radio" id="cd-radio-4" VALUE="add_document.php?opt=3" onClick="JavaScript:goto();">
              <label for="cd-radio-4">Upload Document</label>
            </li>
          </ul>
        </div>  
             

          <div>
               <input type="submit" value="Submit" onclick="this.form1.submit()">
          </div>
          </fieldset>
</form>

            <script src="js/jquery-2.1.1.js"></script>
  <script src="js/main.js"></script> <!-- Resource jQuery -->
              
   <footer>
    <p style="padding-top: 20px">
    <center><p class="copyright text-muted small">Copyright © 2016 | All Rights Reserved EMS</p></center>
  </footer>             
    

</body>

</html>
