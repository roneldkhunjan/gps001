<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>DELIVERY CHALLAN</title>
<meta name="" content="">
</head>
<body>
<?php
	$id=$_GET['id'];
	$dcoid=$_GET['dcoid'];
$cq=mysql_query("select * from customers where customer_id='$id'");
while($res=mysql_fetch_array($cq))
{
	$name=$res['customer_first_name'];
	$comp_contname1=$res['comp_contname1'];
	$email=$res['customer_emailid'];
	$uid=$res['customer_uid'];
	$address=$res['address'];
	$city=$res['city'];
	$pincode=$res['pin_code'];
	
	$customer_phone_no=$res['customer_phone_no'];
	$type=$res['type'];

}
if($type!='individual')
{
	$comp_contname1=$comp_contname1;
}
$networks=array();
$neq=mysql_query("Select sum(noofdevice) as ndev,start_date,end_date,network from customer_order_details where customer_id='$id' and order_id='$dcoid'  group by order_id");

								while($rneq=mysql_fetch_array($neq))

								{

								$noofdevice=$rneq['ndev'];
								$start_date=$rneq['start_date'];
								$end_date=$rneq['end_date'];
								$networkk=$rneq['network'];
								
								$nq=mysql_query("select * from network where id='$networkk'");
								if(mysql_num_rows($nq)>0)
								{
									$rnq=mysql_fetch_array($nq);
									//$network=$rnq['network_name'];
array_push($networks,$rnq['network_name']);
								}
								else
								{
									//$network='No Network Chosen';
								}

}

$ai=array();
$devtype=array();
$installed_date='';
$sim_n=array();
$sim_no='';
$ocq=mysql_query("select * from installation i join gps_categories g on g.category_id=i.category_id join gps_devices gd on gd.device_id=i.device_id where i.customer_id='$id' and i.order_id='$dcoid'");
while($ores=mysql_fetch_array($ocq))
{
	$sim_no=$ores['sim_no'];
	$installed_date=$ores['installed_date'];
	$cid=$ores['category_id'];
	$did=$ores['device_id'];
	$category_type=$ores['category_type'];
	$device_type=$ores['device_type'];
	$dev=$category_type." "."Tracker ".$device_type;
	array_push($ai,$ores['imie_no']);
	array_push($devtype,$dev);
array_push($sim_n,$ores['sim_no']);
	
}
$imei = implode(",", $ai);
$devices = implode(",", $devtype);
$network = implode(",", $networks);
$sim_no=implode(",", $sim_n);
if($installed_date=='')
{
	$installed_date='';
}
		if($installed_date=='0000-00-00')
		{
			$installed_date='';
		}
		else
		{
			$installed_date=date("d-m-Y",strtotime($installed_date));
		}
		


					?>
					
					<table border="1px" style="border-collapse: collapse; width: 857px;"><tr><td>
<table border="2" bordercolor="darkblue" style="width: 856px;">
<table style="width: 857px">
	<tr>
		<td>
			<img src="<?php echo base_url();?>ck/mainlogo.png" style="height: 60px"/>
		</td>
		
		<td>
			<a style="margin-top: 10px; margin-top: 10px;margin-left: 116px;font-family: fantasy;font-size: x-large;color: darkblue">DELIVERY CHALLAN </a><br/><a style="margin-left: 17px; font-size: 21px">OSS TECHNOLOGIES PRIVATE LIMITED</a><a style="margin-left: 36px;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(OSS GPS TRACKING SOLUTIONS)<br>
# 204 Raheja Chamber, 12 Museum Road, Bangalore - 560 001</a>
			
		</td>
	</tr>
	
	<tr>
	<td colspan="2" style="background-color: darkblue; height: 6px; width: 100px"></td>	
	</tr>
	</table>

	<table style="padding: 1px">
	 <tr>
   <td>
	<table style="border-collapse: collapse; ">
		
	<tr style="height: 30px">
	<td style="font-size: 14px;">DC NO</td></tr>
   </table></td>
   <td colspan="3">
   <table border="1" style="border-collapse: collapse;width: 656px"><tr>
   <td style="height: 30px; width: 300px"><!--<?php if($comp_contname1!='') { echo $comp_contname1; }else { echo $name; }?>-->
   <?php echo "#DC0".$dcoid."/2014-15";?>
   </td>
   </tr></table></td></tr> 
	<tr>
	<td >
	<table style="border-collapse: collapse; width: 189px">
		
	<tr>
	<td style="font-size: 14px;">INDIVIDUAL / COMPANY /<br/>
   SCHOOL NAME</td></tr>
   </table></td>
   <td colspan="3">
   <table border="1" style="border-collapse: collapse;width: 656px"><tr>
   <td style="height: 50px; width: 300px"><?php echo $name;?></td>
   </tr></table></td>
  
   </tr>
     <tr>
   <td>
	<table style="border-collapse: collapse; ">
		
	<tr style="height: 30px">
	<td style="font-size: 14px;">CONTACT PERSON NAME</td></tr>
   </table></td>
   <td colspan="3">
   <table border="1" style="border-collapse: collapse;width: 656px"><tr>
   <td style="height: 30px; width: 300px"><!--<?php if($comp_contname1!='') { echo $comp_contname1; }else { echo $name; }?>-->
   <?php echo $comp_contname1;?>
   </td>
   </tr></table></td></tr> 
   
  
   
   <tr>
   <td>
	<table style="border-collapse: collapse; width: 152px">
		
	<tr style="height: 30px">
	<td style="font-size: 14px">CONTACT NUMBER</td></tr>
   </table></td>
   <td style="height: 30px; width:200px">
