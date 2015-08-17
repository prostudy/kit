<?php
/**
 * 
 * @author osjobu@gmail.com
 *
 */
class ArticleDao{
	/**
	 *
	 * @var ArticleDao
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
	 * Recupera un determinado articulo desde la base de datos
	 * @param int $idArticle
	 * @param boolean $restricted
	 * @throws Exception
	 * @return unknown
	 */
 	public function getArticleById($idArticle,$restricted){//Listo
 		$connection=Yii::app()->db;
 		$sql = $restricted ? Querys::GET_ARTICLE_BY_ID_RESTRICTED : Querys::GET_ARTICLE_BY_ID;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$idArticle,PDO::PARAM_INT);
 		$data = $command->query();
 		foreach($data as $row) {
 			return $row;
 		}
 		throw new Exception(Constants::NOT_FOUND_ARTICLE);
 		$connection->active=false;
 	}
 	
 	
 	/**
 	 * Recupera el articulo anterior a un articulo pasado como parametro
 	 * @param int $idArticle
 	 * @param boolean $restricted
 	 * @return $row
 	 */
 	public function getBeforeArticleById($idArticle,$restricted){//Listo
 		$connection=Yii::app()->db;
 		$sql = $restricted  ? Querys::GET_BEFORE_ARTICLE_BY_ID_RESTRICTED : Querys::GET_BEFORE_ARTICLE_BY_ID;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$idArticle,PDO::PARAM_INT);
 		$data = $command->query();
 		foreach($data as $row) {
 			return $row;
 		}
 		//throw new Exception(Constants::NOT_FOUND_ARTICLE);
 		$connection->active=false;
 	}
 	
 	
 	/**
 	 * Recupera el articulo siguiente a un articulo pasado como parametro
 	 * @param int $idArticle
 	 * @param boolean $restricted
 	 * @return $row
 	 */
 	public function getNextArticleById($idArticle,$restricted){//Listo
 		$connection=Yii::app()->db;
 		$sql = $restricted  ? Querys::GET_NEXT_ARTICLE_BY_ID_RESTRICTED : Querys::GET_NEXT_ARTICLE_BY_ID;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$idArticle,PDO::PARAM_INT);
 		$data = $command->query();
 		foreach($data as $row) {
 			return $row;
 		}
 		//throw new Exception(Constants::NOT_FOUND_ARTICLE);
 		$connection->active=false;
 	}
 	
 	/**
 	 * Metodo para el buscador, recupera el contenido libre y el restringido
 	 * @param string $searchText
 	 * @param boolean $restricted
 	 * @return $data
 	 */
 	public function searchArticle($searchText,$restricted){//Listo
 		$connection=Yii::app()->db;
 		$sql = $restricted ? Querys::SEARCH_ARTICLE_BY_TEXT_RESTRICTED : Querys::SEARCH_ARTICLE_BY_TEXT;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,"%".$searchText."%",PDO::PARAM_STR);
 		$command->bindValue(++$index,"%".$searchText."%",PDO::PARAM_STR);
 		$command->bindValue(++$index,"%".$searchText."%",PDO::PARAM_STR);
 		$command->bindValue(++$index,"%".$searchText."%",PDO::PARAM_STR);
 		$data = $command->query();
 		return $data;
 		//throw new Exception(Constants::NOT_FOUND_ARTICLE);
 		$connection->active=false;
 	}
 	
 	/**
 	 * Metodo para el buscador, recupera el contenido libre y el restringido en documentos
 	 * @param string $searchText
 	 * @param boolean $restricted
 	 * @return $data
 	 */
 	public function searchDocuments($searchText,$restricted){//Listo
 		$connection=Yii::app()->db;
 		$sql = $restricted ? Querys::SEARCH_DOCUMENTS_BY_TEXT_RESTRICTED : Querys::SEARCH_DOCUMENTS_BY_TEXT;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,"%".$searchText."%",PDO::PARAM_STR);
 		$data = $command->query();
 		return $data;
 		//throw new Exception(Constants::NOT_FOUND_ARTICLE);
 		$connection->active=false;
 	}
 	
 	/**
 	 * Recupera los recursos de un articulo
 	 * @param int $idArticle
 	 * @throws Exception
 	 * @return $data
 	 */
 	public function getResourcesArticle($idArticle,$tap){//Listo
 		$connection=Yii::app()->db;
 		$sql = Querys::GET_RESOURCES_ARTICLE;
 		$command = $connection->createCommand($sql);
 		$index = 0;
 		$command->bindValue(++$index,$idArticle,PDO::PARAM_INT);
 		$command->bindValue(++$index,$tap,PDO::PARAM_STR);
 		$data = $command->query();
 		return $data;
 		throw new Exception(Constants::NOT_FOUND_ARTICLE);
 		$connection->active=false;
 	}
 	
 	
 	/**
 	 * Recupera todos los articulos
 	 * @throws Exception
 	 * @return $data
 	 */
 	public function getAllArticles($restricted){//Listo
 		$connection=Yii::app()->db;
 		$sql = $restricted ? Querys::GET_ARTICLES_MODULE_RESTRICTED : Querys::GET_ALL_ARTICLES; 			
 		$command = $connection->createCommand($sql);
 		$data = $command->query();
 		return $data;
 		throw new Exception(Constants::NOT_FOUND_ARTICLE);
 		$connection->active=false;
 	}
 	
 	

 	/**
 	 * Actualiza los datos de un articulo
 	 * @param unknown $model
 	 */
 	public function updateArticleData($model){//Listo
 		$command = Yii::app()->db->createCommand();
 		$command->update('articles', array( 'number'=>$model->number,
 				'name'=>$model->name,
 				'summary'=>$model->summary,
 				'content'=>$model->content,
 				'module'=>$model->module,
 				'restricted'=>$model->restricted,
 				'color'=>$model->color,
 				"modifiedon"=>date('Y-m-d H:i:s'),),
 				'idarticles=:id', array(':id'=>$model->idarticles));
 	
 	}
}


