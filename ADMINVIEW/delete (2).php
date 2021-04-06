<?php

$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		$id=$_POST['id'];
		$category=$_POST['category'];
		
		
		$query = mysqli_query($conn, "SELECT ID,Name,Brand,Price,Weight FROM $_POST[category] where ID=$_POST[id]") or die(mysqli_error($conn));
		$query1=mysqli_query($conn, "delete from $_POST[category] where ID=$_POST[id]") or die(mysqli_error($conn));
	$row = mysqli_fetch_array($query);
    //header('Location:https://dhruvesh09.000webhostapp.com/Admin View/Delete item.html');
//	include ('delete_item.php');
echo "<script type='text/javascript'>alert('Item Successfully Deleted');window.location='delete_item.php';</script>";	

		echo '<center><form action="delete_item.php" method="post"><table border="3" cellpadding="30"><th>ID</th><th>Name</th><th>Brand</th><th>Price</th><th>Weight</th>';
		
			
		echo "<tr><td>$row[ID]</td><td>$row[Name]</td><td>$row[Brand]</td><td>$row[Price]</td>
				<td>$row[Weight]</td></tr>\n";
		
		
		echo '</table><br><br><button>OK<? button></form></center>';
	
    

    
//include ('https://dhruvesh09.000webhostapp.com/Admin View/Delete item.html');
//header('Location:https://dhruvesh09.000webhostapp.com/Admin View/Delete item.html');
?>