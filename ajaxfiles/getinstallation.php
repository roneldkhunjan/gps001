<?php
include '../dbcon.php';
$imei=trim($_POST['imei']);
$sql="select instatllation_id from installation where imie_no='".$imei."'";
$rs=mysql_query($sql);
$rw=mysql_fetch_assoc($rs);
if($rw['instatllation_id'] && $rw['instatllation_id']!=''){
	echo "exists";
}else{
	echo "success";
}
?>