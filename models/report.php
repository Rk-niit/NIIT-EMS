<?php
class report extends mysqli{
	
	public function__construct(){
		parent::__construct("localhost","root","","ems");
		if (this->connect_error){
			echo "fail";
		}
	}

	public function orders_report($from,$till){

		$sql="insert into order_master where "
	}






}