<?php
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		
		//$username=$_POST['username'];
		//$password=$_POST['password'];
		
		$query = mysqli_query($conn,"SELECT * FROM user WHERE username= '$_POST[username]' AND password = '$_POST[password]'") or die(mysqli_error($conn));
		
		//$query=mysqli_query($conn,"SELECT password,username from user WHERE username = '$username'");
		//$query="SELECT Password from login WHERE Username='$username'";
		//$result=mysqli_query($conn,$query);
	//	echo mysqli_fetch_array($result);
	//echo $username;
		if($row = mysqli_fetch_array($query))
		{
			echo 'LOGIN SUCCESSFULLY';
		}else{ echo 'Username and Password is Wrong.Enter Correctly';}

?>