<table border="1" style="height: 30px; border-collapse: collapse;width: 290px">
  <tbody><tr>
    <td style="width:20px"><?php echo $customer_phone_no;?>
      </td></tr>
  
  </tbody></table>
  

</td>
   
   <td>
	<table style="border-collapse: collapse; ">
		
	<tr style="height: 30px">
	<td style="font-size: 14px">E-MAIL ID</td></tr>
   </table></td>
   <td>
   <table border="1" style="border-collapse: collapse;width: 237px"><tr>
   <td style="height: 30px; width:100px"><?php echo $email;?></td>
   </tr></table></td>
 
   </tr>
   
  <tr>
   <td>
	<table style="border-collapse: collapse; width: 152px">
		
	<tr style="height: 30px">
	<td style="font-size: 14px">DEVICE CATEGORY</td></tr>
   </table></td>
   <td style="height: 30px; width:200px">
<table border="1" style="height: 30px; border-collapse: collapse;width: 290px">
  <tbody><tr>
    <td style="width:200px">
      <?php echo $devices;?>
    
  </td></tr>
  
  </tbody></table>
  

</td>
   
   <td>
	<table style="border-collapse: collapse; ">
		
	<tr style="height: 30px">
	<td style="font-size: 14px; ">QTY(Nos)</td></tr>
   </table></td>
   <td>
   <table border="1" style="border-collapse: collapse;width: 237px"><tr>
   <td style="height: 30px; width:100px"><?php echo $noofdevice;?></td>
   </tr></table></td>
 
   </tr>
	
	<tr>
   <td >
	<table style="border-collapse: collapse; width: 152px">
		
	<tr style="height: 30px">
	<td style="font-size: 14px">DEVICE IMEI NO</td></tr>
   </table></td>
   <td colspan="3" style="height: 30px; width:200px">
<table border="1" style="height: 30px; border-collapse: collapse;width: 468px">
  <tr>
    <td style="width:20px"><?php echo $imei;?></td>
   
      </tr>
      </table>
    
  </td></tr>


<tr>
   <td>
	<table style="border-collapse: collapse; width: 152px">
		
	<tr style="height: 30px">
	<td style="font-size: 14px">SIM PROVIDER & Mob .NO</td></tr>
   </table></td>
   <td colspan="2" style="height: 30px; width:266px">
<table border="1" style="height: 30px; border-collapse: collapse;width: 414px">
  <tbody><tr>
    <td style="width:200px">
      
    <?php echo $network;?>
  </td></tr>
  
  </tbody></table>
  

</td>
   
   
   <td>
   <table border="1" style="border-collapse: collapse;width: 237px"><tr>
   <td style="height: 30px; width:20px"> <?php echo $sim_no;?></td>
    
   </tr></table></td>
 
   </tr>

<tr>
   <td>
	<table style="border-collapse: collapse; width: 152px">
		
	<tr style="height: 30px">
	<td style="font-size: 14px">INSTALLATION DATE</td></tr>
   </table></td>
   <td style="height: 30px; width:200px">
<table border="1" style="height: 30px; border-collapse: collapse;width: 288px">
  <tbody><tr>
    <td style="width:20px">
      <?php echo $installed_date;?>
              </td></tr>
  
  </tbody></table>
  

</td>
   
   <td>
	<table style="border-collapse: collapse; ">
		
	<tr style="height: 30px">
	<td style="font-size: 14px; width: 118px;
