
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ems1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

	$j=0;

if(isset($_GET['sub_eit']))  
		{  
							foreach ($_SESSION['id'] as $ab)	
							{
									$Order_id[] =$ab;

							}
			foreach ($_SESSION['id'] as $a)
			 			 { 
			 			 		 $id[$j]= $a;
			 			 		
			 			 		 $j++;

			 			 }
		 
			 	for($i = 0; $i < count($_GET['remarks']); ++$i) 
			 		{
			 		
			 			 $Order_id[$i];
			 			 $current_date = Date("Y-m-d");
			 				$id[$i]; 
			 			 	$remarks= $_GET['remarks'][$i];
			 			 	
			 				$sql = "INSERT INTO defectlist_master(Defectlist_remarks,checklist_data_id,User1_defect_remarks,User2_defect_remarks,User3_defect_remarks,Delete_flag, Created_date)
			 				values ('$remarks',(SELECT Checklist_data_id from checklist_data where checklist_data.`Checklist_data_id`='$id[$i]'),'aa','bb','cc','N','$current_date')";

			 					$result =mysqli_query($conn,$sql);
			 					if($result==true)
			 					{
			 						header("location:vieworders.php");
			 					} 
			 		}
		}


?>