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
			$simpleQuestionsResponse = self::getDataSourceBarSimpleQuestions();
			$datasourceSimpleQuestions = $simpleQuestionsResponse['datasourceSimpleQuestions'];
			$answers = $simpleQuestionsResponse['answers'];
			
			
			/*$resposne1 = self::getSimpleQuestionById();
			$dataSourceSimpleQuestion1 = $resposne1['dataSoruce'];
			$series1 = $resposne1['series'];*/
			
			
			$this->render('index',array('dataSourcePieSubsectors'=>json_encode(self::getDataSourcePieSubsectors())
										,'getDataSourceBarSimpleQuestions'=>json_encode($datasourceSimpleQuestions) 
										,'answersSimpleQuestions'=>($answers)	
										,'totalSurveys'=>$totalSurveys
										,'dataSourceRadioQuestions'=>json_encode(self::getRadioQuestions())
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
	
	
	private function getDataSourceBarSimpleQuestions(){
		$answers = array();
		$dataSource = array();
		$response = array();
		$data = ReportsDao::getInstance()->getAllSimpleQuestions();
		foreach ($data as $row){
			$object = array();
			$object['id'] = $row['idq_a'];
			$object['total'] = $row['total']+0;
			array_push($dataSource, $object);
			
			$ans['answer'] = $row['text'];
			$ans['id'] = $row['idq_a'];
			$ans['total'] = $row['total']+0;
			array_push($answers, $ans);
		}
		
		$response['datasourceSimpleQuestions'] = $dataSource;
		$response['answers'] = $answers;
		
		return $response;
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
	
	
	
	/*private function getSimpleQuestion(){
		$dataSource = array();
		$series =  array();
		$tmpSerie = array();
		$responseTmp =  array();
		$response =  array();
		$idsQuestions = [1,2,3,5,6,22,23,24,25,26,27,28];
		$index = 0;
		foreach ($idsQuestions as $id){
			//Yii::log("Pregunta $id:",'warning');
			$results = ReportsDao::getInstance()->getSimpleQuestionById($id);
			$answers = array();
			$tmpSerie =  array();
			$tmpAnswer =  array();
			$tmpSerie2 = array();
			foreach ($results as $row){
				$answers['text'] = $row['textAnswer'];//substr($row['text'], 0, 2);
				$answers[  str_replace(' ', '_', self::clean( $row['textAnswer'] ) ) ] = $row['total']+0;
				
				array_push($tmpAnswer, $answers);
				
				$tmpSerie2['valueField'] = str_replace(' ', '_', self::clean( $row['textAnswer'] ) );
				$tmpSerie2['name'] =  $row['textAnswer'];
				//Yii::log(json_encode($answers),'warning');
				array_push($tmpSerie, $tmpSerie2);
			}
			
//			array_push($series, $tmpSerie);
//			array_push($dataSource, $answers);
			
			$responseTmp['dataSource'] = $tmpAnswer;//$dataSource;
			$responseTmp['series'] = $tmpSerie;//$series;
			$responseTmp['idDiv'] = "question".$id;
			$responseTmp['textQuestion'] = $row['textQuestion'];
			array_push($response, $responseTmp);
				
		}
		Yii::log(json_encode($response),'warning');
		
		return $response;
	}*/
	
	
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
		Yii::log(json_encode($response),'warning');
	
		return $response;
	}
	
	private function clean($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	
		return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	}
}