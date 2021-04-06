<?php
//session_start();
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		
		$category=	$_POST['category'];
		$pn=$_POST['selected'];
		$user=$_POST['username'];
		$qty=$_POST['qty'];
	//$category=	$_SESSION["category"];
	
	//	echo $category;
	//	$query = mysqli_query($conn,"SELECT * FROM $category") or die(mysqli_error($conn));
		$query = "SELECT Name,Brand,Price,Weight,fname FROM $category where Name = '$pn'";//$category";
		$result = $conn->query($query);
		$row = mysqli_fetch_assoc($result);
		$name=$row["Name"];
		$brand=$row["Brand"];
		$price1=$row["Price"];
		$fname=$row["fname"];
		$weight=$row["Weight"];
		$price=$price1*$qty;
		if($qty<1)
		{
		    echo 'Enter Qty properly.';
		}
		else
		{
        $query1="insert into cart(username,Name,Brand,Price,Qty,Weight,fname,category) values('$user','$name','$brand',$price,$qty,'$weight','$fname','$category')";
        $result1 = $conn->query($query1);
		
		if($result1==TRUE)
		{
		    echo 'Successfully Added.';
		}else{ 
		    echo 'Sorry, Not Added';
		}
}
?>