<div class="page-title">
			
	<div class="title-env">
		<h1 class="title">MÓDULO: <?=strtoupper( $article['module'] ) ?></h1>
		<p class="description">Artículo <?= $article['number']?>.- <?= $article['summary']?></p>
	</div>
			
</div>

<div class="row">
	<div class="col-md-12">
	
	<ul class="pager">
	<?php 
		if(count($antes)>0){?>
		<li>
			<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=".$antes['idarticles']); ?>">
				<i class="fa-angle-double-left "></i> 
				Artículo <?=$antes['number']?> 
			</a>
		</li>
	<?php }?>
	<?php 
		if(count($next)>0){?>
		<li>
			<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=".$next['idarticles']); ?>">
				Artículo <?=$next['number']?> 
				<i class="fa-angle-double-right"></i>
			</a>
		</li>
	<?php }?>
	</ul>

	
		<!-- Colored panel, remember to add "panel-color" before applying the color -->
		<div class="panel panel-color panel-gray"><!-- Add class "collapsed" to minimize the panel -->
			<div class="panel-heading">
				<h3 class="panel-title"><?= $article['name']?></h3>
				<?php if(Yii::app()->session['isadmin']){?>
				<div class="panel-options">
					<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/editArticle&idArticle=".$article['idarticles']); ?>">
						<i class="linecons-cog"></i>
					</a>
				</div>
				<?php }?>
			</div>
			<div class="panel-body content_article">
				<!--<?= $article['summary']?>
				<hr/>-->
				<?= $article['content']?>
			</div>
		</div>
		
	</div>
</div>
<?php if( !(Yii::app()->session['restricted']) ){?>
<div class="row">
			
	<div class="col-md-12">
		
		<ul class="nav nav-tabs nav-tabs-justified">
			<li class="active">
				<a href="#home-3" data-toggle="tab">
					<span class="visible-xs"><i class="fa-home"></i></span>
					<span class="hidden-xs ">Formatos</span>
				</a>
			</li>
			<li>
				<a href="#profile-3" data-toggle="tab">
					<span class="visible-xs"><i class="fa-user"></i></span>
					<span class="hidden-xs">Documentos relacionados</span>
				</a>
			</li>
			<li>
				<a href="#messages-3" data-toggle="tab">
					<span class="visible-xs"><i class="fa-envelope-o"></i></span>
					<span class="hidden-xs">Enlaces de interes</span>
				</a>
			</li>
		</ul>
		
		<div class="tab-content">
			<div class="tab-pane active" id="home-3">
				<div class="list-group list-group-minimal"><!-- Add class "list-group-minimal" for less padding between list items -->
					<?php foreach($resourcesTap1 as $resource) {?>
					<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/downloadResource&name=".$resource['url']); ?>" class="list-group-item">
						<span class="badge badge-turquoise">Descargar <!-- <i class="fa fa-file-word-o"></i> --><?= $resource['type']?></span>
						<span class="text-success-nyce"><?= $resource['name']?></span>
						<p><?= $resource['description']?></p>
					</a>
					<?php }?>
				</div>
			</div>
			<div class="tab-pane" id="profile-3">
				<div class="list-group list-group-minimal"><!-- Add class "list-group-minimal" for less padding between list items -->
					<?php foreach($resourcesTap2 as $resource) {?>
					<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/downloadResource&name=".$resource['url']); ?>" class="list-group-item">
						<span class="badge badge-turquoise">Descargar <!-- <i class="fa fa-file-word-o"></i> --><?= $resource['type']?></span>
						<span class="text-success-nyce"><?= $resource['name']?></span>
						<p><?= $resource['description']?></p>
					</a>
					<?php }?>
				</div>
			</div>
			<div class="tab-pane" id="messages-3">
				
			</div>
			
		</div>
		
		
	</div>
</div>

<?php }else{?>
			<p class="bg-danger"><?= Constants::CONTENT_RESTRICTED?></p>	
<?php }?>
			
			

			
			
			
		

			
			
