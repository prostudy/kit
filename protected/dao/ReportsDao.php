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
	
	public function getAllSectors(){
		$connection=Yii::app()->db;
		$sql =  Querys::GET_ALL_SECTORS_AND_SUBSECTORS;
		$command = $connection->createCommand($sql);
		$sectores = $command->query();
		return $sectores;
		throw new Exception(Constants::REPORTS_ERROR);
		$connection->active=false;
	}
	
}


