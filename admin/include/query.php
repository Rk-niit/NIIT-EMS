<?php


class check extends db{
	

	public function getallquestions()
	{
			$sql = "SELECT * FROM checklist_master where Equipment_type='Electric'";
			$result= $this->connect()->query($sql);
			$numRows = $result->num_rows;
			if($numRows>0)
			{
				while ($row= $result->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			}
	}
	
	public function getalldefectlist()
		{

			$sql = "SELECT checklist_id, checklist_question from checklist_record where checklist_answer = 'no'AND checklist_type='Electric'";
			$result = $this-> connect()->query($sql);
			$numRows= $result->num_rows;
			if($numRows>0)
			{
				while ($row= $result->fetch_assoc()) 
				{
					$data[] = $row;
				}
					
				return $data;
			}

		}

}




?>