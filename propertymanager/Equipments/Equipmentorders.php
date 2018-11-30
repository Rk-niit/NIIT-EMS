<?php
class Equipment_orders extends mysqli
{
    public function __construct()
	{
		parent::__construct("localhost","root","","ems");
		if($this->connect_error)
			{
			echo "fail";
			} 
		else {
			 echo "success";
			}	
	}
	
		
  public function total($week)
  {

  	   $sql = "SELECT 
  	   		location_master.`Location_name`,
			equipment_master.`Location_id`,
			equipment_master.`Equipment_name`,
			equipment_master.`Equipment_type_id`,
			equipment_master.`Frequency`,
			equipment_type.`Equipment_type`,
			order_master.`Equipment_id`,
			order_master.`Last_complete_date`, 
			order_master.`Order_id`,
			order_master.`Order_status`,
			order_master.`User1_verification`,
			order_master.`User2_verification`,
			order_master.`User3_verification`
             from order_master INNER JOIN equipment_master on order_master.`Equipment_id`= equipment_master.`Equipment_id`
			 INNER JOIN  location_master on equipment_master.`Location_id`= location_master.`Location_id`
			 INNER JOIN equipment_type on equipment_master.`Equipment_type_id`=equipment_type.`Equipment_type_id`";
		$result= $this->query($sql);
		$numRows = $result->num_rows;
		if($numRows>0)
			{
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<table style="width:50%"><tr>   
			    <th >Order Number</th>
			    <th >Equipment name</th>
			    <th>Location</th>
         		<th>Equipment type</th>
				<th>Data operator verification</th>
				<th>P&M verification</th>
				<th>E&M_verification</th>
			    
			</tr>

<?php
		 while ($row= $result->fetch_assoc()) 
				{
					$week1 = $week;
					$Last_complete_date =$row['Last_complete_date'];

						$var = date( "Y-m-d", strtotime( "$Last_complete_date + 1 month" ) );
					    $date = new Datetime($var);
						 $current_week = $date ->format("W"); 
						 if($week1 == $current_week)
						 {


            		     		if($row['Order_status']==2)
            		     		{
?>
		                         <td><a href="../checklist/checklist.php?Equipment_type=<?php echo $row['Equipment_type'] ?>&Order_id=<?php echo $row['Order_id'] ?> "><?php echo "".$row['Order_id'];  ?> </td>
		                        <td><?php echo "".$row['Equipment_name']; ?> </td>
		                        <td><?php echo "".$row['Location_name'];  ?> </td>
		                       <td><?php echo "".$row['Equipment_type']; ?> </td>
		                        <td><?php echo "".$row['User1_verification']; ?> </td>
	                			<td><?php echo "".$row['User2_verification']; ?> </td>
	                			<td><?php echo "".$row['User3_verification']; ?> </td>
                       </tr>

<?php
						}
									}
       				 }
    
?>	
</table>
</div>
</body>
</html>
				
					
<?php
				
					
				
			}



  }

}
$ddate = date("Y-m-d");
		$date = new DateTime($ddate);
		$week1 = $date->format("W");
$equip = new Equipment_orders();
$equip -> total($week1);



?>