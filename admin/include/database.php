<?php
 class db
 {

private $servername ="localhost";
private $hostname="root";
private $password="";

private $db="ems";

public function connect()
{
$conn = new mysqli($this->servername, $this->hostname , $this->password, $this->db);
return $conn;
	




}





 }

?>