<?php
//session_start();
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		
		//$category=	$_POST['category'];
		//$category="biscuit";
		$pname=$_POST['pname'];
		$pincode=$_POST['pincode'];
		//$pname="Parle-G";
		//$user=$_POST['username'];
		//$qty=$_POST['qty'];
		//$qty=10;
		$total=0;
	//$category=	$_SESSION["category"];
	
	$query1 = mysqli_query($conn,"SELECT * FROM pincode WHERE pinno= '$pincode'") or die(mysqli_error($conn));
	/*	if($pincode==388121)
		{
			//echo 'Free Home Delivery available on bill amount more than 200 rupees.';
			$delivery="free";
		}
		else if($row = mysqli_fetch_array($query1))
		{
		      //echo '!!!!!!   Home Delivery available on bill amount greater than 200 with 50 rupees charge.   !!!!!';
		      $delivery=50;
		}
		else
		{
		    //echo 'Sorry, No Home Delivery option for your location.';
		    $delivery="Not Available.";
		}*/
	
	//	echo $category;
	//	$query = mysqli_query($conn,"SELECT * FROM $category") or die(mysqli_error($conn));
		$query = "SELECT Name,Price,Qty FROM cart where username = '$pname'";//$category";
		$result = $conn->query($query);
		
	
        //$query1="insert into cart(username,Name,Brand,Price,Qty,Weight,fname) values('$user','$name','$brand',$price,$qty,'$weight','$fname')";
        //$result1 = $conn->query($query1);
        $response=array();
        if ($result -> num_rows > 0) {
        //if($result > 0){
        // output data of each row
            while($row = mysqli_fetch_array($result)) {
                //echo $row["Name"]."<br>";
			    //echo $row["Brand"]."<br>";
			    //echo $row["Price"]."<br>";
			    //echo $row["Qty"]."<br>";
			    //echo $row["Weight"]."<br>";
			    	$name=$row[0];
		            $price=$row[1];
		            $qty=$row[2];
		            //$price=$price*$qty;
		            $total=$total+$price;
			    array_push($response,array("Name"=>$name,"Price"=>$price,"Qty"=>$qty));
            }
             array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
             
             if($pincode==388121)
		{
			//echo 'Free Home Delivery available on bill amount more than 200 rupees.';
			//$delivery="free";
			if($total>=200)
             {
             array_push($response,array("Name"=>"Shipping Charge","Price"=>"0","Qty"=>" "));
             $total=$total+0;
             array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
             }
             else if($total<200)
             {
                 array_push($response,array("Name"=>"Home Delivery Not Available","Price"=>" ","Qty"=>" "));
                 array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
             }
		}
		else if($row1 = mysqli_fetch_array($query1))
		{
		      //echo '!!!!!!   Home Delivery available on bill amount greater than 200 with 50 rupees charge.   !!!!!';
		      //$delivery=50;
		      if($total>=200)
             {
             array_push($response,array("Name"=>"Shipping Charge","Price"=>"50","Qty"=>" "));
             $total=$total+50;
             array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
             }
             else if($total<200)
             {
                 array_push($response,array("Name"=>"Home Delivery Not Available","Price"=>" ","Qty"=>" "));
                 array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
             }
		}
		else
		{
		    //echo 'Sorry, No Home Delivery option for your location.';
		    //$delivery="Not Available.";
		    array_push($response,array("Name"=>"Home Delivery Not Available for your location.","Price"=>" ","Qty"=>" "));
                 array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
		    
		}
	
             
           /* if($delivery==50)
            {
             if($total>200)
             {
             array_push($response,array("Name"=>"Shipping Charge","Price"=>"50","Qty"=>" "));
             $total=$total+50;
             array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
             }
             else if($total<=200)
             {
                 array_push($response,array("Name"=>"Home Delivery Not Available","Price"=>" ","Qty"=>" "));
                 array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
             }
            }
            else if($delivery=="free")
            {
                if($total>200)
             {
             array_push($response,array("Name"=>"Shipping Charge","Price"=>"50","Qty"=>" "));
             $total=$total+50;
             array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
             }
             else if($total<=200)
             {
                 array_push($response,array("Name"=>"Home Delivery Not Available","Price"=>" ","Qty"=>" "));
                 array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
             }
            }
            else
             {
                  array_push($response,array("Name"=>"Home Delivery Not Available for your location.","Price"=>" ","Qty"=>" "));
                 array_push($response,array("Name"=>" ","Price"=>" ","Qty"=>" "));
             }*/
             
                array_push($response,array("Name"=>"Total Amount","Price"=>$total,"Qty"=>" "));
             
        } else {
    //echo "0 results";
     array_push($response,array("Name"=>"Total Amount","Price"=>"0","Qty"=>" "));
}
echo json_encode(array("response"=>$response));
$conn->close();

		
		/*if($result==TRUE)
		{
		    echo 'Successfully Added.';
		}else{ 
		    echo 'Sorry, Not Added';
		}*/

?>