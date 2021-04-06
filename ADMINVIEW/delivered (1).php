<?php

$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
	$id=$_POST["id"];
		
		$query = mysqli_query($conn, "select username,Category,Pname,Price,qty,Name,mobileno,Address,payment from orders where Order_id='$id'") or die(mysqli_error($conn));
		
		
		while($row = mysqli_fetch_array($query))
		{
		$query1 = mysqli_query($conn, "insert into delivered(username,Category,Pname,Price,qty,Name,mobileno,Address,Order_id,payment) values('$row[username]','$row[Category]','$row[Pname]',$row[Price],$row[qty],'$row[Name]','$row[mobileno]','$row[Address]','$id','$row[payment]')") or die(mysqli_error($conn));
		$user=$row['username'];
		}
    echo "<script type='text/javascript'>alert('Order is delivered Successfully');window.location='order1.php';</script>";		
		$query2=mysqli_query($conn, "delete from orders where Order_id='$id'") or die(mysqli_error($conn));
//	$row2 = mysqli_fetch_array($query2);
    //header('Location:https://dhruvesh09.000webhostapp.com/Admin View/Delete item.html');
//	include ('delete_item.php');
	
	
    

    
//include ('https://dhruvesh09.000webhostapp.com/Admin View/Delete item.html');
//header('Location:https://dhruvesh09.000webhostapp.com/Admin View/Delete item.html');
	$query4 = mysqli_query($conn, "select email_id from user where username='$user'") or die(mysqli_error($conn));
	$row4 = mysqli_fetch_array($query4);
	$to_email = $row4['email_id'];//$email;
$subject = 'About your order';
$message = "Order Id is ".$id."\nThank you for shopping from Big Bazaar.";
$headers = "Your order is Delivered.";
mail($to_email,$subject,$message,$headers);
?>