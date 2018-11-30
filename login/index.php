<?php
session_start();
include 'config.php';


if(isset($_POST['login']))
{
$username=$_POST['username']; // Get username
$password=$_POST['password'];

 // get password
//query for match  the user inputs
$ret=mysqli_query($con,"SELECT * FROM users_master WHERE User_name='$username'  and Password='$password'");
$num=mysqli_fetch_array($ret);
// if user inputs match if condition will runn
if($num>0)
{
$_SESSION['login']=$username; // hold the user name in session
$_SESSION['id']=$num['id']; // hold the user id in session
$uip=$_SERVER['REMOTE_ADDR']; // get the user ip
// query for inser user log in to data base

// code redirect the page after login

 // hold the user name in session
 // hold the user id in session
 // get the user ip
// query for inser user log in to data base
// code redirect the page after login

$extra="../admin/vieworders.php";
$role="select Role_id from users_roles where User_id = (select User_id from  users_master where users_master.`User_name`='$username' ) ";
$data=mysqli_query($con,$role);

$num_of_arrays= mysqli_num_rows($data);
$row= mysqli_fetch_array($data);
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

    if($num>0 && $row['Role_id']==1){
      $_SESSION['do']=1;
     header('location:../dataoperator/vieworders.php');
    }else if ($num>0 && "".$row['Role_id']==2) {
      $_SESSION['pm']=1;
      
      //header("location:../login/index.php");
     header("location: ../propertymanager/vieworders.php");
    }else if ($num>0 && "".$row['Role_id']==3) {
      $_SESSION['em']=1;
     header("location: ../emincharge/vieworders.php");
    }else{
      $_SESSION['admin_login']=1;
     header("location:http://$host$uri/$extra");
    }
    
exit();
}
// If the userinput no matched with database else condition will run
else
{

$extra="home.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
 }
}
?>

<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>User login and tracking in PHP using PHP OOPs Concept</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>    
<div class="login-page">
  
<form name="login" method="post" >
  <header>Login</header>
  <p><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
  <label>Username <span>*</span></label>
  <input name="username" type="text" value="" required />
  <label>Password <span>*</span></label>
  <input name="password" type="password" value="" required />
  <button type="submit" name="login">Login</button>
</form>
    
    </div>
</div>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background-image: url("main.png");
   background-color: #cccccc;
   background-size: cover;     
}
</style>
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
    
    
    
  </body>
</html>
