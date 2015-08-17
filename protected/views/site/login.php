<?php if(Yii::app()->user->hasFlash('enter')): ?>

<div class="page-error centered">
	<!--<div class="error-symbol">
		<i class="fa-warning"></i>
	</div>-->
	<img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="170" /><br/>
	<h3 class="text-danger">
		<?php echo Yii::app()->user->getFlash('enter'); ?>
	</h3>
	<a href='<?php echo Yii::app()->createAbsoluteUrl("Site/login"); ?>'>
	<button class="btn btn-nyce" ><?= Constants::BACK_MESSAGE?></button></a>
	<div class="info-links text-right">
			<a  href="<?= Constants::URL_AVISO_PRIVACIDAD?>" target="_blank">Aviso de Privacidad</a>
	</div>	
</div>
		
<?php else: ?>

<div class="row">	

					<div class="col-sm-6">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'EnterForm',
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
					<span>log in</span>
				</a>
			</div>
			<div class="row text-success-nyce">
				<?php echo 'Correo electrónico<br/>' ?>
				<?php echo $form->textField($model,'email',array('maxlength'=>50,'value'=>'','placeholder'=>'Ingresa tu correo electrónico...',"class"=>"form-control")); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
			<br/>
			
			<div class="row text-success-nyce">
				<?php echo 'Contraseña<br/>' ?>
				<?php echo $form->passwordField($model,'password',array('maxlength'=>50,'value'=>'','placeholder'=>'Ingresa tu contraseña...',"class"=>"form-control")); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
			<br/>
		
			
			<div class="row buttons">
				<div class="form-group">
					<button type="submit" class="btn btn-primary  btn-block text-left">
						<i class="fa-lock"></i>
						Enviar información
					</button>
				</div>
				<div class="login-footer">
					<a href="<?php echo Yii::app()->createUrl('Site/forgetPassword');?>">Recupera tu contraseña</a><br/>
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

