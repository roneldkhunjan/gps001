<?php
include '../dbcon.php';
$c = $_GET['c'];



 ?>
	<div class="control-group">
									<label class="control-label" for="form-field-1">Device Type</label>
									<div class="controls">
<!--<select name="device_type" id="device_type" onchange="getmodel();"  >-->
<select name="device_type" id="device_type"  >
									<option>Select Device</option>
									<?php
									$q=mysql_query("select * from gps_devices where category_id='$c'");
while($sqs=mysql_fetch_array($q))
									{
										?>
									<option value="<?php echo $sqs['device_id'];?>"><?php echo $sqs['device_type'];?></option>	
										<?php
									}
									?>
									
									</select>
</div>
</div>