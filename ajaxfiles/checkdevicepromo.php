<?php
include '../dbcon.php';
$code = $_GET['code'];
$devcst = $_GET['devcst'];

$sql= mysql_query("select * from  promo_codes where code='$code' and status='valid'");
if(mysql_num_rows($sql)>0)
{

$rs=mysql_fetch_array($sql);
$cid=$rs['code_id'];
$sqls= mysql_query("SELECT * FROM `promos` p left join promo_codes pc on pc.promo_id=p.id where  code='$code' and code_id='$cid' and status='valid'");
$rsq=mysql_fetch_array($sqls);
$abc=$rsq['discount_per'];
$devamount=intval($devcst)-(intval($devcst)*(floatval($abc)/100));
echo $devamount;
}
else
{
echo "failure";
//echo "Not a Valid Promo Code";
}