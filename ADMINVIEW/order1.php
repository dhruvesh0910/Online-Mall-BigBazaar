<?php
session_start();

if(!isset($_SESSION['id']))
{
	header("Location: login.html");
}

include("order.php");

$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');

$query1=mysqli_query($conn, "select username,Category,Pname,Price,qty,Name,mobileno,Address,Order_id,payment from orders") or die(mysqli_error($conn));
echo '<center><table border="3" cellpadding="20"><th>Order ID</th><th>Username</th><th>Category</th><th>Product Name</th><th>Price</th><th>Qty</th><th>Bill Name</th><th>Mobile No</th><th>Address</th><th>Payment</th><th>Press if Order Delivevred</th>';
	
	$demo=1;
	$total=0;
	while($row = mysqli_fetch_array($query1)){
    //header('Location:https://dhruvesh09.000webhostapp.com/Admin View/Delete item.html');
//	include ('delete_item.php');
	
	
	if($demo==$row['Order_id'])
	{
		echo "<tr><td>$row[Category]</td><td>$row[Pname]</td><td>$row[Price]</td>
				<td>$row[qty]</td></tr>";
				$total=$total+$row['Price'];
	}
	else
	{
	    $query2=mysqli_query($conn, "select Order_id from orders where Order_id='$row[Order_id]'") or die(mysqli_error($conn));
	$row2 = mysqli_num_rows($query2);
	$demo=$row['Order_id'];
		echo "<tr><td rowspan=$row2>$row[Order_id]</td><td rowspan=$row2>$row[username]</td><td>$row[Category]</td><td >$row[Pname]</td><td>$row[Price]</td><td>$row[qty]</td><td rowspan=$row2>$row[Name]</td><td rowspan=$row2>$row[mobileno]</td><td rowspan=$row2>$row[Address]</td><td rowspan=$row2>$row[payment]</td><td rowspan=$row2>";
			$total=$total+$row['Price'];
			echo '<form action="delivered.php" method="POST"><input type="hidden" name="id" value="'.$demo.'"/><input type="submit" value="Delivered"/></form></td>';
			echo "</tr>";
				
		
	}

	}	
		echo '</table></center>';
	
?>
