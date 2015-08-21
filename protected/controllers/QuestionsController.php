<?php

class QuestionsController extends Controller{
	public $layout = 'register';

	/**
	 * Muestra el formulario de registro
	 */
	public function actionIndex(){//Listo
		$message ='';
		$model = new QuestionsForm;
		$questionsAndAnswers = SurveyDao::getInstance()->getAllQuestions();
		$selectSector = SurveyDao::getInstance()->getSelectSector();
		$selectTypeSector = SurveyDao::getInstance()->getSelectSectorType(2);
		try{
			if(isset($_POST['QuestionsForm'])){
				$model->attributes=$_POST['QuestionsForm'];
				if( $model->validate()  ){
					$message = "exito";					
				foreach ($_POST as $key=>$element) {
						//Yii::log($key ."\n","warning");
						//Yii::log($element ."\n","warning");
						foreach ($element as $key2=>$element2) {
							Yii::log("RESPUESTAS PREGUNTA: $key"."==".$element2 ."\n","warning");
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
		$this->render('index',array('model'=>$model
									,"errorSummary"=>$message
									,'questionsAndAnswers'=>$questionsAndAnswers
									,"selectSector"=>$selectSector
									,"selectTypeSector"=>$selectTypeSector));
	}
}