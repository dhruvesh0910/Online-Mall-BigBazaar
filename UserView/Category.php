<?php
//session_start();
//include 'setter.php';
$conn=mysqli_connect('localhost','id4181948_dhruveshpatel','taksh1997');
$db=mysqli_select_db($conn,'id4181948_food');
		
	$category=$_POST['name'];
	//$category=$_SESSION['category'];
	//	echo $category;
	//	$query = mysqli_query($conn,"SELECT * FROM $category") or die(mysqli_error($conn));
		$query = "SELECT Name,Brand,Price,Qty,Weight,fname FROM $category";//'$_POST[name]'";//Snacks";//$category";
	//	$result=mysqli_query($conn,$query);
		$result = $conn->query($query);
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
			    array_push($response,array("Name"=>$row[0],"Brand"=>$row[1],"Price"=>$row[2],"Qty"=>$row[3],"Weigth"=>$row[4],"Image"=>$row[5]));
            }
        } else {
    echo "0 results";
}
echo json_encode(array("response"=>$response));
$conn->close();
		
		/*if($row = mysqli_fetch_assoc($result))
		{
			while($row = mysqli_fetch_assoc($result))
			{
			    echo $row["Name"];
			    echo $row["Brand"];
			    echo $row["Price"];
			    echo $row["Qty"];
			    echo $row["Weight"];
			}
		}else{ }*/

?>