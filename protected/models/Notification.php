<?php


class Notification {
	
	private $notifications;

	public function Notification($pnotifications){
		$this->setNotifications($pnotifications);
	}
	
	public function setNotifications($notifications){
		$this->notifications = $notifications;
	}
	
	public function getNotifications(){
		return $this->notifications;
	}

}

?>