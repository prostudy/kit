<?php if(Yii::app()->user->hasFlash('registerCode')): ?>
<div class="page-error centered">
	<img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="170" /><br/>
	<?php
	$message = Yii::app()->user->getFlash('registerCode'); 
	if (strpos($message,'Error') !== false) {?>
		<!-- <div class="error-symbol">
			<i class="fa-warning"></i>
		</div> -->
		<h3  class="text-danger">
			<?php echo $message?>
		</h3>		
		<a href='<?php echo Yii::app()->createAbsoluteUrl("Register/"); ?>'>
		<button class="btn btn-nyce" ><?= Constants::BACK_MESSAGE?></button></a>		
	<?php }else{?>
		<!-- <div class="error-symbol">
			<i class="fa-envelope-o  text-info"></i>
		</div> -->
		<h3 class="text-success-nyce"><?php echo $message?></h3>
	<?php }?>
	<div class="info-links text-right">
				<a  href="<?= Constants::URL_AVISO_PRIVACIDAD?>" target="_blank">Aviso de Privacidad</a>
		</div>
</div>


<?php else: ?>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="text-success-nyce">Tu kit cuenta con un código único, registralo junto con tus datos para activarlo.</h4>
			</div>

			<div class="panel-body">
			
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'RegisterCodeForm',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>


	<?php //echo $form->errorSummary($model,$errorSummary); ?>
	<?php echo $errorSummary; ?>

	<div class="form-group text-success-nyce">
		<?php echo 'Nombre <span class="required">*</span><br/>'; ?>
		<?php echo $form->textField($model,'name',array('maxlength'=>44,'value'=>'','placeholder'=>'Ingresa tu nombre...',"class"=>"form-control")); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="form-group text-success-nyce">
		<?php echo 'Apellido <span class="required">*</span><br/>'; ?>
		<?php echo $form->textField($model,'lastname',array('maxlength'=>44,'value'=>'','placeholder'=>'Ingresa tu apellido...',"class"=>"form-control")); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>
	
	<div class="form-group text-success-nyce">
		<?php echo 'Código proporcionado <span class="required">*</span><br/>'; ?>
		<?php echo $form->textField($model,'code',array('maxlength'=>20,'value'=>'','placeholder'=>'Ingresa tu código...',"class"=>"form-control")); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>
	
	<div class="form-group text-success-nyce">
		<?php echo 'Correo electrónico <span class="required">*</span><br/>' ?>
		<?php echo $form->textField($model,'email',array('maxlength'=>50,'value'=>'','placeholder'=>'Ingresa tu correo electrónico...',"class"=>"form-control")); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div class="form-group text-success-nyce">
		<?php echo 'Contraseña <span class="required">*</span><br/>' ?>
		<?php echo $form->passwordField($model,'password',array('maxlength'=>50,'value'=>'','placeholder'=>'Ingresa tu contraseña...',"class"=>"form-control")); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<br/>

	
	<div class="form-group text-right">
		<button type="submit" class="btn btn-nyce btn-single">
			<i class="fa-check"></i>
			Registrar código
		</button>	
		<p class="note">Los campos marcados <span class="required">*</span> son necesarios.</p>
		<?php //echo CHtml::submitButton('Submit'); ?>
		
		
	</div>
	<div class="login-footer">
				<div class="info-links text-right">
					<a  href="<?= Constants::URL_AVISO_PRIVACIDAD?>" target="_blank">Aviso de Privacidad</a>
				</div>
	</div>
	
	</div>
					</div>
			
				</div>
			</div>

<?php $this->endWidget(); ?>


<?php endif; ?>

<script src="assets/js/inputmask/jquery.inputmask.bundle.js"></script>
			

			
						