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


			
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Datos generales </h3>
				<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								<a href="#" data-toggle="remove">
									&times;
								</a>
				</div>
			</div>
			<div class="panel-body">
				<form role="form" class="form-horizontal" action="#" method="post">
					<div class="form-group">
						<label class="col-sm-12 ">1.- ¿A qué sector pertenece su organización? </label>
							<div class="col-sm-12">
										<select class="form-control">
											<option>Financiero</option>
											<option>Salud</option>
											<option>Telecomunicaciones</option>
											<option>Cámaras y asociaciones</option>
											<option>Educación</option>
											<option>Industria/comercio/servicios</option>
											<option>Otros</option>
										</select>
								</div>
								
								
								</div>
									
								<div class="form-group">
									<label class="col-sm-12" for="field-1">Especifique (otros):</label>
									<div class="col-sm-12">
									<input type="text" class="form-control" id="field-1" placeholder="">
									</div>
								</div>
								<div class="form-group-separator"></div>
								
								<div class="form-group">
								<label class="col-sm-12 ">2.- ¿De qué tipo es? </label>
			
									<div class="col-sm-12">
										<select class="form-control">
										<option>Banco</option>					
										<option>Seguro</option>
										<option>Afore </option>
										<option>Casa de bolsa</option>
										<option>Fianzas</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-12" for="field-1">Especifique (otros):</label>
									<div class="col-sm-12">
									<input type="text" class="form-control" id="field-1" placeholder="">
									</div>
								</div>
								<div class="form-group-separator"></div>
								
								<?php echo "El total de preguntas es:".count($arrayQuestions);
										$numbersValidateQuestions = array();
										foreach ($arrayQuestions as $question){
										array_push($numbersValidateQuestions,$question->getNumber());
										?>
										<div class="form-group">
											<label class="col-sm-12 "><?= $question->getNumber().".-".$question->getText()?></label>
											<div class="col-sm-12">
								<?php 		foreach ($question->getAnswers() as $answer){
											if($question->getTypeControl() === "checkbox"){
												?>
												<label class="text-primary"><input value="<?=$answer->getIdResponse() ?>" type="<?= $question->getTypeControl() ?>" name="<?= "question_".$question->getNumber()."[]" ?>" class="cbr cbr-turquoise"><?= $answer->getText() /*. "(".$answer->getIdResponse().")"*/ ?> </label>
											<?php }else{?>
												<label class="text-primary"><input value="<?=$answer->getIdResponse() ?>" type="<?= $question->getTypeControl() ?>" name="<?= "question_".$question->getNumber()."[]" ?>" class="cbr cbr-turquoise"><?= $answer->getText() /*. "(".$answer->getIdResponse().")"*/ ?> </label>
											<?php }?>
												<br/>
									<?php 	} ?></div>
										</div>
										<div class="form-group-separator"></div>
										
										
								<?php }?>
								
								
						<!-- <div class="panel-body panel-border">
							<div class="row">
								<div class="col-sm-12">									
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Elemento</th>
												<th>No existe</th>
												<th>Documentado</th>
												<th>Parcialmente implementado</th>
												<th>Implementado</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td>1</td>
												<td>Arlind</td>
												<td>Nushi</td>
												<td>Nushi</td>
												<td>Nushi</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div> -->
								
						
								<input type="submit" name="submit" value="Submit"/>
								
							</form>
			
						</div>
					</div>
			
				</div>
			</div>
			
			
			
<?php
if(isset($_POST['submit'])){//to run PHP script on submit
	foreach ($numbersValidateQuestions as $numberQuestion){
		$name = 'question_'.$numberQuestion;
		if(!empty($_POST[$name])){
			// 	Loop to store and display values of individual checked checkbox.
			foreach($_POST[$name] as $selected){
	 			echo "RESPUESTAS PREGUNTA $numberQuestion:".$selected."</br>";
			}
		}else{
			echo "No se selecciono la pregunta:".$numberQuestion."<br>";
		}
		}
}
?>	
			
			
			
			
			
			
			

		

	
	
	


			
		

			
			
