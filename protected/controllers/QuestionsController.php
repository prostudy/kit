<?php

class QuestionsController extends Controller{
	public $layout = 'register';

	/**
	 * Muestra el formulario de registro
	 */
	public function actionIndex(){//Listo
		$message ='';
		$model = new QuestionsForm;
		$variable = ['1','2'];
		$questions = SurveyDao::getInstance()->getAllQuestions();
		try{
			if(isset($_POST['QuestionsForm'])){
				$model->attributes=$_POST['QuestionsForm'];
				if( $model->validate()  ){
					$message = "exito";
					//var_dump($_POST);
					//Yii::log("entro al valida","warning");
					
				foreach ($_POST as $key=>$element) {
						//Yii::log($key ."\n","warning");
						//Yii::log($element ."\n","warning");
						foreach ($element as $key2=>$element2) {
							Yii::log("RESPUESTAS PREGUNTA: $key" ."-" . $key2."==".$element2 ."\n","warning");
						}
					}
						
					
					
						
					
					Yii::app()->user->setFlash('registerCode',$message);
					$this->refresh();
				}
			}	
		}catch (Exception $e) {
			Yii::app()->user->setFlash('registerCode',$e->getMessage());
			$this->refresh();
		}
		$this->render('index',array('model'=>$model,"errorSummary"=>$message,'variable'=>$variable,'arrayQuestions'=>$questions));
	}
}