<?php

include '../dbcon.php';

$c = $_GET['c'];
$catid = $_GET['catid'];

?>


                                <option >Choose Subscription</option>

								<?php 

								$qs=mysql_query("select * from device_subscription where category_id='$catid'");

								while($rss=mysql_fetch_array($qs))

								{

									$ct=$rss['cost'];

									$dis=$rss['discount'];

									

									$val=($ct)*($dis/100);

									$subcost=$ct-$val;

									?>

									

									

								 <option value="<?php echo $rss['month'];?>" id="<?php echo $catid;?>"><?php echo $rss['month']."Months"." - ".$subcost;?></option>	

								

								<?php

								}

								?>

			
