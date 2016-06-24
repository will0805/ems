<?php 
session_start();
header('Cache-control: private, must-revalidate');
$event_id=$_GET['event_id'];
include "conn.php";
$result = mysql_query("SELECT * FROM event where event_id='$event_id'");
$num=mysql_num_rows($result);
	if($num==0){
	exit("Event Registration Closed");
	}
$row = mysql_fetch_array($result);
$start_time=substr($row["start_date"],8,2)."-".substr($row["start_date"],5,2)."-".substr($row["start_date"],0,4)." ".substr($row["start_date"],11,5);
$end_time=substr($row["end_date"],8,2)."-".substr($row["end_date"],5,2)."-".substr($row["end_date"],0,4)." ".substr($row["end_date"],11,5);
date_default_timezone_set('Asia/Singapore');
$date=date('m/d/Y');
$reg_end=$row['reg_end'];
$date1=explode("/",$date);
$date2=explode("-",substr($reg_end,0,10));
if($date1[2]==$date2[0])
{
	if($date1[0]<=$date2[1])
	{
		if($date1[0]==$date2[1])
		{
			if($date1[1]> $date2[2])
			{
				echo "
   <script language=\"javascript\">
   alert (\"The registration date is overdue!\");
   </script>";
   exit();
			}
		}
		
	}
	else
	{
			echo "
   <script language=\"javascript\">
   alert (\"The registration date is overdue!!\");
   </script>";
   exit();
	}
}
else
{
		echo "
   <script language=\"javascript\">
   alert (\"The registration date is overdue!!\");
   </script>";
   exit();
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Event Information</title>
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/mystyle.css"> <!-- Resource style -->
	
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<!--[if IE]>
		<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
 <!-- JavaScript -->  
</head>
<body>
<form class="cd-form floating-labels" name="form1" action="upload.php" method="post" enctype="multipart/form-data">
				<legend>Event Information</legend>
			<div>
				<ul class="cd-form-list1">
				<li>Event title: <?php echo $row["event_title"]; ?></li>
			  <li>Event time: From <?php echo $start_time; ?> to <?php echo $end_time; ?></li>
				<li>Organiser:  <?php  echo $row['organiser'];?> (Email : <A href="mailto:s"><?php  echo $row['org_email'];?></A> )</li>
				<li>Venue:  <?php echo $row["event_venue"]; ?></li>
        <li>Event Info: </li>
        <?php echo $row["event_info"]; ?>
        </ul>
      </div>

      <fieldset>
				<legend>Standard registration fields</legend>
				<h4 style="margin-bottom:5px">Salutation</h4>
		  <TR>
			<TD>
				<p class="cd-select icon">

			<SELECT NAME="salut">
			<OPTION></option>
      <OPTION>Dr.</option>
			<OPTION>Mr</option>
			<OPTION>Miss</option>
      <OPTION>Mrs</option>
      <OPTION>Mdm</option>
      <OPTION>Ms</option>
      </SELECT>
    </p>
      </TD>
      </TR>
                <div style="margin-top:18px">
                    <label class="cd-label" for="cd-title">First Name*</label>
                    <input class="a" type="text" name="firstname" id="cd-title" required>
                </div>  
                <div style="margin-top:18px">
                    <label class="cd-label" for="cd-title">Last Name*</label>
                    <input class="a" type="text" name="last_name" id="cd-title" required>
                </div> 
                <div style="margin-top:18px">
                    <label class="cd-label" for="cd-title">Email </label>
                    <input class="b" type="text" name="reg_email" id="cd-title" required>
                </div style="margin-top:18px"> 

                <div style="margin-top:18px">
                    <label class="cd-label" for="cd-title">Contact No.</label>
                    <input class="b" type="text" name="reg_contact" id="cd-title" >
                </div>

                 
     </fieldset>
     
     <fieldset>
        <legend>Other Information (* denote mandatory)</legend>
        <h4></h4>
   <?php 
   $result = mysql_query("SELECT * FROM doctype where event_id='$event_id'");
   $num=mysql_num_rows($result);
   $n=0;
   $is_d=0;
   if($num!=0)
   {
   	while($row = mysql_fetch_array($result)){
   	 $n++;
   	 $is_d=1;
   	 echo "<h2 style=\"margin-bottom:5px\">".$row["doc_req"]."( ".$row["doc_type"]." )"."</h2>";
   	 echo "<INPUT TYPE=\"hidden\" NAME=\"doc_req[]\" VALUE=\"".$row["doc_req"]."\">";
   	 if($row['doc_type']=='pdf')
   	 {
   	 echo "<div style=\"margin-bottom:20px\"> 
     <label class=\"cd-label\" for=\"cd-title\"></label>
     <input class=\"a\" type=\"text\" name=\"doc_name[]\" id=\"doc_name".$n."\" placeholder=\"File name\"style=\"margin-bottom:5px\" required>
     <input type=\"file\" name=\"myfile[]\" style=\"width:84px\" accept=\".pdf\" onchange=\"document.getElementById('doc_name".$n."').value=this.value\" >
     </div>";
    }
    if($row['doc_type']=='word')
   	 {
   	 echo "<div style=\"margin-bottom:20px\"> 
     <label class=\"cd-label\" for=\"cd-title\"></label>
     <input class=\"a\" type=\"text\" name=\"doc_name[]\" id=\"doc_name".$n."\" placeholder=\"File name\"style=\"margin-bottom:5px\" required>
     <input type=\"file\" name=\"myfile[]\" style=\"width:84px\" accept=\".doc,.docx)\" onchange=\"document.getElementById('doc_name".$n."').value=this.value\" >
     </div>";
    }
    if($row['doc_type']=='excel')
   	 {
   	 echo "<div style=\"margin-bottom:20px\"> 
     <label class=\"cd-label\" for=\"cd-title\"></label>
     <input class=\"a\" type=\"text\" name=\"doc_name[]\" id=\"doc_name".$n."\" placeholder=\"File name\"style=\"margin-bottom:5px\" required>
     <input type=\"file\" name=\"myfile[]\" style=\"width:84px\" accept=\".xls,xlsx\" onchange=\"document.getElementById('doc_name".$n."').value=this.value\" >
     </div>";
    }
    if($row['doc_type']=='ppt')
   	 {
   	 echo "<div style=\"margin-bottom:20px\"> 
     <label class=\"cd-label\" for=\"cd-title\"></label>
     <input class=\"a\" type=\"text\" name=\"doc_name[]\" id=\"doc_name".$n."\" placeholder=\"File name\"style=\"margin-bottom:5px\" required>
     <input type=\"file\" name=\"myfile[]\" style=\"width:84px\" accept=\".ppt,.pptx\" onchange=\"document.getElementById('doc_name".$n."').value=this.value\" >
     </div>";
    }
    if($row['doc_type']=='image')
   	 {
   	 echo "<div style=\"margin-bottom:20px\"> 
     <label class=\"cd-label\" for=\"cd-title\"></label>
     <input class=\"a\" type=\"text\" name=\"doc_name[]\" id=\"doc_name".$n."\" placeholder=\"File name\"style=\"margin-bottom:5px\" required>
     <input type=\"file\" name=\"myfile[]\" style=\"width:12%\" accept=\".jpg,.png,.bmp,.pdf,.gif,.jpeg\" onchange=\"document.getElementById('doc_name".$n."').value=this.value\" >
     </div>";
    }
   	}
   }
   echo "<legend></legend>";
    $result = mysql_query("SELECT * FROM customised where event_id='$event_id'");
    $num=mysql_num_rows($result);
    $i1=0;
    $i2=0;
    $j1=0;
    $j2=0;
    $is_ques1=0;
    $is_ques2=0;
   if($num!=0)
   {
   	while($row = mysql_fetch_array($result))
   {
   	
   	if($row["is_opt"]==1)
   	{
   	 if($row["is_mulchoice"]==1)
   	 {
   	 	  if($row["mandatory"]==1)
   	 	  {
   	   	$i1++;
   	 	  echo "<INPUT TYPE=\"hidden\" NAME=\"manmulopt_iterm[]\" VALUE=\"".$row["item"]."\">";
   	 	  echo "<div style=\"margin-bottom:20px\">";
                    echo "<h2>".$row["item"]." *</h2>";
                    echo "
                     <ul class=\"cd-form-list1\">";
                    $option=explode(";",$row['opt_content']);
                    foreach($option as $opt)
                    {
                        echo "<li>
                            <input type=\"checkbox\" name=\"manmul_opt".$i1."[]\" value=\"".$opt."\">";
                        echo "<label for=\"cd-checkbox-1\">".$opt."</label>
                        </li>";
                   }
                echo "</ul>
                </div>";
          }
          else
          {
          	$i2++;
   	 	      echo "<div style=\"margin-bottom:20px\">";
                    echo "<h2>".$row["item"]."</h2>";
                    echo "
                     <ul class=\"cd-form-list1\">";
                    $option=explode(";",$row['opt_content']);
                    foreach($option as $opt)
                    {
                        echo "<li>
                            <input type=\"checkbox\" name=\"mul_opt".$i2."[]\" value=\"".$row["item"].';'.$opt."\">";
                        echo "<label for=\"cd-checkbox-1\">".$opt."</label>
                        </li>";
                   }
                echo "</ul>
                </div>";
          }
   	 }
   	 else
   	 {   
                    if($row["mandatory"]==1)
                    {
                    echo "<div style=\"margin-bottom:20px\">";
                    $j1++;
                    echo "<h2>".$row["item"]." *</h2>";
                    echo "
                     <ul class=\"cd-form-list1\">";
                    $option=explode(";",$row['opt_content']);	
                    foreach($option as $opt)
                    {
                        echo "<li>
                             <input type=\"radio\" name=\"manopt".$j1."[]\" value=\"".$opt."\">";
                        echo "<label for=\"cd-radio-1\">".$opt."</label>
                        </li>";
                   }
                   echo "</ul>
                   </div>";
                   
                   echo "<INPUT TYPE=\"hidden\" NAME=\"manopt_item[]\" VALUE=\"".$row["item"]."\">";
                    }
                    else
                    {
                    $j2++;	
                    echo "<div style=\"margin-bottom:20px\">";	
                    echo "<h2>".$row["item"]."</h2>";
                    echo "
                     <ul class=\"cd-form-list1\">";
                    $option=explode(";",$row['opt_content']);
                    	 foreach($option as $opt)
                    {
                        echo "<li>
                            <input type=\"radio\" name=\"opt".$j2."\" value=\"".$row["item"].';'.$opt."\">";
                        echo "<label for=\"cd-radio-1\">".$opt."</label>
                        </li>";
                    }
                    echo "</ul>
                    </div>";
                    }
   	 }
   }
   else
   {
   	echo "<legend></legend>";
   	if($row["mandatory"]==1)
   	{  
   		$is_ques1++;
   	  echo "<INPUT TYPE=\"hidden\" NAME=\"mannonopt_iterm[]\" VALUE=\"".$row["item"]."\">";        
               echo" <div style=\"margin-bottom:20px\">";              
               echo"<h2 style=\"margin-bottom:5px\">".$row["item"]." *</h2>";
               echo     "<input class=\"a\" type=\"text\"  name=\"mannon_opt[]\" id=\"cd-title\" placeholder=\"input the answer\" required>
                </div>"; 
      }  
       else
      {
      	$is_ques2++;
      	echo "<INPUT TYPE=\"hidden\" NAME=\"nonopt_iterm[]\" VALUE=\"".$row["item"]."\">";
               echo" <div style=\"margin-bottom:20px\">";
               echo"<h2 style=\"margin-bottom:5px\">".$row["item"]."</h2>";
               echo "<input class=\"a\" type=\"text\"  name=\"non_opt[]\" id=\"cd-title\" placeholder=\"input the answer\">
                </div>"; 
              	}          
   }
 }
   }
     
          
?>                    
     </fieldset>
     <div>
        <input type="submit" value="Submit" onclick="return check()">
        <INPUT TYPE="hidden" NAME="i1" VALUE="<?php  echo "$i1";?>">
        <INPUT TYPE="hidden" NAME="j1" VALUE="<?php  echo "$j1";?>">
        <INPUT TYPE="hidden" NAME="i2" VALUE="<?php  echo "$i2";?>">
        <INPUT TYPE="hidden" NAME="j2" VALUE="<?php  echo "$j2";?>">
        <INPUT TYPE="hidden" NAME="d" VALUE="<?php  echo "$is_d";?>">
        <INPUT TYPE="hidden" NAME="is_ques1" VALUE="<?php  echo "$is_ques1";?>">
        <INPUT TYPE="hidden" NAME="is_ques2" VALUE="<?php  echo "$is_ques2";?>">
        <INPUT TYPE="hidden" NAME="ev" VALUE="<?php  echo "$event_id";?>">
     </div>
</form> 
 <script src="form/js/jquery-2.1.1.js"></script>
<script src="form/js/main.js"></script> <!-- Resource jQuery -->   
 <div style="
    bottom: 0;
    width: 100%;
    height: 30px;
    clear:both;">
<center><p class="copyright text-muted small">Copyright©2016 | All Rights Reserved EMS</p></center>              
</div> 

<script language="javascript">
function check(){
	  var mm='<?php echo $j1;?>';
	  var nn='<?php echo $i1;?>'
	  
	  for(var j=0; j<mm;j++)
	  {
	  var s=document.getElementsByName("manopt"+(j+1).toString()+"[]");	
	  var n=0;
	  for(var i=0;i<s.length;i++)
	  {
	  	
	  	if(s[i].checked)
	  	{
	  		n++;
	    }
	    
	  }
	  if(n==0)
	    {
	    alert("Please select the mandatory iterm!"); return false;
	    }
	  } 
	   
	   for(var j=0; j<nn;j++)
	  {
	  var s=document.getElementsByName("manmul_opt"+(j+1).toString()+"[]");	
	  var n=0;
	  for(var i=0;i<s.length;i++)
	  {
	  	
	  	if(s[i].checked)
	  	{
	  		n++;
	    }
	    
	  }
	  
	  if(n==0)
	    {
	    alert("Please select mandatory iterm!"); return false;
	    }
	  } 
	  var s=document.getElementsByName("mannon_opt"+"[]");	
	  for(var i=0;i<s.length;i++)
	  {
	  	if(s[i].value=="")
	  	{
	  		alert("Please input the answer!");
	  		s[i].focus();
	  		return false;
	  	}
	  } 
	if (form1.last_name.value==""){
		   alert("Please enter the last name!");form1.last_name.focus();return false;
		}
		if (form1.firstname.value==""){
		   alert("Please enter the first name!");form1.firstname.focus();return false;
		}
	if (form1.reg_email.value==""){
		   alert("Please enter the E-mail address!");form1.reg_email.focus();return false;
		}
		var i=form1.reg_email.value.indexOf("@");
		var j=form1.reg_email.value.indexOf(".");
		if((i<0)||(j<0)){
		   alert("Your E-mail address is incorrect!");form1.reg_email.value="";form1.reg_email.focus();return false;
		}	
		
		form1.submit(); 
}
</script>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body> 
</html>




