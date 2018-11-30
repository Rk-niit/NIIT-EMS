<?php

session_start();
class verification extends mysqli
{
    public function __construct()
	{
		parent::__construct("localhost","root","","ems");
		if($this->connect_error)
			{
			echo "fail";
			} 
			
	}

	public function verification()
	{
		echo	$Order_id=$_SESSION['id'];
			$sql = "UPDATE order_master 
					set Order_status='3', User1_verification='Y'
					 where order_master.`Order_id`='$Order_id'";
					 $result = $this->query($sql);
		 $numRows = $result->num_rows;
		 if($numRows>0)
		 {
		 	echo "updated";
		 }

	}


}

$verify = new verification();
$verify->verification();

?>