<?php include 'include/engassets.php';?>
<?php include 'include/engheader.php';?>
<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

		<?php include 'include/engsidebar.php';?>
	
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

<div class="span9 infobox-container">
									<div class="infobox infobox-green  ">
										<div class="infobox-icon">
											<i class="icon-comments"></i>
										</div>
 <?php $un=$this->session->userdata('engusername'); ?>

										<div class="infobox-data">
										
										<?php $cq= mysql_query("select count(customer_id) as cnt from customers");
										while($cres=mysql_fetch_array($cq))
										{
											$cnt=$cres['cnt'];
										}?>
											<span class="infobox-data-number"><?php echo $cnt;?></span>
											<div class="infobox-content">Total Customers</div>
										</div>
									</div>

									<div class="infobox infobox-blue  ">
										<div class="infobox-icon">
											<i class="icon-twitter"></i>
										</div>

										<div class="infobox-data">
										<?php $scq= mysql_query("select count(category_id) as cnt from gps_categories");
										while($scres=mysql_fetch_array($scq))
										{
											$scnt=$scres['cnt'];
										}?>
											<span class="infobox-data-number"><?php echo $scnt;?></span>
											<div class="infobox-content">Total Categories</div>
										</div>

									
									</div>

									<div class="infobox infobox-pink  ">
										<div class="infobox-icon">
											<i class="icon-shopping-cart"></i>
										</div>

										<div class="infobox-data">
										<?php $lcq= mysql_query("select count(sim_id) as cnt from sim_details");
										while($lcres=mysql_fetch_array($lcq))
										{
											$lcnt=$lcres['cnt'];
										}?>
											<span class="infobox-data-number"><?php echo $lcnt;?></span>
											<div class="infobox-content">Total Sims</div>
										</div>
									</div>

									<div class="infobox infobox-red  ">
										<div class="infobox-icon">
											<i class="icon-beaker"></i>
										</div>

										<div class="infobox-data">
										<?php $suq= mysql_query("select count(device_id) as cnt from gps_devices");
										while($sures=mysql_fetch_array($suq))
										{
											$sbnt=$sures['cnt'];
										}?>
											<span class="infobox-data-number"><?php echo $sbnt;?></span>
											<div class="infobox-content">Total Device Types</div>
										</div>
									</div>

								<div class="infobox infobox-black  ">
										<div class="infobox-icon">
											<i class="icon-bolt"></i>
										</div>

										<div class="infobox-data">
											<?php $spcq= mysql_query("select count(model_id) as cnt from gps_model_details");
										while($spres=mysql_fetch_array($spcq))
										{
											$spcnt=$spres['cnt'];
										}?>
											<span class="infobox-data-number"><?php echo $spcnt;?></span>
											<div class="infobox-content">Total Devices</div>
										</div>
									</div>
									<div class="infobox infobox-orange  ">
										<div class="infobox-icon">
											<i class="icon-pencil"></i>
										</div>

										<div class="infobox-data">
										<?php $sccq= mysql_query("select count(instatllation_id) as cnt from installation where allocation_status='completed' and installation_status='pending'");
										while($sccres=mysql_fetch_array($sccq))
										{
											$scccnt=$sccres['cnt'];
										}?>
											<span class="infobox-data-number"><?php echo $scccnt;?></span>
											<div class="infobox-content">Installation Approved</div>
										</div>
									</div>

		                     	<div class="infobox infobox-grey  ">
										<div class="infobox-icon">
											<i class="icon-pencil"></i>
										</div>

										<div class="infobox-data">
										<?php $srcq= mysql_query("select count(instatllation_id) as cnt from installation where installation_status='completed'");
										while($srcqs=mysql_fetch_array($srcq))
										{
											$srcnt=$srcqs['cnt'];
										}?>
											<span class="infobox-data-number"><?php echo $srcnt;?></span>
											<div class="infobox-content">Installation Completed</div>
										</div>
									</div>
									
									
												<div class="infobox infobox-purple  ">
										<div class="infobox-icon">
											<i class="icon-pencil"></i>
										</div>

										<div class="infobox-data">
										<?php $sciq= mysql_query("select count(engineer_id) as cnt from engineers");
										while($sciqs=mysql_fetch_array($sciq))
										{
											$srcity=$sciqs['cnt'];
										}?>
											<span class="infobox-data-number"><?php echo $srcity;?></span>
											<div class="infobox-content">Engineers</div>
										</div>
									</div>

									<div class="space-6"></div>

								
								</div>				
<div class="row-fluid">

	<div class="span12">







</div>

</div>

</div>

