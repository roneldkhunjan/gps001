<?php

include '../dbcon.php';
$imei=trim($_POST['imei']);
$sql="select detail_id from stock_details where imei='".$imei."'";
//$sql="select detail_id from stock_details where item='".$_POST['val']."' and imei='".$_POST['imei']."'";
//echo $sql;
$rs=mysql_query($sql);
$rw=mysql_fetch_assoc($rs);
if($rw['detail_id'] && $rw['detail_id']!=''){
	echo "exists";
}else{
	echo "success";
}
?>