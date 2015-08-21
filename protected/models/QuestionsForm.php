<?php
/**
 * QuestionsForm.php class.
 * QuestionsForm.php is the data structure for keeping
 * 
 */
class QuestionsForm extends CFormModel{
	/*public $sector;
	public $tipoSector;*/
	public $tamano;

	/**
	 * Declares the validation rules.
	 */
	public function rules(){
		return array(
			//array('sector','required','message'=>Constants::SECTOR_FIELD_EMPTY),
		    //array('tipoSector','required','message'=>Constants::SECTOR_TYPE_FIELD_EMPTY),
			array('tamano','safe'),
		);
	}
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
}