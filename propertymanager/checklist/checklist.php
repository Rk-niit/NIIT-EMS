<?php

session_start();


 $selected_type = $_GET['Equipment_type'];
 $Order_id= $_GET['Order_id'];
if($selected_type == 'Panel')
{
	
	header('location:checklist_Panel.php?Order_id='.$Order_id.'');
}
if($selected_type == 'Transformer')
{

	header('location:checklist_Tranformer.php');
}
 
?>