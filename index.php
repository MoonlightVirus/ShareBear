<?php
session_start();
if (isset($_SESSION['bear']))
{
	?>
	<script>
	window.location.href='home.php';
	</script>
	<?php
}
?>
<!DOCTYPE html>
<head>
<title>ShareBear || Login</title>

<style>
*{
	padding:0px;
	margin:0px;
	box-sizing:border-box;
	font-family: Roboto;
}
body{
	background-image:url('bg.png');
	
}
.body{
	height:600px;
	width:1500px;
	background-color:rgba(192,137,105,0.8);
	border:5px solid rgba(240,210,105,0.8);
	position:absolute;
	z-index:-99;
	top:20%;
	left:12%;
}
#sharebear{
	position:absolute;
	left:27%;
	top:14%;
	color:yellow;
	font-weight:700;
	font-family: Roboto;
	font-size:90px;
}
#logo{
	height:300px;
	width:300px;
	position:absolute;
	top:4.9%;
	left:43%;
}
input[type=text]{
	height:45px;
	border:0px solid rgb(150,150,150);
	outline:none;
	width:600px;
	border-radius:20px;
	border:0px;
	outline:none;
	position:absolute;
	left:35%;
	top:36%;
	text-align:center;
}
input[type=password]{
	height:45px;
	padding:5px;
	border:0px solid rgb(150,150,150);
	outline:none;
	width:600px;
	border-radius:20px;
	border:0px;
	outline:none;
	position:absolute;
	left:35%;
	top:45%;
	text-align:center;
}
::placeholder{
	text-align:center;
	font-family:century gothic;
}
input[type=submit]{
	background-color:rgb(255,222,89);
	border-radius:20px;
	color:black;
	font-family:century gothic;
	font-size:25px;
	width:300px;
	height:50px;
	position:absolute;
	left:43%;
	top:55%;
	border:0px;
}
input[type=submit]:hover{
	background-color:rgb(220,181,0);
}
#slogo{
	height:40px;
	width:40px;
	position:absolute;
	z-index:1;
	top:55.5%;
	left:44%;
	pointer-events:none;
}
#a1{
	color:white;
	font-size:14px;
	font-family:arial;
	font-weight:700;
	position:absolute;
	left:45.2%;
	top:61.5%;
}
#a2{
	color:white;
	font-size:14px;
	font-family:arial;
	font-weight:700;
	position:absolute;
	left:46.8%;
	top:64%;
</style>

</head>
<body>

<div class="top">
	<p id="sharebear">SHARE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BEAR</p>
	<img id="logo" src="bear.png"/>
</div>

<div class="body">
</div>

<div class="main">

<form action="login.php" method="post">
<input type="text" name="username" placeholder="Username" autocomplete="off" required/>
<input type="password" name="password" placeholder="Password" autocomplete="off" required/>
<br>
<input type="submit" value="Log in"/>
</form>
<img id="slogo" src="submit.png"/>
<a id='a1' href="Sbsignup.php">Don't have a bear yet? Click here!</a>
<br>
<a id='a2' href="resetps.php">Forgot your password?</a>

</div>
</body>
</html>