<?php 
session_start();    
if(!isset($_SESSION['admin_login'])) 
    header('location:../login/index.php');

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

 
	

	

	
	if (isset($_POST['reg_equip'])) {

		// receive all input values from the form
		$Equip_name = mysqli_real_escape_string($conn, $_POST['equip_name']);
		$frequency = implode(', ', $_POST['Freq']);
	    $location = implode(', ', $_POST['Loc']);
	    
	    $type = implode(', ', $_POST['Type']);
	    $status = implode(', ', $_POST['Status']);
	    $username = $_SESSION['login'];
	    echo $type;
	    
	   /* $type_id="select Equipment_type_id from equipment_type where
	              Equipment_type = $type";
	    $Loc_id="select Location_id from location_master where 
	
	              Location_name= $location";
	              echo $type_id;
/*$query = "INSERT INTO equipment_master (Equipment_name, Equipment_type_id, Location_id, Frequency,Equipment_status, created_by) values('$Equip_name','$type_id',)
		
			
/*				
$query = "INSERT INTO equipment_master (Equipment_name, Equipment_type_id, Location_id, Frequency,Equipment_status, created_by)
  SELECT Equipment_name='$Equip_name', equipment_type.`Equipment_type_id`,
  location_master.`Location_id`,Frequency,Equipment_status, created_by  FROM equipment_master left JOIN equipment_type ON equipment_type.`Equipment_type_id` = '3' left JOIN location_master on location_master.`Location_id`= '3'";
			
		*/
$query="INSERT INTO equipment_master ( Equipment_name, Equipment_type_id, Location_id, Frequency,Equipment_status, Created_by) 
VALUES('$Equip_name', (SELECT  Equipment_type_id FROM equipment_type WHERE equipment_type.`Equipment_type` = '$type'),(select Location_id from location_master where location_master.`Location_name`= '$location'),'$frequency', '$status','$username')";



			$result = mysqli_query($conn, $query);
			
			
            if($result == true){
            	echo $_SESSION['login'];
            header('location: ../admin/Users.php');
		    }
	    

	}

	


?>