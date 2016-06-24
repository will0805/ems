<?php 
include "conn.php";
$event_id=$_GET['event_id'];
$reg_id=$_GET['reg_id'];
$result = mysql_query("SELECT * FROM reg_doc where reg_id='$reg_id' and event_id='$event_id'");
$result1 = mysql_query("SELECT * FROM reg where reg_id='$reg_id'");
$row1 = mysql_fetch_array($result1);
$full_name=$row1['firstname']."_".$row1['lastname']."_".$reg_id;
$zip=new ZipArchive();
$path='reg_zip\\'.$full_name.'.zip';

if ($zip->open($path, ZipArchive::OVERWRITE) === TRUE)
  {
while($row = mysql_fetch_array($result)){
  $zip->addFile($row['doc']); 
}
$zip->close();
}
$num=mysql_num_rows($result);
if($num!=0)
{
  $name=basename($path);
  header('Content-Type: application/force-download');
	header('Content-Disposition: attachment; filename="'.$name.'"');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: ' . filesize($path));
	readfile($path);
}
else
{
	echo "
<script language=\"javascript\">
alert (\"No ducuments to download!\");
history.go(-1);
</script>";
}
exit();
include "close.php";
?>