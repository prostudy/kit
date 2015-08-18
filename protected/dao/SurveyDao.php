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
 		return $data;
 		throw new Exception(Constants::NOT_FOUND_QUESTIONS);
 		$connection->active=false;
 	}
 	
 	

 	
}


