<?php
include 'delete.php';
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		$id=$_POST['id'];
		$category=$_POST['category'];
			
		
		$query = mysqli_query($conn, "DELETE FROM $_POST[category] where ID=$row[ID]") or die(mysqli_error($conn));
	
?>