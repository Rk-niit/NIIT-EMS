<?php
class csv extends mysqli

{
	private $state_csv;
	public function __construct()
	{

		parent::__construct("localhost","root","","ems");
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
				
				$q ="INSERT INTO users_master(User_name, Email, Password, Users_Delete_flag, Created_by) VALUES (". $value .")";
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
 		$q = "SELECT t.User_name, t.Email , t.Password , t.Users_Delete_flag,t.Created_by from users_master as t";
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