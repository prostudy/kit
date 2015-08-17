<?php
/**
 * 
 * @author osjobu@gmail.com
 *
 */
class CodesDao{
	/**
	 *
	 * @var CodesDao
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

	/**
	 * Recibe un codigo y lo busca en la base.
	 * Si el codigo esta registrado devuelve true
	 * @param string $code
	 * @return boolean
	 */
	public function exitsCodeInDataBase($code){
		$exitsCode = false;
		$connection=Yii::app()->db;
		try{
			$sql = Querys::SEARCH_CODE;
			$command = $connection->createCommand($sql);
			$index = 0;
			$command->bindValue(++$index,$code,PDO::PARAM_STR);
			$data = $command->query();
			foreach($data as $row) {
				$exitsCode = true;
				//Yii::log("El codigo:".$row['code']." ya esta registrado.","warning");
			}
		}catch (Exception $exception){
			Yii::log("ERROR EN CodesDao: $exception","warning","CodesDao->exitsCodeInDataBase");
		}
		$connection->active=false;
		return $exitsCode;
	}
 	 	
 	/**
 	 * Regresa el id del codigo pasado como parametro.
 	 * Si no lo encuentra devuelve cero.
 	 * @param unknown $code
 	 * @throws Exception
 	 * @return int
 	 */
 	public function getCodeId($code){//Listo
 		$idCode = 0;
 		$connection=Yii::app()->db;
 		$sql = Querys::SEARCH_CODE;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$code,PDO::PARAM_STR);
 		$data = $command->query();
 		foreach($data as $row) {
 			$idCode =  $row['idcodes'];
 			return $idCode;
 		}
 		$connection->active=false;
 		throw new Exception(Constants::ERROR_REGISTER_CODE);
 	}
 	
 	/**
 	 * Inserta un codigo en la base.
 	 * Si ocurre un error o el codigo ya esta en la base devuelve false
 	 * @param string $code
 	 * @return boolean
 	 */
 	 public function registerCodeIntoDataBase($code,$duration,$model){//Ya esta revisado
 	 	$registerCodeSuccess = false;
 	 	try{
	 	 	$sql = Querys::INSERT_CODE;
	 	 	$parameters = array(":code"=>$code, ':event'=>$model->event ,':created' => date('Y-m-d H:i:s'), ':duration'=> $duration);
	 	 	Yii::app()->db->createCommand($sql)->execute($parameters);
	 	 	$registerCodeSuccess = true;
 	 	}catch (Exception $exception){
 	 		Yii::log("ERROR EN registerCodeIntoDataBase: $exception","warning","CodesDao->registerCodeIntoDataBase");
 	 		$registerCodeSuccess = false;
 	 	}
 	 	return $registerCodeSuccess;
 	 }
}


