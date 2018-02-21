

<?php

include '../dbcon.php';

$c = $_GET['c'];

$cid = $_GET['cid'];





 ?>

 

 <div class="control-group">



			<label class="control-label">Device Type</label>



				<div class="controls"> 



<select name="device_type" id="device_type" onchange="getnofdevice(this.value);">

									<option>Select Device</option>

									<?php

									$q=mysql_query("select * from customer_order_details where customer_id='$cid' and category_id='$c' group by device_id");

while($sqs=mysql_fetch_array($q))

{

$catid=$sqs['category_id'];

$devid=$sqs['device_id'];

$noofdevice=$sqs['noofdevice'];



									$qq=mysql_query("select * from gps_devices where device_id='$devid'");

while($sqss=mysql_fetch_array($qq))

									{

										?>

									<option value="<?php echo $sqss['device_id'];?>"><?php echo $sqss['device_type'];?></option>	

										<?php

									}}

									?>

									

									</select>

  

   </div>

</div>