text-align: center;">VEHICLE NO.</td></tr>
   </table></td>
   <td>
   <table border="1" style="border-collapse: collapse; height:30px; width:237px "><tr>
   <td style="width:20px"/>
    <td style="width:20px"/>
    <td style="width:20px"/>
    <td style="width:20px"/>
    <td style="width:20px"/>
    <td style="width:20px"/>
    <td style="width:20px"/>
    <td style="width:20px"/>
    <td style="width:20px"/>
    <td style="width:20px"/>
    
   </tr></table></td>
 
   </tr>
	
	
	<tr>
   <td>
	<table style="border-collapse: collapse; width: 152px">
		
	<tr style="height: 30px">
	<td style="font-size: 14px">DEMO START DATE</td></tr>
   </table></td>
   <td style="height: 30px; width:200px">
<table border="1" style="height: 30px; border-collapse: collapse;width: 288px">
  <tbody><tr>
    <td style="width:20px">
    <?php echo date("d-m-Y",strtotime($start_date));?>
              </td></tr>
  
  </tbody></table>
  

</td>
   
   <td>
	<table style="border-collapse: collapse; ">
		
	<tr style="height: 30px">
	<td style="font-size: 14px; width: 118px;text-align: center;">  DEMO END DATE</td></tr>
   </table></td>
   <td>
   <table border="1" style="border-collapse: collapse; height:30px; width:237px "><tr>
   <td style="width:20px"> <?php echo date("d-m-Y",strtotime($end_date));?></td>
   
   
    
   </tr></table></td>
 
   </tr>
	<tr>
	<td >
	<table style="border-collapse: collapse; width: 189px">
		
	<tr>
	<td style="font-size: 14px; ">INSTALLATION                   
   ADDRESS</td></tr>
   </table></td>
   <td colspan="3">
   <table border="1" style="border-collapse: collapse;width: 656px"><tr>
   <td style="height: 40px; width: 300px"><?php echo $address;?></td>
   </tr></table></td>
  
   </tr>
	
	<tr>
   <td>
	<table style="border-collapse: collapse; width: 152px">
		
	<tr style="height: 30px">
	<td style="font-size: 14px">CITY / VILLAGE / PO </td></tr>
   </table></td>
   <td style="height: 30px; width:200px">
<table border="1" style="height: 30px; border-collapse: collapse;width: 288px">
  <tbody><tr>
    <td style="width:20px"><?php echo $city; ?>
      </td>
  
  </tbody></table>
  

</td>
   
   <td>
	<table style="border-collapse: collapse; ">
		
	<tr style="height: 30px">
	<td style="font-size: 14px; width: 118px;
text-align: center;">PIN CODE</td></tr>
   </table></td>
   <td>
   <table border="1" style="border-collapse: collapse; height:30px; width:237px "><tr>
   <td style="width:20px"><?php echo $pincode;?></td>
    
   
    
   </tr></table></td>
 
   </tr>
	
	<tr>
	<td >
	<table style="border-collapse: collapse; width: 189px">
		
	<tr>
	<td style="font-size: 14px; ">CUSTOMER NAME AND SIGNATURE</td></tr>
   </table></td>
   <td colspan="3">
   <table border="1" style="border-collapse: collapse;"><tr>
   <td style="height: 60px; width: 284px">  <?php echo $comp_contname1;?></td>
    <td style="height: 60px; width: 364px"></td>
   
   
   </tr></table></td>
    
    
  
   </tr>
   
   <tr>
	<td >
	<table style="border-collapse: collapse; width: 189px">
		
	<tr>
	<td style="font-size: 14px; ">OGTS AUTHORITY NAME
   AND SIGNATURE</td></tr>
   </table></td>
   <td colspan="3">
   <table border="1" style="border-collapse: collapse;"><tr>
   <td style="height: 50px; width: 284px"></td>
    <td style="height: 50px; width: 364px"></td>
   
   
   </tr></table></td>
    
    
  
   </tr>
   
   
   <tr>
	<td colspan="4" style="text-align: right">
	<br/>
	<img  src="<?php echo base_url();?>ck/Logo.png"/>
	</td>
   
    
    
  
   </tr>
	
	</table>
	

	
</table>
	<a href="#"  ><span  data-id="<?php echo $uid;?>" onclick="sendata(this);" id="uid"><img  src="<?php echo base_url();?>ck/back.png"/></span></a>

	<a onclick="window.print()"><img  src="<?php echo base_url();?>ck/print.png"/></a>
</td></tr></table>
</body>
</html>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script>
function sendata(abc)
{
	// var cid = $(abc).data('id');
	//window.location.href="<?php echo base_url();?>dc/index/"+cid;
	window.location.href="<?php echo base_url();?>dc/index";
}
</script>