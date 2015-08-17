<?php 
/**
 * 
 * @author Oscar Gascon
 *
 */
class CodeGenerator{
	
	/**
	 * Genera y registra un codigo para un producto especificado.
	 * Si la duracion es mayor a 0, se considera que es un codigo de promocion.
	 * Todos los codigos de promocion tienen un prefijo PREFIX_PROMO_CODE para distinguirlos facilmente.
	 * @param unknown $productId
	 * @param string $magazine
	 * @param string $duration
	 * @param CodesGeneratorForm $model
	 * @return string code
	 */
	public static function generatorCode($length,$duration = 0,$model){
		if($duration > 0 && strlen(trim($model->evenPrefix)) <= 0){
			$code = Constants::PREFIX_PROMO_CODE.self::generateCodeForToolkit($length);
		}else if($duration > 0 && strlen(trim($model->evenPrefix)) > 0){
			$code = trim($model->evenPrefix)."_".self::generateCodeForToolkit($length);
		}else{
			$prefix = strlen(trim($model->evenPrefix)) > 0 ? trim($model->evenPrefix)."_" : "";
			$code = $prefix.self::generateCodeForToolkit($length) ;
		}
		$registerCodeSuccess = CodesDao::getInstance()->registerCodeIntoDataBase($code,$duration,$model);
		if($registerCodeSuccess){
				return $code;
		}	
		return '';
	}
	
	/**
	 * Genera un codigo  (se usa comoo semilla) y verifica que
	 * no exista el codigo en la base de datos.
	 * @param number $length
	 * @return string
	 */
	public static function generateCodeForToolkit($length = 8){
		$code = "";
		do{
			$code = strtoupper ( self::getUniqueCode($length,"NyceKit".self::generateString() ) );
			$codeRegistered = CodesDao::getInstance()->exitsCodeInDataBase($code);
		}while ($codeRegistered);
	
		return $code;
	}
	

	
	/**
	 * Genera un string aleatorio
	 * @param number $length
	 * @return string
	 */
	public static function generateString ($length = 8){
		$string = "";
		$possible = "0123456789bcdfghjkmnpqrstvwxyz";
		$i = 0;
		while ($i < $length) {
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$string .= $char;
			$i++;
		}
		return $string;
	}
	
	/**
	 * Genera un string haciendo uso de una longitud y una semilla
	 * @param int $length
	 * @param string $seed
	 * @return string
	 */
	public static function getUniqueCode($length = 8,$seed){
		$unique = uniqid(rand(), true);
		$code = md5($unique.sha1($seed).time());
		if ($length != ""){
			return substr($code, 0, $length);
		}else {
			return $code;
		}
	}
	
	
	/**
	 * Genera el codigo para la url unica de confirmación de registro o de cambio de password
	 * @param  $model
	 * @return string
	 */
	public static function activationAccountCodeGenerator($model){
		$length = 50;
		$seed = $model->code.$model->name.$model->email;
		$activationCode =  strtoupper ( self::getUniqueCode($length,$seed.self::generateString() ) );
		return $activationCode;
	}
	
	
	/**
	 * Genera un codigo unico para el cambio de password
	 * @param string $email
	 * @param int $id
	 * @param string $name
	 * @return unknown
	 */
	public static function generateChangePasswordCode($email,$id,$name){
		$length = 50;
		$seed = $email.$id.$name;
		$activationCode =  strtoupper ( self::getUniqueCode($length,$seed.self::generateString() ) );
		return $activationCode;
	}

}


?>
