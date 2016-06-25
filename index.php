<?php
session_start();
$email='';
if(isset($_SESSION['email'])){
	$email=$_SESSION['email'];
	$is_login=1;
  $full_name=$_SESSION['full_name'];
}else{
	$is_login=0;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Management system</title>

   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">


  <!--<link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>   //USESO font  -->


    <!-- Add custom CSS here -->
    <link href="css/custom.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/default.css">



  <!--
  <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/reset.css"> --> <!-- CSS reset -->
  <link rel="stylesheet" href="css/mystyle.css"> <!-- Resource style -->

  <script src="js/modernizr.js"></script> <!-- Modernizr -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>

<script language="javascript">
	function login_check1()
	{
 var a ='<?php echo $is_login;?>';
 if(a==1)
 {
 	 window.location.href="event_info.php";
 }
 else
 	{
 		alert("Please log in the system!");
 		}
}
function login_check2()
	{
 var a ='<?php echo $is_login;?>';
 if(a==1)
 {
 	 window.location.href="deleteform.php";
 }
 else
 	{
 		alert("Please log in the system!");
 		}
}
function login_check3()
	{
 var a ='<?php echo $is_login;?>';
 if(a==1)
 {
 	 window.location.href="edit.php";
 }
 else
 	{alert("Please log in the system!");}
}
function login_check4()
	{
 var a ='<?php echo $is_login;?>';

 if(a==1)
 {
 	 window.location.href="viewlink.php";
 }
 else
 	{alert("Please log in the system!");}
}
function login_check5()
	{
 var a ='<?php echo $is_login;?>';
 if(a==1)
 {
 	 window.location.href="logoff.php";
 }
 else
 	{alert("Please log in the system!"); }
}
function login_check6()
	{
 var a ='<?php echo $is_login;?>';
 if(a==1)
 {
 	 window.location.href="view_participent.php";
 }
 else
 	{alert("Please log in the system!"); }
}
function login_check7()
	{
 var a ='<?php echo $is_login;?>';
 if(a==1)
 {
 	 window.location.href="download_file.php";
 }
 else
 	{alert("Please log in the system!"); }
}
function login_check8()
	{
 var a ='<?php echo $is_login;?>';
 if(a==1)
 {
 	 window.location.href="news.php";
 }
 else
 	{alert("Please log in the system!"); }
}
function check(){

if (document.login.password.value==""){
   alert("Please enter the password!");document.login.password.focus();return false;
   }

if (document.login.username.value==""){
   alert("Please enter the Username!");document.login.username.focus();return false;
}
var i=document.login.username.value.indexOf("@");
var j=document.login.username.value.indexOf(".");
if((i<0)||(j<0)){
   alert("Your E-mail address is incorrect！");document.login.username.value="";document.login.username.focus();return false;
}
else
	{
document.login.submit();
}
}
function check1(){

if (document.sign.first_name.value==""){
   alert("Please enter your first_name!");document.sign.first_name.focus();return false;
   }
   if (document.sign.last_name.value==""){
   alert("Please enter your last_name!");document.sign.last_name.focus();return false;
   }
   if (document.sign.email.value==""){
   alert("Please enter the E-mail address!");document.sign.email.focus();return false;
}
if (document.sign.password.value==""){
   alert("Please enter your password!");document.sign.password.focus();return false;
   }
if (document.sign.Rpassword.value==""){
   alert("Please Re-type your password!");document.sign.Rpassword.focus();return false;
}
if (document.sign.password.value!=document.sign.Rpassword.value) {
	alert("Your passwords are not the same! Please check!");document.sign.password.focus();return false;
}
var i=document.sign.email.value.indexOf("@");
var j=document.sign.email.value.indexOf(".");
if((i<0)||(j<0)){
   alert("Your E-mail address is incorrect！");document.sign.email.value="";document.sign.email.focus();return false;
}
else
{
document.sign.submit();
}
}
function check2(){

if (document.sentMessage.name.value==""){
   alert("Please enter the name!");document.sentMessage.name.focus();return false;
   }
if (document.sentMessage.message.value==""){
   alert("Please enter the content!");document.sentMessage.message.focus();return false;
   }
if (document.sentMessage.email.value==""){
   alert("Please enter the email address!");document.sentMessage.email.focus();return false;
}
var i=document.sentMessage.email.value.indexOf("@");
var j=document.sentMessage.email.value.indexOf(".");
if((i<0)||(j<0)){
   alert("Your E-mail address is incorrect！");document.sentMessage.email.value="";document.sentMessage.email.focus();return false;
}
else
	{
document.sentMessage.submit();
}
}
</script>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container" >
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

      <li><a href="#about">About Us</a></li>
      <li><a href="news.php" onclick="login_check8()">Events Created</a></li>
      <?php
      if($is_login==0)
      {
      	echo "<li><a style=\"cursor:pointer;\" id=\"loginpopup\">Login / Signup</a></li>";
      	}
      ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Go& <strong>Create</strong> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#" onclick="login_check1()">Create New Form</a></li>
          <li><a href="#" onclick="login_check3()">Edit/View Form</a></li>
          <li><a href="#" onclick="login_check2()">Delete Form</a></li>
          <li><a href="#" onclick="login_check4()">View Registration link</a></li>
          <li><a href="#" onclick="login_check6()">Participant Attendance</a></li>

        </ul>
      </li>

      <li><a href="#contact">Contact Us</a></li>
      <li class="dropdown">
      	<?php
      if($is_login==0)
      {
      	echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Welcome <strong>Guest</strong> <b class=\"caret\"></b></a>";
      	}
      	if($is_login==1)
      {
      	echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">"."Welcome ".$full_name."<b class=\"caret\"></b></a>";
      	}
      ?>
        <ul class="dropdown-menu">
          <li><a href="#" onclick="login_check5()">Logout</a></li>
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
    </div>
  </nav>
  <!-- Code for Login / Signup Popup -->
  <!-- Modal Log in -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	  <div class="modal-dialog" style="margin-top: 150px;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel1">Login to EMS</h4>
	      </div>
	      <form name="login" method="post" action="login1.php" >
	      <div class="modal-body" id="login_details">
	        <span> Already have an account? </span> <br/><br/>
	        *<span style="font-weight:bold;">Your Email</span><br />
	        <input type="text" placeholder="example@gmail.com" name="username" /><br /></br>
	        *<span style="font-weight:bold;" >Password</span><br />
	        <input type="password" placeholder="Password" name="password" /><br />
	      </div>
	      <div class="modal-footer" >
			  <input style="float: left" type="submit" class="btn btn-success" name="submit1" value="Log In" onclick="return check()"/>

	       <span class="fp-link"> <a href="#">Forgot Password?</a></span>

	       <br/><br/>
			<span> Not a member yet?</span>
			<span id="signup-link" style="cursor:pointer;" class="text-info">Sign Up!</span>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
 <!--Modal Login Ends -->
 <!-- Modal Sign-up Starts -->
	<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
	  <div class="modal-dialog" style="margin-top: 100px;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel2">Sign Up on Landing</h4>
	      </div>
	      <form name="sign" method="post" action="register.php" >
	      <div class="modal-body" id="signup_details">
	        *<span >First Name</span>
	        <input type="text" placeholder="First Name" name="first_name" /> </br></br>
          *<span >Last Name</span>
          <input type="text" placeholder="Last Name" name="last_name" /> </br></br>
	        *<span >Email</span>
	        <input type="text" placeholder="example@gmail.com" name="email" /></br></br>
	        *<span >Password</span>
	        <input type="password" placeholder="Password" name="password" /></br></br>
	        *<span >Password Re-Type</span>
	        <input type="password" placeholder="Re-type Password" name="re_password" />
	      </div>
	      <div class="modal-footer" >
		      <input style="float:left" type="submit" class="btn btn-success"  value="Sign Me Up" onclick="return check1()"/>
	       <span>&nbsp;&nbsp;&nbsp; Already a member? </span><span id="login-link" class="text-info" style="cursor:pointer;">  Login now  </span>
		    </div>
	    </div><!-- /.modal-content -->
	  </form>
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  <!-- Modal Sign up ends! -->
  <!-- End code for Login / Signup Popup -->

    <div class="intro-header" id="home" class="container">

    <div class="row">
    <div class="col-lg-12" id="main-pic">
            <img class="img-responsive" id="main-img" src="img/ipad.png" alt="">
    </div>
    </div>
    </div>
    <!-- /.intro-header -->


    <div class="content-section-a" id="about">

        <div class="container" id="content-container">

            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <img class="img-responsive" src="img/img1.jpg" alt="">
                </div>
                <div class="col-md-4 col-lg-4">
                    <img class="img-responsive" src="img/img2.jpg" alt="">
                </div>
                <div class="col-md-4 col-lg-4">
                    <img class="img-responsive" src="img/img3.jpg" alt="">
                </div>

                <div class="clearfix"></div>
                <div class="col-lg-5 col-sm-6 col-offset-4">
                    <div class="clearfix"></div>
                    <p class="section-heading">About Us<p>
                    <p class="lead">This application is designed to enable users to speedily create simple registration forms that capture essential information and provide the means to easily communicate with the participants and download event registration information for more specific manual manipulation through spreadsheet programs.</p>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a" id="contact">

        <div class="container" id="content-container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <h2 class="section-heading">Contact Us</h2>
                    <form name="sentMessage" class="well" method="post" action="senddone.php" id="contactForm"  novalidate>
		                 <div class="control-group">
		                    <div class="controls">

		                        <input type="text" class="form-control" placeholder="Name" name="name" required data-validation-required-message="Please enter your name" />
		                          <p class="help-block"></p>
		                   </div>
		                 </div>
		                <div class="control-group">
		                  <div class="controls">
		                        <input type="email" class="form-control" placeholder="Email" name="email" required data-validation-required-message="Please enter your email" />
		                        <p class="help-block"></p>
		                </div>
			            </div>

			               <div class="control-group">
			                 <div class="controls">
			                                 <textarea rows="10" cols="100" class="form-control" placeholder="Message" name="message" required data-validation-required-message="Please enter your message" minlength="5" data-validation-minlength-message="Min 5 characters" maxlength="999" style="resize:none"></textarea>
			                                 <p class="help-block"></p>
			                </div>
			               </div>
			             <div id="success"> </div> <!-- For success/fail messages -->
			            <button type="submit" class="btn btn-primary pull-right" onclick="return check2()">Send</button><br /><br/>
			          </form>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <!-- <img class="img-responsive" src="img/map.gif" alt="">  -->
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

  <footer>
                    <p style="padding-top: 20px">
                    <center><p class="copyright text-muted small">Copyright © 2016 | All Rights Reserved EMS</p></center>

    </footer>

</body>

</html>
