<?php
/**
 * 
 * @author osjobu@gmail.com
 *
 */
class SurveyDao{
	/**
	 *
	 * @var SurveyDao
	 * 
	 */
	private static  $instance;
	
	public static function getInstance(){
		if (  !self::$instance instanceof self)
		{
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function getSelectSector(){
		$connection=Yii::app()->db;
		$sql =  Querys::GET_SELECT_SECTOR;
		$command = $connection->createCommand($sql);
		$data = $command->query();
		$sectores = array();
		foreach ($data as $sector){
			$id = $sector['idsector_catalog'];
			$sectores[$id] =  $sector['name'];
		}
		return $sectores;
		throw new Exception(Constants::NOT_FOUND_SECTORS);
		$connection->active=false;
	}
	
	public function getSelectSectorType($sector){
		$connection=Yii::app()->db;
		$sql =  Querys::GET_TYPE_SECTOR;
		$command = $connection->createCommand($sql);
		$index = 0;
		$command->bindValue(++$index,$sector,PDO::PARAM_INT);
		$data = $command->query();
		foreach ($data as $sector){
			$id = $sector['idtype_sector_catalog'];
			$sectores[$id] =  $sector['name'];
		}
		return $sectores;
		return $data;
		throw new Exception(Constants::NOT_FOUND_SECTORS);
		$connection->active=false;
	}
	
	public function getSelectSize(){
		$connection=Yii::app()->db;
		$sql =  Querys::GET_SELECT_SIZE;
		$command = $connection->createCommand($sql);
		$data = $command->query();
		$size = array();
		foreach ($data as $sector){
			$id = $sector['idsize_catalog'];
			$size[$id] =  $sector['name'];
		}
		return $size;
		throw new Exception(Constants::NOT_FOUND_SECTORS);
		$connection->active=false;
	}

 	public function getAllQuestions(){
 		$connection=Yii::app()->db;
 		$sql =  Querys::GET_ALL_QUESTIONS; 			
 		$command = $connection->createCommand($sql);
 		$data = $command->query();
 		
 		$orderQuestions = array();
 		$arrayAnswers = array();
 		$arrayRespuestas= array();
 		$questionTpm = 0;
 		foreach ($data as $quest){
 			$questionNumber =  $quest['questionNumber'];
 		
 			if($questionTpm < $questionNumber){
 				$question = new Question();
 				$answer = new Answer();
 				$arrayAnswers = array();
 				$arrayRespuestas = array();
 				$questionTpm = $quest['questionNumber'];
 				$question->setNumber($quest['questionNumber']);
 				$question->setText($quest['questionText']);
 				$question->setTypeControl($quest['type_control']);
 				$question->setLevel($quest['level']);

 				$answer->setIdResponse($quest['idResponse']);
 				$answer->setText($quest['answerText']);
 				array_push($arrayRespuestas,$quest['answerText']);
 				array_push($arrayAnswers,$answer);
 				$question->setAnswers($arrayAnswers);
 				array_push($orderQuestions, $question);
 				//$question->respuestas = $arrayRespuestas;
 			}else if ( $questionTpm == $questionNumber ){
 				$answer = new Answer();
 				$answer->setIdResponse($quest['idResponse']);
 				$answer->setText($quest['answerText']);
 				array_push($arrayAnswers, $answer);
 				$question->setAnswers($arrayAnswers);
				array_push($arrayRespuestas,$quest['answerText']);
 				$question->respuestas = $arrayRespuestas;
 			}
 		}
 		
 		return $orderQuestions;
 		throw new Exception(Constants::NOT_FOUND_QUESTIONS);
 		$connection->active=false;
 	}
 	
 	
 	public function registerGeneralData($users_idusers,$folio,$sector,$sectorType,$idsize_catalog){
 		$registerTestSuccess = false;
 		try{
 			$sql = Querys::INSERT_GENERAL_DATA;
 			$parameters = array(":users_idusers"=>$users_idusers
 								,':folio'=>$folio
 								,":type_sector_catalog_idtype_sector_catalog"=>$sectorType
 								,"type_sector_catalog_sector_catalog_idsector_catalog"=>$sector
 								,"idsize_catalog" => $idsize_catalog
 								,':createdon' => date('Y-m-d H:i:s'));
 			Yii::app()->db->createCommand($sql)->execute($parameters);
 			$registerTestSuccess = true;
 		}catch (Exception $exception){
 			throw new Exception(Constants::NOT_INSERT_GENERAL_DATA);
 			Yii::log("ERROR EN registerGeneralData: $exception","warning","SurveyDao->registerGeneralData");
 			$registerTestSuccess = false;
 		}
 		return $registerTestSuccess;
 	}
 	
 	public function registerResponses($general_data_folio,$Questions_has_Answers_idq_a){
 		$registerTestSuccess = false;
 		try{
 			$sql = Querys::INSERT_RESPONSES;
 			$parameters = array(":general_data_folio"=>$general_data_folio ,':Questions_has_Answers_idq_a'=>$Questions_has_Answers_idq_a);
 			Yii::app()->db->createCommand($sql)->execute($parameters);
 			$registerTestSuccess = true;
 		}catch (Exception $exception){
 			throw new Exception(Constants::NOT_INSERT_RESPONSES);
 			Yii::log("ERROR EN registerResponses: $exception","warning","SurveyDao->registerResponses");
 			$registerTestSuccess = false;
 		}
 		return $registerTestSuccess;
 	}
 	
 
 	public function userAlreadyResponseTest($iduser){
 		$exitsCode = false;
 		$connection=Yii::app()->db;
 		try{
 			$sql = Querys::USER_ALREADY_RESPONSE_TEST;
 			$command = $connection->createCommand($sql);
 			$index = 0;
 			$command->bindValue(++$index,$iduser,PDO::PARAM_INT);
 			$data = $command->query();
 			foreach($data as $row) {
 				$exitsCode = true;
 				//Yii::log("El codigo:".$row['code']." ya esta registrado.","warning");
 			}
 		}catch (Exception $exception){
 			Yii::log("ERROR EN SurveyDao: $exception","warning","SurveyDao->userAlreadyResponseTest");
 		}
 		$connection->active=false;
 		return $exitsCode;
 	}
 	
 	

 	
}


