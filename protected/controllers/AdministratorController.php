<?php
/**
 *
 * @author Oscar Gascon
 *
 */
class AdministratorController extends Controller{
	
	public function actionIndex(){//Listo
		if( UsersDao::getInstance()->validToken() && Yii::app()->session['isadmin']){
			$allCodesAsigned = self::allCodesAsigned();
			$codesAvailableForSale = self::getCodesAvailableForSaleOrPromotion(true);
			$codesAvailableForPromotion = self::getCodesAvailableForSaleOrPromotion(false);
		
			$this->render('responsiveTable',
					 	array("allCodesAsigned"=>$allCodesAsigned
						   ,"codesAvailableForSale"=>$codesAvailableForSale
							,"codesAvailableForPromotion"=>$codesAvailableForPromotion)
				     );
		}else{
			UtilsFunctions::destroySession();
		}	
	}
	
	private function allCodesAsigned(){//Listo
		$allCodesAsigned = array();
		$connection=Yii::app()->db;
		$sql = Querys::ALL_CODES;
		$command = $connection->createCommand($sql);
		$allCodesAsigned = $command->query();
		$connection->active=false;
		return $allCodesAsigned;
	}
	
	private function getCodesAvailableForSaleOrPromotion($forSale){//Listo
		$codes = array();
		$connection=Yii::app()->db;
		$sql = $forSale == true ? Querys::GET_CODES_AVAILABLE_FOR_SALE : Querys::GET_CODES_AVAILABLE_FOR_PROMOTION;
		$command = $connection->createCommand($sql);
		$codes = $command->query();
		$connection->active=false;
		return $codes;
	}
	
	
	public function actionAdminGenerator(){//Listo
		if( UsersDao::getInstance()->validToken() && Yii::app()->session['isadmin'] ){
			$this->layout = "locked";
			$message ='';
			$model = new CodesGeneratorForm;
			try{
				if(isset($_POST['CodesGeneratorForm'])){
					$model->attributes=$_POST['CodesGeneratorForm'];
					if( $model->validate()){
						self::serverValidationCodesGeneratorForm($model);
						self::generator($model->numCodes,$model->lenCode,$model->duration,$model);
						Yii::app()->user->setFlash('enterCodes',Constants::SUCCESS_GENERATION_CODES);
						$this->refresh();
					}
				}
			}catch (Exception $e) {
				Yii::app()->user->setFlash('enterCodes',$e->getMessage());
				$this->refresh();
			}
	
			$this->render('adminGenerator',array('model'=>$model,"errorSummary"=>$message));
	
		}else{
			UtilsFunctions::destroySession();
		}
	}
	
	/**
	 * 
	 * @param CodesGeneratorForm $model
	 * @throws Exception
	 */
	private function serverValidationCodesGeneratorForm($model){//Listo		
		//1.-Valida los campos del formulario
		if (         !!filter_var($model->numCodes, FILTER_VALIDATE_INT) === false
				||   !!filter_var($model->lenCode, FILTER_VALIDATE_INT) === false ){
			throw new Exception(Constants::ERROR_DATA_FORM);
		}
	}
	
