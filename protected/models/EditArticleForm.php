<?php
/**
 * EditArticleForm class.
 * EditArticleForm is the data structure for keeping
 */
class EditArticleForm extends CFormModel{
	public $idarticles;
	public $number;
	public $name;
	public $summary;
	public $content;
	public $module;
	public $color;
	public $restricted;
	

	/**
	 * Declares the validation rules.
	 */
	public function rules(){
		return array(
			array('number','required','message'=>Constants::NUMBER_FIELD_EMPTY_ADMIN),
			array('name','required','message'=>Constants::NAME_FIELD_EMPTY_ADMIN),
			array('content','required','message'=>Constants::CONTENT_FIELD_EMPTY_ADMIN),
			array('module','required','message'=>Constants::MODULE_FIELD_EMPTY_ADMIN),
			array('color','required','message'=>Constants::COLOR_FIELD_EMPTY_ADMIN),
			array('restricted','required','message'=>Constants::RESTRICTED_FIELD_EMPTY_ADMIN),
			array('summary','safe'),
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