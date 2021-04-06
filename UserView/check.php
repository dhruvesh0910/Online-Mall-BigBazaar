<?php
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		
		$pin=$_POST['pin'];
		$pin2='388121';
		//$password=$_POST['password'];
		
		$query = mysqli_query($conn,"SELECT * FROM pincode WHERE pinno= '$_POST[pin]'") or die(mysqli_error($conn));
		if($pin==388121)
		{
			echo 'Free Home Delivery available on bill amount more than 200 rupees.';
		}
		else if($row = mysqli_fetch_array($query))
		{
		      echo '!!!!!!   Home Delivery available on bill amount greater than 200 with 50 rupees charge.   !!!!!';
		}
		else
		{
		    echo 'Sorry, No Home Delivery option for your location.';
		}
?>