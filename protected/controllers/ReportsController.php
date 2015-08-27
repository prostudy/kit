<?php

class ReportsController extends Controller{
//	public $layout = 'register';

	/**
	 * Muestra el formulario de registro
	 */
	public function actionIndex(){
		if( UsersDao::getInstance()->validToken() && Yii::app()->session['isadmin']){
				//Yii::app()->user->setFlash('registerCode',Constants::USER_ALREADY_REPONSE_TEST);
			$reportSectors = ReportsDao::getInstance()->getAllSectors();
				
			$this->render('index',array('reportSectors'=>$reportSectors));
		}else{
			UtilsFunctions::destroySession();
		}
	}
}