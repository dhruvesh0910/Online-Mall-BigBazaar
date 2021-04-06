<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location: login.html");
}
?>
<html>
<head>
<title>Bill Generation</title>

<style>
div.i {
	border-radius: 25px;
    width: 400px;
    height: 170px;
    border: 5px solid black;
    background:rgba(0,0,0,0.5);

    padding: 25px;
    margin: 80px;
	margin-top: 40px;
	
}
button{
	width:120px;
	height:40px;
	text-align:center;
	text-shadow: 1px 1px darkgray;
	radius:50%;
	box-shadow: 2px 4px darkgray;

	
}
button:hover {
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
b1{
    font-size:36px;
    text-decoration:bold;
}

</style>
</head>

<body>



<center>
<div class="image"><a href="Adding item.html"><img src="bigbazaar.png" width="600" height="200"></a></div><br>
</center>
<ul class="topnav">
  <name class="d"><li><a href="adding.php">Add</a></li>
  
  <li><a href="update_item.php">Update</a></li>
  <li><a href="delete_item.php">Delete</a></li>
  <li><a href="order1.php">Orders</a></li>
  <li><a class="active" href="generatebill1.php">Generate Bill</a></li>
<li class="right"><a href="logout.php">Log Out</a></li>
  </name>
</ul>
<br>
<center><div class="i"><form action="generatebill.php" method="post"><br>
<c class="b">Enter Order Id : </c><br><input type="text" name="id" required/><br> 
<button><c class="a">submit</c></button>
</center></form>
<p id="print"></p



</body>
</html>