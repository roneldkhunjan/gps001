<!DOCTYPE HTML>

<html>

<head>
  <title>GPS</title>
  <link  href="<?php echo base_url();?>ck/style.css" rel="stylesheet" type="text/css"/>
  <style type="text/css">
  	
  /*	html, body {
    height: 100%;
}*/

html {
    display: table;
    margin: auto;
}
/*
body {
    display: table-cell;
    vertical-align: middle;
}*/
  </style>
</head>



<body style="font-family:Times New Roman;">

<?php


function no_to_words($no)
{   
 $words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred &','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
    if($no == 0)
        return ' ';
    else {
                $novalue='';
                $highno=$no;
                $remainno=0;
                $value=100;
                $value1=1000;       
            while($no>=100)    {
                if(($value <= $no) &&($no  < $value1))    {
                $novalue=$words["$value"];
                $highno = (int)($no/$value);
                $remainno = $no % $value;
                break;
                }
                $value= $value1;
                $value1 = $value * 100;
            }       
          if(array_key_exists("$highno",$words))
              return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
          else {
             $unit=$highno%10;
             $ten =(int)($highno/10)*10;            
             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);
           }
    }
}




?>
<?php
	$id=$_GET['id'];
					$inv=$_GET['inv'];
					$iiq=mysql_query("select * from invoice_tb where order_id=$inv");
					if(mysql_num_rows($iiq)>0)
					{
					$riiq=mysql_fetch_array($iiq);
					$invs=$riiq['invtbid'];
					$invsiot=$invs-142;
					$invoice_year=$riiq['invoice_year'];
					}
					else
					{
					$invs=$inv;
					$invsiot=$invs-945;
					$invoice_year="2014-15";
					}
					
					
			
				
					
