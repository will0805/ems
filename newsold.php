<?php 
session_start();
//$full_name=$_SESSION['full_name'];

if(isset($_SESSION['email'])){
}else{
include "log.php";
exit();
}
include "conn.php";
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Events Created</title>

<link rel="stylesheet" href="CSSn/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="CSSn/style.css"> <!-- Resource style -->

<script src="JSn/modernizr.js"></script> <!-- Modernizr -->


 <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <!-- <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>-->

    <!-- Add custom CSS here -->
    <link href="css/custom.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/default.css">
  <!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>-->
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/mystyle.css"> <!-- Resource style -->
  

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>


<!-- formstyle -->
<!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>-->
<!--<link rel="stylesheet" href="form/css/reset.css"> <!-- CSS reset -->
<!--<script src="form/js/modernizr.js"></script>-->
<!-- formstyle -->

<!-- datepicker -->
  <link rel="stylesheet" type="text/css" href="time/css/normalize.css" />
  <link href="time/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
  <!--<script src="http://libs.useso.com/js/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>-->
  <script>window.jQuery || document.write('<script src="time/js/jquery-2.1.1.min.js"><\/script>')</script>
  <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/highlight.min.js"></script>-->
  <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>-->
  <script src="time/dist/js/datepicker.js"></script>
  <script src="time/dist/js/i18n/datepicker.en.js"></script>
<!-- datepicker -->




<!--html input-->


    <title>Events Created</title>

    <!-- Bootstrap core CSS -->
   <!-- <link href="css/bootstrap.css" rel="stylesheet">-->

    <!-- Custom Google Web Font -->
   <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">-->

    <!-- Add custom CSS here -->
   <!-- <link href="css/custom.css" rel="stylesheet">-->

  
  
 
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
    <a class="navbar-brand" href="#">Events Central List</a>
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
         
          <li><a href="view.php">Participant Attendance</a></li>
          <li><a href="download_file.php">Download Documents</a></li>
        </ul>
      </li>      
      
     
     
      <li><a href="index.php" class="scroll-link" data-id="contact">Contact Us</a></li>
      <li class="dropdown">
       <?php
      	echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">"."Welcome "."<b class=\"caret\"></b></a>";
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
  </nav>
  <br>
  <br>
  <br><br>
  <br><br><br>
  

<div class="events-content"><center><p>Events Created</p></center></div>
</div>
 <?php
 $username=$_SESSION['email'];
  $result=mysql_query("SELECT user_id FROM user WHERE email='$username'"); 
  $row = mysql_fetch_array($result);
  $user_id = $row['user_id'];
 $result1=mysql_query("SELECT event_id FROM event WHERE user_id='$user_id' order by event_id desc");
  $row = mysql_fetch_array($result1);
  $event_id = $row['event_id'];
$result=mysql_query("SELECT * FROM event WHERE event_id =$event_id;"); 
$row = mysql_fetch_array($result);
$event_title=$row["event_title"];
$start_time=$row["start_date"];
$end_time=$row["end_date"];
$organiser=$row["organiser"];
$venue=$row["event_venue"];
$event_info=$row["event_info"];
$reg_start=$row["reg_start"];
$reg_end=$row["reg_end"];
$organiser_email=$row["org_email"];



    $counter = 1;
  $event_id = $event_id - $counter;

$result2=mysql_query("SELECT * FROM event WHERE event_id =$event_id;"); 
$row2 = mysql_fetch_array($result2);
$event_title2=$row2["event_title"];
$start_time2=$row2["start_date"];
$end_time2=$row2["end_date"];
$organiser2=$row2["organiser"];
$venue2=$row2["event_venue"];
$event_info2=$row2["event_info"];
$reg_start2=$row2["reg_start"];
$reg_end2=$row2["reg_end"];
$organiser_email2=$row2["org_email"];

    $counter = 1;
  $event_id = $event_id - $counter;

$result3=mysql_query("SELECT * FROM event WHERE event_id =$event_id;"); 
$row3 = mysql_fetch_array($result3);
$event_title3=$row3["event_title"];
$start_time3=$row3["start_date"];
$end_time3=$row3["end_date"];
$organiser3=$row3["organiser"];
$venue3=$row3["event_venue"];
$event_info3=$row3["event_info"];
$reg_start3=$row3["reg_start"];
$reg_end3=$row3["reg_end"];
$organiser_email3=$row3["org_email"];

    $counter = 1;
  $event_id = $event_id - $counter;

$result4=mysql_query("SELECT * FROM event WHERE event_id =$event_id;"); 
$row4 = mysql_fetch_array($result4);
$event_title4=$row4["event_title"];
$start_time4=$row4["start_date"];
$end_time4=$row4["end_date"];
$organiser4=$row4["organiser"];
$venue4=$row4["event_venue"];
$event_info4=$row4["event_info"];
$reg_start4=$row4["reg_start"];
$reg_end4=$row4["reg_end"];
$organiser_email4=$row4["org_email"];

