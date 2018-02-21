<?php
include '../dbcon.php';
$devid= $_GET['c'];
$qqss=mysql_query("select * from gps_model_details where model_id='$devid'");
while($sqs3=mysql_fetch_array($qqss))
{ echo $sqs3['imie_number'];
}
?>
