<?php
include("generatebill1.php");
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
	$id=$_POST["id"];
	
	$query2 = mysqli_query($conn, "select username,Category,Pname,Price,qty,Name,mobileno,Address,payment,pincode from orders where Order_id='$id'") or die(mysqli_error($conn));
	$row1 = mysqli_fetch_array($query2);
	$pincode=$row1['pincode'];
	$query4 = mysqli_query($conn,"SELECT * FROM pincode WHERE pinno= '$pincode'") or die(mysqli_error($conn));
	
		
		$query = mysqli_query($conn, "select username,Category,Pname,Price,qty,Name,mobileno,Address,payment from orders where Order_id='$id'") or die(mysqli_error($conn));
	
		$demo=1;
		$total=0;
		echo '<center><table border="1" cellpadding="20">';
			echo '<tr><td colspan=5><center><b1>Big Bazaar</b1></center></td></tr>';
		echo "<tr><td colspan=5>Order Id: $id</td></tr>";
		echo "<tr><td colspan=5>Name: $row1[Name]</td></tr>";
		echo "<tr><td colspan=5>Address: $row1[Address]</td></tr>";
		
		echo "<tr><th>Product Name</th><th>GST</th><th>Qty</th><th>Rate</th><th>Value</th></tr>";
		while($row = mysqli_fetch_array($query))
		{
	$rate=$row['Price']/$row['qty'];
	if($row['Category']=="perfume")
	{
	    $gst="28%";
	}
	else if($row['Category']=="biscuit")
	{
	    $gst="18%";
	}
	else
	{
	    $gst="12%";
	}
	
	
		echo "<tr><td>$row[Pname]</td><td>$gst</td><td>$row[qty]</td><td>$rate</td><td>$row[Price]</td></tr>";
		$total=$total+$row['Price'];

		}
		
		 if($pincode==388121)
		{
			//echo 'Free Home Delivery available on bill amount more than 200 rupees.';
			//$delivery="free";
			if($total>=200)
             {
             
             $total=$total+0;
             	echo "<tr><td colspan=4>Shipping Charge </td><td>0.00</td></tr>";
             
             }
             else if($total<200)
             {
             
                 
             }
		}
		else if($row4 = mysqli_fetch_array($query4))
		{
		      //echo '!!!!!!   Home Delivery available on bill amount greater than 200 with 50 rupees charge.   !!!!!';
		      //$delivery=50;
		      if($total>=200)
             {
             
             $total=$total+50;
             echo "<tr><td colspan=4>Shipping Charge </td><td>50.00</td></tr>";
             }
             else if($total<200)
             {
             
             }
		}
		else
		{
		    //echo 'Sorry, No Home Delivery option for your location.';
		    //$delivery="Not Available.";
		    
		}
		
		echo "<tr></tr>";
		echo "<tr></tr>";
		echo "<tr><td colspan=4>Total Amount </td><td>$total</td></tr>";
			echo "<tr><td colspan=3>GSTIN </td><td colspan=3>34BBDDB3132C0PC</td></tr>";
		echo '</table></center>';
    //echo "<script type='text/javascript'>alert('Order is delivered Successfully');window.location='order1.php';</script>";		
		//$query2=mysqli_query($conn, "delete from orders where Order_id='$id'") or die(mysqli_error($conn));
//	$row2 = mysqli_fetch_array($query2);
    //header('Location:https://dhruvesh09.000webhostapp.com/Admin View/Delete item.html');
//	include ('delete_item.php');
	
	
    

    
//include ('https://dhruvesh09.000webhostapp.com/Admin View/Delete item.html');
//header('Location:https://dhruvesh09.000webhostapp.com/Admin View/Delete item.html');
?>