?>

<section class="cd-horizontal-timeline">
<div class="timeline">
<div class="events-wrapper">
	<div class="events">
		<ol>
			<li><a href="#0" data-date="16/01/2014" class="selected"><?php echo "$start_time"; ?></a></li>
			<li><a href="#0" data-date="28/02/2014"><?php echo "$start_time2"; ?></a></li>
			<li><a href="#0" data-date="20/04/2014"><?php echo "$start_time3"; ?></a></li>
			<li><a href="#0" data-date="20/05/2014"><?php echo "$start_time4"; ?></a></li>
			<li><a href="#0" data-date="09/07/2014">09 Jul</a></li>
			<li><a href="#0" data-date="30/08/2014">30 Aug</a></li>
			<li><a href="#0" data-date="15/09/2014">15 Sep</a></li>
			<li><a href="#0" data-date="01/11/2014">01 Nov</a></li>
			<li><a href="#0" data-date="10/12/2014">10 Dec</a></li>
			<li><a href="#0" data-date="19/01/2015">29 Jan</a></li>
			<li><a href="#0" data-date="03/03/2015">3 Mar</a></li>
		</ol>

		<span class="filling-line" aria-hidden="true"></span>
			</div> <!-- .events -->
		</div> <!-- .events-wrapper -->
			
		<ul class="cd-timeline-navigation">
			<li><a href="#0" class="prev inactive">Prev</a></li>
			<li><a href="#0" class="next">Next</a></li>
		</ul> <!-- .cd-timeline-navigation -->
	</div> <!-- .timeline -->

	<div class="events-content">
		<ol>
			<li class="selected" data-date="16/01/2014">
				<h2><?php echo "$event_title";?></h2>
				<em><?php echo "$start_time"; ?></em>
				<p>	
					Registration time:  From <?php echo "$reg_start"; ?> to <?php echo "$reg_end"; ?><br>
        Organiser:  <?php echo "$organiser"; ?> (<?php echo "$organiser_email"; ?>)<br>
        Venue:  <?php echo "$venue"; ?><br>
        Event Information:  <?php echo "$event_info"; ?>
				</p>
			</li>

			<li data-date="28/02/2014">
				<h2><?php echo "$event_title2";?></h2>
				<em> <?php echo "$start_time2"; ?></em>
				<p>	
				Registration time:  From <?php echo "$reg_start2"; ?> to <?php echo "$reg_end2"; ?><br>
        Organiser:  <?php echo "$organiser2"; ?> (<?php echo "$organiser_email2"; ?>)<br>
        Venue:  <?php echo "$venue2"; ?><br>
        Event Information:  <?php echo "$event_info2"; ?><br>
					</p>
			</li>

			<li data-date="20/04/2014">
				<h2><?php echo "$start_time3"; ?></h2>
				<em><?php echo "$event_title3";?></em>
				<p>	
					Registration time:  From <?php echo "$reg_start3"; ?> to <?php echo "$reg_end3"; ?><br>
        Organiser:  <?php echo "$organiser3"; ?> (<?php echo "$organiser_email3"; ?>)<br>
        Venue:  <?php echo "$venue3"; ?><br>
        Event Information:  <?php echo "$event_info3"; ?><br>
				</p>
			</li>

			<li data-date="20/05/2014">
				<h2><?php echo "$event_title4";?></h2>
				<em><?php echo "$start_time4"; ?></em>
				<p>	
					Registration time:  From <?php echo "$reg_start4"; ?> to <?php echo "$reg_end4"; ?><br>
        Organiser:  <?php echo "$organiser4"; ?> (<?php echo "$organiser_email4"; ?>)<br>
        Venue:  <?php echo "$venue4"; ?><br>
        Event Information:  <?php echo "$event_info4"; ?><br>
				</p>
			</li>

			<li data-date="09/07/2014">
				<h2>Event title here</h2>
				<em>July 9th, 2014</em>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="30/08/2014">
				<h2>Event title here</h2>
				<em>August 30th, 2014</em>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="15/09/2014">
				<h2>Event title here</h2>
				<em>September 15th, 2014</em>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="01/11/2014">
				<h2>Event title here</h2>
				<em>November 1st, 2014</em>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="10/12/2014">
				<h2>Event title here</h2>
				<em>December 10th, 2014</em>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="19/01/2015">
				<h2>Event title here</h2>
				<em>January 19th, 2015</em>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="03/03/2015">
				<h2>Event title here</h2>
				<em>March 3rd, 2015</em>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>
		</ol>
	</div> <!-- .events-content -->
</section>

<script src="JS/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="JS/jquery.mobile.custom.min.js"></script>
<script src="JS/main.js"></script>


</body>
</html>