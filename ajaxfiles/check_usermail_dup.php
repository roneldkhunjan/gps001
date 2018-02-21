<?php
include '../dbcon.php';
$mail= $_GET['mail'];
$qs="";
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$qs=" and id!=$id";
}
$qq=mysql_query("select id from admin_data where email_id='$mail' $qs ");
if($qq && mysql_num_rows($qq) > 0){	
echo "exists";
}else{echo "not exists";
}



?>