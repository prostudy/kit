<?php

class QuestionsController extends Controller{
//	public $layout = 'register';

	/**
	 * Muestra el formulario de registro
	 */
	public function actionIndex(){
		if ( SurveyDao::getInstance()->userAlreadyResponseTest( Yii::app()->session['id']) ){
			Yii::app()->user->setFlash('registerCode',Constants::USER_ALREADY_REPONSE_TEST);
			$this->render('index');
		}else{
			self::showQuestions();
		}
	}
	
	private function showQuestions(){
		$model = new QuestionsForm;
		$message ='';
		
		$questionsAndAnswers = SurveyDao::getInstance()->getAllQuestions();
		$selectSector = SurveyDao::getInstance()->getSelectSector();
		$selectTypeSector = SurveyDao::getInstance()->getSelectSectorType(1);
		$selectSize = SurveyDao::getInstance()->getSelectSize();
		try{
			if(isset($_POST['QuestionsForm'])){
				$model->attributes=$_POST['QuestionsForm'];
				if( $model->validate()  ){
					self::serverValidationForm($_POST,$questionsAndAnswers);
					self::registerTest($_POST);
					$message = Constants::SUCCESS_TEST;
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
				,"selectTypeSector"=>$selectTypeSector
				,"selectSize"=>$selectSize));
	}
	
	
	public function serverValidationForm($POST,$questionsAndAnswers){
		//1.-Valida los campos del formulario
		//Yii::log("Numero de preguntas ".count($questionsAndAnswers)."\n","warning");
		//Yii::log("Tamaño de post ".count($POST)."\n","warning");
		if (count($POST) < count($questionsAndAnswers) + 4){
			throw new Exception(Constants::ERROR_DATA_FORM_TEST);
		}
	}
	
	public function registerTest($POST){
		//Insertar en la tabla general data
		/*Yii::log("-------INSERTE GENERAL_DATA-----"."\n","warning");
		Yii::log("-------id del usuario-----".Yii::app()->session['id']."\n","warning");
		$folio = CodeGenerator::getUniqueCode(15,Yii::app()->session['email']);
		Yii::log("-------folio-----".$folio."\n","warning");
		Yii::log("-------Sector:".$POST['sector_id']."\n","warning");
		Yii::log("-------Sector type:".$POST['sector_type_id']."\n","warning");
		Yii::log("-------Tamaño :".$POST['select_size']."\n","warning");*/
		$folio = CodeGenerator::getUniqueCode(15,Yii::app()->session['email']);
		SurveyDao::getInstance()->registerGeneralData( Yii::app()->session['id']
														,$folio
														,$POST['sector_id'], $POST['sector_type_id'],$POST['select_size']);
		foreach ($POST as $key=>$element) {
			if($key == "sector_id" || $key == 'sector_type_id' || $key == 'QuestionsForm' || $key == 'select_size'){
				continue;
			}
			foreach ($element as $key2=>$element2) {
				//Yii::log("RESPUESTAS PREGUNTA: $key"."==".$element2 ."\n","warning");
				SurveyDao::getInstance()->registerResponses($folio, $element2);
			}
		}
	}
	
	public function actionDynamicSelects(){
		$data = SurveyDao::getInstance()->getSelectSectorType($_POST['sector_id']);
		
		/*data = Location::model()->findAll('parent_id=:parent_id',
		array(':parent_id'=>(int) $_POST['	idtype_sector_catalog']));*/

		//$data = CHtml::listData($data,'idtype_sector_catalog','name');
		foreach($data as $value=>$name){
			echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
		}
	}
	
}