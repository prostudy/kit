<?php

class ReportsController extends Controller{
//	public $layout = 'register';

	/**
	 * Muestra el formulario de registro
	 */
	public function actionIndex(){
		if( UsersDao::getInstance()->validToken() && Yii::app()->session['isadmin']){
				//Yii::app()->user->setFlash('registerCode',Constants::USER_ALREADY_REPONSE_TEST);		

			$totalSurveys = ReportsDao::getInstance()->getTotalSurveys();
			
			$this->render('index',array('dataSourcePieSubsectors'=>json_encode(self::getDataSourcePieSubsectors())
										,'dataSourcePieSector1'=> json_encode(self::getDataSourceSectorPie(1))
										,'dataSourcePieSector2'=> json_encode(self::getDataSourceSectorPie(2))
										,'dataSourcePieSector3'=> json_encode(self::getDataSourceSectorPie(3))
										,'dataSourcePieSector4'=> json_encode(self::getDataSourceSectorPie(4))
										,'dataSourcePieSector5'=> json_encode(self::getDataSourceSectorPie(5))
										,'dataSourcePieSector6'=> json_encode(self::getDataSourceSectorPie(6))
										,'dataSourcePieSector7'=> json_encode(self::getDataSourceSectorPie(7))
										,'totalSurveys'=>$totalSurveys
										,'dataSourceRadioQuestions'=>json_encode(self::getRadioQuestions())
										,'radioTopics'=>ReportsDao::getInstance()->getQuestionsTopics()
										, "simpleQuestions"=>  self::getSimpleQuestion() ) );
		}else{
			UtilsFunctions::destroySession();
		}
	}
	
	/**
	 * Obtiene los datos para mostrar los sectores y subsectores
	 * @return multitype:
	 */
	private function getDataSourcePieSubsectors(){
		$dataSource = array();
		$reportSectors = ReportsDao::getInstance()->getAllSectors();
		foreach ($reportSectors as $row){
			$object = array();
			$object['subsector'] = $row['subsector'];
			$object['subsector_total'] = $row['subsector_total']+0;
			array_push($dataSource, $object);
		}		
		return $dataSource;
	}
	
	
	private function getDataSourceSectorPie($idSector){
		$dataSource = array();
		$reportSector = ReportsDao::getInstance()->getSectorPie($idSector);
		foreach ($reportSector as $row){
			$object = array();
			$object['subsector'] = $row['subsector'];
			$object['subsector_total'] = $row['subsector_total']+0;
			array_push($dataSource, $object);
		}
		return $dataSource;
	}

	
	private function getRadioQuestions(){
		$dataSource = array();
		$idsQuestions = [4,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21];
		$index = 0;
		foreach ($idsQuestions as $id){
			//Yii::log($id,'warning');
			$results = ReportsDao::getInstance()->getRadioQuestionById($id);
			$answers = array();
			//$answers['pregunta'] = 'Pregunta'.++$index;
			foreach ($results as $row){
				$answers['text'] = $row['number'];//substr($row['text'], 0, 2);
				$answers[  str_replace(' ', '_', $row['serie']) ] = $row['total']+0;
			}
			array_push($dataSource, $answers);
		}
		return $dataSource;
	}
	
	

	private function getSimpleQuestion(){
		$dataSource = array();
		$response =  array();
		$tmpAnswer = array();
		$idsQuestions = [1,2,3,5,6,22,23,24,25,26,27,28];
		$index = 0;
		foreach ($idsQuestions as $id){
			$results = ReportsDao::getInstance()->getSimpleQuestionById($id);
			$tmpAnswer = array();
			foreach ($results as $row){
				$answers['text'] = $row['textAnswer'];//substr($row['text'], 0, 2);
				$answers['total' ] = $row['total']+0;
				array_push($tmpAnswer, $answers);
			}

			$responseTmp['dataSource'] = $tmpAnswer;//$dataSource;
			$responseTmp['idDiv'] = "question".$id;
			$responseTmp['textQuestion'] = $row['textQuestion'];
			array_push($response, $responseTmp);
		}
		//Yii::log(json_encode($response),'warning');
	
		return $response;
	}
	
	
	
	public function actionUserReport($idUser){
		if( UsersDao::getInstance()->validToken() ){//Listo
			
		$dataSourceSpider = array();
		$spiderInfoTable = array();
		
		//$idUser = Yii::app()->session['id'];
		$radioResponses = ReportsDao::getInstance()->getRadioSpiderByUser( $idUser );
		foreach ($radioResponses as $row){
			$answers['arg'] = $row['number'];
			$answers['valor' ] = $row['value']+0;
			array_push($dataSourceSpider, $answers);
		}
		
		
		$data = ReportsDao::getInstance()->getAllUserResponse( $idUser );
		$orderQuestions = array();
		$arrayAnswers = array();
		$arrayRespuestas= array();
		$questionTpm = 0;
		$sector = "";
		$typeSector = "";
		$size = "";
		foreach ($data as $quest){
			$questionNumber =  $quest['number'];
			$sector = $quest['sector'];
			$size = $quest['size']; 
			$typeSector = $quest['typeSector'];
				
			if($questionTpm < $questionNumber){
				$question = new Question();
				$answer = new Answer();
				$arrayAnswers = array();
				$arrayRespuestas = array();
				$questionTpm = $quest['number'];
				$question->setNumber($quest['number']);
				$question->setText($quest['question']);
		
				$answer->setText($quest['answer']);
				array_push($arrayRespuestas,$quest['answer']);
				array_push($arrayAnswers,$answer);
				$question->setAnswers($arrayAnswers);
				array_push($orderQuestions, $question);
				//$question->respuestas = $arrayRespuestas;
			}else if ( $questionTpm == $questionNumber ){
				$answer = new Answer();
				$answer->setText($quest['answer']);
				array_push($arrayAnswers, $answer);
				$question->setAnswers($arrayAnswers);
				array_push($arrayRespuestas,$quest['answer']);
				$question->respuestas = $arrayRespuestas;
			}
		}
		$this->render('userReport',array("dataSourceSpider"=>json_encode($dataSourceSpider)
										,"radioResponses"=>$radioResponses
										,"arrayQuestions"=>$orderQuestions
										,"sector"=>$sector
										,"typeSector"=> $typeSector
										,"size"=>$size
										));
		}else{
			UtilsFunctions::destroySession();
		}
	}
}