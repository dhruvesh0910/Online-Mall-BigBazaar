<?php

$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
//session_start();
		 $rndno=rand(100000, 999999);
		 //echo $rndno;
		 //$_SESSION["id"] = $rndno;
		 //echo $_SESSION['id'];
		 $un=$_POST['email'];
		 $query = mysqli_query($conn,"SELECT email_id FROM user WHERE username= '$un'"); //or die(mysqli_error($conn));
		//$email=$_POST['email'];
		$row = mysqli_fetch_array($query);
		if(!(isset($row)))
		{
		    echo 'Username does not exists';
		}
		else
		{
$to_email = $row['email_id'];//$email;
$subject = 'OTP for Password reset';
$message = 'Use above OTP for Password reset';
$headers = $rndno;
mail($to_email,$subject,$message,$headers);

$query1 = mysqli_query($conn,"select * from resetpassword where username='$un'");
$row2=mysqli_fetch_array($query1);
if(isset($row2))
{
    $query2=mysqli_query($conn,"update resetpassword set otp='$rndno' where username='$un'") or die(mysqli_error($conn));
}
else
{
$query3 = mysqli_query($conn,"insert into resetpassword values('$un','$rndno')") or die(mysqli_error($conn));
}
}
?>