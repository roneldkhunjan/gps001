<?php
include '../dbcon.php';
$c = $_GET['c'];
$qqss=mysql_query("select * from gps_model_details where imie_number='$c' ");
while($sqs3=mysql_fetch_array($qqss))
{ 
$model_id= $sqs3['model_id'];
echo $model_id;
}
?>
