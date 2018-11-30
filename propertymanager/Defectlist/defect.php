<?php

session_start();
  ?>
<!doctype html>
<html>


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




<?php

    class defect extends mysqli
    {
      public function __construct()
		{
		parent::__construct("localhost","root","","ems1");
		if($this->connect_error)
			{
			echo "fail";
			} 
		
		}
	public function defectlist()
	{
?>

<body>  
        
          <div style="width:200px;border-radius:6px;margin:0px auto">  
            <table border="1">  
              <tr>  
                <th>Defectlist NO</th>
                <th>Checklist question</th>
                 <th>Remarks</th>
                
              </tr> 
        <?php
        $i = 0;
            $sql = "SELECT Checklist_data_id, checklist_master.`checklist_question`
             from checklist_data 
             Inner join checklist_master 
             on checklist_data.`checklist_type_id` = checklist_master.`Checklist_type_id`
             and checklist_data.`checklist_answer`='2'";
             $result = $this->query($sql);
             $numRows = $result->num_rows;
             if($numRows>0)
             {
         	
         			while($row = $result->fetch_assoc())
         			{
         				?>
                  <form action="defectinsert.php" method="GET" >  
            
                  <tr>
                
                    <td><?php echo "".$row['Checklist_data_id']; ?></td>  
                    <td><?php echo "".$row['checklist_question']; ?></td>
                    <td><textarea name="remarks[<?php echo $i; ?>]" placeholder="Enter the reason"></textarea> 
                  </tr>
<?php
	        		$id[] = $row['Checklist_data_id']; 
	        		$_SESSION['id']= $id;
	        
	          		$i = $i + 1;
	          		}
              }
      
 	}
  }

  $quest = new defect();
  $quest->defectlist();


  ?>                 
            </table> <br>
          <input type="submit" name="sub_eit" id="sub_eit" value="Submit">
        </div>  
      </form>  

</body>  
</html>  