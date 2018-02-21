<?php

include 'dbcon.php';

$q=mysql_query("SELECT * FROM `gps_model_details` where category_type=5 and device_id=11");
var_dump(mysql_num_rows($q));

?>