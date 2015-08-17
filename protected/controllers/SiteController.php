<?php
/**
 * Clase que se encarga de realizar el login para los usuarios.
 * Tambien sirve para realizar el cambio de contraseña
 * @author ogascon
 *
 */
class SiteController extends Controller{
	
	/**
	 * Accion principal que valida la existencia de una sesion
	 * Tambien ejecuta las busquedas o la recuperacion de datos para el home
	 */
	public function actionIndex(){//Listo
		if( UsersDao::getInstance()->validToken() ){
			self::getDataHomeOrSearchArticles();
		}else{
			Yii::app()->runController('Site/login');
		}
	}
	
	
	/**
	 * Verifica si el usuario esta haciendo una busqueda o desea ver el home
	 */
	private  function getDataHomeOrSearchArticles(){//Listo
		if ( isset($_GET['s']) ){
			self::performSearch($_GET['s']);
		}else{
			self::getDataHome();
		}
	}	
	
	/**
	 * Muestra los resultados del buscador de google
	 */
	private  function performSearch($searchParameter){//Listo
		$results = ArticleDao::getInstance()->searchArticle($searchParameter, Yii::app()->session['restricted']);
		$resultsDocuments = ArticleDao::getInstance()->searchDocuments($searchParameter, Yii::app()->session['restricted']);
		$this->render('searchresults',array('results'=>$results,'resultsDocuments'=>$resultsDocuments,
											'searchParameter'=>$searchParameter));
	}
	
	/**
	 * Recupera la informacion que se debe mostrar en el home
	 */
	private function getDataHome(){
		if( UsersDao::getInstance()->validToken() ){
			//TODO: Ver que se va recuperar para el home
			$this->render('index');
		}else{
			Yii::app()->runController('Site/login');
		}
	}
	
	/**
	 * Muestra la pantalla de login y valida los datos ingresados.
	 */
	public function actionLogin(){//Listo
		$this->layout = "locked";
		$message ='';
		$model = new EnterForm;
		try{
			if(isset($_POST['EnterForm'])){
				$model->attributes=$_POST['EnterForm'];
				if( $model->validate()  ){
					self::serverValidationEnterForm($model);
					$tokenAndId = UsersDao::getInstance()->validUserAndPasswordAndDuration($model);
					self::createSessionVars($tokenAndId,$model);
					$this->redirect('index.php?r=site/index');
				}
			}
		}catch (Exception $e) {
			Yii::app()->user->setFlash('enter',$e->getMessage());
			$this->refresh();
		}
		$this->render('login',array('model'=>$model,"errorSummary"=>$message));
	}
	
