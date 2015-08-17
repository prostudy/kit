<?php
/**
 * EditUserForm class.
 * EditUserForm is the data structure for keeping
 */
class EditUserForm extends CFormModel{
	public $idusers;
	public $codes_idcodes;
	public $email;
	public $name;
	public $lastname;
	public $password;
	//public $sector;
	public $activation_code;
	public $account_active;
	public $activation_date;
	public $authToken;
	public $change_password_code;
	public $lastlogin;
	public $createdon;
	public $isadmin;
	
	public $duration;
	public $code;

	/**
	 * Declares the validation rules.
	 */
	public function rules(){
		return array(
			/*array('idusers','codes_idcodes','createdon','activation_date','required','message'=>Constants::CODE_FIELD_EMPTY),*/
			array('name','required','message'=>Constants::NAME_FIELD_EMPTY_ADMIN),
			array('lastname','required','message'=>Constants::LASTNAME_FIELD_EMPTY_ADMIN),
			array('activation_code','required','message'=>Constants::ACTIVATE_CODE_FIELD_EMPTY_ADMIN),
			array('account_active','safe'),
			array('authToken','safe'),
			array('change_password_code', 'safe'),
			array('email','required','message'=>Constants::EMAIL_FIELD_EMPTY),	
			array('email', 'email','message'=>Constants::EMAIL_FIELD_WRONG_FORMAT),
			array('isadmin','safe'),
			array('duration','safe'),
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