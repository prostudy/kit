<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="page-title">
			
				<div class="title-env">
					<h1 class="title">Basic Tables</h1>
					<p class="description">Variations of basic tables included in Xenon</p>
				</div>
			
					<div class="breadcrumb-env">
			
								<ol class="breadcrumb bc-1">
									<li>
							<a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
						</li>
								<li>
			
										<a href="tables-basic.html">Tables</a>
								</li>
							<li class="active">
			
										<strong>Basic Tables</strong>
								</li>
								</ol>
						
				</div>
				
			</div>
			<div class="row">
			
			<h3 class="text-gray">
				Counters <br />
				<small class="text-muted">From-to based counters who start counting once they appear on screen and they are all available in 15 color variants.</small>
			</h3>
			
			<!-- Xenon Block Counter Widget -->
			<div class="row">
				<div class="col-sm-3">
				
					<div class="xe-widget xe-counter-block" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
						<div class="xe-upper">
							
							<div class="xe-icon">
								<i class="linecons-cloud"></i>
							</div>
							<div class="xe-label">
								<strong class="num">0.0%</strong>
								<span>Server uptime</span>
							</div>
							
						</div>
						<div class="xe-lower">
							<div class="border"></div>
							
							<span>Result</span>
							<strong>78% Increase</strong>
						</div>
					</div>
					
				</div>
				<div class="col-sm-3">
				
					<div class="xe-widget xe-counter-block xe-counter-block-purple" data-count=".num" data-from="0" data-to="512" data-duration="3">
						<div class="xe-upper">
							
							<div class="xe-icon">
								<i class="linecons-camera"></i>
							</div>
							<div class="xe-label">
								<strong class="num">0</strong>
								<span>Photos Taken</span>
							</div>
							
						</div>
						<div class="xe-lower">
							<div class="border"></div>
							
							<span>Increase</span>
							<strong>512 more photos</strong>
						</div>
					</div>
					
				</div>
				<div class="col-sm-3">
				
					<div class="xe-widget xe-counter-block xe-counter-block-blue" data-suffix="k" data-count=".num" data-from="0" data-to="310" data-duration="4" data-easing="false">
						<div class="xe-upper">
							
							<div class="xe-icon">
								<i class="linecons-user"></i>
							</div>
							<div class="xe-label">
								<strong class="num">0k</strong>
								<span>Daily Visits</span>
							</div>
							
						</div>
						<div class="xe-lower">
							<div class="border"></div>
							
							<span>Bounce Rate</span>
							<strong>51.55%</strong>
						</div>
					</div>
					
				</div>
				<div class="col-sm-3">
				
					<div class="xe-widget xe-counter-block xe-counter-block-orange">
						<div class="xe-upper">
							
							<div class="xe-icon">
								<i class="fa-life-ring"></i>
							</div>
							<div class="xe-label">
								<strong class="num">24/7</strong>
								<span>Live Support</span>
							</div>
							
						</div>
						<div class="xe-lower">
							<div class="border"></div>
							
							<span>Tickets Opened</span>
							<strong data-count="this" data-from="0" data-to="14215" data-duration="2">0</strong>
						</div>
					</div>
					
				</div>
			</div>
			
			
			
			
			<div class="row">
				<div class="col-md-12">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Todos los códigos asignados</h3>
							
							<div class="panel-options">
								<a href="#">
									<i class="linecons-cog"></i>
								</a>
								
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">–</span>
									<span class="expand-icon">+</span>
								</a>
								
								<a href="#" data-toggle="reload">
									<i class="fa-rotate-right"></i>
								</a>
								
								<a href="#" data-toggle="remove">
									×
								</a>
							</div>
						</div>
						
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>E-mail</th>
									<th>Estado</th>
								</tr>
							</thead>
							
							<tbody>
							<?php foreach($allCodesAsigned as $row) {?>
								<tr>
									<td><?= $row['code'] ?></td>
									<td><?= $row['name']." ".$row['lastname']?></td>
									<td><?= $row['email'] ?></td>
									<td class="middle-align">
										<div class="progress">
											<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												<span class="sr-only">20% Complete</span>
											</div>
										</div>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
					
				</div>
				
			</div>
			
			</div>
			
			
			
			
			
			<div class="row">
				<div class="col-md-7">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Table Inside Panel</h3>
							
							<div class="panel-options">
								<a href="#">
									<i class="linecons-cog"></i>
								</a>
								
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">–</span>
									<span class="expand-icon">+</span>
								</a>
								
								<a href="#" data-toggle="reload">
									<i class="fa-rotate-right"></i>
								</a>
								
								<a href="#" data-toggle="remove">
									×
								</a>
							</div>
						</div>
						
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Address</th>
									<th>Progress</th>
								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td>1</td>
									<td>Arlind</td>
									<td>Nushi</td>
									<td class="middle-align">
										<div class="progress">
											<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												<span class="sr-only">20% Complete</span>
											</div>
										</div>
									</td>
								</tr>
								
								<tr>
									<td>2</td>
									<td>Art</td>
									<td>Ramadani</td>
									<td class="middle-align">
										<div class="progress">
											<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
												<span class="sr-only">92% Complete</span>
											</div>
										</div>
									</td>
								</tr>
								
								<tr>
									<td>3</td>
									<td>Filan</td>
									<td>Fisteku</td>
									<td class="middle-align">
										<div class="progress">
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
												<span class="sr-only">70% Complete</span>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
				</div>
				<div class="col-md-5">
				
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h3 class="panel-title">Flat Panel + Table</h3>
							
							<div class="panel-options">
								<a href="#">
									<i class="linecons-cog"></i>
								</a>
								
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">–</span>
									<span class="expand-icon">+</span>
								</a>
								
								<a href="#" data-toggle="reload">
									<i class="fa-rotate-right"></i>
								</a>
								
								<a href="#" data-toggle="remove">
									×
								</a>
							</div>
						</div>
						
						<table class="table table-condensed">
							<thead>
								<tr>
									<th width="1%">#</th>
									<th>Task</th>
									<th>Progress</th>
								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td>1</td>
									<td>Database Clean-up</td>
									<td class="middle-align">
										<div class="progress">
											<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												<span class="sr-only">20% Complete</span>
											</div>
										</div>
									</td>
								</tr>
								
								<tr>
									<td>2</td>
									<td>Flyer Print</td>
									<td class="middle-align">
										<div class="progress">
											<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
												<span class="sr-only">92% Complete</span>
											</div>
										</div>
									</td>
								</tr>
								
								<tr>
									<td>3</td>
									<td>Brand Identity Design</td>
									<td class="middle-align">
										<div class="progress">
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
												<span class="sr-only">70% Complete</span>
											</div>
										</div>
									</td>
								</tr>
								
								<tr>
									<td>4</td>
									<td>Website Development</td>
									<td class="middle-align">
										<div class="progress">
											<div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
												<span class="sr-only">40% Complete</span>
											</div>
										</div>
									</td>
								</tr>
								
								<tr>
									<td>5</td>
									<td>Support Tickets</td>
									<td class="middle-align">
										<div class="progress">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>
									</td>
								</tr>
								
								<tr>
									<td>6</td>
									<td>Theme Update</td>
									<td class="middle-align">
										<div class="progress">
											<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
												<span class="sr-only">30% Complete</span>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
			
			
			
