<?php

include '../dbcon.php';
$sql="select stockid from stock where dc_no='".$_POST['val']."'";
$rs=mysql_query($sql);
$rw=mysql_fetch_assoc($rs);
if($rw['stockid'] && $rw['stockid']!=''){
	echo "exists";
}else{
	echo "success";
}
?>