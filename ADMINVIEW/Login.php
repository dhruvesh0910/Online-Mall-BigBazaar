<?php
header("Location:adding.php");
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		
		$ID=$_POST['ID'];
		$e_password=$_POST['e_password'];
		
		$query = mysqli_query($conn,"SELECT ID,e_password FROM Employee_details WHERE ID= '$_POST[ID]' AND e_password = '$_POST[e_password]'") or die(mysqli_error($conn));
		
		//$query=mysqli_query($conn,"SELECT password,username from user WHERE username = '$username'");
		//$query="SELECT Password from login WHERE Username='$username'";
		//$result=mysqli_query($conn,$query);
	//	echo mysqli_fetch_array($result);
	//echo $username;
		if($row = mysqli_fetch_array($query))
		{
			session_start();
			echo 'LOGIN SUCCSSESULLY';
			$_SESSION['id']=$_POST['ID'];
			
			
			
		}else{ 
		    
		    echo 'Username and Password is Wrong.Enter Correctly';
		    include("login.html");
		}

?>