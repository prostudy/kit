<?php
class Querys{
	
	const SEARCH_CODE = "SELECT * FROM  codes WHERE  code = ?"; //Listo
	const SEARCH_CODE_IN_USERS = "SELECT * FROM  users WHERE  codes_idcodes = ?"; //Listo
	const SEARCH_USER = "SELECT * FROM  users WHERE  email = ?"; //Listo
	const SEARCH_USER_ACTIVATED = "SELECT * FROM  users WHERE  email = ? && account_active = 1";//Listo
	const INSERT_CODE = "INSERT INTO codes (code,event ,createdon, duration) VALUES (:code, :event, :created, :duration)";
	const INSERT_USER = "INSERT INTO users (codes_idcodes, email, name, lastname,password,activation_code, createdon) VALUES (:codeId, :email, :name, :lastname,:password, :activationCode, :createdon)";//Listo                    
	const VALID_ACTIVATION_CODE = "SELECT * FROM users where activation_code = ? && account_active = 0"; //Listo
	const VALID_CHANGE_PASSWORD_CODE = "SELECT * FROM users where change_password_code = ? && account_active = 1";//Listo
	const SET_ACCOUNT_ACTIVATED = "UPDATE users set account_active = :account_active, activation_date = :activation_date where activation_code = :activation_code";//Listo
	
	const VALID_USER_AND_PASSWORD = "SELECT codes.*, users.*, DATEDIFF(now(),users.activation_date) as dias FROM codes, users 
		where users.email = ?
		and users.password = ?
		and codes.idcodes = users.codes_idcodes
		and users.account_active = 1";//Listo
	
	const SEARCH_AUTHTOKEN = "SELECT * FROM users where authToken=? && account_active = 1";//Listo
	
	
	
	/*Querys para administracion*/
	/*Listado de todos los codigos asignados.*/
	const ALL_CODES = "SELECT codes.*, users.*, DATEDIFF(now(),users.activation_date) as dias FROM codes, users
						where codes.idcodes = users.codes_idcodes
						order by codes.duration";//Listo
	
	
	/*Listado de todos los codigos disponibles (no estan asigandos tdavia)*/
	const GET_CODES_AVAILABLE_FOR_SALE = "SELECT *  FROM   codes WHERE  idcodes NOT IN (SELECT codes_idcodes FROM users) and duration = 0"; //Listo
	const GET_CODES_AVAILABLE_FOR_PROMOTION = "SELECT *  FROM   codes WHERE  idcodes NOT IN (SELECT codes_idcodes FROM users) and duration > 0";//Listo
	
	
	//Editar usuarios
	const GET_USER_BY_ID = "SELECT codes.*, users.* FROM codes, users
							 where codes.idcodes = users.codes_idcodes
                        	and idusers = ?
							order by codes.duration";//Listo
	
	
	
	//Obtener informacion de los articulos
	const GET_ARTICLE_BY_ID_RESTRICTED = "SELECT * FROM articles where idarticles = ? && restricted = 0"; //Listo
	const GET_ARTICLE_BY_ID = "SELECT * FROM articles where idarticles = ? ";//Listo
	const GET_BEFORE_ARTICLE_BY_ID = "SELECT * FROM articles where idarticles < ? order by number desc limit 1 ";//Listo
	const GET_BEFORE_ARTICLE_BY_ID_RESTRICTED = "SELECT * FROM articles where idarticles < ? && restricted = 0 order by number desc limit 1 ";//Listo
	const GET_NEXT_ARTICLE_BY_ID = "SELECT * FROM articles where idarticles > ? order by number asc limit 1 ";//Listo
	const GET_NEXT_ARTICLE_BY_ID_RESTRICTED = "SELECT * FROM articles where idarticles > ? && restricted = 0 order by number asc limit 1 ";//Listo
	
	const GET_ALL_ARTICLES = "SELECT * FROM articles"; //Listo
	const GET_ARTICLES_MODULE_RESTRICTED = "SELECT * FROM articles where restricted = 0";//Listo
	
	const SEARCH_ARTICLE_BY_TEXT = "SELECT * FROM articles where name LIKE ? || content LIKE ? || module LIKE ? || summary  LIKE ? ORDER BY NAME";//Listo
	const SEARCH_ARTICLE_BY_TEXT_RESTRICTED = "SELECT * FROM articles where (name LIKE ? || content LIKE ? || module LIKE ? || summary  LIKE ?) and restricted = 0 ORDER BY NAME ";//Listo
	
