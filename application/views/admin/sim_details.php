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
margin-top: -57px;
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
						<script type="text/javascript">



function numbersonly(e){



var unicode=e.charCode? e.charCode : e.keyCode



if (unicode!=8){ //if the key isn't the backspace key (which we should allow)



if (unicode<48||unicode>57)







return false //if not a number



//disable key press



}



}



</script>
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
							SIM Details
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
					<button class="btn btn-mini btn-info" style="margin-top:26px;">
											<i class="icon-bolt"></i>
<a href="#modal-form" role="button" class="white" data-toggle="modal" style="color:white;">Add Sim Details</a>	
										
											<i class="icon-arrow-right  icon-on-right"></i>
										</button>
					<div id="demo" style="background-color: #eff3f8;">
					<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
											<th>Sim No</th>
											<th>Netwrok</th>
													<th>Sim Charge</th>
 											<th>Received Date</th>
 									
											<th>Action</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$simid=array();
									$q=mysql_query("select * from sim_details");
									while($res=mysql_fetch_array($q))
									{
									$sid=$res['sim_id'];
									$nid=$res['network'];
									array_push($simid,$sid);
									?>
									<tr>
										<td><?php echo $slno;?></td>
										<td><?php echo $res['sim_no'];?></td>
										<?php
										$srq=mysql_query("select * from network where id='$nid'");
										while($resq=mysql_fetch_array($srq))
										{
											?>
												<td><?php echo $resq['network_name'];?></td>
											<?php
										}
										?>
									
										<td><?php echo $res['simcharge'];?></td>
										<td><?php echo date("d-m-Y",strtotime($res['recv_dt']));?></td>
										<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="#editsim<?php echo  $res['sim_id']; ?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>
														
													</a></div></td>
													<td><div class="hidden-phone visible-desktop action-buttons">													<a class="red" href="#deletesim<?php echo  $res['sim_id']; ?>" role="button" class="blue" data-toggle="modal">
														<span class="label label-important arrowed-in">Delete</span>
													</a></div></td>
														<div id="deletesim<?php echo  $res['sim_id']; ?>" class="modal hide" tabindex="-1">
								<div class="modal-header" style="background: #045e9f;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="white bigger">Delete Sim Details</h4>
								</div>
	<form class="form-horizontal" action="<?php echo base_url();?>sim_details/delete" method="POST">
							
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
									<input type="hidden" id="simid"  name="simid"  value="<?php echo $res['sim_id'];?>"/>
								<h3>Are You Sure Do You Want to Delete Sim Details ? </h3>
								
							
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small btn-danger" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-success" type="submit">
										<i class="icon-ok"></i>
										Yes
									</button>
								</div>
								</form>
							</div>
									</tr>
									<?php
									$slno++;
									}
								
									?>
									
									</tbody>
								</table>
								</div>
								
								<div id="modal-form" class="modal hide" tabindex="-1">
								<div class="modal-header" style="background: #045e9f;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="white bigger">Please Add Sim Details</h4>
								</div>
	<form class="form-horizontal" action="<?php echo base_url();?>sim_details/add" method="POST">
							
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
								
									<div class="control-group">
									<label class="control-label" for="form-field-1">Sim Number</label>

									<div class="controls">
										<input type="text" id="simno"  name="simno" placeholder="Sim Number" />
									</div>
								</div>
										
									<div class="control-group">
									<label class="control-label" for="form-field-1">Network</label>

									<div class="controls">
									<select id="network"  name="network" onchange="getcharge(this);">
									<option>Choose Network</option>
									<?php $q=mysql_query("select * from network");
									while($rq=mysql_fetch_array($q))
									{
										?>
										
										<option value="<?php echo $rq['id'];?>" id="<?php echo $rq['charge'];?>"><?php echo $rq['network_name'];?></option>
										<?php
									} ?>
									</select>
									</div>
								</div>
							<div class="control-group">
									<label class="control-label" for="form-field-1">Charge</label>

									<div class="controls">
										<input type="text" id="simcharge"  name="simcharge" placeholder="Charge" readonly=""/>
									</div>
								</div>
								
									<div class="control-group">
									<label class="control-label" for="form-field-1">Received Date</label>

									<div class="controls">
										<div class="row-fluid input-append">
															<input class="span5 date-picker" id="recv_date" type="text" data-date-format="dd-mm-yyyy" name="recv_date" />
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
									</div>
								</div>
								
							
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary" type="submit">
										<i class="icon-ok"></i>
										Submit
									</button>
								</div>
								</form>
							</div>

<?php
foreach($simid as $sids)
{
	?>
	<div id="editsim<?php echo $sids;?>" class="modal hide" tabindex="-1">
								<div class="modal-header" style="background: #045e9f;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="white bigger">Edit Sim Details</h4>
								</div>
	<form class="form-horizontal" action="<?php echo base_url();?>sim_details/edit" method="POST">
	<input type="hidden" id="simid"  name="simid"  value="<?php echo $sids;?>"/>
					<?php		$qs=mysql_query("select * from sim_details where sim_id='$sids'");
									while($ress=mysql_fetch_array($qs))
									{ 
										$sim_no=$ress['sim_no'];
										$network=$ress['network'];
										$recv_dt=$ress['recv_dt'];
										$simcharge=$ress['simcharge'];
									} ?>
									
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
								
									<div class="control-group">
									<label class="control-label" for="form-field-1">Sim Number</label>

									<div class="controls">
										<input type="text" id="simno"  name="simno" placeholder="Sim Number" value="<?php echo $sim_no;?>"/>
									</div>
								</div>
										
									<div class="control-group">
									<label class="control-label" for="form-field-1">Network</label>

									<div class="controls">
									
									<select id="network"  name="network" onchange="getchargee(this,<?php echo $sids;?>)">
									<option>Choose Network</option>
									<?php $q=mysql_query("select * from network");
									while($rq=mysql_fetch_array($q))
									{
										?>
										
										<option value="<?php echo $rq['id'];?>" <?php echo $network==$rq['id']?'selected="selected"':'' ?>  id="<?php echo $rq['charge'];?>"><?php echo $rq['network_name'];?></option>
										<?php
									} ?>
									</select>
									
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Charge</label>

									<div class="controls">
										<input type="text" id="simcharge<?php echo $sids;?>"  name="simcharge" placeholder="Charge" readonly="" value="<?php echo $simcharge;?>"/>
									</div>
								</div>
								
								
									<div class="control-group">
									<label class="control-label" for="form-field-1">Received Date</label>

									<div class="controls">
										<div class="row-fluid input-append">
															<input class="span5 date-picker" id="recv_date" type="text" data-date-format="dd-mm-yyyy" name="recv_date" value="<?php echo date("d-m-Y",strtotime($recv_dt)); ?>"/>
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
									</div>
								</div>
								
							
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary" type="submit">
										<i class="icon-ok"></i>
										Submit
									</button>
								</div>
								</form>
							</div>
	<?php
}

?>

					</div>
					</div>
					</div><!--/.page-content-->

			
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
</body></html>
<script>
function getcharge(f)
{
	 var element = $(f).find('option:selected'); 
        var simcharge = element.attr("id"); 
	
		document.getElementById('simcharge').value=simcharge;
}
function getchargee(f,id)
{
	 var element = $(f).find('option:selected'); 
        var simcharge = element.attr("id"); 
	
		document.getElementById('simcharge'+id).value=simcharge;
}
</script>
