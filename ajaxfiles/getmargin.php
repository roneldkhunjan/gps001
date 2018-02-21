<?php
include '../dbcon.php';
$devid= $_GET['c'];
$catid= $_GET['catid'];
$qq=mysql_query("select * from gps_devices where category_id='$catid' and device_id='$devid'");
while($rq=mysql_fetch_array($qq))
{
$ct=$rq['margin'];
echo $ct;
}