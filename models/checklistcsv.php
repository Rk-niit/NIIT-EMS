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
				
				$q ="INSERT INTO checklist_master ( checklist_question, Equipment_type, Checklist_Delete_flag) VALUES (". $value .")";
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
 		$q = "SELECT t.checklist_question, t.Equipment_type , t.Checklist_Delete_flag  from checklist_master as t";
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