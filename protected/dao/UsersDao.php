<?php
/**
 * 
 * @author osjobu@gmail.com
 *
 */
class UsersDao{
	/**
	 *
	 * @var UsersDao
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
	 * Recibe un email y lo busca en la base,
	 * @param  $email
	 * @throws Exception
	 */
 	public function exitsUserInDataBase($email){//Listo
 		$connection=Yii::app()->db;
 		$sql = Querys::SEARCH_USER;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$email,PDO::PARAM_STR);
 		$data = $command->query();
 		foreach($data as $row) {
 			throw new Exception(Constants::USER_ALREDY_REGISTER);
 		}
 		$connection->active=false;
 	}
 		
 	
 	/**
 	 * Actualiza el password de un determinado usuario
 	 * @param string $password
 	 * @param int $idusers
 	 */
 	public function updatePasswordForUser($password,$idusers){//Listo
 		$command = Yii::app()->db->createCommand();
 		$command->update('users', array( 'password'=>self::krypPassword($password), 'change_password_code'=>'','authToken'=>''), 'idusers=:id', array(':id'=>$idusers));
 	}
 	
 	
 	/**
 	 * Verifica si un codigo ya ha sido registrado en la tabla de usuarios.
 	 * @param int $codeId
 	 * @return boolean
 	 */
 	public function exitsCodeInUsers($codeId){//Listo
 		$connection=Yii::app()->db;
 		$sql = Querys::SEARCH_CODE_IN_USERS;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$codeId,PDO::PARAM_INT);
 		$data = $command->query();
 		foreach($data as $row) {
 			throw new Exception(Constants::ERROR_REGISTER_CODE);
 		}
 		$connection->active=false;
 	}
 	
 	
 	/**
	 * Registra en la base de datos un nuevo usuario asociado a un codigo
 	 * @param  $model
 	 * @param string $activationCode
 	 */
 	public function registerNewUserWithCode($model,$activationCode){ //Listo
 		$codeId = CodesDao::getInstance()->getCodeId($model->code);
 		$password = self::krypPassword($model->password);
 		$sql = Querys::INSERT_USER;
 		$parameters = array(":codeId"=>$codeId, ":email"=>strtolower($model->email), ":name"=>strtoupper($model->name), ":lastname"=>strtoupper($model->lastname), ":password"=>$password, ":activationCode"=>$activationCode, ":createdon"=>date('Y-m-d H:i:s'));
 		Yii::app()->db->createCommand($sql)->execute($parameters); 		
 	}
 	

 	/**
 	 * Busca un codigo de activacion valido, es decir que el campo account_active sea igual a cero
 	 * @param string $activationCode
 	 * @throws Exception
 	 */
 	public function validActivationCodeInDataBase($activationCode){//Listo
 		$connection=Yii::app()->db;
 		$sql = Querys::VALID_ACTIVATION_CODE;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$activationCode,PDO::PARAM_STR);
 		$data = $command->query();
 		foreach($data as $row) {
 			return;
 		}
 		$connection->active=false;
		throw new Exception(Constants::URL_NOT_VALID_ACCOUNT_ACTIVE);
 	}
 	
 	
	/**
	 * Busca un codigo de cambio de password valido, es decir que el campo account_active sea igual a 1
	 * @param string $changePasswordCode
	 * @throws Exception
	 * @return unknown
	 */
 	public function validChangeCodeInDataBase($changePasswordCode){
 		$response = array();
 		$connection=Yii::app()->db;
 		$sql = Querys::VALID_CHANGE_PASSWORD_CODE;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$changePasswordCode,PDO::PARAM_STR);
 		$data = $command->query();
 		foreach($data as $row) {
 			return $row['idusers'];
 		}
 		$connection->active=false;
 		//return 0;
		throw new Exception(Constants::URL_NOT_VALID_CHANGE_PASSWORD);
 	 }
 	
 	
 	/**
 	 * Actualiza el estado del campo account_active a 1, indicando que la cuenta se ha activado
 	 * @param unknown $activationCode
 	 */
 	public function activateAccount($activationCode){//Listo
 		$sql = Querys::SET_ACCOUNT_ACTIVATED;
 		$parameters = array(":activation_code"=>$activationCode, ":account_active"=>1, ":activation_date"=>date('Y-m-d H:i:s'));
 		Yii::app()->db->createCommand($sql)->execute($parameters);
 	}
 	
 	
 	/**
 	 * Valida que el email y el password esten en a base Y QUE LA DURACION DE LOS DIAS SA CORRECTA
 	 * Desactiva la cuenta si ya pasaron los dias de vida
 	 * @param unknown $model
 	 * @throws Exception
 	 * @return multitype:string unknown
 	 */
 	public function validUserAndPasswordAndDuration($model){//Listo
		$tokenAndId = array();
		$tokenAndId['token'] = "";
		$tokenAndId['id'] = "";
		$tokenAndId['isadmin'] = "";
 		$token = "";
 		$connection=Yii::app()->db;
 		
 		$sql = Querys::VALID_USER_AND_PASSWORD;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,strtolower($model->email),PDO::PARAM_STR);
 		$command->bindValue(++$index,self::krypPassword($model->password),PDO::PARAM_STR);
 		$data = $command->query();
 			foreach($data as $row) {
 				if($row['duration']==0 || $row['dias']<=$row['duration']){
 					$token = UtilsFunctions::createAuthToken($model->email);
 					$command->update('users', array( 'lastlogin'=>date("Y-m-d, H:i:s"), 'authToken'=>$token), 'idusers=:id', array(':id'=>$row['idusers']));
 					$tokenAndId['token'] = $token;
 					$tokenAndId['id'] = $row['idusers'];
 					$tokenAndId['isadmin'] = $row['isadmin'];
 					$tokenAndId['name'] = $row['name'];
 					$tokenAndId['lastname'] = $row['lastname'];
 					$tokenAndId['duration'] = $row['duration'];
 					return $tokenAndId;
  				}else{
  					$command->update('users', array( 'account_active'=>0, 'activation_code'=>'DURACION FINALIZADA','change_password_code'=>'DURACION FINALIZADA', 'authToken'=>''), 'idusers=:id', array(':id'=>$row['idusers']));
  					throw new Exception(Constants::ERROR_USER_DURATION);
  				}
 			}
 		$connection->active=false;
 		throw new Exception(Constants::ERROR_DATA_FORM);
 	}
 	
 	
 	/**
 	 * Devuelve un password cifrado
 	 * @param string $password
 	 * @return string
 	 */
 	private function krypPassword($password){//Listo
 		return md5('NYCE'.sha1('kitsgdp&#'.$password ));
 	}
 	
 	
 	/**
 	 * Verifica que el authToken de session exista en la base de datos.
 	 * Si no existe regresa false.
 	 * @return boolean
 	 */
	public function  validToken(){//Listo
 		$token = Yii::app()->session['token'];
 		$connection=Yii::app()->db;
 		try{
 			$sql = Querys::SEARCH_AUTHTOKEN;
 			$command = $connection->createCommand($sql);
 			$index = 0;
 			$command->bindValue(++$index,$token,PDO::PARAM_STR);
 			$dataReader = $command->query();
 			foreach($dataReader as $row) {
 				if($row && strcmp($token, $row['authToken']) !== 0 ){
 					return false;
 				}else{
 					return true;
 				}
 			}
 			self::cleanAuthTokenForUserWithId(Yii::app()->session['id']);
 		}catch (Exception $exception){
 			Yii::log("ERROR EN validToken: $exception","warning","UsersDao::validToken");
 		}
 		$connection->active=false;
 	}
 	
 	
 	/**
 	 * Limpia el valor del authToken en la base de datos para determinado usuario.
 	 * @param int $id
 	 */
 	public static function cleanAuthTokenForUserWithId($id){//Listo
 		$command2 = Yii::app()->db->createCommand();
 		$command2->update('users', array( 'authToken'=>''), 'idusers=:id', array(':id'=>$id));
 	}
 	
 	
	/**
	 * Verifica que el correo electronico este registrado y activado.
	 * Genera un codigo unico para confirmar por correo electronico el cambio de password
	 * @param string $email
	 * @throws Exception
	 * @return string $changePasswordCode
	 */
 	public function updateChangePasswordCodeforValidUserActive($email){//Listo
 		$response = array();
		$connection=Yii::app()->db;
 		$sql = Querys::SEARCH_USER_ACTIVATED;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$email,PDO::PARAM_STR);
 		$data = $command->query();
 		foreach($data as $row) {
 			$changePasswordCode =  CodeGenerator::generateChangePasswordCode($email, $row['idusers'], $row['name']);
 			$command->update('users', array( 'change_password_code'=>$changePasswordCode), 'idusers=:id', array(':id'=>$row['idusers']));
 			return $changePasswordCode;
 		}
 		$connection->active=false;
 		throw new Exception(Constants::ERROR_DATA_FORM);
 	}
 	
 	//EditarUsuarios
 	/**
 	 * Regresa los datos de un determinado usuario
 	 * @param int $iduser
 	 * @throws Exception
 	 * @return $row
 	 */
 	public function getUserDataById($iduser){//Listo
 		$connection=Yii::app()->db;
 		$sql = Querys::GET_USER_BY_ID;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$iduser,PDO::PARAM_INT);
 		$data = $command->query();
 		foreach($data as $row) {
 			return $row;
 		}
 		throw new Exception(Constants::NOT_FOUND_USER);
 		$connection->active=false;
 	}
 	
 	public function updateUserData($model){//Listo
 		$command = Yii::app()->db->createCommand();
 		//$command->update('users', array( 'password'=>self::krypPassword($password), 'change_password_code'=>'','authToken'=>''), 'idusers=:id', array(':id'=>$idusers));
 		$command->update('users', array( 'name'=>strtoupper($model->name),
 				'email'=>strtolower($model->email),
 				'lastname'=> strtoupper($model->lastname),
 				'activation_code'=> strtoupper($model->activation_code),
 				'account_active'=> $model->account_active,
 				'authToken'=> $model->authToken,
 				'change_password_code'=> strtoupper($model->change_password_code),
 				'isadmin'=> $model->isadmin,),
 				'idusers=:id', array(':id'=>$model->idusers));
 	
 		$command->update('codes', array( 'duration'=>$model->duration),
 				'idcodes = :id', array(':id'=>$model->codes_idcodes));
 	}	
 	
 	/**
 	 * Este metodo se invoca desde la parte de administración y actualiza los usuarios que ya no tienen dias de pruebas
 	 * cada que se carga el panel de administracion
 	 * @param unknown $row
 	 */
 	public function checkDurationUser($row){
 		if($row['duration'] > 0 && $row['dias']>$row['duration']){
 		$command = Yii::app()->db->createCommand();
 		$command->update('users', array( 'account_active'=>0, 'activation_code'=>'DURACION FINALIZADA','change_password_code'=>'DURACION FINALIZADA', 'authToken'=>''), 'idusers=:id', array(':id'=>$row['idusers']));
 		}
 	}
 	
 	/**
 	 * Recupera las notificaciones de la base de datos
 	 * @return unknown
 	 */
 	public function getNotifications(){
 		$connection=Yii::app()->db;
 		$sql = Querys::GET_NOTIFICATIONS;
 		$command = $connection->createCommand($sql);
 		$data = $command->query();
 		return $data;
 		$connection->active=false;
 	}
}


