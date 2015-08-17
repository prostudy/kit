<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
			<div class="page-title">
			
				<div class="title-env">
					<h1 class="title">Generador de códigos NYCE</h1>
					<p class="description">En esta sección se generan los códigos únicos del sistema.</p>
				</div>
			
				<?php require_once 'subMenuAdmin.php';?>
				
			</div>
			
			
		 	<?php if(Yii::app()->user->hasFlash('enterCodes')): ?>
			<div class="page-error centered">
			<img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="170" /><br/>
			<?php
				$message = Yii::app()->user->getFlash('enterCodes'); 
				if (strpos($message,'Error') !== false) {?>
				<h3  class="text-danger">
					<?php echo $message?>
			    </h3>
				<p><a href='javascript:history.back()'>Volver a intentar.</a></p>					
				<?php }else{?>
							<h3 class="text-success-nyce"><?php echo $message?></h3>
				<?php }?>
			</div>
		
<?php else: ?>

<p>
<!--  Tu kit cuenta con un código único, ubicalo en la caja e ingresalo para activarlo.</p>-->
<div class="row">
	
	<div class="col-sm-6">
	
	<div class="panel panel-default">
						<div class="panel-body">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'CodesGeneratorForm',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'login-form fade-in-effect in',
			),
		)); ?>


			<?php //echo $form->errorSummary($model,$errorSummary); ?>
			<?php echo $errorSummary; ?>
			
			<div class="form-group text-success-nyce">
				<?php echo '¿Cuántos códigos deseas generar?<br/>' ?>
				<?php echo $form->textField($model,'numCodes',array('maxlength'=>3,'value'=>'','placeholder'=>'###',"class"=>"form-control","data-mask"=>"decimal")); ?>
				<?php echo $form->error($model,'numCodes'); ?>
			</div>
			
			<div class="form-group text-success-nyce">
				<?php echo '¿Cuál es la longitud de los códigos?<br/>' ?>
				<?php echo $form->textField($model,'lenCode',array('maxlength'=>3,'value'=>'8','placeholder'=>'###',"class"=>"form-control","data-mask"=>"decimal")); ?>
				<?php echo $form->error($model,'lenCode'); ?>
			</div>
			
			
			<div class="form-group text-success-nyce">
				<?php echo 'Si son promocionales indica el número de dias disponibles.<br/>' ?>
				<?php echo $form->textField($model,'duration',array('maxlength'=>3,'value'=>'','placeholder'=>'###',"class"=>"form-control","data-mask"=>"decimal")); ?>
				<?php echo $form->error($model,'duration'); ?>
			</div>
			
			<div class="form-group text-success-nyce">
				<?php echo 'Nombre del evento<br/>' ?>
				<?php echo $form->textField($model,'event',array('maxlength'=>100,'value'=>'','placeholder'=>'Ingresa el nombre del evento',"class"=>"form-control")); ?>
				<?php echo $form->error($model,'event'); ?>
			</div>
			
			<div class="form-group text-success-nyce">
				<?php echo 'Prefijo para el evento<br/>' ?>
				<?php echo $form->textField($model,'evenPrefix',array('maxlength'=>10,'value'=>'','placeholder'=>'Ingresa un prefijo para el código',"class"=>"form-control")); ?>
				<?php echo $form->error($model,'evenPrefix'); ?>
			</div>
			<br/>
		
			
			<div class="row buttons">
				<div class="form-group">
					<button type="submit" class="btn btn-nyce btn-single pull-right">
						<i class="fa-lock"></i>
						Aceptar
					</button>
				</div>
				
				<?php //echo CHtml::submitButton('Submit'); ?>
			</div>
			
		
		<?php $this->endWidget(); ?>

	</div>
</div>

<?php endif; ?>


			
						</div>
					</div>
				
				<script src="assets/js/inputmask/jquery.inputmask.bundle.js"></script>
			
			
			
