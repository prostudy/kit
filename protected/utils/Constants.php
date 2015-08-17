<?php
/**
 *
 * @author Oscar Gascon
 *
 */
class Constants{
	const PREFIX_PROMO_CODE = "KIT_";
	const DOMINIO_NYCE = "http://www.nyce.org.mx/";
	const URL_REGISTER_CONFIRMATION_CODE = "http://pmstudykit.com/kitsgdp/index.php?r=register/confirmation&activationCode=";
	const URL_CHANGE_PASSWORD_CODE = "http://pmstudykit.com/kitsgdp/index.php?r=site/ChangePassword&changePasswordCode=";
	const URL_AVISO_PRIVACIDAD = "http://www.nyce.org.mx/index.php/privacidad";
	const TAG_TITLE = "Nyce Kit-SGDP ";
	const URL_DOWNLOAD_FILES = 'http://pmstudykit.com/resources/kitgsdp_resources/';
	const DIRECTORY_TEMPLATE_CODE = "/home/pmstu282/public_html/kitsgdp/assets/templateCode/";
	const DIRECTORY_ZIPCODES = "/home/pmstu282/public_html/kitsgdp/assets/zipcodes/";
	const DIRECTORY_RESORUCES = "http://pmstudykit.com/resources/";
	const TAP1 = "tap1";
	const TAP2 = "tap2";
	const TAP3 = "tap3";

	
	//Email
	const ADMIN_EMAILS_FROM = "soporte@pmstudykit.com";
	const ADMIN_COPY= "ogascon@iasanet.com.mx";
	
	const SUBJECT_EMAIL = "Confirmación de registro Kit SGDP";
	const SUBJECT_EMAIL_CHANGE_PASSWORD = "Solicitud de cambio de contraseña Kit SGDP";
	const HEAD_TEXT = "Para completar el registro al Kit SGDP, por favor visite la siguiente URL.<br/><b>Nota</b>: Asegúrese de no agregar espacios adicionales:";
	const HEAD_TEXT_CHANGE_PASSWORD = "Para cambiar tu contraseña para el Kit SGDP, por favor visita la siguiente URL.<br/><b>Nota</b>: Asegúrese de no agregar espacios adicionales:";
	const FOOTER_TEXT = "<br/>Si tiene algún problema por favor póngase en contacto con un miembro de nuestro personal de apoyo nyce@nyce.org.mx o al número telefónico 5395 0777.";
	
	
	//Mensajes para los campos de texto en los formularios
	const EMAIL_FIELD_EMPTY = 'Ingresa tu correo electrónico';
	const EMAIL_FIELD_WRONG_FORMAT = 'El formato del correo es incorrecto';
	const PASSWORD_FIELD_EMPTY= 'Ingresa tu contraseña';
	const PASSWORD_TOOSHORT = "La contraseña debe tener por lo menos 5 caracteres";
	const NAME_FIELD_EMPTY = 'Ingresa tu nombre';
	const LASTNAME_FIELD_EMPTY = 'Ingresa tu apellido';
	const CODE_FIELD_EMPTY = 'Ingresa tu código';
	
	
	
	//Mensajes para el usuario
	const BACK_MESSAGE = "Regresar y modificar la información.";
	const ERROR_DATA_FORM = "Error: Tu datos no son correctos.";
	const ERROR_NOT_FOUND_CODE = "Error: El código ingresado no es válido.";
	const ERROR_USER_DURATION = "Error: El tiempo para este usuario se ha terminado.";
	const SUCCESS_DATA_FORM = "Los datos son correctos, se ha enviado un correo electrónico para confirmación.";
	const ERROR_REGISTER_CODE = "Error: El código ingresado no es válido, favor de verificarlo.";
	const SUCCESS_USER_REGISTER = "Se ha registrado tu codigo correctamente.";
	const SUCCESS_MAIL_DELIVERY = " <br/>Se ha enviado un correo electrónico para confirmación.";
	const NOT_SUCCESS_MAIL_DELIVERY = " <br/>Pero ocurrio un error al enviar el correo electrónico para confirmación. Favor de contactar al administrador.";
	const ERROR_USER_REGISTER = "Error al registrar al nuevo usuario, contactar al administrador.";
	const USER_ALREDY_REGISTER = "Error: El correo electrónico ingresado ya ha sido registrado.";
	const ACCOUNT_ACTIVE = "Tu cuenta ha sido activada exitosamente.";
	const URL_NOT_VALID_ACCOUNT_ACTIVE = "Error: La url de activación no es válida.";
	const URL_NOT_VALID_CHANGE_PASSWORD = "Error: La url de proporcionada no es válida.";
	const ERROR_TOKEN = "Error: El token no es valido para la sesión.";
	
	const SUCCESS_GENERATION_CODES = "Los códigos se generaron exitosamente.";
	
	
	//Editar usuairos
	//Mensajes para los campos de administracion
	const NAME_FIELD_EMPTY_ADMIN = 'Ingresa el nombre';
	const LASTNAME_FIELD_EMPTY_ADMIN = 'Ingresa el apellido';
	const ACTIVATE_CODE_FIELD_EMPTY_ADMIN = 'Ingresa el código de activación';
	
	const NOT_FOUND_USER = "Error: No se encontro usuario solicitado";
	const SUCCESS_USER_DATA_UPDATE = "Los datos se actualizaron correctamente";
	
	
	
	//MEnsajes para articulos
	const NOT_FOUND_ARTICLE = "Error: No se encontro artículo solicitado";
	const CONTENT_FIELD_EMPTY_ADMIN = 'Ingresa el contenido del artículo';
	const MODULE_FIELD_EMPTY_ADMIN = 'Ingresa el nombre del módulo';
	const COLOR_FIELD_EMPTY_ADMIN = 'Ingresa el color del módulo';
	const RESTRICTED_FIELD_EMPTY_ADMIN = 'Ingresa 0 si el módulo es libre.';	
	const NUMBER_FIELD_EMPTY_ADMIN = 'Ingresa el número de artículo';
	const CONTENT_RESTRICTED = "Tu código es promocional, únicamente podras visualizar el contenido permitido.";
	const CONTENT_COMPLETE = "Tu código es de venta, podras visualizar el contenido completo.";
	const BACK_TO_HOME = "Regresar al SGDP";
	
}
?>
