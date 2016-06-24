<?php 
session_start();
$full_name=$_SESSION['full_name'];

if(isset($_SESSION['email'])){
}else{
include "log.php";
exit();
}
?>
<script language="javascript">
function check(){
if (form_basic.event_start_date.value==""){
   
   alert("Please enter the start date of event!");form_basic.event_start_date.focus();return false;
}
if (form_basic.event_start_time.value==""){
   
   alert("Please enter the start time of event!");form_basic.event_start_time.focus();return false;
}

if (form_basic.venue.value==""){
   alert("Please enter the event venue!");form_basic.venue.focus();return false;
}
//if (form_basic.event_info.value==""){
//   alert("Please enter the event information!");form_basic.event_info.focus();return false;
//}
if (form_basic.event_end_date.value==""){
   alert("Please enter the end of event!");form_basic.event_end_date.focus();return false;
}

if (form_basic.organizer.value==""){
   alert("Please enter the event organiser!");form_basic.organizer.focus();return false;
}
if (form_basic.organizer_email.value==""){
   alert("Please enter the event organiser email!");form_basic.organizer_email.focus();return false;
}
if (form_basic.reg_start_date.value==""){
   alert("Please enter the start of registration!");form_basic.reg_start_date.focus();return false;
}
if (form_basic.reg_end_date.value==""){
   alert("Please enter the end of registration!");form_basic.reg_end_date.focus();return false;
}
var start1=form_basic.event_start_date.value;
var end1=form_basic.event_end_date.value;
var str1=start1.split("-");
var str2=end1.split("-");

if(Number(str2[1])< Number(str1[1]))
{
	alert("The event end date is wrong!");form_basic.event_end_date.focus();return false;
}

if(Number(str2[1])==Number(str1[1]))
{
	
	if(Number(str2[0])< Number(str1[0]))
	{
		alert("The event end date is wrong!");form_basic.event_end_date.focus();return false;
	}
}
var start2=form_basic.reg_start_date.value;
var end2=form_basic.reg_end_date.value;
var str3=start2.split("-");
var str4=end2.split("-");

if(Number(str4[1])<Number(str3[1]))
{
	alert("The reg end date is wrong!");form_basic.reg_end_date.focus();return false;
}

if(Number(str3[1])==Number(str4[1]))
{
	if(Number(str4[0])< Number(str3[0]))
	{
		alert("The reg end date is wrong!");form_basic.reg_end_date.focus();return false;
	}
}
if(Number(str1[1])< Number(str4[1]))
{
	alert("The reg start date is wrong!");form_basic.reg_start_date.focus();return false;
}
if(str1[1]==str4[1])
{
	if(Number(str1[0])<Number(str4[0]))
	{
		alert("The reg start date is wrong!");form_basic.reg_start_date.focus();return false;
	}
}
form_basic.submit();  
}
</script>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- formstyle -->
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<!--<link rel="stylesheet" href="form/css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="form/css/mystyle.css"> <!-- Resource style -->
<script src="form/js/modernizr.js"></script>
<!-- formstyle -->

<!-- datepicker -->
  <link rel="stylesheet" type="text/css" href="time/css/normalize.css" />
  <link href="time/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
  <script src="http://libs.useso.com/js/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
  <script>window.jQuery || document.write('<script src="time/js/jquery-2.1.1.min.js"><\/script>')</script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/highlight.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script src="time/dist/js/datepicker.js"></script>
  <script src="time/dist/js/i18n/datepicker.en.js"></script>
<!-- datepicker -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">



<script type="text/javascript" src="scripts/widgEditor.js"></script>
<!--html input-->


    <title>Event Information</title>

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
<!-- timepicker -->
<link rel="stylesheet" type="text/css" href="time1/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="time1/dist/bootstrap-clockpicker.min.css">
<script type="text/javascript" src="time1/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="time1/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="time1/dist/bootstrap-clockpicker.min.js"></script>
<link rel="stylesheet" href="editor/themes/default/default.css" />
	<link rel="stylesheet" href="editor/plugins/code/prettify.css" />
	<script charset="utf-8" src="editor/kindeditor.js"></script>
	<script charset="utf-8" src="editor/lang/en.js"></script>
	<script charset="utf-8" src="editor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="event_info"]', {
				cssPath : 'editor/plugins/code/prettify.css',
				uploadJson : 'editor/upload_json.php',
				fileManagerJson : 'editor/ile_manager_json.php',
				allowFileManager : true,
				
				items : [
						 'undo', 'redo', 'preview','clearhtml','selectall','|','fontname', 'fontsize','forecolor','bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', 'table','|', 'link'],
				afterCreate : function() {
					
				}
			});
			prettyPrint();
		});
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
    <a class="navbar-brand" href="#">EMS</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php" class="scroll-link" data-id="home">Home</a></li>
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
  <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
  </nav>
  