	/**
	 * Realiza la validacion de los campos del formulario en el servidor.
	 * Genera una Exception en caso de que los datos no sean correctos.
	 * @param  $model
	 * @throws Exception
	 */
	private function serverValidationEnterForm($model){//Listo
		//1.-Valida los campos del formulario
		if (strlen(trim($model->email)) <= 0
				|| !UtilsFunctions::validEMail(trim($model->email))
				|| strlen(trim($model->password)) <= 0){
			throw new Exception(Constants::ERROR_DATA_FORM);
		}
	}
	
	
	/**
	 * Guarda variables d etemplate una vez que los datos han sido validados
	 * @param unknown $tokenAndId
	 * @param unknown $model
	 */
	public function createSessionVars($tokenAndId,$model){//Listo
		Yii::app()->session['email'] = $model->email;
		Yii::app()->session['id'] = $tokenAndId['id'];
		Yii::app()->session['token'] = $tokenAndId['token'];
		Yii::app()->session['isadmin'] = $tokenAndId['isadmin'];
		Yii::app()->session['name'] = $tokenAndId['name'];
		Yii::app()->session['lastname'] = $tokenAndId['lastname'];
		Yii::app()->session['duration'] = $tokenAndId['duration'];
		
		if($tokenAndId['duration'] == 0){
			Yii::app()->session['restricted'] = false;
			Yii::app()->session['messageRestricted'] = Constants::CONTENT_COMPLETE;
		}else{
			Yii::app()->session['restricted'] = true;
			Yii::app()->session['messageRestricted'] = Constants::CONTENT_RESTRICTED;
		}
	}
	
	
	/**
	 * Valida la información de cambio de password.
	 * Registra un codigo de cambio de password
	 */
	public function actionForgetPassword(){//Listo
		$this->layout = "locked";
		$message ='';
		$model = new ForgetPasswordForm();
		try{
			if(isset($_POST['ForgetPasswordForm'])){
				$model->attributes=$_POST['ForgetPasswordForm'];
				if( $model->validate()  ){
					self::serverValidationForgetPasswordForm($model);
					$email = strtolower(trim($model->email));
					$changePasswordCode = UsersDao::getInstance()->updateChangePasswordCodeforValidUserActive($email);
					$ulrChangePassword = Constants::URL_CHANGE_PASSWORD_CODE.$changePasswordCode;
					$successMail = UtilsFunctions::sendMail(strtolower($email),Constants::SUBJECT_EMAIL_CHANGE_PASSWORD, Constants::HEAD_TEXT_CHANGE_PASSWORD, $ulrChangePassword ,Constants::FOOTER_TEXT);
					$message = $successMail ? Constants::SUCCESS_MAIL_DELIVERY : Constants::NOT_SUCCESS_MAIL_DELIVERY; ;
					Yii::app()->user->setFlash('enter',$message);
					$this->refresh();
				}
			}
		}catch (Exception $e) {
			Yii::app()->user->setFlash('enter',$e->getMessage());
			$this->refresh();
		}
		$this->render('forgetPassword',array('model'=>$model,"errorSummary"=>$message));
	}
	
	

	/**
	 * Realiza la validacion del correo electronico del formulario de olvidar contraseña en el servidor.
	 * Genera una Exception en caso de que los datos no sean correctos.
	 * @param  $model
	 * @throws Exception
	 */
	private function serverValidationForgetPasswordForm($model){//Listo
		//1.-Valida los campos del formulario
		if (strlen(trim($model->email)) <= 0 || !UtilsFunctions::validEMail(trim($model->email))){
			throw new Exception(Constants::ERROR_DATA_FORM);
		}
	}
	

	
	/**
	 * Muestra el campo para la nueva contraseña
	 * @param string $changePasswordCode
	 */
	public function actionChangePassword($changePasswordCode){//Listo
		$this->layout = "locked";
		$message ='';
		$model = new ChangePasswordForm();
		$idusers = 0;
		$aux = 0;
		try{
			$idusers = UsersDao::getInstance()->validChangeCodeInDataBase($changePasswordCode);				
			if(isset($_POST['ChangePasswordForm'])){
				$model->attributes=$_POST['ChangePasswordForm'];
				if($model->validate()){
					self::serverValidationChangePasswordForm($model);
					UsersDao::getInstance()->updatePasswordForUser($model->password,$idusers);
					$this->redirect('index.php?r=site/login');						
				}
			}
		}catch (Exception $e) {
			Yii::app()->user->setFlash('enter',$e->getMessage());
			//$this->refresh();
		}
		$this->render('changePassword',array('model'=>$model,"errorSummary"=>$message));		
	}
	
	
	/**
	 * Realiza la validacion del password del formulario de ingresar nueva contraseña en el servidor.
	 * Genera una Exception en caso de que los datos no sean correctos.
	 * @param unknown $model
	 * @throws Exception
	 */
	private function serverValidationChangePasswordForm($model){//Listo
		//1.-Valida los campos del formulario
		if (strlen(trim($model->password)) <= 0 ){
			throw new Exception(Constants::ERROR_DATA_FORM);
		}
	}
	
	
	
		/**
	 * Finaliza la sesion de los usuarios al hacer click en Cerrar sesion
	 */
	public function actionClose(){//Listo
		UtilsFunctions::destroySession();
	}
	
	
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError(){//Listo
		$this->layout = "locked";
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
}