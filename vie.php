<?php
session_start();
$full_name=$_SESSION['full_name'];
$event_id=$_GET['event_id'];
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
		
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Participants Info</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/re.css">
    <link rel="stylesheet" href="css/mystyle.css">
  
    <script src="js/modernizr.js"></script>
    <script src="js/Chart.js"> </script>
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>


<style type="text/css"> 
.table-container
{
width: 100%;
overflow-y: auto;
_overflow: auto;
margin: 0 0 1em;
}
 h1 {
  font-size: 18px;
  color:black;
    }
 legend {
  margin-bottom: 20px;
  padding-bottom: 10px;
  font-size: 22px;
  border-bottom: 1px solid #ecf0f1;
  display: block;
  width: 100%;
}
</style> 
</head>


<body style="
    min-height: 100%;">
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
<br>

<center>
<br><br><legend style="margin:0 auto;">Participant Info</legend><br>
<div class="table-container" >	
<table border="1">
<tbody>
	<tr>
		<td align="center" style="padding:5px"><p style="color:red;">Registration ID</p></font></td> 
		<td align="center" style="padding:5px"><p style="color:red;"> Salutation </p></font></td> 
		<td align="center" style="padding:5px"><p style="color:red;">last name</p></font></td>
		<td align="center" style="padding:5px"><p style="color:red;">first name</p></font></td>
		<td align="center" style="padding:5px"><p style="color:red;">email</p></font></td>
		<td align="center" style="padding:5px"><p style="color:red;">Contact no.</p></font></td>
		<td align="center" style="padding:5px"><p style="color:red;">Document&nbsp&nbsp&nbsp&nbsp<a href="download_all.php?event_id=<?php echo $event_id ?>"><img src="img/download.png" height="23" width="23" /></a></p></font></td>
		<td align="center" style="padding:5px"><p style="color:red;">Other information</p></font></td>	
  </tr>
<!--the export_report.php takes one variable called fn as GET parameter which is name of the file to be generated, if you pass member_report as a value, then the name of the generated file would be member_report.php
 -->
 <?php
$result = mysql_query("SELECT * FROM reg where event_id='$event_id'");
 while($row = mysql_fetch_array($result)){
 	echo "<tr>";
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['reg_id']."</p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['salutation']."</p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['lastname']."</p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['firstname']."</p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['email']."</p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><p style=\"color:black;\">".$row['contact_no']."</p></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><a style=\"color:blue;\" href=\"download.php?reg_id=".$row['reg_id']."&event_id=".$event_id."\">Download document</a></font></td>"; 
 	echo "<td style=\"padding:5px\" align=\"center\"><font face=\"verdana\"><a style=\"color:blue;\" href=\"view_question.php?reg_id=".$row['reg_id']."&event_id=".$event_id."\" target=\"_black\">information</a></font></td>"; 
  echo "</tr>";
}
 ?>
</tbody>
</table>
</div>
</center>"
<?php
unset($_SESSION['report_header']);
unset($_SESSION['report_values']);
$item=array("reg_id","salutation","first name","last name","email","contact no.");
$num=count($item)-1;
$result = mysql_query("SELECT * FROM customised where event_id='$event_id'");
 while($row = mysql_fetch_array($result)){
 	$num++;
 	$item[$num]=$row['item'];
}

$_SESSION['report_header']=$item; 
for($n=0;$n< count($item);$n++)
{
$_SESSION['report_values'][0][$n]=" ";
}
 $result = mysql_query("SELECT * FROM reg where event_id='$event_id'");
	$i=1;
	$opt_num=count($item)-6;
	while($row = mysql_fetch_array($result)){
		 $j=-1;
		 
		 $_SESSION['report_values'][$i][$j++]=$row['reg_id']." ";
		 $_SESSION['report_values'][$i][$j++]=$row['salutation']." ";
		 $_SESSION['report_values'][$i][$j++]=$row['firstname']." ";
		 $_SESSION['report_values'][$i][$j++]=$row['lastname']." ";
		 $_SESSION['report_values'][$i][$j++]=$row['email']." "; 
		 $_SESSION['report_values'][$i][$j++]=$row['contact_no']." ";
		 for($m=0;$m< $opt_num;$m++)
		 {
		 $j++;
		 $reg_id=$row['reg_id'];
		 $iterm=$item[$j];
		 $result2 = mysql_query("SELECT * FROM customised_reg where reg_id='$reg_id' and event_id='$event_id' and iterm='$iterm'");
		 	if($row1 = mysql_fetch_array($result2))
	    {
		    $_SESSION['report_values'][$i][$j]=$row1['opt']." ";
	    }
	else
	   {
	   	 $_SESSION['report_values'][$i][$j]="";
	   }
		 }
		$i++;
	}
echo "<div style=\"margin:0 auto;max-width:800px;min-height:90%\">";
$result = mysql_query("SELECT * FROM customised where event_id='$event_id' and is_opt=1");

echo "<center>
<legend>Summery of the questionare</legend></center>";

$number=0;
while($row = mysql_fetch_array($result)){
	$number++;
	$item=$row['item'];
	$opt=$row['opt_content'];
	$option=explode(';',$opt);
	echo "<h1>".$number.". ".$item."</h1>";
  $num=array();
  for($i=0;$i< count($option);$i++)
  {
  	$option1=$option[$i];
  	
  	$result2 = mysql_query("SELECT * FROM customised_reg where event_id='$event_id' and iterm='$item'");
  	$count=0;
  	while($row = mysql_fetch_array($result2)){
  	   $a=$row['opt']."";
  		if(strstr($a,Trim($option1))==true)
  		{
  			$count=$count+1;
  		}
  	}
  	$num[$i]=$count;
  }
	$label="";
  $data="";
//  for($i=0;$i< count($option);$i++)
//  {
//  	$total=$num[$i]+$total;
//  }
//  for($i=0;$i< count($option);$i++)
//  {
//  	$num[$i]=($num[$i]/$total)*100;
//  }
  for($i=0;$i< count($option);$i++)
  {
  	$label.="\"".$option[$i]."\"".",";
  	$data.=$num[$i].",";
  }
	echo "<center><div style=\"width:70%\">
                <canvas id=\"myChart".$number."\">
                   
      </div></center>";
    echo "<script>
            var ctx = document.getElementById(\"myChart".$number."\");
            var myChart = new Chart(ctx, {
		        type: 'bar',
		    data: {
			       labels: [".$label."],
			  datasets: [{
					data: [".$data."],
					label:\"Number of selection\"
			}]
		},
	  options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    stepSize:1
                }
                
            }]
 
        }
    }
});
            </script>";
}
	include "close.php";
?>
<br>
<input style="margin-left:40%" type="button" class="btn btn-success"  name="BACK" value="Back" onclick="self.history.back();">
<input class="btn btn-success"  onclick="parent.location='export_report.php?fn=Registration_report'" type="submit" value="Export to Excel">
</div>
<div style="
    bottom: 0;
    width: 100%;
    height: 30px;
    clear:both;">
<center><p class="copyright text-muted small">Copyright©2016| All Rights Reserved EMS</p></center>              
</div>
</body>

</html>