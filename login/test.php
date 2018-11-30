<?php
session_start();
include 'config.php';


if(isset($_POST['login']))
{
$username=$_POST['username']; // Get username
$password=$_POST['password'];

 // get password
//query for match  the user inputs
$ret=mysqli_query($con,"SELECT * FROM users_master WHERE User_name='abc'  and Password='12345'");
$num=mysqli_fetch_array($ret);
// if user inputs match if condition will runn
if($num>0)
{
$_SESSION['login']=$userName; // hold the user name in session
$_SESSION['id']=$num['id']; // hold the user id in session
$uip=$_SERVER['REMOTE_ADDR']; // get the user ip
// query for inser user log in to data base
// code redirect the page after login
$user=$_SESSION['login'];
$extra="../admin/home.php";
$role="select Role_id from users_roles where User_id = (select User_id from  users_master where User_name='abc' ) ";

$data=mysqli_query($con,$role);

$num_of_arrays= mysqli_num_rows($data);
$row= mysqli_fetch_array($data);
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
echo $row['Role_id'];
    if($num>0 && "".$row['Role_id']==1){
     echo $row['Role_id'];
     //header('location: ../dataoperator/home.php');
    }else if ($num>0 && "".$row['Role_id']==2) {
      $_SESSION['pm']=1;
    // header("location: ../propertymanager/home.php");
    }else if ($num>0 && "".$row['Role_id']==3) {
      $_SESSION['em']=1;
     //header("location: ../emincharge/home.php");
    }else{
      $_SESSION['admin_login']=1;
     //header("location:http://$host$uri/$extra");
    }
    
exit();
}
// If the userinput no matched with database else condition will run
else
{
$_SESSION['msg']="Invalid username or password";
$extra="home.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
 }
}
?>
