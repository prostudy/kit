<?php

class ArticleController extends Controller{
	
	/**
	 * Recupera todos los articulos y los lista en una tabla.
	 * Si el usuario es usuario tiene un codigo de promocion, solo se mostraran los articulos del primer modulo (planificar)
	 */
	public function actionIndex(){
		if( UsersDao::getInstance()->validToken() ){//Listo
			$articles = array();
			try{
				$articles = ArticleDao::getInstance()->getAllArticles(Yii::app()->session['restricted']);
				$this->render('index',array('articles'=>$articles));
			}catch (Exception $e) {
				 //Yii::log("ERROR EN actionIndex: $e","warning","ArticleController::actionIndex");
				 throw new CHttpException(404,$e->getMessage());
			}
		}else{
			UtilsFunctions::destroySession();
		}
	}

	/**
	 * Muestra el detalle del articulo junto con sus recursos
	 * @param int $idArticle
	 */
	public function actionDetailArticle($idArticle){//Listo
		if( UsersDao::getInstance()->validToken() ){
			try{
				$article = ArticleDao::getInstance()->getArticleById($idArticle,Yii::app()->session['restricted']);
				$resourcesTap1 =  ArticleDao::getInstance()->getResourcesArticle($idArticle,Constants::TAP1);
				$resourcesTap2 =  ArticleDao::getInstance()->getResourcesArticle($idArticle,Constants::TAP2);
				$resourcesTap3 =  ArticleDao::getInstance()->getResourcesArticle($idArticle,Constants::TAP3);
				$antes = ArticleDao::getInstance()->getBeforeArticleById($idArticle,Yii::app()->session['restricted']);
				$next = ArticleDao::getInstance()->getNextArticleById($idArticle,Yii::app()->session['restricted']);
				$this->render('detailArticle',array('article'=>$article
													,'resourcesTap1'=>$resourcesTap1
													,'resourcesTap2'=>$resourcesTap2,
													'resourcesTap3'=>$resourcesTap3
													,"antes"=>$antes
													,"next"=>$next));
			}catch (Exception $e) {
				//Yii::log("ERROR EN actionDetailArticle: $e","warning","ArticleController::actionDetailArticle");
				throw new CHttpException(404,$e->getMessage());
			}
		}else{
			UtilsFunctions::destroySession();
		}
	}
	

	//Editar articulos
	/**
	 * Permite editar un determinado articulo y guardar los cambios den la base
	 * @param int $idArticle
	 */
	public function actionEditArticle($idArticle){//Listo
		$this->layout = "locked";
		if( UsersDao::getInstance()->validToken() && Yii::app()->session['isadmin']){
			//$this->layout = "tplLogin";
			$message ='';
			$model = new EditArticleForm();
			try{
				$articleData =  ArticleDao::getInstance()->getArticleById($idArticle,false);
				$model->idarticles = $articleData['idarticles'];
				$model->number = $articleData['number'];
				$model->name = $articleData['name'];
				$model->summary = $articleData['summary'];
				$model->content = $articleData['content'];
				$model->module = $articleData['module'];
				$model->color = $articleData['color'];
				$model->restricted = $articleData['restricted'];
						
				if(isset($_POST['EditArticleForm'])){
					$model->attributes=$_POST['EditArticleForm'];
					if( $model->validate()){
						ArticleDao::getInstance()->updateArticleData($model);
						$this->redirect("index.php?r=Article/detailArticle&idArticle=$idArticle");
					}
				}
			}catch (Exception $e) {
				Yii::app()->user->setFlash('enterCodes',$e->getMessage());
				$this->refresh();
			}
			$this->render('editArticle',array('model'=>$model,"errorSummary"=>$message));
		}else{
			UtilsFunctions::destroySession();
		}
	}
	
	
	/**
	 * Permite la descarga de los recursos de articulos (solo usuarios registrados y que compraron el toolkit)
	 * @param unknown $name
	 */
	public function actionDownloadResource($name){//Listo
		if( UsersDao::getInstance()->validToken() && !(Yii::app()->session['restricted'])){
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=".basename(Constants::URL_DOWNLOAD_FILES.$name));
			header("Content-Type: text/html");
			header("Content-Transfer-Encoding: binary");
			readfile(Constants::URL_DOWNLOAD_FILES.$name);
		}else{
			UtilsFunctions::destroySession();
		}
	}
	
	/**
	 * Obtiene un arreglo de objetos tipo Question, que tiene preguntas y respuestas para mostrarse
	 */
	public function actionSurvey(){//Listo
		if( UsersDao::getInstance()->validToken() ){
			$questions = SurveyDao::getInstance()->getAllQuestions();
			$this->render('survey',array("arrayQuestions"=>$questions));
		}else{
			UtilsFunctions::destroySession();
		}
	}
}