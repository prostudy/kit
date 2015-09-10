<style>
.dxc-tooltip{
z-index: 9999 !important;
}

/*#SpiderWeb {
    width: 100%;
    height: 800px;
}*/

</style>
<div class="page-title">
			
	<div class="title-env">
		<h1 class="title">Reporte de usuario </h1>
		<p class="description">Cuestionario para conocer el estado de cumplimiento sobre la LFPDPPP y demás normativa aplicable.		
		 </p>
	</div>
			
</div>

<div class="row">


<div class="col-sm-12">
		<div class="chart-item-bg">
			<div id="SpiderWeb"></div>
		</div>
	</div>
	
</div>

<div class="row">
<div class="col-md-12">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Nivel de cumplimiento <?= "Sector:$sector Subsector:$typeSector, tamaño de la empresa: $size" ?></h3>
						</div>
						
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Tópico</th>
									<th>Nivel</th>
								</tr>
							</thead>
							
							<tbody>
							<?php foreach ($radioResponses as $row){?>
								<tr>
									<td><?= $row['number']?></td>
									<td><?= $row['topic']?></td>
									<td class="middle-align">
										<div class="progress">
										<?php 
										if( ($row['value']+0) >= 0 && ($row['value']+0) <= .5 )
											$color = 'danger';
										elseif (($row['value']+0) > .5 && ($row['value']+0) <= .75 )
											$color = 'warning';
										elseif (($row['value']+0) == 1)
										$color = 'success';
										?>
											<div class="progress-bar progress-bar-<?= $color?>" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?=  $row['value']+0 == 0 ? $row['value']+.1*100 : $row['value']*100     ?>%">
												<span class="sr-only"><?= $row['value']*100?>% Complete</span>
											</div>
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					
				</div>
	<div class="col-sm-12">
						
	<div class="text-success-nyce xe-widget xe-conversations">
		<div class="xe-bg-icon ">
			<i class=" text-success-nyce linecons-comment"></i>
		</div>
		<div class="xe-header">
			<div class="xe-icon">						
				<i class="linecons-comment"></i>
			</div>
			<div class="xe-label">
				<h3>
					<span class='text-success-nyce'>Resultado sobre el nivel de cumplimiento</span>
					<small>En esta sección se muestra un resumen de tu empresa</small>
				</h3>
				
			</div>
			
		</div>
		<div class="xe-body">
			
			<ul class="list-unstyled">
				<?php foreach ($arrayQuestions as $question){?>
					<li>
						<div class="xe-comment-entry">
						<a href="#" class="xe-user-img">
						</a>
						<div class="xe-comment">
					<?php echo "<p class='text-success-nyce'>". $question->getNumber().".-".$question->getText()."</p>";
					foreach ($question->getAnswers() as $answer){
							echo  "<p>".ucfirst($answer->getText())."</p>";
						}
						?>
						</div>
					</div>
				
				</li>
					
			<?php 	}	?>		
			</ul>
			
		</div>
		<div class="xe-footer">

		</div>
	</div>
					
</div>
</div>




<script src="assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
<script src="assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
<script>
var dataSourceSpider = <?php echo $dataSourceSpider;?>;
$("#SpiderWeb").dxPolarChart({
    dataSource: dataSourceSpider,
    keepLabels: true,
    adaptiveLayout: true,
    useSpiderWeb: true,
    series: [{valueField: "valor", name: "Cumplimiento" }],
    commonSeriesSettings: {        
        type: "area",
        color: '#01A7A7'
    },
    title: "Nivel de cumplimiento",
    tooltip: {enabled: true}
});

</script>