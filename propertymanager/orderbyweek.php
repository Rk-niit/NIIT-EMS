<?php
class order extends mysqli
{
	public function __construct()
	{
		parent::__construct("localhost","root","","ems1");
		if($this->connect_error)
			{
			echo "fail";
			} 
			
	}

public function total_orders_this_week($week)
  {
		$sql = "SELECT 
			equipment_master.`Frequency`,
			order_master.`Equipment_id`,
			 order_master.`Last_complete_date`, 
			 order_master.`Order_id`
			 from order_master INNER JOIN equipment_master on order_master.`Equipment_id`= equipment_master.`Equipment_id`";
		$result = $this->query($sql);
		 $numRows = $result->num_rows;
		if($numRows>0)
			{
			  while ($row= $result->fetch_assoc()) 
				{
				  $id= $row['Order_id'];			
				  $weekno = $week; 
				  $last_complete_date= $row['Last_complete_date'];
				  if($row['Frequency'] =='Monthly')
					 {
				        $var = date( "Y-m-d", strtotime( "$last_complete_date + 1 month" ) );
					    $date = new Datetime($var);
						 $current_week = $date ->format("W"); 
					 if($weekno != $current_week)
						 	$numRows--;
					$numRows;
					  }
					
					 if($row['Frequency'] =='Two Monthly')
					   {
				 		  
				          $var = date( "Y-m-d", strtotime( "$last_complete_date + 2 month" ) );
					      $date = new Datetime($var);
						  $current_week = $date ->format("W"); 
						 	if($weekno != $current_week)
						 		$numRows--;
						}
							
						if($row['Frequency'] =='Quaterly')
						 {
				 			
				             $var = date( "Y-m-d", strtotime( "$last_complete_date + 4 month" ) );
					         $date = new Datetime($var);
						     $current_week = $date ->format("W"); 
						 	if($weekno != $current_week)
						 		$numRows--;
						 	
						  }

						if($row['Frequency'] =='Half Yearly')
						  {
				 			 
						       $var = date( "Y-m-d", strtotime( "$last_complete_date + 6 month" ) );
							    $date = new Datetime($var);
								 $current_week = $date ->format("W"); 
						       if($weekno != $current_week)
								 		$numRows--;
						 	}
							
							if($row['Frequency'] =='Yearly')
						 	{
				 		
				       			  $var = date( "Y-m-d", strtotime( "$last_complete_date + 12 month" ) );
					    		$date = new Datetime($var);
						 		$current_week = $date ->format("W"); 
						 		if($weekno != $current_week)

						 		$numRows--;

						 	}
						}
							echo $numRows;
					}
   }

public function completed_this_week($week)
{
		$sql = "SELECT 
		equipment_master.`Frequency`,
		order_master.`Equipment_id`,
		 order_master.`Last_complete_date`, 
		 order_master.`Order_id`,
		 order_master.`Order_status`,
		 order_master.`User1_verification`,
		 order_master.`User2_verification`,
		 order_master.`User3_verification`
		 from order_master INNER JOIN equipment_master on order_master.`Equipment_id`= equipment_master.`Equipment_id`";
	$result = $this->query($sql);
	$numRows = $result->num_rows;
	if($numRows>0)
 	 {
  	   while ($row= $result->fetch_assoc()) 
		{       
				      $id= $row['Order_id'];			
					  $weekno = $week; 
					  $last_complete_date= $row['Last_complete_date'];
			
		     if($row['Frequency'] =='Monthly')
			    {
			 		  
			          $var = date( "Y-m-d", strtotime( "$last_complete_date + 1 month" ) );
				      $date = new Datetime($var);
					  $current_week = $date ->format("W"); 
					 if($weekno != $current_week || $row['Order_status'] !='1')
					 	$numRows--;
					 if($row['User1_verification']=='Y' && $row['User2_verification']=='Y' && $row['User3_verification']=='Y')
					 	$numRows++;
					 }
			
			 if($row['Frequency'] =='Two Monthly')
			     {
			 		  
			         $var = date( "Y-m-d", strtotime( "$last_complete_date + 2 month" ) );
				     $date = new Datetime($var);
					 $current_week = $date ->format("W"); 
					 	if($weekno != $current_week || $row['Order_status'] !='1')
					 		$numRows--;
					 	if($row['User1_verification']=='Y' && $row['User2_verification']=='Y' && $row['User3_verification']=='Y')
					 	$numRows++;
					  }
					
				if($row['Frequency'] =='Quaterly')
				  {
			 			
			            $var = date( "Y-m-d", strtotime( "$last_complete_date + 4 month" ) );
				        $date = new Datetime($var);
					    $current_week = $date ->format("W"); 
					 	if($weekno != $current_week || $row['Order_status'] !='1')
					 		$numRows--;
					 	if($row['User1_verification']=='Y' && $row['User2_verification']=='Y' && $row['User3_verification']=='Y')
					 	$numRows++;
				   }

				if($row['Frequency'] =='Half Yearly')
				   {
		 			
			         $var = date( "Y-m-d", strtotime( "$last_complete_date + 6 month" ) );
				     $date = new Datetime($var);
					 $current_week = $date ->format("W"); 
					 	if($weekno != $current_week || $row['Order_status'] !='1')
					 		$numRows--;
					 	if($row['User1_verification']=='Y' && $row['User2_verification']=='Y' && $row['User3_verification']=='Y')
					 	   $numRows++;
				 	}
					
				if($row['Frequency'] =='Yearly')
				 	{
		 			    
		                $var = date( "Y-m-d", strtotime( "$last_complete_date + 12 month" ) );
			            $date = new Datetime($var);
				        $current_week = $date ->format("W"); 
				 	    if($weekno != $current_week || $row['Order_status'] !='1')
				 		   $numRows--;
				 	    if($row['User1_verification']=='Y' && $row['User2_verification']=='Y' && $row['User3_verification']=='Y')
				 	       $numRows++;
					}
				
			}	
				echo $numRows;
		}
}
public function pending_this_week($week)
{
				$sql = "SELECT 
				equipment_master.`Frequency`,
				order_master.`Equipment_id`,
				 order_master.`Last_complete_date`, 
				 order_master.`Order_id`,
				 order_master.`Order_status`
				 from order_master INNER JOIN equipment_master on order_master.`Equipment_id`= equipment_master.`Equipment_id`";
			$result = $this->query($sql);
			$numRows = $result->num_rows;
		if($numRows>0)
 		 {
  	   while ($row= $result->fetch_assoc()) 
		{   
			     $id= $row['Order_id'];			
				 $weekno = $week; 
				 $last_complete_date= $row['Last_complete_date'];
			
		     if($row['Frequency'] =='Monthly')
			    {
		 		  
		        $var = date( "Y-m-d", strtotime( "$last_complete_date + 1 month" ) );
			    $date = new Datetime($var);
				 $current_week = $date ->format("W"); 
				 if($weekno != $current_week || $row['Order_status'] !='2')
				 	$numRows--;
				 }
			
			 if($row['Frequency'] =='Two Monthly')
			     {
		 		 
		       $var = date( "Y-m-d", strtotime( "$last_complete_date + 2 month" ) );
			    $date = new Datetime($var);
				 $current_week = $date ->format("W"); 
				 	if($weekno != $current_week || $row['Order_status'] !='2')
				 		$numRows--;
				  }
					
				if($row['Frequency'] =='Quaterly')
				  {
		 			
		       $var = date( "Y-m-d", strtotime( "$last_complete_date + 4 month" ) );
			    $date = new Datetime($var);
				 $current_week = $date ->format("W"); 
				 	if($weekno != $current_week || $row['Order_status'] !='2')
				 		$numRows--;
				 	
				   }

				if($row['Frequency'] =='Half Yearly')
				   {
		 			
		       $var = date( "Y-m-d", strtotime( "$last_complete_date + 6 month" ) );
			    $date = new Datetime($var);
				 $current_week = $date ->format("W"); 
				 	if($weekno != $current_week || $row['Order_status'] !='2')
				 		$numRows--;
				 	}
					
				if($row['Frequency'] =='Yearly')
				 	{
		 			
		      			 $var = date( "Y-m-d", strtotime( "$last_complete_date + 12 month" ) );
			    			$date = new Datetime($var);
				 			$current_week = $date ->format("W"); 
				 			if($weekno != $current_week || $row['Order_status'] !='2')
				 		$numRows--;

				 	
				 	
			}
				
			}	
				echo $numRows;
		}
 }
		
public function progress_this_week($week)
{

		$sql = "SELECT 
				equipment_master.`Frequency`,
				order_master.`Equipment_id`,
				 order_master.`Last_complete_date`, 
				 order_master.`Order_id`,
				 order_master.`Order_status`
				 from order_master INNER JOIN equipment_master on order_master.`Equipment_id`= equipment_master.`Equipment_id`";
			$result = $this->query($sql);
			$numRows = $result->num_rows;
		if($numRows>0)
 		 {
  	   while ($row= $result->fetch_assoc()) 
		{   
			     $id= $row['Order_id'];			
				 $weekno = $week; 
				 $last_complete_date= $row['Last_complete_date'];
			
		     if($row['Frequency'] =='Monthly')
			    {
		 		  
		        $var = date( "Y-m-d", strtotime( "$last_complete_date + 1 month" ) );
			    $date = new Datetime($var);
				 $current_week = $date ->format("W"); 
				 if($weekno != $current_week || $row['Order_status'] !='3')
				 	$numRows--;
				 }
			
			 if($row['Frequency'] =='Two Monthly')
			     {
		 		 
		       $var = date( "Y-m-d", strtotime( "$last_complete_date + 2 month" ) );
			    $date = new Datetime($var);
				 $current_week = $date ->format("W"); 
				 	if($weekno != $current_week || $row['Order_status'] !='3')
				 		$numRows--;
				  }
					
				if($row['Frequency'] =='Quaterly')
				  {
		 			
		       $var = date( "Y-m-d", strtotime( "$last_complete_date + 4 month" ) );
			    $date = new Datetime($var);
				 $current_week = $date ->format("W"); 
				 	if($weekno != $current_week || $row['Order_status'] !='3')
				 		$numRows--;
				 	
				   }

				if($row['Frequency'] =='Half Yearly')
				   {
		 			
		       $var = date( "Y-m-d", strtotime( "$last_complete_date + 6 month" ) );
			    $date = new Datetime($var);
				 $current_week = $date ->format("W"); 
				 	if($weekno != $current_week || $row['Order_status'] !='3')
				 		$numRows--;
				 	}
					
				if($row['Frequency'] =='Yearly')
				 	{
		 			
		      			 $var = date( "Y-m-d", strtotime( "$last_complete_date + 12 month" ) );
			    			$date = new Datetime($var);
				 			$current_week = $date ->format("W"); 
				 			if($weekno != $current_week || $row['Order_status'] !='3')
				 		$numRows--;

				 	
				 	
			}
				
			}	
				echo $numRows;
		}






}

public function this_week_order( $week)
{

	$sql = "SELECT 
		equipment_master.`Frequency`,
		order_master.`Equipment_id`,
		 order_master.`Last_complete_date`, 
		 order_master.`Order_id`
		 from order_master INNER JOIN equipment_master on order_master.`Equipment_id`= equipment_master.`Equipment_id`";
	$result = $this->query($sql);
	$numRows= $result->num_rows;
			
   if($numRows>0)
	  {
	  while ($row= $result->fetch_assoc()) 
		{
				$id= $row['Order_id'];	 
				$weekorder1 = $week; 
			    $last_complete_date= $row['Last_complete_date'];
			    $current_date =Date("Y-m-d");
		  if($row['Frequency'] =='Monthly')
			 { 
		    $var = date( "Y-m-d", strtotime( "$last_complete_date + 1 month" ) );
		    $date = new Datetime($var);
			 $weekorder2 = $date ->format("W"); 
			 	if($weekorder1 == $weekorder2)
			   		{
					  $update = "UPDATE order_master set Order_status='2' where Order_id = '$id'";
				      $this->query($update);
					}
			 }
		 	if($row['Frequency'] =='Two monthly')
				{
			 
			 $var = date( "Y-m-d", strtotime( "$last_complete_date + 2 month" ) );
			 	if($var == $current_date)
			   		{
					  $update = "UPDATE order_master set Order_status='pending' where Order_id = '$id'";
				      $this->query($update);
					}
				}
			if($row['Frequency'] =='Quartely')
				 {
			
			 $var = date( "Y-m-d", strtotime( "$last_complete_date + 4 month" ) );
			 	if($var == $current_date)
			   		{
					  $update = "UPDATE order_master set Order_status='pending' where Order_id = '$id'";
				      $this->query($update);
					}
				 }	
			if($row['Frequency'] =='Half yearly')
				 {
			
			 $var = date( "Y-m-d", strtotime( "$last_complete_date + 6 month" ) );
			 	if($var == $current_date)
			   		{
					  $update = "UPDATE order_master set Order_status='pending' where Order_id = '$id'";
				      $this->query($update);
					}
				}	
				
		if($row['Frequency'] =='Yearly')
			 {
			 
		     $var = date( "Y-m-d", strtotime( "$last_complete_date + 12 month" ) );
			 	if($var == $current_date)
			   		{
					  $update = "UPDATE order_master set Order_status='2' where Order_id = '$id'";
				      $this->query($update);
					}
			 }		
			}
		}	
	}	


}
?>