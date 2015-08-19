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

 	public function getAllQuestions(){
 		$connection=Yii::app()->db;
 		$sql =  Querys::GET_ALL_QUESTIONS; 			
 		$command = $connection->createCommand($sql);
 		$data = $command->query();
 		
 		$orderQuestions = array();
 		$arrayAnswers = array();
 		$questionTpm = 0;
 		foreach ($data as $quest){
 			$questionNumber =  $quest['questionNumber'];
 		
 			if($questionTpm < $questionNumber){
 				$question = new Question();
 				$answer = new Answer();
 				$arrayAnswers = array();
 				$questionTpm = $quest['questionNumber'];
 				$question->setNumber($quest['questionNumber']);
 				$question->setText($quest['questionText']);
 				$question->setTypeControl($quest['type_control']);
 				$question->setLevel($quest['level']);

 				$answer->setIdResponse($quest['idResponse']);
 				$answer->setText($quest['answerText']);
 				array_push($arrayAnswers,$answer);
 				$question->setAnswers($arrayAnswers);
 				array_push($orderQuestions, $question);
 			}else if ( $questionTpm == $questionNumber ){
 				$answer = new Answer();
 				$answer->setIdResponse($quest['idResponse']);
 				$answer->setText($quest['answerText']);
 				array_push($arrayAnswers, $answer);
 				$question->setAnswers($arrayAnswers);
 			}
 		}
 		
 		return $orderQuestions;
 		throw new Exception(Constants::NOT_FOUND_QUESTIONS);
 		$connection->active=false;
 	}
 	
 	

 	
}


