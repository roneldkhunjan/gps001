<?php
include '../dbcon.php';

//print_r($_POST);
$from=date("Y-m-d",strtotime($_POST['frmdate']));
$to=date("Y-m-d",strtotime($_POST['todate']));
$cid=$_POST['cid'];
if($cid){
	$sq="select count(id) as cnt from speed_alert_log where customer_id=$cid and phone<>'' and CAST(time_stamp AS DATE) between '$from' and '$to'";
	$rs=mysql_query($sq);
	$rw=mysql_fetch_assoc($rs);
	$sct=$rw['cnt'];
	
	$sql="select count(id) as cnt from fence_alert_log where customer_id=$cid and phone<>'' and CAST(time_stamp AS DATE) between '$from' and '$to'";
	$rst=mysql_query($sql);
	$row=mysql_fetch_assoc($rst);
	$fct=$row['cnt'];
	
	$sqt="select count(id) as cnt from fuel_theft_alerts where cid=$cid and phone<>'' and CAST(ts AS DATE) between '$from' and '$to'";
	$rstt=mysql_query($sqt);
	$rowt=mysql_fetch_assoc($rstt);
	$tct=$rowt['cnt'];
/*	
	$sqi="select count(id) as cnt from idle_alert_log where customer_id=$cid and CAST(time_stamp AS DATE) between '$from' and '$to'";
	$rsi=mysql_query($sqi);
	$rwi=mysql_fetch_assoc($rsi);
	$ict=$rwi['cnt'];
	*/
	
	$etaadmin=0;
	$school=0;
						$sqct="select is_school,customer_emailid from customers where customer_id=$cid";//echo $sqct;
						$rsct=mysql_query($sqct);
						$rwct=mysql_fetch_assoc($rsct);
						if($rwct['is_school']==1){	
							$cust_sql="select school_id from school where email1='".$rwct['customer_emailid']."'";//echo $cust_sql;
							$cust_rs=mysql_query($cust_sql);
							$cust_rw=mysql_fetch_assoc($cust_rs);
							$school=$cust_rw['school_id'];	
							
							
							$sqa="select count(id) as cnt from eta_log_school where school_id=$school and phone<>'' and CAST(ts AS DATE) between '$from' and '$to'";
							//echo $sqa;
							$rsa=mysql_query($sqa);
							$ra=mysql_fetch_assoc($rsa);
							$etaadmin=$ra['cnt'];
							
						}
?>
<link rel="stylesheet" href="http://ogtslive.com/gps/media/css/TableTools.css" />
<table  class="table table-striped table-bordered alerts_tb">
<thead>
<tr>
<th>Alert</th>
<th>Count</th>
</tr>
</thead>
<tbody>
<tr>
<td>Speed Alerts</td>
<td><?php echo $sct; ?></td>
</tr>

<tr>
<td>Fence Alerts</td>
<td><?php echo $fct; ?></td>
</tr>

<tr>
<td>Theft Alerts</td>
<td><?php echo $tct; ?></td>
</tr>

<!--<tr>
<td>Idle Alerts</td>
<td><?php echo $ict; ?></td>
</tr>-->

<?php if($school > 0){ ?>
<tr>
<td>ETA Admin Alerts</td>
<td><?php echo $etaadmin; ?></td>
</tr>
<?php } ?>
</tbody>

</table>



<?php if($school > 0){ 

$sqeta="SELECT s.student_id,s.student_name,s.parent_phone1,count(l.id) as cnt FROM students s left join eta_log l on s.student_id=l.student_id  where school_id=$school and phone<>'' and CAST(l.ts AS DATE) between '$from' and '$to' group by s.student_id";
$rseta=mysql_query($sqeta);
if($rseta && mysql_num_rows($rseta) > 0){	

?>
<h3 class="header smaller lighter blue">ETA Alerts</h3>
<table class="table table-striped table-bordered alerts_tb">
<thead>
<tr>
<th>Student</th>
<th>Parent Phone</th>
<th>Alert Count</th>
<th>RFID Alert Count</th>
</tr>
</thead>
<tbody>

<?php while($rweta=mysql_fetch_assoc($rseta)){

	$stu=$rweta['student_id'];
	$sqrf="select count(id) as cnt from rfid_log where student_id=$stu and phone<>'' and CAST(ts AS DATE) between '$from' and '$to' ";//echo $sqrf;
	$rsrf=mysql_query($sqrf);
	$rwrf=mysql_fetch_assoc($rsrf);
?>

<tr>
<td><?php echo $rweta['student_name']; ?></td>
<td><?php echo $rweta['parent_phone1']; ?></td>
<td><?php echo $rweta['cnt']; ?></td>
<td><?php echo $rwrf['cnt']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>

<?php } } ?>

<?php
}else{
	echo "Please select customer";
}
?>
