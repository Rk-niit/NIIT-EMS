<?php

session_start();
class verification extends mysqli
{
    public function __construct()
	{
		parent::__construct("localhost","root","","ems1");
		if($this->connect_error)
			{
			echo "fail";
			} 
			
	}

	public function verification()
	{
			$Order_id=$_SESSION['id'];
			$current_date = date("Y-m-d");
			$sql = "UPDATE order_master 
					set Order_status='1',Last_complete_date= '$current_date', User1_verification='Y'
					 where order_master.`Order_id`='$Order_id' and User1_verification='Y'and User2_verification='Y'and
					 User3_verification='Y'";
					 $result = $this->query($sql);
		 		if($result)
		 			header("location:vieworders.php");
		 

	}


}

$verify = new verification();
$verify->verification();

?>