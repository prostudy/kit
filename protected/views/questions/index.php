<div class="page-title">
			
	<div class="title-env">
		<h1 class="title">Cuestionario diagnostico</h1>
		<p class="description">Cuestionario para conocer el estado de cumplimiento sobre la LFPDPPP y demás normativa aplicable. </p>
	</div>
			
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-color panel-gray"><!-- Add class "collapsed" to minimize the panel -->
			<div class="panel-heading">
				<h3 class="panel-title">Normalización y Certificación Electrónica NYCE S.C. le informa:</h3>
							</div>
			<div class="panel-body content_article">
				<p>El objetivo del siguiente cuestionario es que usted realice una autoevaluaci&oacute;n acerca del cumplimiento que tiene su organizaci&oacute;n con la Ley Federal de Protecci&oacute;n de Datos Personales en Posesi&oacute;n de los Particulares.</p>
				
				<p>Los beneficios que obtiene son:</p>
				
				<ol>
					<li>Conocer el estado en que se encuentra su organizaci&oacute;n en cuanto al grado de cumplimiento tomando como referencia &nbsp;la Ley Federal de Protecci&oacute;n de Datos Personales en Posesi&oacute;n de los Particulares y dem&aacute;s normativa aplicable en la materia.</li>
					<li>Brindarle una visi&oacute;n m&aacute;s amplia sobre los elementos m&iacute;nimos &nbsp;que deben implementar las organizaciones para cumplir con la legislaci&oacute;n aplicable en materia de datos personales.</li>
					<li>Proporcionarle gr&aacute;ficos estad&iacute;sticos de los cuales se pueden identificar &aacute;reas de oportunidad y el grado de cumplimiento de diferentes sectores de la industria.</li>
				</ol>
				
				<p>NYCE se compromete a que sus datos ser&aacute;n tratados de forma confidencial, &eacute;stos no ser&aacute;n compartidos con ninguna autoridad o empresa y no se derivar&aacute;n revisiones posteriores por parte de la autoridad. Los resultados ser&aacute;n utilizados con fines estad&iacute;sticos.</p>
			</div>
		</div>
	</div>
</div>


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
				<h4 class="text-success-nyce">Datos generales</h4>
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
	
	<div class="form-group text-success-nyce">
	<label class="col-sm-12 ">A.- ¿A qué sector pertenece su organización? </label>
	<?php
	echo CHtml::dropDownList('sector_id','', $selectSector,
			array(
					'ajax' => array(
							'type'=>'POST', //request type
							'url'=>CController::createUrl('Questions/DynamicSelects'), //url to call.
							//Style: CController::createUrl('currentController/methodToCall')
							'update'=>'#sector_type_id', //selector to update
							//'data'=>'js:javascript statement'
					//leave out the data key to pass all form values through
					)));
	echo "</div>";
	//empty since it will be filled by the other dropdown
	echo '<div class="form-group text-success-nyce"><label class="col-sm-12 ">B.- ¿De qué tipo es? </label>';
	echo CHtml::dropDownList('sector_type_id','', $selectTypeSector);
	echo "</div>";
	?>
	
	
	<div class="form-group text-success-nyce">
		<label class="col-sm-12 ">C.- ¿Cuál es el tamaño? </label>
		<?php echo CHtml::dropDownList('select_size','', $selectSize);?>   
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
		echo "</div>";
	}
	?>
	
	
	<div class="form-group text-right">
		<button type="submit" class="btn btn-nyce btn-single">
			<i class="fa-check"></i>
			Obtener reporte
		</button>	
		<!-- <p class="note">Los campos marcados <span class="required">*</span> son necesarios.</p> -->
		<?php //echo CHtml::submitButton('Submit'); ?>
		
		
	</div>
	
	
	</div>
					</div>
			
				</div>
			</div>

<?php $this->endWidget(); ?>
<?php endif; ?>

<script src="assets/js/inputmask/jquery.inputmask.bundle.js"></script>
			

			
						