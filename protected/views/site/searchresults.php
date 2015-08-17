<div class="page-title">

	<div class="title-env">
		<h1 class="title">Buscador</h1>
		<p class="description">Resultados de la búsqueda</p>
	</div>
</div>

<section class="search-env">
				
				<div class="row">
					<div class="col-md-12">
						
						<form method="get" action="" enctype="application/x-www-form-urlencoded">
							<input type="text" class="form-control input-lg" placeholder="Buscar..." name="s">
							
							<button type="submit" class="btn-unstyled">
								<i class="linecons-search"></i>
							</button>
						</form>
						<h2>
							Busqueda para "<span class="text-success"><?= $searchParameter ?></span>"
							
							<small><?=count($results)+count($resultsDocuments)?> resultados</small>
						</h2>
						<div class="tabs-vertical-env tabs-vertical-bordered"><!-- add class "right-aligned" for the right aligned tabs -->
					
							<ul class="nav tabs-vertical">
								<li class="active"><a href="#v4-home" data-toggle="tab">Artículos</a></li>
								<li><a href="#v4-profile" data-toggle="tab">Documentos</a></li>
							</ul>
							
							<div class="tab-content">
								<div class="tab-pane active" id="v4-home">
									<ul class="results list-unstyled">
									<?php if(count($results)==0) {?>
									<p class="text-success">No se encontraron artículos</p>	
									<?php  }?>
									<?php foreach ($results as $result){?>
									<li>
										<h3>
											<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=".$result['idarticles']); ?>"><?=$result['name']?></a>
										</h3>
										<p><?=$result['summary']?></p>
										<p class="text-success"><?= $result['module']?></p>										
									</li>
									
									<?php }?>	
									</ul>
								</div>
								<div class="tab-pane" id="v4-profile">
									<ul class="results list-unstyled">
									<?php if(count($resultsDocuments)==0) {?>
									<p class="text-success">No se encontraron documentos</p>	
									<?php  }?>
									<?php foreach ($resultsDocuments as $result){?>
									<li>
										<h3>
											<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/downloadResource&name=".$result['url']); ?>"><?=$result['nameFile'].".". $result['type']?></a>
										</h3>
										<p class="text-success"><?=$result['name']?></p>
										<p><?= $result['summary']?></p>										
									</li>
									
									<?php }?>	
									</ul>
								</div>
							</div>
						
					</div>
						
						
						
					</div>
				</div>
				
			</section>