<?php
//header ("Location:update_item.php");
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
	
if(isset($_POST['submit'])){
    
	if(!empty($p_cat) || !empty($p_name) || !empty($p_brand)){
		if(!empty($p_mrp)){
			$sql = "UPDATE $p_cat set Price=$p_mrp where Name='$p_name' AND Brand='$p_brand'";
        $result = $conn->query($sql);
		
		}
		if(!empty($p_qty)){
			$sql = "UPDATE $p_cat set Qty=$p_qty where Name='$p_name' AND Brand='$p_brand'";
        $result = $conn->query($sql);
		
		}
		if(!empty($p_weight)){
			$sql = "UPDATE $p_cat set Weight=$p_weight where Name='$p_name' AND Brand='$p_brand'";
        $result = $conn->query($sql);
		
		}
		
	echo "<script type='text/javascript'>alert('Successfully Updated');window.location='update_item.php';</script>";
	}
	else{
		echo "<script type= 'text/javascript'>alert('Enter Mandatory Fields.');window.location='update_item.php';</script>";
		//include("update_item.php");
	}
  
}
?>