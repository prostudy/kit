
<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Todos los Artículos</h3>
				</div>
				
				<table class="table  table-striped  table-hover">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Resumen</th>
							<th>Módulo de aplicación</th>
						</tr>
					</thead>					
					<tbody>
							<?php foreach($articles as $row) {?>
						<tr>
							<td><a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=".$row['idarticles']); ?>"><?=$row['name']?></a></td>
							<td><a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=".$row['idarticles']); ?>"><?= $row['summary'] ?></a></td>
							<td><div class="label label-<?=$row['color'] ?>"><?=$row['module'] ?></div></td>							
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>		
			
			<?php if(Yii::app()->session['restricted']){?>
				<p class="bg-danger"><?= Constants::CONTENT_RESTRICTED?></p>
			<?php }?>		
	</div>
</div>
