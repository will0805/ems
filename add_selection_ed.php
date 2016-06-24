<?php 
session_start();
if(isset($_SESSION['email'])){
		 $full_name=$_SESSION['full_name'];
}else{
include "log.php";
exit();
}
$event_id= $_COOKIE["event_id"];
$opt= $_GET['opt'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Checkboxes</title>

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
 <script language="JavaScript">

function check(){
	//var selection_table_id;
	//selection_table_id=document.getElementById("selection_table");
	//alert("Test"+selection_table_id.opt_desc.value);

	if (selection_table.opt_desc.value =="")
	{
		alert("Please enter your options!");
		selection_table.opt_desc.focus();
		return false;
	}
	if (selection_table.opt_mand.value ==2)
	{
		alert("Please select the mandatory!");
		selection_table.opt_mand.focus();
		return false;
	}
	<?php  for ($j=1;$j<=$opt;$j++) {?>
	<?php  print("if (selection_table.options$j");?><?php  print(".value==\"\"){");?>
	<?php  print("alert('Please enter your options!');");?>
	<?php  print("selection_table.options$j");?><?php  print(".focus();");?>
	<?php  print("return false;}");?>
<?php  }?>
	 selection_table.submit(); 
//	   goto();
}

function goto(){
	window.location="sele_done.php"
}

function loadPage(list) {
	location.href=list.options[list.selectedIndex].value

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

  <div class="htmleaf-container" style="min-height:95%">
	<form class="cd-form floating-labels" ACTION="sele_done_ed.php" METHOD="POST" name="selection_table">
	<fieldset>
		<legend>Checkboxes</legend>
		<h4></h4>
		<p class="cd-select icon">
						<select class="number" NAME="opt_no" onchange="loadPage(this.form.opt_no)";>
							<option value="0">Please select the number of options to be used</option>
<?php 

for ($i=2; $i<=10; $i++){

	if ($i==$opt)
	echo "<OPTION SELECTED value=\"add_selection_ed.php?opt=$i\">$opt";
	else
	echo "<OPTION value=\"add_selection_ed.php?opt=$i\">$i";
	
}
echo "</SELECT>";
?>
					</p>

					<p class="cd-select icon">
						<select class="number" name="opt_mand">
							<option value="2">Is it mandatory?</option>
							<option value="1">Y</option>
							<option value="0">N</option>
						</select>
					</p>
    </fieldset>

			<fieldset>
				<div class="icon" style="margin-bottom:25px">
					<label class="cd-label" for="cd-title">Option description</label>
					<input class="title" type="text" name="opt_desc" id="cd-title">
        </div>
        <?php 
        for ($i=1; $i<=$opt; $i++){
          
          echo "<div class=\"icon\" style=\"margin-bottom:25px\">  
                    <label class=\"cd-label\" for=\"cd-title\">Option $i</label>
					<input class=\"title\" type=\"text\" name=\"options$i\" id=\"cd-title\">
              </div>
         ";
       }
        ?>	    		    
                <div>
			      	<input type="submit" value="Done" ONCLICK="return check()">
			      	<INPUT TYPE="hidden" NAME="op" VALUE="<?php  echo "$opt";?>">
			    </div>
			    </fieldset>
			</form>
</div>         

<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
 <div style="
    bottom: 0;
    width: 100%;
    height: 60px;
    clear:both;">
<center><p class="copyright text-muted small">Copyright©2016 | All Rights Reserved EMS</p></center>              
</div>                
</body>

</html>
