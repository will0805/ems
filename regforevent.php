<?php 
session_start();
$full_name=$_SESSION['full_name'];
$event_id=$_GET['event_id'];
include "conn.php";
	$result = mysql_query("SELECT * FROM event where event_id='$event_id'");
	$num=mysql_num_rows($result);
	if($num==0){
	exit("Event Registration Closed");
	}
	$row = mysql_fetch_array($result);


  

	
?>

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/default.css">
  <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/mystyle.css"> <!-- Resource style -->
  <script src="js/modernizr.js"></script> 


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Stylish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">

<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/htmleaf-demo.css">
<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css"/>



<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js -->	
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smoth-scrolling-->
<!--pop-up-->
<script src="js/menu_jquery.js"></script>
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="form/css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="form/css/mystyle.css"> <!-- Resource style -->
<script src="form/js/modernizr.js"></script>


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
    <a class="navbar-brand" href="#">Participants Registration Form </a>
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
  <br><br><br>

	<div class="container">

      <form class="cd-form floating-labels" >
      <fieldset>
        <legend>Event Information</legend> 
        
        <ul class="cd-form-list1">
        <li><font color="#0033FF" size="+2"><bold><?php  echo $row['event_title']; ?></bold></font></li>
          <li><b>Event time:</b> From <?php echo $row['start_date']; ?> to <?php echo $row['end_date']; ?></li>
                <li>Registration time:  From <?php echo $row["reg_start"]; ?> to <?php echo $row["reg_end"]; ?></li>
        <li>Organiser:  <?php  echo $row['organiser'];?> (Email : <A href="mailto:s"><?php  echo $row['org_email'];?></A> )</li>
        <li>Venue:  <?php echo $row['event_venue']; ?></li>
        
      

        </ul></fieldset></form>

      <?php  if($row['upload_photo']==1){
		echo "<tr>
		<TD width=30%></TD><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"./upload/images.jpg\" alt=\"\" /></td></tr>
		<tr><TD width=30%></TD><td>Upload photo: we only accept <u>gif jpg jpeg pjpeg bmp</u> files!</td></tr><tr><TD width=30%></TD><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"file\" name=\"file\" id=\"file\" /></td></tr>";
		}
		if($row['updoc']==1){
		if(substr_count($row['doctype'],doc)>0)
			$type.=" Word ";
			if(substr_count($row['doctype'],pdf)>0)
			$type.=" PDF ";
			if(substr_count($row['doctype'],xls)>0)
			$type.=" Excel ";
			if(substr_count($row['doctype'],ppt)>0)
			$type.=" PowerPoint ";
			
		echo "
		
		<tr>
		<TD width=25%></TD><td><img src=\"file.png\" alt=\"\" /></td>
		</tr><tr><TD width=30%></TD><td>Upload document: we only accept <u>$type</u>  files!</td></tr><tr><TD width=30%></TD><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"file\" name=\"doc\" id=\"doc\" /></td>
		</tr>";
		}
		?>
		
			<form class="cd-form floating-labels" name="form1" enctype="multipart/form-data" action="regfor.php" method="POST">
  
            <fieldset>
                <legend>Standard registration fields</legend>
                <TR>
			<TD width=30%><B>Salutation</B></TD>
			<TD>
			<SELECT NAME="salut">
			<OPTION> 
            <OPTION>Dr.
			<OPTION>Mr
			<OPTION>Miss
      <OPTION>Mrs
      <OPTION>Mdm
      <OPTION>Ms</SELECT>
      </TD>
      </TR>
                <div>
                    <label class="cd-label" for="cd-title">Last Name*</label>
                    <input class="a" type="text" name="name" id="cd-title" required>
                </div> 

                <div>
                    <label class="cd-label" for="cd-title">First Name*</label>
                    <input class="a" type="text" name="firstname" id="cd-title" required>
                </div>                
               
                <div>
                    <label class="cd-label" for="cd-title">Email </label>
                    <input class="b" type="text" name="reg_email" id="cd-title" >
                </div> 
                <div>
                    <label class="cd-label" for="cd-title">Contact No.</label>
                    <input class="b" type="text" name="reg_contact" id="cd-title" >
                </div>  
                
          
    
      * denote mandatory
      <BR>
      <br>
      <!--<form action="upload_file.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"> -->
     <form class="cd-form floating-labels" name="form2" action="upload.php" method="post" enctype="multipart/form-data">
     <div><label class="cd-label" for="cd-title">File name</label>
<input class="a" type="text" name="doc_name" id="doc_name">
<input type="file" name="myfile">
</div>

<br />




<?php 
$i=0;
$result=mysql_query("SELECT * FROM customised WHERE event_id='$event_id' order by seq asc");
while($row = mysql_fetch_array($result)){
$i++;
if ($row['is_opt']==1){
  echo "<TR>"; 
  echo "<TD BGCOLOR=#CCCCFF>";
  if ($row['mandatory']==1){
  echo "Y";}
  else{
  echo "N";} 
  echo "<br></TD><TD BGCOLOR=#CCCCFF>".$row['item']."</TD><TD BGCOLOR=#CCCCFF><SELECT NAME=\"select$i\"";
   echo ">";
  $arr=explode(";",$row['opt_content']);
  foreach ($arr as &$value){
  echo "<OPTION>$value";
  }
  echo "</TD></SELECT></TR>";
}else{
  echo "<TR>";  
  echo "<TD BGCOLOR=#CCCCFF>";
  if ($row['mandatory']==1){
  
  echo "Y";}
  else{
  echo "N";}
  echo "</TD><TD BGCOLOR=#CCCCFF>".$row['item']."</TD>";
  echo "<TD BGCOLOR=#CCCCFF><INPUT TYPE=\"text\" NAME=\"text$i\" SIZE=\"40\" MAXLENGTH=\"128\"></TD>";
  echo "</TR>";
}

}
include "close.php";

?>
</TABLE>
<INPUT TYPE="hidden" NAME="i" VALUE="<?php  echo "$i";?>">
<br><br><br>
<center>
<INPUT TYPE="submit" NAME="submit" VALUE="Submit" onclick="return check()" >
<INPUT TYPE="hidden" NAME="ev" VALUE="<?php  echo "$event_id";?>">
</center>

</fieldset>

  
</form>
<script src="form/js/jquery-2.1.1.js"></script>
    <script src="form/js/main.js"></script> <!-- Resource jQuery -->
    
    <script src="js/jquery-2.1.1.js"></script>
  <script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