$qq=mysql_query("SELECT o.customer_id,

o.order_id,o.order_date,
o.order_type
FROM
customer_orders o
inner join payment_master r on o.order_id=r.order_id inner join installation i on i.order_id=o.order_id where i.order_id='$inv' and i.customer_id='$id' group by i.order_id
order by o.order_id desc");
if(mysql_num_rows($qq)>0)
{
	?>
	<?php
				
					
					$sq1="SELECT

o.order_id,

o.customer_id,
c.state,
c.city,
c.pin_code,

c.customer_first_name,

c.customer_middle_name,

c.customer_last_name,

c.customer_phone_no,

c.customer_emailid,

c.address,

c.comp_name,

c.comp_addr,

c.comp_teleph,

c.comp_email,c.state,

c.website,c.type,

o.final_cost,

o.order_date

FROM

customer_orders o

INNER JOIN customers c ON o.customer_id = c.customer_id

WHERE o.customer_id=$id AND o.order_id=$inv";

$rs=mysql_query($sq1);

$order=mysql_fetch_assoc($rs);
					
					$sq_sett="select * from settings";

$rs_sett=mysql_query($sq_sett);

$sett=mysql_fetch_assoc($rs_sett);

//$s_tax_per=$sett['service_tax_percentage'];

$vat_per=$sett['vat_percentage'];
$state=$order['state'];

					?>
					
					<div>
					<table border="1px" style="width: 823px;" >
					<tr><td>
<img style="height:90px;" align="absmiddle" src="<?php echo base_url();?>ck/mainlogo.png" alt="" />
<br/>
<a>
<h1  style=" 
    margin-top: 0px;
    margin-bottom: -24px;margin-left:302px;font-size:30px;">TAX INVOICE</h1>
<h1  style="
    margin-top: 15px;
    margin-bottom: -24px;margin-left:80px;"  >IOT RESEARCH LABS PRIVATE LIMITED</h1>
<h3 style="margin-bottom: -20px;margin-left:246px;
">(OSS GPS TRACKING SOLUTIONS)</h3>
<h3  style="margin-left: 143px;"># 204 Raheja Chamber, 12 Museum Road, Bangalore - 560 001</h3></a>
<br/>
<table  border="1" style="width: 821px;font-size: 14px;border-bottom: black;
border-left: black;
border-right: black;margin-top: 0px;">
	<tr><td style="padding: 5px;max-width: 125px;" rowspan="" align="top">INVOICE TO</td>
	<td>Invoice Number</td>
	<td>#INV<?php echo str_pad($invsiot, 4, '0', STR_PAD_LEFT)."/".$invoice_year; ?></td>
	</tr>
	<tr>
<?php
if($order['comp_email']!='')
{
?>

<td rowspan="6" align="top" style="max-width: 125px;font-size: 19px;"><?php echo $order['customer_first_name'];?><br /><?php echo $order['comp_addr']; ?><br/>
	<?php echo $order['state']; ?> - <?php echo $order['city']; ?> - <?php echo $order['pin_code']; ?></td>
	<?php }
	else
	{ ?>
	<td rowspan="6" align="top" style="max-width: 125px;font-size: 19px;"><?php echo $order['customer_first_name'];?><br />	<?php echo $order['address']; ?><br/>
	<?php echo $order['state']; ?> - <?php echo $order['city']; ?> - <?php echo $order['pin_code']; ?>
	
	</td>

<?php } ?>
	<td>Invoice Date</td>
	<td style="padding: 5px;"><?php echo date("d-m-Y",strtotime($order['order_date'])); ?></td>
	</tr>
	
	
	
	<tr>
	<td>Destination </td>
	<td></td>
	</tr>
	
	<tr>
	<td>Purchase Order No </td>
	<td style="padding: 5px;"><?php echo "OD_".$inv; ?></td>
	</tr>
	
	<tr>
	<td>Delivery Date</td>
	<td style="padding: 5px;"></td>
	</tr>
	
	<tr>
	<td>Payment Mode</td>
	<td style="padding: 5px;"  width="195px"></td>
	</tr>
	
</table>

<br/>
<br/>


<table  border="1" cellpadding="0" cellspacing="0" style="width: 821px;border-bottom: black;
border-left: black;
border-right: black;margin-top: 0px;">
	<tr><th style="padding: 5px">Description of Goods</th>
		<th style="padding: 5px">Quantity</th>
	<th style="padding: 5px">Rate</th>
	<th style="padding: 5px">Per</th>
	<th style="padding: 5px">Amount (INR)</th>
	</tr>
    <?php

															$i=0;

															$subtot=0;

															$subs_cost=0;

															$inst_cost=0;

															$dev_cost_tot=0;
															$sim_cost=0;

															

															$sql1="SELECT

od.category_id,

gps_categories.category_type,

od.device_id,



od.noofdevice,

od.sub_month,

od.subcost,od.vat_percentage,od.service_percentage,

od.device_cost,od.charge,

od.installation_cost,

customer_orders.order_type

FROM

customer_order_details AS od

INNER JOIN gps_categories ON od.category_id = gps_categories.category_id



INNER JOIN customer_orders ON od.order_id = customer_orders.order_id

WHERE od.customer_id=$id AND od.order_id=$inv";

	$rs1=mysql_query($sql1);

															while($ord_det=mysql_fetch_assoc($rs1)){

																$ctid=$ord_det['category_id'];
																$did=$ord_det['device_id'];
																$ndev=$ord_det['noofdevice'];
																$inst=$ord_det['installation_cost'];
																$sbmnth=$ord_det['sub_month'];
																$sbcst=$ord_det['subcost'];
																$simcharge=$ord_det['charge'];
																$vatper=$ord_det['vat_percentage'];
																$s_tax_per=$ord_det['service_percentage'];
															

																if($ord_det['order_type']=='renew'){

																	$ord_det['device_cost']=0;

																	$ord_det['installation_cost']=0;

																}



$tot=($ord_det['device_cost']+$ord_det['installation_cost']+$ord_det['subcost'])*$ord_det['noofdevice'];

$subtot=$tot;

$subs_cost+=($ord_det['noofdevice']*$ord_det['subcost']);

$inst_cost+=($ord_det['noofdevice']*$ord_det['installation_cost']);
$sim_cost+=($ord_det['noofdevice']*$ord_det['charge']);

$dev_cost_tot+=($ord_det['noofdevice']*$ord_det['device_cost']);
 

 ?>

	
	<tr>
		<td >
		<?php if($inv=="808")
		{
			echo "Gps Tracker";
		}
		else
		{
?>		
		<?php echo $ord_det['category_type']; ?> - <?php $dv=mysql_query("select device_type from gps_devices where device_id='$did'");
while($redv=mysql_fetch_array($dv))
{
	$devtype=$redv['device_type'];
?><?php echo $devtype; }  ?>
<?php } ?>
<br/>
		<?php
		$ai=array();

		$iq=mysql_query("select * from installation where order_id='$inv' and category_id='$ctid' and device_id='$did'");
		while($riq=mysql_fetch_array($iq))
		{
			array_push($ai,$riq['imie_no']);
			?>
			
			<?php
		}
		$comma_separated = implode("<br/>", $ai);
		?>
		<?php echo $comma_separated;?></td>
		<td><?php echo $ord_det['noofdevice']; ?></td>
		<td><?php echo $ord_det['device_cost']; ?></td>
		<td>Nos</td>
	<td><?php echo $ord_det['device_cost']*$ord_det['noofdevice']; ?></td>
	</tr>
	
	<?php if($inst!=0)
	{
?>
<tr>
<td>Installation Charges</td>
<td><?php echo $ndev; ?></td>
<td><?php echo $inst; ?></td>
<td>Nos</td>
<td><?php echo $inst*$ndev; ?></td>
	
</tr>
<?php } ?>
<?php if($sbcst!=0)
	{
?>
<tr>
<td>Subscription Charges(for <?php echo $sbmnth;?> Months)</td>
<td><?php echo $ndev; ?></td>
<td><?php echo $sbcst; ?></td>
<td>Nos</td>
<td><?php echo $sbcst*$ndev; ?></td>
	
</tr>
<?php }

 ?>
<?php if($simcharge!="0" && $simcharge!='')
{
	?>
<tr>
<td>Sim Charges(for <?php echo $sbmnth;?> Months)</td>
<td><?php echo $ndev; ?></td>
<?php if($simcharge==0 || $sbmnth==0 || $sbmnth=='' || $simcharge=='')
{ 
?>
<td><?php echo "0"; ?></td>
<?php
}
else{

?><td><?php echo (int)($simcharge/$sbmnth); ?></td>
<?php } ?>
<td>Nos</td>
<td><?php echo $simcharge*$ndev; ?></td>
	
</tr>
<?php } ?>
<tr>

<td>SubTotal of VAT</td>
<td></td>
<td></td>
<td></td>
<td><?php echo $ord_det['device_cost']*$ord_det['noofdevice']; ?></td>
</tr>
<tr>

<td>SubTotal of ServiceTax</td>
<td></td>
<td></td>
<td></td>
<td><?php echo (($inst*$ndev)+($sbcst*$ndev)+($simcharge*$ndev));?></td>
</tr>
<?php
		
		
		 } 
																									   
																									   
																									   	$pkq="SELECT
od.packing,
od.freight,
od.smspackage,
od.video_streaming,
od.noofdevice,
customer_orders.order_type
FROM
customer_order_details AS od
INNER JOIN customer_orders ON od.order_id = customer_orders.order_id
WHERE od.customer_id=$id AND od.order_id=$inv";
	$rpkq=mysql_query($pkq);

															while($rpkqq=mysql_fetch_assoc($rpkq)){
														$packing=$rpkqq['packing'];
														$freight=$rpkqq['freight'];
														$smspackage=$rpkqq['smspackage'];
														$video_streaming=$rpkqq['video_streaming'];
															}
															?>
															<?php
															if($packing!=0)
															{
																?>
																<tr>
															<td>Packing</td>
															<td></td>
															<td></td>
															<td></td>
															<td><?php echo $packing;?></td>
															</tr>
															<?php
															} ?>
															<?php
															if($freight!=0)
															{
																?>
															<tr>
															<td>Freight</td>
															<td></td>
															<td></td>
															<td></td>
															<td><?php echo $freight;?></td>
															</tr>
															<?php
															} ?>
															<?php
														
															if($smspackage!=0)
															{
																?>
															<tr>
															<td>Sms Package</td>
															<td></td>
															<td></td>
															<td></td>
															<td><?php echo $smspackage;?></td>
															</tr>
															<?php
															} ?>
															<?php
															if($video_streaming!=0)
															{
																?>
															<tr>
															<td>Video Streaming</td>
															<td></td>
															<td></td>
															<td></td>
															<td><?php echo $video_streaming;?></td>
															</tr>
															<?php
															} 
		 $s_tax=(($subs_cost+$inst_cost+$sim_cost+$smspackage+$video_streaming)*$s_tax_per)/100;

															$vat=(($dev_cost_tot+$packing)*$vatper)/100;

															$total=$subtot+$s_tax+$vat;
	 ?>
	
	<tr>
	<?php if($state=='Karnataka'||$state=='karnataka')
	{
			?> <td>VAT @ <?php echo $vatper; ?>% </td>
			
			
		<td></td>
		 
		<td></td>
	
	<td><?php echo $vatper; ?>%</td>
		 <td><?php echo $vat; ?></td>
		 
		 <?php } 
		 else
		{
			?>
			<td>CST @ <?php echo $vatper; ?>% </td>
			
			
		<td></td>
		 
		<td></td>
	
	<td><?php echo $vatper; ?>%</td>
		 <td><?php echo $vat; ?></td>
			<?php
		 }
		 ?>
	</tr>
	<tr>
		<td>Service Tax @ <?php echo $s_tax_per; ?>%</td>
		<td></td>
		
		<td></td>
		
		<td><?php echo $s_tax_per; ?>%</td>
		<td><?php echo $s_tax; ?></td>
	</tr>
	
			<?php


$smq=mysql_query("select final_cost from customer_orders where  customer_id=$id AND order_id=$inv");
while($rsmq=mysql_fetch_array($smq))
{
	$total=$rsmq['final_cost'];
}
					?>
	<tr>
		<td>Total</td>
		<td></td>
		<td></td>
		<td></td>
		
		<td><?php echo $total; ?></td>
	</tr>

	<tr rowspan="2">
	<td>Amount in words</td>
		<td colspan="5">&nbsp;&nbsp;&nbsp;  <?php echo ucwords(no_to_words($total))." Only"; ?></td>
		
</tr>
		
	
	
	
</table>

<!--<table border="1" style="width: 822px;">
<tr rowspan="2">
	<td>Amount in words:-</td>
		<td><?php echo no_to_words($total); ?></td>
		
</tr>
</table>-->
<br/>
<br/>

<table border="1"  style="width: 821px;border-bottom: black;
border-left: black;
border-right: black;">
	<!--<tr>
		<td width="200px" style="padding-top: 0px; padding-top: 2px !important;">Service Tax No</td>
		<td  width="250px">AAACO3054HST001</td>
	</tr>-->
	<tr>
		<td>PAN No</td>
		<td >AADCI8710K</td>
	</tr>
	<!--<tr>
		<td>VAT No</td>
		<td >29120320337</td>
	</tr><tr>
		<td>CST No</td>
		<td >4470643</td>
	</tr>-->
	
	
</table >
<br/>
<br/>
<b>Payment :- Cheque/DD/Payorder in favour of "IoT Research Labs Private Limited"</b><br/>
<b>Online Transfer:- Federal Bank , A/c-21980200000154, IFSC Code-FDRL0002198,B'lore.</b><br/>
<b>For IoT Research Labs Private Limited</b>
<br/>
<br/>
<table >
	<tr ><td><br/>Authorized Signatory</td>
	<td><img  style="margin-left: 510px; height:75px" src="<?php echo base_url();?>ck/Logo.png"/></td></tr>
	
</table>

<?php }
else
{
	 ?>
	<?php
					$id=$_GET['id'];
					$inv=$_GET['inv'];
			
					$sq1l="SELECT

o.order_id,

o.customer_id,
c.state,
c.city,
c.pin_code,

c.customer_first_name,

c.customer_middle_name,

c.customer_last_name,

c.customer_phone_no,

c.customer_emailid,

c.address,

c.comp_name,

c.comp_addr,

c.comp_teleph,

c.comp_email,c.state,

c.website,c.type,

o.final_cost,

o.order_date

FROM

customer_orders o

INNER JOIN customers c ON o.customer_id = c.customer_id

WHERE o.customer_id=$id AND o.order_id=$inv";

$rss=mysql_query($sq1l);

$orders=mysql_fetch_assoc($rss);
					
					$sq_settt="select * from settings";

$rs_settt=mysql_query($sq_settt);

$settt=mysql_fetch_assoc($rs_settt);

//$s_tax_per=$settt['service_tax_percentage'];

$vat_per=$settt['vat_percentage'];
$state=$orders['state'];
$type=$orders['type'];
					?>
					
					</td></tr>
</table></div>


<div>
<table border="1px" style="width: 821px;">
					<tr><td>
<img   align="absmiddle" src="<?php echo base_url();?>ck/mainlogo.png" alt="" />



<h1  style=" 
    margin-top: -35px;
    margin-bottom: -21px;margin-left:243px;font-size:30px;"><?php
    if($inv=="802"||$type=="Dealer" || $invs=="47"|| $invs=="48"|| $invs=="34"|| $invs=="46" || $invs=="53" || $invs=="509" || $inv=="893"|| $inv=="895" || $inv=="899" || $inv=="902" || $inv=="878" || $inv=="906" || $inv=="904" || $inv=="945" )
    {
		echo "TAX INVOICE";
	}
	else
	{
?> PROFORMA INVOICE<?php   } ?>
</h1>

<h1  style="
    margin-top: 15px;
    margin-bottom: -24px;margin-left:73px;"  >IOT RESEARCH LABS PRIVATE LIMITED</h1>
<h3 style="margin-bottom: -17px;margin-left:242px;
">(OSS GPS TRACKING SOLUTIONS)</h3>
<h3  style="margin-left: 131px;"># 204 Raheja Chamber, 12 Museum Road, Bangalore - 560 001</h3>

<table  border="1" style="width: 821px;font-size: 14px;border-bottom: black;
border-left: black;
border-right: black;">
	<tr><td style="padding: 5px;max-width: 125px;" rowspan="" align="top">INVOICE TO</td>
	<td>Invoice Number</td>
	<td>#INV<?php echo str_pad($invsiot, 4, '0', STR_PAD_LEFT)."/".$invoice_year; ?></td>
	</tr>
	<tr>
<?php
if($orders['comp_email']!='')
{
?>

<td rowspan="6" align="top" style="max-width: 125px;font-size: 19px;"><?php echo $orders['customer_first_name'];?><br /><?php echo $orders['comp_addr']; ?><br/>
	<?php echo $orders['state']; ?> - <?php echo $orders['city']; ?> - <?php echo $orders['pin_code']; ?></td>
	<?php }
	else
	{ ?>
	<td rowspan="6" align="top" style="max-width: 125px;font-size: 19px;"><?php echo $orders['customer_first_name']."&nbsp;&nbsp;".$orders['customer_last_name'];?><br />	<?php echo $orders['address']; ?>
	<br/>
	<?php echo $orders['state']; ?> - <?php echo $orders['city']; ?> - <?php echo $orders['pin_code']; ?>
	</td>

<?php } ?>
	<td>Invoice Date</td>
	<td style="padding: 5px;"><?php echo date("d-m-Y",strtotime($orders['order_date'])); ?></td>
	</tr>
	
	
	
	<tr>
	<td>Destination </td>
	<td></td>
	</tr>
	
	<tr>
	<td>Purchase Order No </td>
	<td style="padding: 5px;"><?php echo "OD_".$inv; ?></td>
	</tr>
	
	<tr>
	<td>Delivery Date</td>
	<td style="padding: 5px;"></td>
	</tr>
	
	<tr>
	<td>Payment Mode</td>
	<td style="padding: 5px;"  width="195px"></td>
	</tr>
	
	
</table>


<table  border="1" style="width: 821px;border-bottom: black;
border-left: black; padding: 4px !important;
border-right: black;margin-top:12px">
	<tr><th style="padding: 5px">Description of Goods</th>
		<th style="padding: 5px">Quantity</th>
	<th style="padding: 5px">Rate</th>
	<th style="padding: 5px">Per</th>
	<th style="padding: 5px">Amount (INR)</th>
	</tr>
    <?php

															$i=0;

															$subtot=0;

															$subs_cost=0;

															$inst_cost=0;

															$dev_cost_tot=0;
															$sim_cost=0;

															

															$sql1="SELECT

od.category_id,

gps_categories.category_type,

od.device_id,

od.noofdevice,

od.sub_month,

od.subcost,od.vat_percentage,od.service_percentage,

od.device_cost,od.charge,

od.installation_cost,

customer_orders.order_type

FROM

customer_order_details AS od

INNER JOIN gps_categories ON od.category_id = gps_categories.category_id

INNER JOIN customer_orders ON od.order_id = customer_orders.order_id

WHERE od.customer_id=$id AND od.order_id=$inv";


	$rs1=mysql_query($sql1);

															while($ord_det=mysql_fetch_assoc($rs1)){

																$ctid=$ord_det['category_id'];
																$did=$ord_det['device_id'];
																$ndev=$ord_det['noofdevice'];
																$inst=$ord_det['installation_cost'];
																$sbmnth=$ord_det['sub_month'];
																$sbcst=$ord_det['subcost'];
																$simcharge=$ord_det['charge'];
																$vatper=$ord_det['vat_percentage'];
															$s_tax_per=$ord_det['service_percentage'];

																if($ord_det['order_type']=='renew'){

																	$ord_det['device_cost']=0;

																	$ord_det['installation_cost']=0;

																}



$tot=($ord_det['device_cost']+$ord_det['installation_cost']+$ord_det['subcost'])*$ord_det['noofdevice'];

$subtot=$tot;

$subs_cost+=($ord_det['noofdevice']*$ord_det['subcost']);

$inst_cost+=($ord_det['noofdevice']*$ord_det['installation_cost']);
$sim_cost+=($ord_det['noofdevice']*$simcharge);

$dev_cost_tot+=($ord_det['noofdevice']*$ord_det['device_cost']);
 ?>

	
	<tr>
	<?php if($id==364)
	{
		?>
		<td>Vehicle GPS Tracker</td>
		<?php
	}
	else{
?>		<td ><?php echo $ord_det['category_type']; ?> -<?php $dv=mysql_query("select device_type from gps_devices where device_id='$did'");
while($redv=mysql_fetch_array($dv))
{
	$devtype=$redv['device_type'];
?><?php echo $devtype; }  ?></td>

	<?php } ?>
		<td><?php echo $ord_det['noofdevice']; ?></td>
		<td><?php echo $ord_det['device_cost']; ?></td>
		<td>Nos</td>
	<td><?php echo $ord_det['device_cost']*$ord_det['noofdevice']; ?></td>
	</tr>
	
<?php if($inst!=0)
	{
?>		
<tr>
<td>Installation Charges</td>
<td><?php echo $ndev; ?></td>
<td><?php echo $inst; ?></td>
<td>Nos</td>
<td><?php echo $inst*$ndev; ?></td>
	
</tr>

<?php } ?>
<?php if($sbcst!=0)
	{
?>
<tr>
<td>Subscription Charges(for <?php echo $sbmnth;?> Months)</td>
<td><?php echo $ndev; ?></td>
<td><?php echo $sbcst; ?></td>
<td>Nos</td>
<td><?php echo $sbcst*$ndev; ?></td>
	
</tr>

<?php } ?>
<?php if($simcharge!="0" && $simcharge!='')
	{
?>
<tr>
<td>Sim Charges(for <?php echo $sbmnth;?> Months)</td>
<td><?php echo $ndev; ?></td>
<?php if($simcharge==0 || $sbmnth==0 || $sbmnth=='' || $simcharge=='')
{
?>
<td><?php echo "0"; ?></td>
<?php
}
else{
?><td><?php echo (int)($simcharge/$sbmnth); ?></td>
<?php } ?>
<td>Nos</td>
<td><?php echo $simcharge*$ndev; ?></td>
	
</tr>

<?php } ?>
<tr>
<td>SubTotal of VAT</td>
<td></td>


<td></td>
<td></td>
<td><?php echo $ord_det['device_cost']*$ord_det['noofdevice']; ?></td>
</tr>
<tr>
<td>SubTotal of ServiceTax</td>
<td></td>


<td></td>
<td></td>
<td><?php echo (($inst*$ndev)+($sbcst*$ndev)+($simcharge*$ndev));?></td>
</tr>
<?php
		
		
		 } 
		 
		 
	$pkq="SELECT
od.packing,
od.freight,
od.smspackage,
od.video_streaming,
od.noofdevice,
customer_orders.order_type
FROM
customer_order_details AS od
INNER JOIN customer_orders ON od.order_id = customer_orders.order_id
WHERE od.customer_id=$id AND od.order_id=$inv";
	$rpkq=mysql_query($pkq);

															while($rpkqq=mysql_fetch_assoc($rpkq)){
														$packing=$rpkqq['packing'];
														$freight=$rpkqq['freight'];
														$smspackage=$rpkqq['smspackage'];
														$video_streaming=$rpkqq['video_streaming'];
															}
															?>
															<?php
															if($packing!=0)
															{
																?>
																<tr>
															<td>Packing</td>
															<td></td>
															<td></td>
															<td></td>
															<td><?php echo $packing;?></td>
															</tr>
															<?php
															} ?>
															<?php
															if($freight!=0)
															{
																?>
															<tr>
															<td>Freight</td>
															<td></td>
															<td></td>
															<td></td>
															<td><?php echo $freight;?></td>
															</tr>
															<?php
															} ?>
															<?php
														
															if($smspackage!=0)
															{
																?>
															<tr>
															<td>Sms Package</td>
															<td></td>
															<td></td>
															<td></td>
															<td><?php echo $smspackage;?></td>
															</tr>
															<?php
															} ?>
															<?php
															if($video_streaming!=0)
															{
																?>
															<tr>
															<td>Video Streaming</td>
															<td></td>
															<td></td>
															<td></td>
															<td><?php echo $video_streaming;?></td>
															</tr>
															<?php
															} ?>
															<?php
 $s_tax=(($subs_cost+$inst_cost+$sim_cost+$smspackage+$video_streaming)*$s_tax_per)/100;

															$vat=(($dev_cost_tot+$packing)*$vatper)/100;

															$total=$subtot+$s_tax+$vat;
		 ?>
	
	<tr>
	<?php if($state=='Karnataka'||$state=='karnataka')
	{
			?> <td>VAT @ <?php echo $vatper; ?>% </td>
			
			
		<td></td>
		 
		<td></td>
	
	<td><?php echo $vatper; ?>%</td>
		 <td><?php echo $vat; ?></td>
		 
		 <?php } 
		 else
		{
		if($vatper!=2)
		{
			
			?>
			<td>CST @ <?php echo $vatper; ?>% </td>
			<?php } else
			
			{ ?>	<td><?php echo "CST @ 2% against C form"; ?> </td>
			
			<?php } ?>
			
		<td></td>
		 
		<td></td>
	
	<td><?php echo $vatper; ?>%</td>
		 <td><?php echo $vat; ?></td>
			<?php
		 }
		 ?>
	</tr>
	<tr>
		<td>Service Tax @ <?php echo $s_tax_per; ?>%</td>
		<td></td>
		
		<td></td>
		
		<td><?php echo $s_tax_per; ?>%</td>
		<td><?php echo $s_tax; ?></td>
	</tr>
	<!--<tr style="height: 26px;">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>-->
			<?php


$smq=mysql_query("select sum(final_cost) as fn from customer_orders where  customer_id=$id AND order_id=$inv");
while($rsmq=mysql_fetch_array($smq))
{
	$total=$rsmq['fn'];
}
					?>
	<tr>
		<td>Total</td>
		<td></td>
		<td></td>
		<td></td>
		
		<td><?php echo $total; ?></td>
	</tr>

	<tr rowspan="2">
	<td>Amount in words</td>
		<td colspan="5">&nbsp;&nbsp;&nbsp;  <?php echo ucwords(no_to_words($total))." Only"; ?></td>
		
</tr>
		
	
	
	
</table>

<!--<table border="1" style="width: 822px;">
<tr rowspan="2">
	<td>Amount in words:-</td>
		<td><?php echo no_to_words($total); ?></td>
		
</tr>
</table>-->


<table  border="1" style="width: 821px; border-bottom: black;
border-left: black;
border-right: black; margin-top:12px">
	<!--<tr>
		<td width="200px">Service Tax No</td>
		<td width="250px">AAACO3054HST001</td>
	</tr>-->
	<tr>
		<td>PAN No</td>
		<td>AADCI8710K</td>
	</tr>
	<!--<tr>
		<td>VAT No</td>
		<td >29120320337</td>
	</tr>
	<tr>
		<td>CST No</td>
		<td >4470643</td>
	</tr>-->
	
	
</table >
<br/>
<b>Payment :- Cheque/DD/Payorder in favour of "IoT Research Labs Private Limited"</b><br/>
<b>Online Transfer:- Federal Bank , A/c-21980200000154, IFSC Code-FDRL0002198,B'lore.</b><br/>
<b>For IoT Research Labs Private Limited</b>

<table >
	<tr ><td><br/>Authorized Signatory</td>
	<td><img  style="margin-left: 510px; margin-top: -25px; height:75px" src="<?php echo base_url();?>ck/Logo.png"/></td></tr>
	
</table> 
	 <?php } ?>
	 
</td></tr>
</table>
	</div>
	 

<div>
	 <br/>
	 <br/>
<br/>
<table border="1px" style="width: 823px;">
					<tr><td>
<table style="width: 823px;text-align: justify;font-size:10px;"><tr><td>
<img src="<?php echo base_url();?>ck/mainlogo.png"/>
<p><b>Terms and Conditions:</b></p>
<p>
1. ACTIVATING THE DEVICE:-You accept that the Device must be able to communicate with the appropriate GPS satellites, by line of sight, so the Device will generally not work indoors or where the line of sight is obscured. You also accept that the Device must be in the reception range of GSM network supplier. If the Device loses connection, the Service will continue to show the last known location of the Device. In order to activate the Device and use the Service, you must correctly enter in the IMEI and SIM numbers supplied with your Device, in order to set up an account with us. You must also keep the credit on that mobile account topped up. If you enter the wrong numbers, you may end up crediting someone else's account and it is unlikely that you will be able to get that money back. You will also not be able to use the Device with the Service and will not receive alerts or other messages.
</p>
<p>
2. DEVICE WARRANTY:-We warrant to you (provided that you are the original purchaser of the Device) that the Device will be free from significant defects in material and workmanship for a period of 1 year from the date of original purchase. Goods once sold will not be taken back or exchanged without proper prior approval. No warranty on burnt, physical damage, track cut items/tampered with or modified.
</p>
<p>
	3. USE OF INFORMATION:-We will collect personal information about you when you register with us, to enable us to set up an account with us in order to provide the Services to you. As part of the Service, we will send you SMS, e-mails and other messages and alerts in accordance with the way you have configured the Service and to inform you of changes or problems. It is important therefore that you keep your contact details up to date. By entering into these Terms, you agree that we may collect, store, use and disclose your data, and contact you, as set out above.
	
</p>

<p>
	4. NO UNLAWFUL OR PROHIBITED USE:-By accessing OSS GPS Tracking Solutions website, you warrant to OGTS that you will not use this Site, or any of the content obtained from this Site, for any purpose that is unlawful or prohibited by these Terms. If you violate any of these Terms, your permission to use the OGTS Site automatically terminates.
</p>
<p>
	5. GPS DEVICE RETURNS:-We do not offer refund if the device package seal is once broken. 
</p>
<p>
	6. CANCELLATION: - If the device is deactivated, there may be a charge to reactivate it if you later decide to use it again.
</p>
<p>
	
	7. NO TRANSFER OF THE SERVICES:-The Services are not transferrable by you, even if you are a commercial user. If you intend to transfer ownership of a vehicle or asset in which an OSS GPS Tracking Device is installed, you agree that you inform the intended transferee prior to the transfer of the fact your vehicle has your Device and advise the transferee to contact us with any questions.
</p>
<p>
	8. SUSPENSION AND TERMINATION OF THE SERVICES:-The Services may be suspended or terminated without prior notice to you for good cause without liability. This means, to give some examples, that the Services can be terminated or suspended if you breach any part of this agreement, do not pay amounts that are due under this Agreement, interfere with provision of the Services, or use the Services for any illegal or otherwise improper purpose. We are not responsible for third party services used along with our product/device.
</p>

<p>
	9. BREACH OF THIS AGREEMENT:-You agree to indemnify and hold us and our Parent Corporation, affiliates, subsidiaries, employees, agents, and service providers harmless from and against any and all claims, demands, actions, causes of action, suits, proceedings, losses, damages, costs and expenses, including reasonable attorneys' fees, arising from or relating to your use of the Services, breach of this Agreement, or any act, error, or omission on your part or that of anyone who uses the Services. This provision will continue to apply after the Termination or cancellation of this Agreement. All disputes subject to Bangalore Jurisdiction.
</p>
<p>
	10. LOST OR STOLEN VEHICLES:-If your vehicle or asset is lost or stolen, we can try to help you locate it, although we have no responsibility to do so. We do not guarantee that it can or will be found, and do not guarantee the condition of your vehicle or the items that were in it will be present should the vehicle be recovered. You may be asked to provide satisfactory identification and/or a police report. In any event, our obligation to assist you in providing commercially reasonable assistance to your efforts to locate your vehicle will end after 24 hours have elapsed from the time it was first reported to the authorities as missing or stolen. 
</p>
<p>
	11. TRADEMARK INFORMATION:-OSS GPS Tracking Solutions logos and service marks, and product and service names are its trademarks or registered trademarks in India. These terms of use do not grant user any license in OSS GPS Tracking Solutions trademarks or any OGTS owned intellectual property. All other names and designs may be trademarks of their respective owners.
</p>
<p>
	12. Every Cheque return will attract a penalty of Rs.250/-.Payment should be made as per the agreed terms. Otherwise interest 36% per annum will be charged over dues.
</p>
<p>
	13. For more details on Products and terms & Conditions please visit www.ossgpstracking.com
</p>

<img align="right" src="<?php echo base_url();?>ck/Logo.png"/></td></tr>
</table>
</td></tr>
</table></div>
	<a href="<?php echo base_url();?>invoices" style="margin-left: 50%;"><img  src="<?php echo base_url();?>ck/back.png"/></a>
	
	<!--<a href="<?php echo base_url();?>invoices/invoice_print?id=<?php echo $id;?>&inv=<?php echo $inv;?>"><img  src="<?php echo base_url();?>ck/print.png"/></a>-->
	<a onclick="window.print()"><img  src="<?php echo base_url();?>ck/print.png"/></a>
	
	
</body>

</html>