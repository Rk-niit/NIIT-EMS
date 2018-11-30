<?php
session_start();
class checklist extends mysqli
{
    public function __construct()
	{
		parent::__construct("localhost","root","","ems1");
		if($this->connect_error)
			{
			echo "fail";
			} 
			
	}
	public function Insert_from_checklist_master($Order_id)
	{
		$sql = "SELECT Checklist_type_id, order_master.`Order_id`
					FROM checklist_master
                        INNER JOIN order_master on checklist_master.`Equipment_type` ='3' and order_master.`Order_id`='$Order_id'";
			$result= $this->query($sql);
		$numRows = $result->num_rows;
		if($numRows>0)
		{
			while($row= $result->fetch_assoc())
			{
				$id =$row['Checklist_type_id'];
				$sql1 ="INSERT into checklist_data(checklist_type_id, Order_id) values('$id', $Order_id)";
				$result1= $this->query($sql1);
			}
		}
	}

	public function question_list()
	{
		$sql="SELECT 
		     checklist_data.`Checklist_data_id`, 
		     checklist_master.`checklist_question`
		     From checklist_data
		      INNER JOIN checklist_master on checklist_data.`checklist_type_id`= checklist_master.`Checklist_type_id`";
		 $result = $this->query($sql);
		 $numRows = $result->num_rows;
		 if($numRows>0)
		 {
		 	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
</style>
<body>
		<table style="width:50%"><tr>   
			    
				<th>checklist no</th>
				<th>checklist question</th>
				<th>checklist answer</th>
			    
			</tr>
			<form action="checklist_answer.php" method="GET" > 

<?php
         $i=0;
		 while ($row= $result->fetch_assoc()) 
				{

	?>
				<td><?php echo "".$row['Checklist_data_id']; ?> </td>
				<td><?php echo "".$row['checklist_question']; ?> </td> 
				<td ><input type="radio" name="q[<?php echo $i; ?>]" value="yes" >yes
                <input type="radio" name="q[<?php echo $i; ?>]"  value="no" required>no</td> 
            </tr>


 <?php
         $array[] = $row['Checklist_data_id'];
         $_SESSION['var']= $array; 
         $i=$i+1;
  ?>
				



<?php
		 }     
?>
</table>
<input type="submit" name="sub_eit" id="sub_eit" value="Submit">
</div>
</form>
</body>
</html>
<?php
	}
}
}
$Order_id= $_GET['Order_id'];

$check = new checklist();
//$check->Insert_from_checklist_master($Order_id);
$check -> question_list();

?>