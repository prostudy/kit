<div class="page-title">

	<div class="title-env">
		<h1 class="title">Panel de administración</h1>
		<p class="description">En este panel se visualizan los usuarios registrados y estadísticas generales.</p>
	</div>
					<?php require_once 'subMenuAdmin.php';?>
</div>
			
			
			<button class="btn btn-secondary" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Mostrar la pantalla del generardor de códigos" data-original-title="Generador de códigos NYCE">Generar nuevos códigos</button>
			
			
			
			<div class="row">
				<div class="col-md-12">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Usuarios registrados con su código</h3>
							
							<div class="panel-options">
								<a href="#">
									<i class="linecons-cog"></i>
								</a>
								
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
								<a href="#" data-toggle="reload">
									<i class="fa-rotate-right"></i>
								</a>
								
								<a href="#" data-toggle="remove">
									&times;
								</a>
							</div>
						</div>
						<div class="panel-body">
							
							<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
							
								<table cellspacing="0" class="table table-small-font table-bordered table-striped">
									<thead>
										<tr>
											<th>Nombre</th>
											<th data-priority="1">Email</th>
											<th data-priority="2">Status</th>
											<th data-priority="3">Último login</th>
											<th data-priority="4">Registrado</th>
											<th data-priority="5">Fecha de Activación</th>
											<th data-priority="6">Duración</th>
											<th data-priority="7">Dias transcurridos</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$activeCodes = 0;
									$inactiveCodes = 0;
									foreach($allCodesAsigned as $row) {
										$row['account_active'] == 1 ? $activeCodes+=1  : $inactiveCodes+=1;
										?>
										<tr>
											<th><a href="<?php echo Yii::app()->createAbsoluteUrl("Administrator/editUser&iduser=".$row['idusers']); ?>"><?= $row['name']?> <span class="co-name"><?= $row['lastname']?> (<?= $row['code']?>)</span></a></th>
											<td><?= $row['email']?></td>
											<td><?= $row['account_active'] == 1 ? "<span class='badge badge-roundless badge-success'>ACTIVO</span>" :"<span class='badge badge-roundless badge-danger'>DESACTIVADO</span>" ?></td>
											<td><?= $row['lastlogin']?></td>
											<td><?= $row['createdon']?></td>
											<td><?= $row['activation_date']?></td>
											<td><?= $row['duration'] == 0  ? $row['isadmin']== 1 ? 'ADMIN' : 'VENDIDO' : $row['duration'] ?></td>
											<td><?= $row['dias']?></td>
										</tr>	
									<?php } ?>		
									</tbody>
								</table>
							
							</div>
							
							<script type="text/javascript">
							// This JavaScript Will Replace Checkboxes in dropdown toggles
							jQuery(document).ready(function($)
							{
								setTimeout(function()
								{
									$(".checkbox-row input").addClass('cbr');
									cbr_replace();
								}, 0);
							});
							</script>
								
							
						</div>
					
					</div>
				</div>
			</div>
			
			
		<div class="row">
			<!--  <h3 class="text-gray">
				Counters <br />
				<small class="text-muted">From-to based counters who start counting once they appear on screen and they are all available in 15 color variants.</small>
			</h3>
			-->
			<!-- Xenon Block Counter Widget -->
			<div class="row">
				<div class="col-sm-3">
				
					<div class="xe-widget xe-counter-block" data-count=".num" data-from="0" data-to="<?= $activeCodes?>" data-suffix="" data-duration="5">
						<div class="xe-upper">
							
							<div class="xe-icon">
								<i class="linecons-cloud"></i>
							</div>
							<div class="xe-label">
								<strong class="num">0.0%</strong>
								<span>Códigos Activos</span>
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
				
					<div class="xe-widget xe-counter-block xe-counter-block-red" data-count=".num" data-from="0" data-to="<?= $inactiveCodes?>" data-duration="3">
						<div class="xe-upper">
							
							<div class="xe-icon">
								<i class="linecons-camera"></i>
							</div>
							<div class="xe-label">
								<strong class="num">0</strong>
								<span>Códigos desactivados</span>
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
			
			</div>
			
			
			
			<!-- Tablas de codigos disponibles  -->
			<div class="row">
				<div class="col-md-6">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Códigos disponibles para venta</h3>
							
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">–</span>
									<span class="expand-icon">+</span>
								</a>
								<a href="#" data-toggle="remove">
									×
								</a>
							</div>
						</div>
						
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Código</th>
									<th>Evento</th>
									<!-- <th>Creado</th>
									<th>Duración</th> -->
								</tr>
							</thead>
							
							<tbody>
							<?php foreach($codesAvailableForSale as $row) {?>
								<tr>
									<td><?= $row['code'] ?></td>
									<td><?= $row['event'] ?></td>
									 <!-- <td><?= $row['createdon'] ?></td>
									<td><?= $row['duration'] ?></td> -->
								</tr>
							<?php }?>	
							</tbody>
						</table>
					</div>
				</div>
				
				<div class="col-md-6">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Códigos disponibles para promoción</h3>
							
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">–</span>
									<span class="expand-icon">+</span>
								</a>
								<a href="#" data-toggle="remove">
									×
								</a>
							</div>
						</div>
						
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Código</th>
									<th>Evento</th>
									<th>Borrar</th>
									<!-- <th>Creado</th>
									<th>Duración</th> -->
								</tr>
							</thead>
							
							<tbody>
								<?php foreach($codesAvailableForPromotion as $row) {?>
								<tr>
									<td><?= $row['code'] ?></td>
									<td><?= $row['event'] ?></td>
									<td><a href="<?php echo Yii::app()->createAbsoluteUrl("Administrator/deleteCode&idcode=".$row['idcodes']); ?>" class="delete">
									<i class="linecons-trash"></i></a></td>
									<!-- <td><?= $row['createdon'] ?></td>
									<td><?= $row['duration'] ?></td> -->
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
			
			
	<!-- Imported scripts on this page -->
	<script src="assets/js/rwd-table/js/rwd-table.min.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/xenon-custom.js"></script>
			
