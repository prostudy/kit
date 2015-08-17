<div class="page-title">
			<div class="title-env">
				<h1 class="title">Editar datos del artículo</h1>
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

<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'EditArticleForm',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
				'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
				'class'=>'login-form fade-in-effect in',
		),
		)); ?>

	<div class="panel panel-headerless">

	
		<div class="panel-body">

			<div class="member-form-add-header">
				<div class="row">
					<div class="col-md-2 col-sm-4 pull-right-sm">

						<div class="action-buttons">
							<button type="submit" class="btn btn-block btn-secondary">Actualizar datos</button>
							<button type="reset" class="btn btn-block btn-gray">Deshacer cambios</button>
						</div>

					</div>
					
				</div>
			</div>


			<div class="member-form-inputs">

				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Número de artículo</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'number',array('maxlength'=>10,'placeholder'=>'Ingresa el número de artículo',"class"=>"form-control")); ?>
						<?php echo $form->error($model,'number'); ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Nombre del artículo</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'name',array('maxlength'=>100,'placeholder'=>'Ingresa el nombre del artículo ...',"class"=>"form-control")); ?>
						<?php echo $form->error($model,'name'); ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Breve introducción</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'summary',array('placeholder'=>'Ingresa una introducción...',"class"=>"form-control")); ?>
						<?php echo $form->error($model,'summary'); ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Contenido</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textArea($model,'content',array('placeholder'=>'Ingresa el contenido del artículo...',"class"=>"form-control",'rows' => 20)); ?>
						<?php echo $form->error($model,'content'); ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Nombre del módulo</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'module',array('placeholder'=>'Ingresa el contenido del artículo...',"class"=>"form-control")); ?>
						<?php echo $form->error($model,'module'); ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Color del módulo</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'color',array('placeholder'=>'Ingresa el color...',"class"=>"form-control")); ?>
						<?php echo $form->error($model,'color'); ?>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">¿Es un artículo libre?</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'restricted',array('placeholder'=>'Ingresa el contenido del artículo...',"class"=>"form-control")); ?>
						<?php echo $form->error($model,'restricted'); ?>
					</div>
				</div>
				
			</div>

		</div>
	</div>





<?php $this->endWidget(); ?>

<?php endif; ?>





<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/select2/select2.css">
	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/multiselect/css/multi-select.css">


	<!-- Imported scripts on this page -->
	<script src="assets/js/datepicker/bootstrap-datepicker.js"></script>
	<script src="assets/js/select2/select2.min.js"></script>
	<script src="assets/js/multiselect/js/jquery.multi-select.js"></script>