<form class="cd-form floating-labels" action="registration_link.php?is_save=1" name="form_basic" method="post">
            <!-- <fieldset> -->
                <legend>Event Information</legend>
        <div class="time">
        <input type="text" data-language="en" 
                 class="datepicker-here" 
                 placeholder="Start Date of Event"
                 name="event_start_date" 
                 style="float:left;width:65%; margin-bottom:30px"
                 required>&nbsp;&nbsp;&nbsp;
        <input type="text"  name="event_start_time" placeholder="00:00" style="float:right;width:25%" required>
        <script type="text/javascript">
              $('.clockpicker').clockpicker();
            </script>
        </div>
        <div class="time">
        <input type="text" data-language="en" 
                 class="datepicker-here" 
                 placeholder="End Date of Event"
                 name="event_end_date" 
                 style="float:left;width:65%;"
                 required>&nbsp;&nbsp;&nbsp;
        <input type="text"  name="event_end_time" placeholder="00:00" style="float:right;width:25%" required>
        <script type="text/javascript">
              $('.clockpicker').clockpicker();
        </script>
        </div>
                <div class="info" style="margin-top:140px">
                    <label class="cd-label" for="cd-title">Event Title</label>
                    <input class="b" type="text" name="event_title" id="cd-title" required>
                </div>             
               <div class="info" style="margin-top:30px">
                    <label class="cd-label" for="cd-title">Venue</label>
                    <input class="b" type="text" name="venue" id="cd-title" required>
                </div>  
                <div class="info"  style="margin-top:30px">
                    <label class="cd-label" for="cd-title">Organiser</label>
                    <input class="b" type="text" name="organizer" id="cd-title" required>
                </div>

                <div class="info"  style="margin-top:30px">
                    <label class="cd-label" for="cd-email">Organiser Email</label>
                    <input class="b" type="text" name="organizer_email" id="cd-title" required type="email">
                </div> 


                <div style="margin-top:10px;margin-bottom:20px">
                <h4>Event information</h4>
               <textarea name="event_info" style="width:100%;height:400px;"></textarea>
                </div> 

                <legend>Registration Period</legend>
               <div class="time">
        <input type="text" data-language="en" 
                 class="datepicker-here" 
                 placeholder="Start Date of Register"
                 name="reg_start_date" 
                  style="float:left;width:65%; margin-bottom:30px"
                 required>&nbsp;&nbsp;&nbsp;
        <input type="text"  name="reg_start_time" placeholder="00:00" style="float:right;width:25%;" required>
        <script type="text/javascript">
              $('.clockpicker').clockpicker();
            </script>
        </div>
        <div class="time">
        <input type="text" data-language="en" 
                 class="datepicker-here" 
                 placeholder="End Date of Register"
                 name="reg_end_date" 
                  style="float:left;width:65%; margin-bottom:30px"
                 required>&nbsp;&nbsp;&nbsp;
        <input type="text"  name="reg_end_time" placeholder="00:00" style="float:right;width:25%; margin-bottom:30px" required>
        <script type="text/javascript">
              $('.clockpicker').clockpicker();
            </script>
        </div>
                                     
                <div>
                    <input type="submit" value="Proceed" onClick="return check();">
                </div>
            </form>
  
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<div style="position: relative;
    bottom: 0;
    width: 100%;
    height: 50px;
    clear:both;"> 
<center><p class="copyright text-muted small">Copyright© 2016 | All Rights Reserved EMS</p></center>
<br>              
</div>     
</body>

</html>






    
					
					  

    
     

   

    
               

   
		                
			                

   