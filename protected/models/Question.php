<?php


class Question {
	
	private $id;
	private $number;
	private $text;
	private $typeControl;
	private $level;
	private $answers;

	public function Question(){
	}
	
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setNumber($number){
		$this->number = $number;
	}
	
	public function getNumber(){
		return $this->number;
	}
	
	public function setText($text){
		$this->text = $text;
	}
	
	public function getText(){
		return $this->text;
	}
	
	public function setTypeControl($typeControl){
		$this->typeControl = $typeControl;
	}
	
	public function getTypeControl(){
		return $this->typeControl;
	}
	
	public function setLevel($level){
		$this->level = $level;
	}
	
	public function getLevel(){
		return $this->level;
	}
	
	public function setAnswers($answers){
		$this->answers = $answers;
	}
	
	public function getAnswers(){
		return $this->answers;
	}

}

?>