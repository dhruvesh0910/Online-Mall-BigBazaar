<?php

$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		
		$ID=$_POST['ID'];
		$e_name=$_POST['e_name'];
		$e_password=$_POST['e_password'];
		$e_mobile=$_POST['e_mobile'];
		$e_email=$_POST['e_email'];
		$e_confirm=$_POST['e_confirm'];
		 
		 if($_POST['e_password'] == $_POST['e_confirm'])
		 {	
			$query = mysqli_query($conn,"INSERT INTO Employee_details(ID,e_name,e_password,e_mobile,e_email) values('$_POST[ID]','$_POST[e_name]','$_POST[e_password]','$_POST[e_mobile]','$_POST[e_email]')") or die(mysqli_error($conn));
			if($query)
			{
				echo 'SIGN UP SUCCSSESULLY';
				include 'login.html';
			}else{
				echo 'Error occure. Please Sign Up again';
				
				}

		 }
		 else{
		   echo  '<script type="text/javascript">';
		 echo 'alret("Password Mismatch");';
		 echo '</script>';
		 include 'signup.html';
		 }
		//$query=mysqli_query($conn,"SELECT password,username from user WHERE username = '$username'");
		//$query="SELECT Password from login WHERE Username='$username'";
		//$result=mysqli_query($conn,$query);
	//	echo mysqli_fetch_array($result);
	//echo $username;
		/*if($row = mysqli_fetch_array($query))
		{
			echo 'LOGIN SUCCSSESULLY';
		}else{ echo 'Username and Password is Wrong.Enter Correctly';}*/

?>