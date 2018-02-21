<?php

include '../dbcon.php';

$euid= $_GET['c'];

$qs=mysql_query("select * from customers where customer_emailid='$euid'");

if(mysql_num_rows($qs)>0)

{

	echo "exist";

}

else

{

	echo "Customer Email Id Does not Exist In database";

}

?>