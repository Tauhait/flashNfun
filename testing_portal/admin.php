<?php
if(isset($_POST["submit"])){	
	extract($_POST);
	$link = mysqli_connect("flashnfun.info","flashfun","flashfun","flashNfun") or die("Could not connect database " .mysqli_error($link));
	$myadmin = mysqli_fetch_assoc(mysqli_query($link,"select username,password from admins"));
	$adminname = $myadmin["username"];
	$adminpass = $myadmin["password"];
	
	 if($username == $adminname && $password == $adminpass)
	 	header('Location:http://www.flashnfun.info/testing_portal/admin_profile.php');
	 else
	 	echo '<div class="error" style="position:absolute;left:60%;top:67%;color:red;font-family:verdana;">wrong username or password</div>';
	 	

}
?>

<html>
<head>
	<title>Admin Portal</title>
	<link rel="shortcut icon" href="flash.ico" />  
<style>

	body{
	background-image : url("back.jpg");
	}
	
	#name{
	position : absolute;
	left : 770px;
	top: 380px;
	}
	
	#login1{
	position : absolute;
	left : 760px;
	top : 440px;
	width : 400px;
	height : 140px;
	padding : 15px;
	border : 0.5px solid gray;
	background-color : white;
	border-radius : 5px;
	opacity: 0.3;
	}
	#login{
	position : absolute;
	left : 760px;
	top : 440px;
	width : 400px;
	height : 140px;
	padding : 15px;
	border : 0.5px solid gray;
	border-radius : 5px;
	}
	
	input[type = text], select {
	position : relative;
	width : 365px;
	padding : 10px 10px;
	margin : 5px;
	display : inline-block;
	border : 1px solid black;
	border-radius : 5px;
	border-sizing : border-box;
	background : transparent;
	}
	input[type = password], select {
	position : relative;
	width : 365px;
	padding : 10px 10px;
	margin : 5px;
	display : inline-block;
	border : 1px solid black;
	border-radius : 5px;
	border-sizing : border-box;
	background : transparent;
	}
	input[type=submit] {
	position : relative;
    width : 100px;
	height : 32px;
    padding : 5px 5px;
    margin : 8px 5px;
	border : 1px solid black;
    border-radius : 5px;
    cursor : pointer;
	text-align : left;
	font-color : black;
	background : transparent;
    }
	input[type=submit]:hover {
    background-color: #DCDCDC;
	}
	

</style>
</head>
<body>
<div id = "name">
	<h1>Admin Portal</h1>
</div>
<div id="login1">
</div>
<div id = "login">
	<form method="post" autocomplete="off">		
		<input type = "text" name = "username" placeholder = "username" autocomplete="off" readonly 
onfocus="this.removeAttribute('readonly');"/><br>
		<input type = "password" name = "password" placeholder = "password" autocomplete="off" readonly 
onfocus="this.removeAttribute('readonly');"/><br>
		<input type = "submit" name = "submit" value = "Login" />
	</form>
</div>
</body>
</html>














