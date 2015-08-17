<div class="page-title">
			<div class="title-env">
				<h1 class="title">Editar datos del usuario</h1>
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
		'id'=>'EditUserForm',
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
					<div class="col-md-10 col-sm-8">

						<div class="user-img">
							<img src="assets/images/user-4.png" class="img-circle"
								alt="user-pic">
						</div>
						<div class="user-name">
							<h3><?= $model->name." ".$model->lastname ?></h3> 
							<span>
								<?php echo "Creado el ".$model->createdon." (".$model->code.")"; ?>
							</span>
						</div>

					</div>
				</div>
			</div>


			<div class="member-form-inputs">
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Id de usuario</label>
					</div>
					<div class="col-sm-3">
						<?php echo $form->textField($model,'idusers',array('maxlength'=>11,"class"=>"form-control",'disabled'=>true )); ?>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="username">Id de código asociado</label>
					</div>
					<div class="col-sm-3">
						<?php echo $form->textField($model,'codes_idcodes',array('maxlength'=>11,"class"=>"form-control",'disabled'=>true )); ?>
					</div>
				</div>

				
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Correo electrónico</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'email',array('maxlength'=>50,'placeholder'=>'Ingresa el correo electrónico...',"class"=>"form-control")); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Nombre</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'name',array('maxlength'=>44,'placeholder'=>'Ingresa el nombre...',"class"=>"form-control")); ?>
						<?php echo $form->error($model,'name'); ?>
					</div>
				</div>
				
				
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Apellido</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'lastname',array('maxlength'=>44,'placeholder'=>'Ingresa el apellido...',"class"=>"form-control")); ?>
						<?php echo $form->error($model,'lastname'); ?>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Código de activación</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'activation_code',array('maxlength'=>100,"class"=>"form-control" )); ?>
						<?php echo $form->error($model,'activation_code'); ?>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Estado de la cuenta: (Activada=1, Desactivada=0)</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'account_active',array('maxlength'=>1,"class"=>"form-control" )); ?>
						<?php echo $form->error($model,'account_active'); ?>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Fecha de activación</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'activation_date',array('maxlength'=>20,"class"=>"form-control",'disabled'=>true)); ?>
						<?php echo $form->error($model,'activation_date'); ?>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Auth-Token</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'authToken',array('maxlength'=>100,"class"=>"form-control")); ?>
						<?php echo $form->error($model,'authToken'); ?>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Código de cambio de password</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'change_password_code',array('maxlength'=>100,"class"=>"form-control" )); ?>
						<?php echo $form->error($model,'change_password_code'); ?>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Fecha de ultimo ingreso</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'lastlogin',array('maxlength'=>20,"class"=>"form-control",'disabled'=>true)); ?>
						<?php echo $form->error($model,'lastlogin'); ?>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">¿Es administrador 1=SI 0 = No?</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'isadmin',array('maxlength'=>1,"class"=>"form-control")); ?>
						<?php echo $form->error($model,'isadmin'); ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="username">Días de promoción</label>
					</div>
					<div class="col-sm-9">
						<?php echo $form->textField($model,'duration',array('maxlength'=>3,"class"=>"form-control")); ?>
						<?php echo $form->error($model,'duration'); ?>
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
