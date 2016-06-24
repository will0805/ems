<?php
include "conn.php";
$event_id=$_GET['event_id'];
$result = mysql_query("SELECT * FROM reg_doc where event_id='$event_id'");
$path='event_zip\\event'.$event_id.'.zip';
$zip=new ZipArchive();
if ($zip->open($path, ZipArchive::OVERWRITE) === TRUE)
  {
while($row = mysql_fetch_array($result)){
  $zip->addFile($row['doc']); 
}
$zip->close();
}
  $name=basename($path);
  header('Content-Type: application/force-download');
	header('Content-Disposition: attachment; filename="'.$name.'"');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: ' . filesize($path));
	readfile($path);
include "close.php";
?>