<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<!--table scripts-->
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery-1.3.2.min.js"></script>

		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.js"></script>
		
	<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/TableTools.js"></script>
		
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
							
								Confirmed Orders
							
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
							<div id="demo" style="background-color: #eff3f8;">
<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
								
											<th>Customer ID</th>
											<th>Customer Name</th>
											<th>Order ID</th>
											<th>No of Orders</th>
											<th>Confirmed Date Time</th>
											<th>Created By</th>
											<th>Payment Status</th>
											<th>Order From</th>
										
											
							
										</tr>
									</thead>

									<tbody>
								
									<?php
									
										$slno=1;
				
						$qo=mysql_query("Select * from customer_order_details o inner join payment_master s on s.order_id=o.order_id join customer_orders co on co.order_id=o.order_id where s.response='success' group by o.order_id order by co.order_id desc");
						while($srs=mysql_fetch_array($qo))
						{
							$custmainid=$srs['id'];
							$order_id=$srs['order_id'];
							$catid=$srs['category_id'];
									$devid=$srs['device_id'];
								//	$noofdevice=$srs['ndev'];
								//	$noofdevice=$srs['noofdevice'];
									$sub_month=$srs['sub_month'];
									$id=$srs['customer_id'];
									$approve_status=$srs['approve_status'];
									$accounts_approval=$srs['accounts_approval'];
										$aid=$srs['created_by'];
									
									$s=mysql_query("select * from customers where customer_id='$id'");
									while($r=mysql_fetch_array($s))
									{
											$uid=$r['customer_uid'];
										$cfrist=$r['customer_first_name'];
										$cmiddle=$r['customer_middle_name'];
										$clast=$r['customer_last_name'];
										$compname=$r['comp_name'];
										$fromm=$r['fromm'];
									}
									?>
									<tr>
										<td><?php echo $slno;?></td>
										<td><?php echo $uid;?></td>
									<?php	if($cfrist!='')
										{ ?>
										<td><?php echo $cfrist."".$cmiddle."".$clast;?></td>
										<?php }
										else
										{
											?>
										<td><?php echo $compname."(Company Name)";?></td>	
											<?php
										}?>
										<td><a href="<?php echo base_url();?>order_confirmed/detailed_orderinfo/<?php echo $id;?>/<?php echo $order_id;?>"><?php echo "OD".$order_id;?></a></td>
								<?php
								
								$neq=mysql_query("Select o.order_id,sum(noofdevice) as ndev from customer_order_details o join customer_orders co on co.order_id=o.order_id where  o.customer_id='$id' and co.order_id='$order_id'  group by co.order_id ");
								while($rneq=mysql_fetch_array($neq))
								{
								$noofdevice=$rneq['ndev'];
									?>
									<td><?php echo $noofdevice;?></td>
									<?php
								} ?>
									
									<td><?php 
									if($srs['approve_status']=='pending')
									{
										echo "Pending";
									}
									else
									{
									echo date("d-m-Y h:i:s",strtotime($srs['appr_rej_date']));
									}
																		?></td>
									<?php
								
									$aq=mysql_query("select * from admin_data where id='$aid'");
									if(mysql_num_rows($aq)>0)
									{
						while($rea=mysql_fetch_array($aq))
						{
						
									?>
									<td><?php echo $rea['name'];?></td>
									
									<?php } }
									else
									{?>
									<td><?php echo $aid;?></td>
									<?php
										
									}
									  ?>
																
									
										<td><?php echo $accounts_approval;?></td>
										
										<?php
										$fq=mysql_query("select * from dealers where dealer_id='$fromm'");
										$rfq=mysql_fetch_array($fq);
										?>
										<td><?php echo $rfq['dealer_name'];?></td>
								
										</tr>
							<?php
								$slno++;
							 } ?>	
							
								
								
									
									</tbody>
								</table>
								</div>
						
					

</div>
</div>
</div>
</div>