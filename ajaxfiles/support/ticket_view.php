<?php

include '../../dbcon.php';

$id = isset($_POST['id'])?mysql_real_escape_string($_POST['id']):'';


$q=mysql_query("SELECT t.*,c.customer_first_name from support_tickets t join customers c on t.customer_id=c.customer_id where id=$id");
if($q){
	$rw=mysql_fetch_assoc($q);
	
	$att=array();
	$qa=mysql_query("select * from support_attachments where ticket_id=".$rw['id']);
	if($qa && mysql_num_rows($qa) > 0){
		while($qw=mysql_fetch_assoc($qa)){
			$att[]=array("id"=>$qw['id'],"name"=>$qw['file_name']);
		}
	}
	$arr=array(
		"ID" => $rw['id'],
		"Title" => $rw['title'],
		"Client" => $rw['customer_first_name'],
		"ClientID" => $rw['customer_id'],
		"Status" => $rw['status'],
		"Level" => $rw['level'],
		"Message" => $rw['description'],
		"Attachments"=>$att
	);
	echo json_encode($arr);
	
}else{
	echo "error";
}

?>