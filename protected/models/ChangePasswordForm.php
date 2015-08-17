<?php

/**
 * ChangePasswordForm class.
 * ChangePasswordForm is the data structure for keeping
 * 
 */
class ChangePasswordForm extends CFormModel{
	public $password; 
	/**
	 * Declares the validation rules.
	 */
	public function rules(){
		return array(
			array('password','required','message'=>Constants::PASSWORD_FIELD_EMPTY),
			array('password','length', 'min' => 5,'tooShort'=>Yii::t("translation", Constants::PASSWORD_TOOSHORT)),
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