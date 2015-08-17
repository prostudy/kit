<div class="page-error centered ">
				
				<div class="error-symbol">
					<i class="fa-warning"></i>
				</div>
				
				<h2 class="alert alert-danger">
					Error 
					<small><?php echo CHtml::encode($message); ?></small>
					
				</h2>
				
				<p>No pudimos encontrar la página que buscabas</p>
				<p>Puedes buscar nuevamente o contactar al administrador.</p>
				<p><a class="text-success" href="<?php echo Yii::app()->createUrl('Site/index');?>"><?=Constants::BACK_TO_HOME ?></a></p>				
			</div>
			
			