	const SEARCH_DOCUMENTS_BY_TEXT = "SELECT  articles.*, resources.name as nameFile, resources.url, resources.type FROM articles_has_resources, resources,articles
									WHERE articles_has_resources.resources_idresources = resources.`idresources`
									AND  resources.name LIKE ?
									and articles.`idarticles` = `articles_has_resources`.`articles_idarticles`
									group by resources.name";
	
	const SEARCH_DOCUMENTS_BY_TEXT_RESTRICTED  = "SELECT  articles.*, resources.name as nameFile, resources.url, resources.type FROM articles_has_resources, resources,articles
									WHERE articles_has_resources.resources_idresources = resources.`idresources`
									AND  resources.name LIKE ?
									and articles.`idarticles` = `articles_has_resources`.`articles_idarticles`  AND resources.restricted = 0
									group by resources.name ";
	
	/*const GET_RESOURCES_ARTICLE =  "SELECT articles.*,  resources.`name` as docname, resources.url
							FROM articles
							LEFT JOIN articles_has_resources ON articles_has_resources.articles_idarticles = articles.`idarticles`
							LEFT JOIN resources ON articles_has_resources.resources_idresources = resources.`idresources`
							WHERE articles.`idarticles` = ?";*/
	
	const GET_RESOURCES_ARTICLE = "SELECT  * FROM articles_has_resources, resources
									WHERE articles_has_resources.resources_idresources = resources.`idresources`
									AND  articles_has_resources.articles_idarticles	 = ?
								    AND resources.`tipo_tap` = ?"; //Listo
	
	
	//notifcations
	const GET_NOTIFICATIONS = "SELECT * FROM notifications";
	
	
	/******Cuestionario*/
	const GET_SELECT_SECTOR = "SELECT * FROM `sector_catalog` where idsector_catalog in (1,2,5,6,7)";
	const GET_TYPE_SECTOR = "SELECT * FROM `type_sector_catalog` where `sector_catalog_idsector_catalog` = ?";
	const GET_SELECT_SIZE = "SELECT * FROM `size_catalog`";
	
	/*Recuperar las posibles respuestas a una deterinada pregunta
	const GET_ALL_QUESTIONS = "SELECT * FROM questions, answers, `Questions_has_Answers`
							where questions.level = 'basic' 
							and questions.`idQuestions` = `Questions_has_Answers`.`Questions_idQuestions`
							and `Questions_has_Answers`.`Answers_idAnswers` = answers.`idAnswers`
							order by Questions.`number`";*/
	
								/*Recuperar las posibles respuestas a una deterinada pregunta*/
    const GET_ALL_QUESTIONS =     "SELECT Questions.text AS questionText, 
    									  Questions.number AS questionNumber, 
    									  Questions.type_control, 
    									  Questions.level, 
    								      Answers.position, 
    		 							  Answers.`text` AS answerText,
    		 							  Answers.value, 
    									  Questions_has_Answers.idq_a AS idResponse
									FROM Questions, Answers,  `Questions_has_Answers` 
									WHERE Questions.level =  'basic'/*questions.`idQuestions` = 2*/
									AND Questions.`idQuestions` =  `Questions_has_Answers`.`Questions_idQuestions` 
									AND  `Questions_has_Answers`.`Answers_idAnswers` = Answers.`idAnswers` /*and questions.number BETWEEN 1 AND 10*/
									ORDER BY Questions.`number`";
	
	const INSERT_GENERAL_DATA = "INSERT INTO general_data (users_idusers,folio ,type_sector_catalog_idtype_sector_catalog, type_sector_catalog_sector_catalog_idsector_catalog,idsize_catalog, createdon) 
												  VALUES (:users_idusers, :folio, :type_sector_catalog_idtype_sector_catalog, :type_sector_catalog_sector_catalog_idsector_catalog,:idsize_catalog,:createdon)";
	
