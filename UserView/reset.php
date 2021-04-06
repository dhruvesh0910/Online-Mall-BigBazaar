<?php

//require 'otp.php';
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
//session_start();

    //$rndno=$_SESSION['rndno'];
    //echo $_SESSION["id"];
    //$rndno=$_SESSION["id"];
    //$rndno=$_POST["rotp"];
    //echo $rndno;
	$username=$_POST['username'];
	$otp=$_POST['otp'];
	$pwd=$_POST['pwd'];
	$repwd=$_POST['repwd'];
	$query = mysqli_query($conn,"select otp from resetpassword where username='$username';") or die(mysqli_error($conn));
	$row=mysqli_fetch_array($query);
    if($otp==$row['otp'])
    {
        if($pwd==$repwd)
        {
            $query = mysqli_query($conn,"update user set password='$pwd' where username='$username';") or die(mysqli_error($conn));
            echo 'Password Update Successfully';
            //unset($_SESSION['id']);
        }
        else
        {
            	echo 'both password not match';
            	//unset($_SESSION['id']);
        }
    }
    else{
        echo 'OTP not Match';
        //unset($_SESSION['id']);
    }
?>