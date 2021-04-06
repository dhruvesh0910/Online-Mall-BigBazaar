<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location: login.html");
}
?>
<html>
<head>
<title>Update</title>
<style>
div.i{
border-radius: 25px;
    width: 400px;
    height: 700px;
    border: 5px solid black;
    background:rgba(0,0,0,0.5);

    padding: 25px;
    margin: 80px;
  margin-top: 40px;
}
input[type=submit]{
	width:120px;
	height:40px;
	text-align:center;
	text-shadow: 1px 1px darkgray;
	radius:50%;
	box-shadow: 2px 4px darkgray;

	
}
input[type=submit]:hover {
    border: 2px solid blue;
}

input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: 150px;
    border: 3px solid #ccc;
    
    transition: 0.5s;
    outline: none;
	
}

input[type=text]:focus {
    border: 3px solid #555;
	border-radius: 4px;

}
input[type=checkbox] {
    width: 5%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: 150px;
    border: 3px solid #ccc;
    
    transition: 0.5s;
    outline: none;
	
}

input[type=checkbox]:focus {
    border: 3px solid #555;
	border-radius: 4px;

}


select{
	 width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: 150px;
    border: 3px solid #ccc;
    
    transition: 0.5s;
    outline: none;
}
select:focus {
    border: 3px solid #555;
	border-radius: 4px;

}
name.d{
font-family:Arial;
font-size:24px;
font-style:Bold;
}
div.image {
    list-style-type: none;
    //margin: 0;
    //padding: 0;
    overflow: hidden;
    background-color: darkgray;
	opacity:0.8;
}
ul.topnav {
    list-style-type: none;
    //margin: 0;
    //padding: 0;
    overflow: hidden;
    background-color: #FF6D00;
	opacity:0.8;
}

ul.topnav li {float: left;}

ul.topnav li a {
    display: block;
    color: #1A237E;
    text-align: center;
    padding: 12px 30px;
    text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: yellow;}
ul.topnav li a.active {background-color: green;}
ul.topnav li.right {float: right;}

img:hover{
padding: 10px;
transition: transform .2s;
margin: auto 0;
}
c.a{
font-size:20px;
margin-top:80px;
color: blue;

}
c.b{
font-size:24px;
margin-top:80px;
color: black;
}
b{
	box-shadow: 3px 5px black;
}

</style>

</head>

<body>
  <script type="text/javascript">
        function OnChangeCheckbox1 (checkbox) {
            if (checkbox.checked) {
               	document.getElementById('pmrp').style.visibility='visible';
            }
            else {
                document.getElementById('pmrp').style.visibility='hidden';
                 document.getElementById('pmrp').value='';            
               }
		}
		function OnChangeCheckbox2 (checkbox) {
            if (checkbox.checked) {
               	document.getElementById('pqty').style.visibility='visible';
            }
            else {
                document.getElementById('pqty').style.visibility='hidden';
				document.getElementById('pqty').value='';            
            }
		}
		 function OnChangeCheckbox3 (checkbox) {
            if (checkbox.checked) {
               	document.getElementById('pweight').style.visibility='visible';
            }
            else {
                document.getElementById('pweight').style.visibility='hidden';
				document.getElementById('pweight').value='';            
            }
		}
  </script>


<center>
<div class="image"><a href="Adding item.html"><img src="bigbazaar.png" width="600" height="200"></a></div><br>
</center>
<ul class="topnav">
  <name class="d"><li><a href="adding.php">Add</a></li>
  
  <li><a class="active" href="update_item.php">Update</a></li>
  <li><a href="delete_item.php">Delete</a></li>
  <li><a href="order1.php">Orders</a></li>
  <li><a href="generatebill1.php">Generate Bill</a></li>
  <li class="right"><a href="logout.php">Log Out</a></li>
  </name>
</ul>
<br>
<center><div class="i"><form action="update.php" method="POST" enctype="multipart/form-data"><br>
<c class="b">Enter Category: *</c><br><input type="text" name="category" required/><br> <br>
<c class="b">Product Name: *</c><br><input type="text" name="pname" required/><br><br>
<c class="b">Enter Brand : *</c><br><input type="text" name="pbrand" required/><br> <br>
Select to Modify:<br><br><input type="checkbox" name="c_price" onclick="OnChangeCheckbox1 (this)">Price</input>
<br><input type="text" style="visibility:hidden" id="pmrp" name="pmrp" /><br>
<input type="checkbox" name="c_qty" onclick="OnChangeCheckbox2 (this)">QTY</input>
<br><input type="text" style="visibility:hidden" id="pqty" name="pqty" /><br>
<input type="checkbox" name="c_weight" onclick="OnChangeCheckbox3 (this)">Weight</input>
<br><input type="text" style="visibility:hidden" id="pweight" name="pweight" /><br>
<!--
<c class="b">Enter Price : </c><br><input type="text" name="pmrp" /><br> <br>
<c class="b">Product QTY: </c><br><input type="text" name="pqty" /><br><br>
 
<c class="b">Product weight: </c><br><input type="text" name="pweight" /><br><br>
 
<c class="b">Product Image: </c><br><input type="file" name="myfile" value="Upload"/><br><br>
-->
<input type="submit" name="submit" value="Update"/>
</form></div></center>
<p id="print"></p>



</body>
</html>