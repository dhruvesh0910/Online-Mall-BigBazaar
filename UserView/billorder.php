<?php
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		
		$category=$_POST['category'];
		$pname=$_POST['pname'];
		$qty=$_POST['qty'];
		$username=$_POST['username'];
		$rndno=rand(100000000000, 999999999999);
		$pincode=$_POST['pincode'];
		$payment=$_POST['payment'];
	//	$brand=$_POST['brand'];
		
		$CheckSQL = "SELECT mobile_no,City,Address,Name FROM user WHERE username='$username'";
 
        $check = mysqli_fetch_assoc(mysqli_query($conn,$CheckSQL));
        
        $mobileno=$check["mobile_no"];
        $name=$check["Name"];
        $address=$check["Address"];
        $address=$address.", ";
        $address=$address.$check["City"];
        $address=$address.", ";
        
        
        $address=$address.$pincode;
		$query1 = mysqli_query($conn,"SELECT * FROM pincode WHERE pinno= '$pincode'") or die(mysqli_error($conn));
	//	echo $category;
	$query = mysqli_query($conn,"SELECT Price FROM $category where Name='$pname'") or die(mysqli_error($conn));
		$row = mysqli_fetch_assoc($query);
	$price1=$row["Price"];
	$total=0;
        //$query1="insert into cart(username,Name,Brand,Price,Qty,Weight,fname) values('$user','$name','$brand',$price,$qty,'$weight','$fname')";
        //$result1 = $conn->query($query1);
                    $price=$price1*$qty;
		            $total=$total+$price;
			   
            
            
           
            
            if($pincode==388121)
		{
			//echo 'Free Home Delivery available on bill amount more than 200 rupees.';
			//$delivery="free";
			if($total>=200)
             {
             
             $total=$total+0;
             
             }
             else if($total<200)
             {
             
                 
             }
		}
		else if($row1 = mysqli_fetch_array($query1))
		{
		      //echo '!!!!!!   Home Delivery available on bill amount greater than 200 with 50 rupees charge.   !!!!!';
		      //$delivery=50;
		      if($total>=200)
             {
             
             $total=$total+50;
             
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
            
            //array_push($response,array("Name"=>$demo,"Price"=>"","Qty"=>" "));
        
        
        
		$query3 = mysqli_query($conn,"INSERT INTO orders(username,Category,Pname,Price,qty,Name,mobileno,Address,Order_id,payment,pincode) VALUES('$username','$category','$pname',$price,$qty,'$name','$mobileno','$address','$rndno','$payment','$pincode')");
       
       $query4 = mysqli_query($conn,"SELECT email_id FROM user WHERE username= '$username'"); //or die(mysqli_error($conn));
		//$email=$_POST['email'];
		$row = mysqli_fetch_assoc($query4);
       
		if($query3==TRUE)//mysqli_query($conn,$query)
		{
			echo 'Order Placed Successfully';
			$to_email = $row["email_id"];//$email;
$subject = 'About your order';
$message = "Bill Name: ".$name."\nOrder Id is ".$rndno."\nTotal Amount of Order is ".$total."\nThank you for shopping from Big Bazaar.";
$headers = "Your order is confirmed.";
mail($to_email,$subject,$message,$headers);
                $query7=mysqli_query($conn,"select Qty from $category where Name='$pname'");
			    $row7 = mysqli_fetch_assoc($query7);
			    $qty1=$row7["Qty"];
			    $qty1=$qty1-$qty;
			    $query6 = mysqli_query($conn,"update $category set Qty=$qty1 where Name='$pname'");
			    
		}else{ echo 'Sorry place it again.';}
        
?>