<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<!--table scripts-->

	<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/TableTools.js"></script>
		
					<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
<!--table scripts-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

			<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
		
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
			
			})
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
							Dealer Margin
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
							<button type="button" class="close" data-dismiss="alert">
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
										<th>Created By</th>
											
                                            <th>Order By</th>
                                           
											<th>Order ID</th>
											<th>Dealer Margin</th>
											<th>Ordered Date Time</th>
											<th>Action</th>
											
											
											
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$cid=array();
									$tot=0;
									$un=$this->session->userdata('username');
									$usrid=$user['id'];	
									
								
									if($type=='admin'){
										$qo=mysql_query("SELECT co.order_id,co.customer_id,co.order_date,co.created_by as cb,fromm FROM `customer_orders` co join customers a on a.customer_id=co.customer_id  where co.order_from='backend' and co.approve_status='approved' and a.fromm!='1' and co.type_order='live'");
									}else{
									$qo=mysql_query("SELECT co.order_id,co.customer_id,co.order_date,co.created_by as cb FROM `customer_orders` co where order_from='backend' and approve_status='approved' and co.created_by='$usrid' ");
									}
									
											
						
						while($srs=mysql_fetch_array($qo))
						{
							$custmainid=$srs['customer_id'];
							$order_id=$srs['order_id'];
							$fromm=$srs['fromm'];
							$qn=mysql_query("select noofdevice,margin_value from customer_order_details where order_id=$order_id");
							while($rs=mysql_fetch_array($qn))
							{
								$tot+=$rs['noofdevice']*$rs['margin_value'];
							}
							
						?>
									<tr>
										<td><?php echo $slno;?></td>
								
								
								
										<?php 
										 $cb=$srs['cb'];
                                         $qnn=mysql_query("select name from admin_data where id='$cb'");
										 $snn=mysql_fetch_array($qnn);
										 $order_by= $snn['name'];
										 ?>
                                        <td><?php echo $order_by;//"select name from admin_data where id='$cb'";?></td>
                                        <?php ?>
										
										<?php $eq=mysql_query("select * from dealers where dealer_id='$fromm'");
										$req=mysql_fetch_array($eq);
										?>
										<td><?php echo$req['dealer_name'];?></td>
										<td><?php echo "OD".$order_id;?></td>
										<td><?php echo $tot;?></td>
											<td><?php echo date("d-m-Y h:i:s",strtotime($srs['order_date']));?></td>
										<td><a href="<?php echo base_url();?>dealer_margin/detail/<?php echo $order_id;?>" class="blue" >View</a></td>
									
										
									</tr>
									<?php
									$slno++;$tot=0;
									}
								
									?>
									
									</tbody>
								</table>
								</div>



						
					

</div>
</div>
</div>
</div>