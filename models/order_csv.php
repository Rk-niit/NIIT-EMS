<?php
class csv extends mysqli

{
	private $state_csv;
	public function __construct()
	{

		parent::__construct("localhost","root","","ems1");
		if($this->connect_error)
			{
			echo "fail";
			}
	}

 public function import($file)
 	{
 		
	  $file = fopen($file, 'r');
			while($row =fgetcsv($file))
			{
				
				$value ="'". implode("','",$row) ."'";
				
				$q ="INSERT INTO order_master ( Equipment_id, Order_status,O_complete_date, Last_complete_date, User1_verification, User2_verification, User3_verification, Next_order_date, Order_Delete_flag, Created_date) VALUES (". $value .")";
				if($this-> query($q))
					{
					$this->state_csv =true;
					}
				else
					$this->state_csv =false;
			} 
			if($this->state_csv)
			{
				echo "true";
			}
 	}


 	public function export()
 	{

 		$this-> state_csv =false;
 		$q = "SELECT t.Equipment_id, t.Order_status , t.O_complete_date, t.Last_complete_date, t.User1_verification, t.User2_verification, t.User3_verification, t.Order_Delete_flag, t.Created_date  from order_master as t";
 		$run = $this->query($q);
 		if($run ->num_rows >0)
 		{

 			$fn = "csv_". uniqid() .".csv";
 			$file =fopen("files/".$fn,"w");
 		while($row=$run ->fetch_array(MYSQLI_NUM))
 			{
 				if(fputcsv($file, $row))
 					$this->state_csv = true;
 				else
 					$this->state_csv = false;
 			}
 			if($this->state_csv)
 				echo "successful export";
 			else
 				echo "unscuccesful";

 			fclose(
 				$file);
 		}


 	}
}




?>