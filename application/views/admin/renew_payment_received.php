<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<!--table scripts-->

	<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/TableTools.js"></script>
		
					<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
						<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-timepicker.css" />
<!--table scripts-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

			<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
					<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-timepicker.min.js"></script>
		
		
		<script>
		var asInitVals = new Array();
	$(document).ready( function () {
	  var oTable = $('#example').dataTable( {
	
	
        "oLanguage": {
            "sSearch": "Search all columns:"
        }
		
    } );
	$("tfoot input").keyup( function () {
        /* Filter on the column (the index) of this element */
        oTable.fnFilter( this.value, $("tfoot input").index(this) );
    } );
     
     
     
    /*
     * Support functions to provide a little bit of 'user friendlyness' to the textboxes in
     * the footer
     */
    $("tfoot input").each( function (i) {
        asInitVals[i] = this.value;
    } );
     
    $("tfoot input").focus( function () {
        if ( this.className == "search_init" )
        {
            this.className = "";
            this.value = "";
        }
    } );
     
    $("tfoot input").blur( function (i) {
        if ( this.value == "" )
        {
            this.className = "search_init";
            this.value = asInitVals[$("tfoot input").index(this)];
        }
    } );
	var oTableTools = new TableTools( oTable, {
		"buttons": [
			"copy",
			"csv",
			"xls",
			"pdf",
			{ "type": "print", "buttonText": "Print me!" }
		]
	} );
	
//	$('#demo').before( oTableTools.dom.container );
} );
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
<style>
#example_length
{

}
.dataTables_info
		{
			margin-top:16px;
		}
		.paginate_enabled_previous
		{
			padding-right:10px;
			cursor: pointer;
		}
		.paginate_disabled_previous
		{
			padding-right:10px;
			cursor: pointer;
		}
		.paginate_disabled_previous:hover
		{
			padding-right:10px;
			cursor: pointer;
		}
		.paginate_enabled_next
		{
			cursor: pointer;
		}
		.paginate_disabled_next
		{
			cursor: pointer;
		}
		.paginate_disabled_next:hover
		{
			cursor: pointer;
		}
		#example_paginate
		{
			padding-right: 21px;
			margin-top: -23px;

		}
</style>
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
							Subscription Renewal Payment Received List
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
						<?php
							if(isset($msg1))
							{?>
							<div class='alert alert-block alert-success'>
							<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>
							<?php
								echo $msg1;?>
								</div>
								<?php
							}
							else
							{
								echo '';
							}
							
							?>
						<?php	if(isset($msg2))
							{?>
							<div class='alert alert-block alert-danger'>
							<button type="button" class="close" data-dismiss="alert" >
									<i class="icon-remove"></i>
								</button>

								<i class="icon-remove red"></i>
							<?php
								echo $msg2;?>
								</div>
								<?php
							}
							else
							{
								echo '';
							}
							
							?>
							
								<?php
