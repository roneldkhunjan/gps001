<?php
include '../dbcon.php';
$c = $_GET['c'];

$sql= mysql_query("select * from  invoice_tb where invtbid='$c'");

		

if(mysql_num_rows($sql)>0)

{

	echo "<h5 style='color:red;  margin-left: 97px;'>Invoice Number is already present</h5>";

}

else{

	echo "success";

}

?>