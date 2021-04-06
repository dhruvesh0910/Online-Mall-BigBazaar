<?php
//session_start();
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		
		//$pname=	$_POST['bname'];
		$username=$_POST['username'];
	//$category=	$_SESSION["category"];
	$query1 = mysqli_query($conn,"delete from cart where username='$username'") or die(mysqli_error($conn));
	if($query1==TRUE)
	{
	    echo 'Your Cart is Empty';
	}
	else
	{
	    echo 'Try Again';
	}
	
?>