<?php


class Answer {
	
	private $idResponse;
	private $text;

	public function Answer(){
	}
	
	
	public function setIdResponse($idResponse){
		$this->idResponse = $idResponse;
	}
	
	public function getIdResponse(){
		return $this->idResponse;
	}
	
	
	
	public function setText($text){
		$this->text = $text;
	}
	
	public function getText(){
		return $this->text;
	}

}

?>