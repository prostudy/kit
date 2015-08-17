<?php
/**
 * RegisterCodeForm class.
 * RegisterCodeForm is the data structure for keeping
 * register code form data. It is used by the 'registerCode' action of 'SiteController'.
 */
class RegisterCodeForm extends CFormModel{
	public $code;
	public $email; 
	public $name;
	public $lastname;
	public $password;

	/**
	 * Declares the validation rules.
	 */
	public function rules(){
		return array(
			array('code','required','message'=>Constants::CODE_FIELD_EMPTY),
			array('email','required','message'=>Constants::EMAIL_FIELD_EMPTY),
			array('name','required','message'=>Constants::NAME_FIELD_EMPTY),
			array('lastname','required','message'=>Constants::LASTNAME_FIELD_EMPTY),
			array('password','required','message'=>Constants::PASSWORD_FIELD_EMPTY),
			array('password','length', 'min' => 5,'tooShort'=>Yii::t("translation", Constants::PASSWORD_TOOSHORT)),
			array('email', 'email','message'=>Constants::EMAIL_FIELD_WRONG_FORMAT),
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