$un=$this->session->userdata('username'); //echo $un;
$q=mysql_query("select * from admin_data where email_id='$un'");
$user=mysql_fetch_array($q);
$mid=$user['id'];
$type=$user['user_type'];
if($type=='admin' || $type=='accounts' || $type=='operations'|| $type=='COO'|| $type=='CFO')
{
?>
							
							<div id="demo" style="background-color: #eff3f8;">
<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
											<th>Customer Name</th>
											<th>Customer ID</th>
											<th>Order No</th>
											<th>Total Amount</th>
											<th>Paid Amount</th>
											<th>Cash Paid Amount</th>
											<th>Cheque Paid Amount</th>
											<th>Online Transfer</th>
											<th>Paid Time</th>
											
											
											</tr>
											</thead>
											<tbody>
											<?php
											$slno=1;
											
											$q=mysql_query("SELECT p.id,p.online_transfer_amount,p.customer_id,p.order_id,p.total_amount,p.cashamount,p.chequeamount,p.paid_amount,p.pending_amount,p.status,p.time_stamp,c.customer_first_name,c.customer_uid FROM `rpayment_list` p left join customers c on c.customer_id=p.customer_id join customer_orders co on co.order_id=p.order_id where p.paid_amount!='0' order by p.order_id desc");
											while($res=mysql_fetch_array($q))
											{
											
											
												$name=$res['customer_first_name'];
												$uid=$res['customer_uid'];
												$customer_id=$res['customer_id'];
												$oid=$res['order_id'];
												$id=$res['id'];
												$total_amount=$res['total_amount'];
													$paid=$res['paid_amount'];
												
													$chequeamount=$res['chequeamount'];
														$cashamount=$res['cashamount'];
														$online_transfer_amount=$res['online_transfer_amount'];
														$time_stamp=$res['time_stamp'];
											/*	$chequeamount=$res['chequeamount'];
												$chequetime=$res['chequetime'];
												$cashtime=$res['cashtime'];
												$cashamount=$res['cashamount'];
												$paid=$res['paid'];
												$pending_amount=$res['pending_amount'];*/
											
											
											?>
											<tr>
											<td><?php echo $slno;?></td>
											<td><?php echo $name;?></td>
											<td><?php echo $uid;?></td>
											<td><?php echo "OD".$oid;?></td>
										
											<td><?php echo $total_amount;?></td>
											<td><?php echo $paid;?></td>
											<td><?php echo $cashamount;?></td>
											<td><?php echo $chequeamount;?></td>
											<td><?php echo $online_transfer_amount;?></td>
											<td><?php echo date("d-m-Y H:i:s",strtotime($time_stamp));?></td>
											<!--<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="<?php echo base_url();?>payment/view/<?php echo $customer_id;?>/<?php echo $oid;?>/<?php echo $total_amount;?>" class="btn btn-small btn-info">View</a></div></td>-->
											<!--<td><?php echo $cashamount;?></td>
											<td><?php echo $cashtime;?></td>
											<td><?php echo $chequeamount;?></td>
											<td><?php echo $chequetime;?></td>
											<td><?php echo $pending_amount;?></td>-->
											
											</tr>
											<?php
											$slno++;
											 } ?>
											
											</tbody>
								</table>
								</div>

<?php }
else if($type=='marketing' || $type=='subadmin')
{
	?>
		<div id="demo" style="background-color: #eff3f8;">
<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
											<th>Customer Name</th>
											<th>Customer ID</th>
											<th>Order No</th>
											<th>Total Amount</th>
											<th>Paid Amount</th>
											<th>Cash Paid Amount</th>
											<th>Cheque Paid Amount</th>
											<th>Paid Time</th>
											
											
											</tr>
											</thead>
											<tbody>
											<?php
											$slno=1;
											$q=mysql_query("SELECT p.id,p.customer_id,p.order_id,p.total_amount,p.cashamount,p.chequeamount,p.paid_amount,p.pending_amount,p.status,p.time_stamp,c.customer_first_name,c.customer_uid FROM `rpayment_list` p left join customers c on c.customer_id=p.customer_id  left join customer_orders co on co.order_id=p.order_id where  co.created_by='$mid' and p.paid_amount!=0 order by p.id desc");
											while($res=mysql_fetch_array($q))
											{
												$name=$res['customer_first_name'];
												$uid=$res['customer_uid'];
												$customer_id=$res['customer_id'];
												$oid=$res['order_id'];
												$id=$res['id'];
												$total_amount=$res['total_amount'];
													$paid=$res['paid_amount'];
													$chequeamount=$res['chequeamount'];
														$cashamount=$res['cashamount'];
														$time_stamp=$res['time_stamp'];
											/*	$chequeamount=$res['chequeamount'];
												$chequetime=$res['chequetime'];
												$cashtime=$res['cashtime'];
												$cashamount=$res['cashamount'];
												$paid=$res['paid'];
												$pending_amount=$res['pending_amount'];*/
											
											
											?>
											<tr>
											<td><?php echo $slno;?></td>
											<td><?php echo $name;?></td>
											<td><?php echo $uid;?></td>
											<td><?php echo "OD".$oid;?></td>
										
											<td><?php echo $total_amount;?></td>
											<td><?php echo $paid;?></td>
											<td><?php echo $cashamount;?></td>
											<td><?php echo $chequeamount;?></td>
											<td><?php echo date("d-m-Y H:i:s",strtotime($time_stamp));?></td>
											<!--<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="<?php echo base_url();?>payment/view/<?php echo $customer_id;?>/<?php echo $oid;?>/<?php echo $total_amount;?>" class="btn btn-small btn-info">View</a></div></td>-->
											<!--<td><?php echo $cashamount;?></td>
											<td><?php echo $cashtime;?></td>
											<td><?php echo $chequeamount;?></td>
											<td><?php echo $chequetime;?></td>
											<td><?php echo $pending_amount;?></td>-->
											
											</tr>
											<?php
											$slno++;
											 } ?>
											
											</tbody>
								</table>
								</div>
	<?php } ?>
								</div>
								</div>
								</div>
								</div>
								</div>