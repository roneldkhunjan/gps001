<?php
include '../dbcon.php';
$catid= $_GET['catid'];
$qq=mysql_query("select * from gps_categories where category_id='$catid'");
while($rq=mysql_fetch_array($qq))
{
$ct=$rq['installation_cost'];
echo $ct;
}