	/**
	 * Esta funcion genera los codigos para vender y para usar como promocion por un numero determinado de dias
	 * Por defautl se generan 1 codigos de longitud 8 con duracion 1, lo que significa que nos de venta (duracion = 0 son de venta)
	 * @param number $numCodes
	 * @param number $lenCode
	 * @param number $duration
	 */
	public function generator($numCodes=1,$lenCode=8,$duration=1,$model){//Listo
		/*Parametros para enviar por url*/
		/*$numCodes = 50;  $lenCode = 8; $duration = 3;*/
		$codes = array();
		for($index = 0; $index < $numCodes; $index++ ){
			$code = CodeGenerator::generatorCode($lenCode,$duration,$model);
			if(strlen( $code) > 0 ){
				//Yii::log("Se ha creado el codigo: $code");
				array_push($codes, $code);
			}else{
				Yii::log("Ocurrio un problema al generar un codigo");
			}
		}
		return $codes;
	}	

	
	/**
	 * Muestra el listado de usuarios en una sola tabla
	 */
	public function actionAdminUsers(){//Listo
		if( UsersDao::getInstance()->validToken() && Yii::app()->session['isadmin']){
			$allCodesAsigned = self::allCodesAsigned();
			$this->render('adminUsers',array("allCodesAsigned"=>$allCodesAsigned));
		}else{
			UtilsFunctions::destroySession();
		}
	}
	
	
	//Editar usuarios
	/**
	 * Muestra el formulario de editar usuarios
	 * @param unknown $iduser
	 */
	public function actionEditUser($iduser){//Listo
		$this->layout = "locked";
		if( UsersDao::getInstance()->validToken() && Yii::app()->session['isadmin']){
			//$this->layout = "tplLogin";
			$message ='';
			$model = new EditUserForm();
			try{
				$userData = UsersDao::getInstance()->getUserDataById($iduser);
				$model->email = $userData['email'];
				$model->idusers = $userData['idusers'];
				$model->codes_idcodes = $userData['codes_idcodes'];
				$model->name = $userData['name'];
				$model->lastname = $userData['lastname'];
				$model->password = $userData['password'];
				$model->activation_code = $userData['activation_code'];
				$model->account_active = $userData['account_active'];
				$model->activation_date = $userData['activation_date'];
				$model->authToken = $userData['authToken'];
				$model->change_password_code = $userData['change_password_code'];
				$model->lastlogin = $userData['lastlogin'];
				$model->createdon = $userData['createdon'];
				$model->isadmin	= $userData['isadmin'];
				$model->duration	= $userData['duration'];
				$model->code	= $userData['code'];
	
				if(isset($_POST['EditUserForm'])){
					$model->attributes=$_POST['EditUserForm'];
					if( $model->validate()){
						UsersDao::getInstance()->updateUserData($model);
						Yii::app()->user->setFlash('enterCodes',Constants::SUCCESS_USER_DATA_UPDATE);
						$this->refresh();
					}
				}
			}catch (Exception $e) {
				throw new CHttpException(404,$e->getMessage());
				//Yii::app()->user->setFlash('enterCodes',$e->getMessage());
				//$this->refresh();
			}
			$this->render('editUser',array('model'=>$model,"errorSummary"=>$message));
		}else{
			UtilsFunctions::destroySession();
		}
	}
	
	
	/**
	 * Elimina de la base un codigo
	 * @param int $idcode
	 */
	public function actionDeleteCode($idcode){//Listo
		$command = Yii::app()->db->createCommand();
		$command->delete('codes', 'idcodes=:id', array(':id'=>$idcode));
		self::actionIndex();
	}
	
	
	/**
	 * Lee el archivo index de la plantilla generada y coloca el codigo.
	 * @param unknown $code
	 */
	public function actionZip($code){
		libxml_use_internal_errors(true);
		$doc = new DOMDocument();
		$doc->loadHTMLFile(Constants::DIRECTORY_TEMPLATE_CODE."index.html");
		$doc->getElementById('code')->nodeValue = $code;
	
		!$handle = fopen(Constants::DIRECTORY_TEMPLATE_CODE."index.html", 'w');
		fwrite($handle, $doc->saveHTML());
		fclose($handle);
		
		self::zipDirectory($code);
	}
	
	private function zipDirectory($code){
		// Get real path for our folder
		$rootPath = realpath(Constants::DIRECTORY_TEMPLATE_CODE);
		// Initialize archive object
		$zip = new ZipArchive();
		$filezipdir = Constants::DIRECTORY_ZIPCODES.$code.".zip";
		$filezip = $code.".zip";
		$zip->open($filezipdir, ZipArchive::CREATE | ZipArchive::OVERWRITE);

		// Create recursive directory iterator
		/** @var SplFileInfo[] $files */
		$files = new RecursiveIteratorIterator(
				new RecursiveDirectoryIterator($rootPath),
				RecursiveIteratorIterator::LEAVES_ONLY
		);
		
		foreach ($files as $name => $file)
		{
			// Skip directories (they would be added automatically)
			if (!$file->isDir())
			{
				// Get real and relative path for current file
				$filePath = $file->getRealPath();
				$relativePath = substr($filePath, strlen($rootPath) + 1);
		
				// Add current file to archive
				$zip->addFile($filePath, $relativePath);
			}
		}
		
		// Zip archive will be created only after closing object
		$zip->close();
		header('Content-Type: application/zip');
		header('Content-disposition: attachment; filename='.$filezip);
		header('Content-Length: ' . filesize($filezipdir));
		readfile($filezipdir);
	}
	
	
}