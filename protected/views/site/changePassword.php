<?php if(Yii::app()->user->hasFlash('enter')): ?>
<div class="page-error centered">
	<img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="170" /><br/>
	<?php
	$message = Yii::app()->user->getFlash('enter'); 
	if (strpos($message,'Error') !== false) {?>
		<!-- <div class="error-symbol">
			<i class="fa-warning"></i>
		</div> -->
		<h3  class="text-danger">
			<?php echo $message?>
		</h3>			
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
	
	<div class="col-sm-6">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'ChangePasswordForm',
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
			<div class="login-header">
				<a href="<?=Constants::DOMINIO_NYCE?>" target="_blank" class="logo">
					<img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="170" />
				</a>
			</div>
			<div class="row text-success-nyce">
				<?php echo 'Contraseña nueva<br/>' ?>
				<?php echo $form->passwordField($model,'password',array('maxlength'=>50,'value'=>'','placeholder'=>'Ingresa tu nueva contraseña...',"class"=>"form-control")); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
			<br/>
		
			<div class="row buttons">
				<div class="form-group">
					<button type="submit" class="btn btn-primary  btn-block text-left">
						<i class="fa-lock"></i>
						Enviar nueva contraseña
					</button>
				</div>
				<div class="login-footer">
					<a href="<?php echo Yii::app()->createUrl('Site/login');?>">Iniciar Sessión</a><br/>
					<div class="info-links text-right">
						<a  href="<?= Constants::URL_AVISO_PRIVACIDAD?>" target="_blank">Aviso de Privacidad</a>
					</div>
				</div>
				<?php //echo CHtml::submitButton('Submit'); ?>
			</div>
		
		<?php $this->endWidget(); ?>
		<div class="external-login">
			<a href="<?php echo Yii::app()->createUrl('Register/');?>" class="nyce">
				Registrar un código.
			</a>
		</div>

	</div>
</div>

<?php endif; ?>


