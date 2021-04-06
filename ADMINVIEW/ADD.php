<?php

//header("Location:adding.php");
//$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
//$db=mysqli_select_db($conn,'id4181948_food');
$servername = "localhost";
$username = "id4181948_dhruveshpatel";
$password = "taksh1997";
$dbname = "id4181948_food";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


	$p_cat = $_POST['category'];
	$p_name = $_POST['pname'];
	$p_brand = $_POST['pbrand'];
	$p_mrp = $_POST['pmrp'];
	$p_qty = $_POST['pqty'];
	$p_weight = $_POST['pweight'];
	$name = $_FILES['myfile']['name'];
    $type = $_FILES['myfile']['type'];
    $tempname = $_FILES['myfile']['tmp_name'];

if(isset($_POST['submit'])){
    
 
  
    if (move_uploaded_file($tempname, "./images/" . $name)) {
		

        
        $name = './images/' . $name;
        $sql = "INSERT INTO $p_cat(Name,Brand,Price,Qty,Weight,fname,ftype,fdata) VALUES ('$p_name', '$p_brand',$p_mrp, $p_qty,'$p_weight', '$name','$type', '$tempname')";
        $result = $conn->query($sql);
		
		echo "<script type='text/javascript'>alert('Successfull upload');window.location='adding.php';</script>";
        //echo "Successfull upload";
		//include("adding.php");
        		
		
    } else {
        	echo "<script type='text/javascript'>alert('Not upload');window.location='adding.php';</script>";
        //echo "not upload";
        //include("adding.php");
    }
	
}
?>