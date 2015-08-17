<?php

class RegisterController extends Controller{
	public $layout = 'register';

	/**
	 * Muestra el formulario de registro
	 */
	public function actionIndex(){//Listo
		$message ='';
		$model = new RegisterCodeForm;
		try{
			if(isset($_POST['RegisterCodeForm'])){
				$model->attributes=$_POST['RegisterCodeForm'];
				if( $model->validate()  ){
					self::serverValidationRegisterCodeForm($model);
					$activationCode = CodeGenerator::activationAccountCodeGenerator($model);
					UsersDao::getInstance()->registerNewUserWithCode($model,$activationCode);
					$ulrActivationCode = Constants::URL_REGISTER_CONFIRMATION_CODE.$activationCode;
					$message = Constants::SUCCESS_USER_REGISTER;
					$successMail = UtilsFunctions::sendMail(strtolower($model->email),Constants::SUBJECT_EMAIL, Constants::HEAD_TEXT,$ulrActivationCode ,Constants::FOOTER_TEXT);
					$message .= "<br/>".$successMail ? Constants::SUCCESS_MAIL_DELIVERY : Constants::NOT_SUCCESS_MsAIL_DELIVERY; ;	
					Yii::app()->user->setFlash('registerCode',$message);
					$this->refresh();
				}
			}	
		}catch (Exception $e) {
			Yii::app()->user->setFlash('registerCode',$e->getMessage());
			$this->refresh();
		}
		$this->render('index',array('model'=>$model,"errorSummary"=>$message));
	}
	
	
	/**
	 * Valida que los datos de registro de un codigo nuevo sean correctos
	 * @param  $model
	 * @throws Exception
	 */
	public function serverValidationRegisterCodeForm($model){//Listo
		//1.-Valida los campos del formulario
		if (strlen(trim($model->code)) > 0 && strlen(trim($model->email)) > 0 && UtilsFunctions::validEMail(trim($model->email)) && strlen(trim($model->name)) > 0 && strlen(trim($model->lastname)) > 0 && strlen(trim($model->password)) > 0){
			//2.-Verifica que el codigo este en la base 
			$codeId = CodesDao::getInstance()->getCodeId($model->code);
			//3.-Verifica si ya esta registrado en la tabla usuarios
			UsersDao::getInstance()->exitsCodeInUsers($codeId);
			//4.- Verifica que el si el correo electronico ya esta registrado
			UsersDao::getInstance()->exitsUserInDataBase(trim($model->email));	
		}else{
			throw new Exception(Constants::ERROR_DATA_FORM);
		}
	}
	
	
	/**
	 * Valida la url para activar la cuenta.
	 * @param string $activationCode
	 */
	public function actionConfirmation($activationCode){//Listo
		try{
			UsersDao::getInstance()->validActivationCodeInDataBase($activationCode);
			UsersDao::getInstance()->activateAccount($activationCode);
			$message = Constants::ACCOUNT_ACTIVE;
		}catch (Exception $e) {
			$message = $e->getMessage();
		}
		$this->render('confirmation',array('message'=>$message));
	}
}