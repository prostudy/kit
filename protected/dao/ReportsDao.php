<?php
/**
 * 
 * @author osjobu@gmail.com
 *
 */
class ReportsDao{
	/**
	 *
	 * @var ReportsDao
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
	
	
	public function getTotalSurveys(){
		$connection=Yii::app()->db;
		$sql =  Querys::GET_TOTAL_SURVEYS;
		$command = $connection->createCommand($sql);
		$data = $command->query();
		return count($data);
		throw new Exception(Constants::REPORTS_ERROR);
		$connection->active=false;
	}
	
	public function getAllSectors(){
		$connection=Yii::app()->db;
		$sql =  Querys::GET_ALL_SECTORS_AND_SUBSECTORS;
		$command = $connection->createCommand($sql);
		$sectores = $command->query();
		return $sectores;
		throw new Exception(Constants::REPORTS_ERROR);
		$connection->active=false;
	}
	
	public function getAllSimpleQuestions(){
		$connection=Yii::app()->db;
		$sql =  Querys::GET_SIMPLE_QUESTIONS;
		$command = $connection->createCommand($sql);
		$sectores = $command->query();
		return $sectores;
		throw new Exception(Constants::REPORTS_ERROR);
		$connection->active=false;
	}
	
	
	public function getRadioQuestionById($id){
		$connection=Yii::app()->db;
		$sql =  Querys::GET_RADIO_QUESTIONS;
		$command = $connection->createCommand($sql);
		$index = 0;
		$command->bindValue(++$index,$id,PDO::PARAM_INT);
		$data = $command->query();
		return $data;
		throw new Exception(Constants::REPORTS_ERROR);
		$connection->active=false;
	}
	
	
	
	public function getSimpleQuestionById($id){
		$connection=Yii::app()->db;
		$sql =  Querys::GET_SIMPLE_QUESTION_BY_ID;
		$command = $connection->createCommand($sql);
		$index = 0;
		$command->bindValue(++$index,$id,PDO::PARAM_INT);
		$data = $command->query();
		return $data;
		throw new Exception(Constants::REPORTS_ERROR);
		$connection->active=false;
	}
	
	
	
}


