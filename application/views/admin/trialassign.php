<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>GPS</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/colorpicker.css" />

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--[if lte IE 8]>
		  <script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/date-time/moment.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/date-time/daterangepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.knob.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.autosize-min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-tag.min.js"></script>

		<!--ace scripts-->

		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				$(".chzn-select").chosen(); 
				
				
				
			
			});
		</script>
		
			<script type="text/javascript">
			$(function() {
			$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('#apptime').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				});
			
			});
			</script>
<?php include 'include/adminheader.php';?>
<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

		<?php include 'include/sidebar2.php';?>
	
			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="#">Home</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>
						<li class="active">Gps</li>
					</ul><!--.breadcrumb-->

					<div class="nav-search" id="nav-search">
					
					</div><!--#nav-search-->
				</div>

				<div class="page-content">
				<div class="page-header position-relative">
						<h1>
							Assgin Engineer
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
					<form class="form-horizontal" action="<?php echo base_url();?>installation/assigned" method="POST">
					
					<?php 
					$id = $this->uri->segment(3);
					//$catid = $this->uri->segment(4);
					//$devid = $this->uri->segment(5);
					$corid = $this->uri->segment(4);
					$order_id = $this->uri->segment(5);
				
					?>
						<input type="hidden" value="<?php echo $id;?>" id="customer_id" name="customer_id" />
						<input type="hidden" value="<?php echo $corid;?>" id="customer_main_order_id" name="customer_main_order_id" />
						
							<div class="control-group">
									<label class="control-label" for="form-field-1">Customer ID </label>

									<div class="controls">
					<?php
				$cid=$id;
				$ss1=mysql_query("select * from customers where customer_id='$cid'");
										while($rsq1=mysql_fetch_array($ss1))
										{?>
										<input type="text" value="<?php echo $rsq1['customer_uid'];?>" readonly="">
										<?php }  ?>		
							</div>
							</div>
							<input type="hidden" name="orderid" id="orderid" value="<?php echo $order_id;?>"/>
								
								
								<?php
	
			
			$qcnt=mysql_query("select count(distinct(device_id)) as cnt from customer_order_details where customer_id='$id' and order_id='$order_id' and assign='pending' ");
			while($rq=mysql_fetch_array($qcnt))
			{
				$cnt=$rq['cnt'];
			}
			?>
						
				<input type="hidden" name="cnt" id="cnt" value="<?php echo $cnt;?>"/>		
						

 <table>
<tbody><tr><th>&nbsp;&nbsp;Category</th><th style="margin-left: 50px;float: left;">Device Type</th><th style="margin-left: 50px;float: left;">Quantity</th><th style="margin-left: 81px;float: left;">Imie No</th><th style="margin-left: 120px;float: left;">Device Name</th><th style="margin-left: 120px;float: left;">Company</th><th style="margin-left: 91px;float: left;">Engineer</th></tr>
 
 </tbody>
 
 </table>
<?php
	$i=1;
			$q=mysql_query("select *,sum(noofdevice) as ndev from customer_order_details where customer_id='$id' and order_id='$order_id' and assign='pending' group by device_id");
