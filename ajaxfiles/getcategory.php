<?php

include '../dbcon.php';

$c = $_GET['c'];

 ?>

 <div class="control-group">

									<label class="control-label" for="form-field-1">Category Type</label>

									<div class="controls">

									<select name="category_id" id="category_id" onchange="getdevice(this.value);">

									<option>Select Cateory</option>

									<?php

								

									$q=mysql_query("select * from customer_order_details where customer_id='$c' group by category_id");

while($sqs=mysql_fetch_array($q))

{

$catid=$sqs['category_id'];



							

									$sq=mysql_query("select * from gps_categories where category_id='$catid'");

									while($sqss=mysql_fetch_array($sq))

									{

										?>

									<option value="<?php echo $sqss['category_id'];?>" ><?php echo $sqss['category_type'];?></option>	

										<?php

									}}

									?>

									

									</select>

									</div>

									</div>