	const INSERT_RESPONSES = "INSERT INTO survey_responses (general_data_folio, Questions_has_Answers_idq_a) VALUES (:general_data_folio, :Questions_has_Answers_idq_a)";
	
	
	
	
	/*Obtiene las respuestas de cada uno de los usuarios*/
	const GET_ALL_RESPONSES = "SELECT * 
								FROM general_data,  `Questions` ,  `Questions_has_Answers` , Answers, survey_responses /*,users*/
								WHERE Questions.`idQuestions` =  `Questions_has_Answers`.`Questions_idQuestions` 
								AND  `Questions_has_Answers`.`Answers_idAnswers` = Answers.`idAnswers` 
								AND survey_responses.Questions_has_Answers_idq_a = Questions_has_Answers.idq_a
								AND general_data.folio= survey_responses.general_data_folio	/*and Questions.number =6*/
								/*AND general_data.folio = '8e1ce56ec51b29a'*/
								/*and users.idusers = general_data.`users_idusers`
								and general_data.`users_idusers` = 68*/
								ORDER BY   general_data.createdon ,Questions.`number`	 ";
	
	const USER_ALREADY_RESPONSE_TEST = "SELECT * FROM general_data where users_idusers = ?";
	
	
	/*REportes*/
	const GET_TOTAL_SURVEYS = "SELECT * FROM general_data";
	
	/*Datos para preguntas A,B,C*/
	const GET_ALL_SECTORS_AND_SUBSECTORS = "SELECT  s.name as sector, t.name as subsector, count(*) as subsector_total, concat(count(*),' ',t.name) as resumen FROM general_data as g
											,sector_catalog as s
											,type_sector_catalog as t
											where  g.type_sector_catalog_idtype_sector_catalog =  t.idtype_sector_catalog
											and t.sector_catalog_idsector_catalog =  s.idsector_catalog
											group by t.name	 order by s.name";
	
	
			
	
	/*Preguntas 1 a 5 y 22, a 28*/
	const GET_SIMPLE_QUESTIONS = "SELECT *, count(*) as total FROM Answers,Questions_has_Answers,survey_responses
									where Answers.idAnswers = Questions_has_Answers.Answers_idAnswers
									and survey_responses.Questions_has_Answers_idq_a =Questions_has_Answers.idq_a
									and Questions_has_Answers.Questions_idQuestions in (1,2,3,5,6,22,23,24,25,26,27,28)
									group by Questions_has_Answers.Answers_idAnswers";
	
	const GET_SIMPLE_QUESTION_BY_ID = "SELECT *, count(*) as total, Questions.text as textQuestion, Answers.text as textAnswer FROM Answers,Questions_has_Answers,survey_responses,Questions
									where Answers.idAnswers = Questions_has_Answers.Answers_idAnswers
									and survey_responses.Questions_has_Answers_idq_a =Questions_has_Answers.idq_a
									and Questions_has_Answers.Questions_idQuestions = ?
									and Questions.idQuestions = Questions_has_Answers.Questions_idQuestions
									group by Questions_has_Answers.Answers_idAnswers";
	

/*	se comprueba con esta y genera reportes por usuarios:
	SELECT *
	FROM general_data,  `Questions` ,  `Questions_has_Answers` , Answers, survey_responses ,users
	WHERE Questions.`idQuestions` =  `Questions_has_Answers`.`Questions_idQuestions`
	AND  `Questions_has_Answers`.`Answers_idAnswers` = Answers.`idAnswers`
	AND survey_responses.Questions_has_Answers_idq_a = Questions_has_Answers.idq_a
	AND general_data.folio= survey_responses.general_data_folio	/*and Questions.number =23*/
	/*AND general_data.folio = '8e1ce56ec51b29a'*/
/*	and users.idusers = general_data.`users_idusers`
	and general_data.`users_idusers` = 68
	ORDER BY   general_data.createdon ,Questions.`number`

	*/
	
	const GET_RADIO_QUESTIONS = "SELECT *, count(*) as total, Answers.text as serie FROM Answers,Questions_has_Answers,survey_responses, Questions
								where
								Answers.idAnswers = Questions_has_Answers.Answers_idAnswers
								and survey_responses.Questions_has_Answers_idq_a =Questions_has_Answers.idq_a
								and Questions_has_Answers.Questions_idQuestions = ?
								and Questions_has_Answers.Questions_idQuestions = Questions.idQuestions
								group by Questions_has_Answers.Answers_idAnswers";
	
	//se valida la de arriba
	/*SELECT *  FROM Answers,Questions_has_Answers,survey_responses
	where
	Answers.idAnswers = Questions_has_Answers.Answers_idAnswers
	and survey_responses.Questions_has_Answers_idq_a =Questions_has_Answers.idq_a
	and Questions_has_Answers.Questions_idQuestions = 4
	*/

}
?>