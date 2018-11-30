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
				
				$q ="INSERT INTO defectlist_ ( Defectlist_remarks, checklist_data_id, User1_defect_remarks,User2_defect_remarks,
				User3_defect_remarks,Delete_flag,Created_date) VALUES (". $value .")";
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
 		$q = "SELECT t.Defectlist_remarks, t.checklist_data_id , t.User1_defect_remarks,t.User2_defect_remarks,t.User3_defect_remarks,t.Created_date  from defectlist as t";
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