while($sqs=mysql_fetch_array($q))
{
$catid=$sqs['category_id'];
$devid=$sqs['device_id'];
//oofdevice=$sqs['noofdevice'];
$noofdevice=$sqs['ndev'];
?>
<?php

								

									$sq=mysql_query("select * from gps_categories where category_id='$catid'");

									while($sqss=mysql_fetch_array($sq))

									{

										?>

									<input type="hidden" value="<?php echo $sqss['category_id'];?>" id="<?php echo "category_id".$i;?>" name="<?php echo "category_id".$i;?>" />
										<input type="text" value="<?php echo $sqss['category_type'];?>" id="cattype" name="cattype" readonly="" style="width: 100px;"/>


										<?php

									}

									?>
	<?php
	$qq=mysql_query("select * from gps_devices where device_id='$devid'");

while($sqss=mysql_fetch_array($qq))

									{

										?>
		<input type="hidden" value="<?php echo $sqss['device_id'];?>" id="<?php echo "device_type".$i;?>" name="<?php echo "device_type".$i;?>" />
										<input type="text" value="<?php echo $sqss['device_type'];?>" id="devtype" name="devtype" readonly="" style="width: 100px;"/>
							

										<?php

									}

									?>
					
				<input type="text" name="<?php echo "noofdevice".$i;?>" id="<?php echo "noofdevice".$i;?>" value="<?php echo $noofdevice;?>" readonly="" style="width:100px;"/>
		<select name="<?php echo "imieno".$i; ?>"	id="<?php echo "imieno".$i; ?>"	onchange="getmodelid(this.value,<?php echo $i;?>,<?php echo $catid;?>,<?php echo $devid;?>);">
<option value="Please Choose IMEI">Please Choose IMEI</option>

<?php
$qqss=mysql_query("select * from gps_model_details where category_type='$catid' and device_id='$devid' ");
while($sqs3=mysql_fetch_array($qqss))
{ 
$imei= $sqs3['imie_number'];
	$model_id= $sqs3['model_id'];

?>

<option value="<?php echo $sqs3['imie_number'];?>"><?php echo $sqs3['imie_number'];?></option>
<?php
}

?>

</select>
<input type="hidden" name="<?php echo "modelid".$i; ?>" id="<?php echo "modelid".$i; ?>" />
<!--<input type="text" name="<?php echo "imieno".$i; ?>" id="<?php echo "imieno".$i; ?>" readonly="true" value="0358899050393696" style="width: 150px;"/>-->
<input type="text" name="<?php echo "devicesnm".$i; ?>" id="<?php echo "devicesnm".$i; ?>" />
<select name="<?php echo "cmp".$i; ?>" id="<?php echo "cmp".$i; ?>" onchange="getengineer(this,<?php echo $i;?>);" style="width: 150px;">
<option >Choose Company</option>
<?php 

$qq=mysql_query("select * from company");
while($r=mysql_fetch_array($qq))
{
	$cmpname=$r['comp_name'];
?>
<option value="<?php echo $r['company_id'];?>"><?php echo $cmpname;?></option>

<?php } ?>
</select>
<span id="<?php echo "engdiv".$i;?>" >

</span>

<br />
<br />
<?php
$i++;
} ?>

									

	<div class="control-group">
									<label class="control-label" for="form-field-1">Installation Date</label>

									<div class="controls">
										<div class="row-fluid input-append">
															<input class="date-picker" id="app_date" type="text" data-date-format="mm-dd-yyyy" name="app_date" />
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
									</div>
								</div>
								
								<div class="control-group">
								<label class="control-label" for="form-field-1">Installation Time</label>
								<div class="controls">
														<div class="input-append bootstrap-timepicker">
															<input id="apptime" type="text" class="input-small" name="apptime"/>
															<span class="add-on">
																<i class="icon-time"></i>
															</span>
														</div>
													</div>
													</div>
												
								<div class="control-group">
									<label class="control-label" for="form-field-1"></label>

									<div class="controls">
									<button class="btn btn-small btn-primary" type="submit" onclick="return valform();">
										<i class="icon-ok"></i>
										Submit
									</button>
									</div>
									</div>
					</form>

					</div>
					</div>
					</div>
					</div>
					</div>
					
	<script>
	function getcategory(str)
	{
		
var xmlhttp;    
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{
document.getElementById("category").innerHTML=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getcategory.php?c="+str,true);

xmlhttp.send();
	}
	
	function getmodelid(str,i,catid,devid)
	{
		
var xmlhttp;    
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{
document.getElementById("modelid"+i).value=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getmodelid.php?c="+str+"&catid="+catid+"&devid="+devid,true);

xmlhttp.send();
	}
	
	function getdevice(str)
{
cid=document.getElementById('customer_id').value;
var xmlhttp;    
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{
document.getElementById("device").innerHTML=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getalocdevice.php?c="+str+"&cid="+cid,true);

xmlhttp.send();
}

function getnofdevice(str)
{
cid=document.getElementById('customer_id').value;
catid=document.getElementById('category_id').value;

	var xmlhttp;    
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{
document.getElementById("nodevice").innerHTML=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getnofdevice.php?c="+str+"&cid="+cid+"&catid="+catid,true);

xmlhttp.send();
}
	
	</script>
	
<script>
function getengineer(str,a)
{
aa=str.value;

	var xmlhttp;    
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{
document.getElementById('engdiv'+a).innerHTML=xmlhttp.responseText;
//$(str).nextAll('input:first').val(a);
}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getengineer.php?c="+aa+"&ival="+a,true);

xmlhttp.send();
}

function valform()
{

	cnt=document.getElementById('cnt').value;

	for(i=1;i<=cnt;i++)

			{				
 imie_number=document.getElementById('imieno'+i).value;
			if(imie_number=='Please Choose IMEI')
			{
		alert('Please Choose IMEI');
		document.getElementById('imieno'+i).focus();
		return false;
	         }
		//	tf=document.getElementById('engid'+i).value;
			cmp=document.getElementById('cmp'+i).value;
			devicesnm=document.getElementById('devicesnm'+i).value;
			 if(devicesnm=='')
			{
		alert('Please Choose Device Name');
		document.getElementById('devicesnm'+i).focus();
		
		return false;
	         }
if(cmp=='Choose Company')
			{
		alert('Please Choose Company');
		document.getElementById('cmp'+i).focus();
		return false;
	         }
			 tf=document.getElementById('engid'+i).value;
			if(tf=='Choose Engineer')
			{
		alert('Please Choose Engineer');
		document.getElementById('engid'+i).focus();
		return false;
	         }
			}
			app_date=document.getElementById('app_date').value;
			if(app_date=='')
			{
		alert('Please Assign Date');
		document.getElementById('app_date').focus();
		return false;
		}
			 	
}

</script>