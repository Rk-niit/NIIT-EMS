<?php 
    


                                            
 

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


	// variable declaration
	$userName = "";
	$email    = "";
	$errors = array();
	 
	

	

	// REGISTER USER
	if (isset($_POST['upd_user'])) {

		// receive all input values from the form
        
		 $userName = mysqli_real_escape_string($conn, $_POST['userName']);
		 $email = mysqli_real_escape_string($conn, $_POST['email']);
		 $password = mysqli_real_escape_string($conn, $_POST['password_1']);
	   //$Roles = implode(', ', $_POST['Role']);
	   //$flag = "n";
	   //$username = $_SESSION['login'];
        
		// form validation: ensure that the form is correctly filled
		
		$id= $_GET['id'];

		

		// register user if there are no errors in the form
		
			//encrypt the password before saving in the database
         $query = "UPDATE `users_master` SET `User_name` = '$userName', `Email` = '$email', `Password` = '$password' WHERE `users_master`.`User_id` =  '$id'";
			 
			//$query1= "UPDATE `users_roles` SET `Role_id` = '$Roles' WHERE `users_roles`.`User_id`  = {$_GET['id']} LIMIT 1";

					  
			

			  
			$result = mysqli_query($conn, $query);
			
			//$result1 = mysqli_query($conn, $query1);

			
            if($result == true){
            	//if($result1==true){
            	
            header("location:../admin/addusers.php");
		   // }
	    }

	}

	


?>