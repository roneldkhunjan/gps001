<?php

include '../dbcon.php';

$c = $_GET['c'];

 ?>





									<option>Select Device</option>

									<?php

									$q=mysql_query("select * from gps_devices where category_id='$c'   and backend_show='show'");

while($sqs=mysql_fetch_array($q))

									{

										?>

									<option value="<?php echo $sqs['device_id'];?>" id="<?php echo $c;?>" name="<?php echo $sqs['device_type'];?>"><?php echo $sqs['device_type'];?></option>	

										<?php

									}

									?>

								
