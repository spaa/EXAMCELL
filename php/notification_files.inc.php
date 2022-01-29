<?php
class StaffMarksEntryNotification{
	var $date ;
	var $day ;
	var $msg;
	public function __construct(){
		$this->date = date("Y/m/d");
		$this->day = date("l");
	}
	function set_msg($msg){
		$this->msg = $msg;
	}
}

?>