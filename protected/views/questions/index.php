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
		<a href='<?php echo Yii::app()->createAbsoluteUrl("Questions/"); ?>'>
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
				'id'=>'QuestionsForm',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
	<?php //echo $form->errorSummary($model,$errorSummary); ?>
	<?php echo $errorSummary; ?>

		<!--  <div class="form-group text-success-nyce">
	<label class="col-sm-12 ">1.- ¿A qué sector pertenece su organización? </label>
		<select name="sector" class="form-control" '>
		<?php foreach ($selectSector as $sector){ ?>
			<option value="<?= $sector['idsector_catalog'] ?>"><?= $sector['name'] ?></option>
		<?php } ?>	
		</select>
	</div>
	
	<div class="form-group text-success-nyce">
	<label class="col-sm-12 ">2.- ¿De qué tipo es? </label>
		<select name="sectorType" class="form-control">
		<?php foreach ($selectTypeSector as $typeSector){ ?>
			<option value="<?= $typeSector['idtype_sector_catalog'] ?>"><?= $typeSector['name'] ?></option>
		<?php } ?>	
		</select>
	</div>-->
	
	<div class="form-group text-success-nyce">
		<label class="col-sm-12 ">3.- ¿Cuál es el tamaño? </label>
		<label class="text-primary"><input value="1-10" type="radio" name="<?= "question_0"."[]" ?>" class="cbr cbr-turquoise">1-10 empleados</label><br/>
		<label class="text-primary"><input value="11-50" type="radio" name="<?= "question_0"."[]" ?>" class="cbr cbr-turquoise">11 a 50 empleados</label><br/>
		<label class="text-primary"><input value="51-250" type="radio" name="<?= "question_0"."[]" ?>" class="cbr cbr-turquoise">51 a  250 empleados</label><br/>
		<label class="text-primary"><input value="mas250" type="radio" name="<?= "question_0"."[]" ?>" class="cbr cbr-turquoise">más de 250 empleados</label>	<br/>	      
	</div>
	
	<div class="form-group text-success-nyce">
		<?php //echo $form->checkBoxList($model,'estado',$arrayQuestions); ?>
		<?php echo $form->hiddenField($model,'tamano',array('type'=>"hidden",'size'=>2,'maxlength'=>2)); ?>
		
		<?php echo $form->error($model,'tamano'); ?>
	</div>
	
	<?php  foreach ($questionsAndAnswers as $question){
		echo '<div class="form-group text-success-nyce">';
		echo  "<br/>".$question->getNumber().".-".$question->getText()."<br/>";		
		foreach ($question->getAnswers() as $answer){
			?><label class="text-primary"><input value="<?=$answer->getIdResponse() ?>" type="<?= $question->getTypeControl() ?>" name="<?= "question_".$question->getNumber()."[]" ?>" class="cbr cbr-turquoise"><?= $answer->getText() . "(".$answer->getIdResponse().")" ?> </label>
			<br/>			
		<?php
		}
		
	}?>
	
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
			

			
						