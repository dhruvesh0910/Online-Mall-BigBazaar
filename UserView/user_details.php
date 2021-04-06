<?php
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		$firstname=$_POST['firstname'];
		$middlename=$_POST['middlename'];
		$lastname=$_POST['lastname'];	
		$email=$_POST['email'];
		$mobileno=$_POST['mobileno'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$gender=$_POST['gender'];
		$CheckSQL = "SELECT * FROM user WHERE username='$username'";
 
        $check = mysqli_fetch_array(mysqli_query($conn,$CheckSQL));

        if(isset($check))
        {
         echo 'Username is Already Exits';   
        }
        else
        {
		$query = mysqli_query($conn,"INSERT INTO user(F_Name,M_Name,L_name,email_id,mobile_no,username,password,gender) VALUES('$firstname','$middlename','$lastname','$email',$mobileno,'$username','$password','$gender')");
       
		if($query==TRUE)//mysqli_query($conn,$query)
		{
			echo 'SIGN UP SUCCSSESULLY';
		}else{ echo 'REGISTRE FIRST';}
        }
?>