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
}
?>