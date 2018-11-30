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
				
				$q ="INSERT INTO equipment_master ( Equipment_name, Equipment_type_id, Location_id, Frequency,Equipment_status, Created_by) VALUES (". $value .")";
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
 		$q = "SELECT t.Equipment_name, t.Equipment_type_id , t.Location_id , t.Frequency,t.Equipment_status,t.Created_by from equipment_master as t";
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
