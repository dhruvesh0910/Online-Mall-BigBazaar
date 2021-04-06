<?php
session_start();
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		
		//$category=perfume;//$_POST['search'];
		$category=$_POST['name'];
		$_SESSION["category"]=$category;
		echo $category;
?>