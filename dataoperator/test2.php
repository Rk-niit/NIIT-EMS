<h1>Search Users</h1>
<form method="post" action="test2.php ">
  <input type="text" name="fname">
  <input type="submit" name="search">
</form>

  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ems1";

$name = ''; 
if( isset( $_POST['fname'])) {
    $name = $_POST['fname']; 
} 
else{
   $name= "";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname']; 


  $sql = "select * from users_master where User_name like '%$name%' ";
$result = mysqli_query($conn,$sql);
$num_of_arrays= mysqli_num_rows($result);
if($num_of_arrays>0 )
   {
while($row= mysqli_fetch_array($result) )
{


?>
<form method="post" action="test3.php?id=<?php echo $row['User_id'] ?>">
<html>
   <td><label>Username</label></td>
     <td> <input type="text" name="userName" value="<?php echo "".$row['User_name']; ?>"required ?></tr> 
    </div></br></br>
    <tr>
    <div class="input-group">
      <td><label>Email</label></td>
      <td><input type="email" name="email" value="<?php echo "".$row['Email']; ?>" required>
    </tr><tr>
    </div></br></br>
    <div class="input-group">
    <td>  <label>Password</label></td>
      <td><input type="password" name="password_1" required>
    </tr></div></br></br>
    <div class="input-group">
      <button type="submit" class="btn" name="upd_user"'">Update User</button>

       
    </div>
</html>
</form>


<?php

}

}
else {
    ?>
    
    <html>
   <td><label>Username</label></td>
     <td> <input type="text" name="userName"  required ?></tr> 
    </div></br></br>
    <tr>
    <div class="input-group">
      <td><label>Email</label></td>
      <td><input type="email" name="email"  required>
    </tr><tr>
    </div></br></br>
    <div class="input-group">
    <td>  <label>Password</label></td>
      <td><input type="password" name="password_1" required>
    </tr></div></br></br><?php
}
}
?>  
