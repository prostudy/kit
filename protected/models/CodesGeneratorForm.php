<?php
/**
* CodesGeneratorForm class.
* CodesGeneratorForm is the data structure for keeping
* @author ogascon
*/
class CodesGeneratorForm extends CFormModel{
	public $numCodes;
	public $lenCode;
	public $duration;
	public $event;
	public $evenPrefix;

	/**
	 * Declares the validation rules.
	 */
	public function rules(){
		return array(
				array('numCodes', 'required', 'message'=>'Ingresa el número de códigos por generar.'),
				array('lenCode',  'required','message'=>'Ingresa la longitud del código.'),
				array('duration',  'required','message'=>'Ingresa la duración (0 si es de venta).'),
				array('event',  'safe'),
				array('evenPrefix',  'safe'),
				
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels(){
		return array(
				'verifyCode'=>'Verification Code',
		);
	}
}