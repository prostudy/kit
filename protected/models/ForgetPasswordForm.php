<?php
/**
 * ForgetPasswordForm class.
 * ForgetPasswordForm is the data structure for keeping
 * 
 */
class ForgetPasswordForm extends CFormModel{
	public $email; 
	/**
	 * Declares the validation rules.
	 */
	public function rules(){
		return array(
			array('email','required','message'=>Constants::EMAIL_FIELD_EMPTY),
			array('email', 'email','message'=>Constants::EMAIL_FIELD_WRONG_FORMAT),
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