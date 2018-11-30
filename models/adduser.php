<?php 
session_start();    
if(!isset($_SESSION['admin_login'])) 
    header('location:login.php');

                                            
 

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
	$_SESSION['success'] = ""; 
	

	

	// REGISTER USER
	if (isset($_POST['reg_user'])) {

		// receive all input values from the form
		$userName = mysqli_real_escape_string($conn, $_POST['userName']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password_1']);
	   $Roles = implode(', ', $_POST['Role']);
	   $flag = "n";
	   $username = $_SESSION['login'];
        
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		

		// register user if there are no errors in the form
		
			$password1 = md5($password);//encrypt the password before saving in the database

			$query = "INSERT INTO users_master (User_name, Email, Password, Users_Delete_flag, Created_by) 
					  VALUES('$userName', '$email', '$password1', '$flag', 
					  '$username')";
			$query1= "INSERT INTO users_roles (User_id, Role_id,  Delete_flag)

					  VALUES
					  ((SELECT  User_id FROM users_master WHERE User_name = '$userName'), 
					  (SELECT  Role_id FROM roles_master WHERE Role_desc = '$Roles'),
					   '$flag')";
			

			  
			$result = mysqli_query($conn, $query);
			
			$result1 = mysqli_query($conn, $query1);

			
            if($result == true){
            	if($result1==true){
            	
            header('location: ../admin/addusers.php');
		    }
	    }

	}

	


?>