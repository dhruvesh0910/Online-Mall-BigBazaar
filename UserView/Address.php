<?php
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		$pin1=$_POST['pin'];
	//	echo $pin1;
		//$pin1=388001;
		$city1=$_POST['city'];
		//$city1="anand";
		$state1=$_POST['state'];
		//$state1="gujarat";
    //	$flatno=$_POST['flatno'];
	//	$buildingname=$_POST['buildingname'];
	//	$area=$_POST['area'];
		$address1=$_POST['address'];
		//$address1="address here";
		$mobileno1=$_POST['mobileno'];
		//$mobileno1=8347511511;
		$name1=$_POST['name'];
		//$name1="abcd";
        $username=$_POST['user'];
		//$address= $flateno .' '. $buildingname .' '. $area;
		
	//	$result = mysqli_query($conn,"SELECT mobile_no from user WHERE mobile_no='$_POST[mobileno]'");
	
		$query=mysqli_query($conn,"UPDATE user SET Pincode='".$pin1."',City='".$city1."', State='".$state1."',Address='".$address1."',Name='".$name1."',mobile_no='".$mobileno1."' WHERE username='".$username."'") or die (mysqli_error($conn));
		//$query = mysqli_query($conn,"SELECT * FROM user WHERE username= '$_POST[username]' AND password = '$_POST[password]'") or die(mysqli_error($conn));
		
		//Pincode=$_POST['pin'],City=$_POST['city'],State=$_POST['state'],
		//Address='$_POST[flatno]'.' '.'$_POST[buildingname]'.' '.'$_POST[area]',Name=$_POST['name']' 
		//echo (String)mysqli_num_rows($query);
	
		    if($query==TRUE)//($row = mysqli_fetch_array(MYSQLI_BOTH,$query))//$query= ==TRUE)
		    {
			    echo "Details entered successfully.";
		    }else{ echo "Enter Details Properly.";}
        
//$row = mysqli_fetch_array($query)
?>