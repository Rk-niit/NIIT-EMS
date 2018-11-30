<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ems1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$array[] = $_SESSION['var'];
$count= 0;
$j=0;
		if(isset($_GET['sub_eit']))  
		{  
			
			 
			 	for($i = 0; $i < count($_GET['q']); ++$i) 
			 		{
			 				foreach ($array as $a)
			 				{
									
			 					$id= $a[$j];
			 					$answer= $_GET['q'][$i];
			 					if($answer =='yes')
			 					  $answer = 1;
			 					if($answer =='no')
			 					 $answer = 2;
								$sql = "UPDATE checklist_data SET checklist_answer='$answer' WHERE Checklist_data_id='$id'";
			 					 if($conn->query($sql)== true)
			 					 {
			 					 		$j++;
			 					 		echo "success";
			 					 		
			 					 }
			     				if($_GET['q'][$i] == 'yes')
			     					{
			       						++$count;
			       					}
			       	
			       			}
			   		 }
		}
 	$total= count($_GET['q']);
  	$count_no= $count;

			if($total > $count_no)
			{
				header("Location: ../Defectlist/defect.php");
				exit();
			}
			if($total == $count_no)
			{
				header("Location: verification.php");
				exit();
			
			}

?>  