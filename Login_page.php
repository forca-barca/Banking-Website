<html>
	<head>
		<title> Website login page</title>
		<style type="text/css">
		h1{
		padding: 10px 0 25px 5px;
		color:#fff;
		background-color:#36c452;
		height: 5%;
		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
	}
	
	.text1{
	height: 50px;
	width: 280px;
	margin: 10px;
	font-family: 'Arvo',sans-serif;
	background-color: transparent;
	color: #333;
	font-size: 18px;
	font-style: italic;
	font-weight: bold;
	text-decoration: blink;
		}
		.text1:focus{
		box-shadow: 1px 1px 2px #CF6, 0 0  10px #CCF,0 0 10px #C9F;
		}
		.text1::-webkit-input-placeholder {
color: #36b452;
}
fieldset{
		position:absolute;
		left:40%;
		right:5%;
		width: 300px;
		height:auto;
		border:none;
		background-color:rgba(255,204,102,0.5);
	}
			body{
	background-image: url(capture41.jpg);
	background-size: cover;
	font-family: 'Arvo',sans-serif;
	font-size: 20px;
	font-style: italic;
	text-align: center;
	margin: 0px;
	border: 0;
	background-size:cover;
	background-position: 5px 5px;
}
#Login{
	display:inline;
	position:relative;
	top: 26%;
	right: 50%;
	width: 137px;	
	height: 50px;
	background-color:#36b452;
	color: #ffffff;
	border-color: #36b452;
	border-radius: 5px;
	border-width: 1.5px;
	border-style: solid;
	font-family: 'Arvo',sans-serif;
	font-size: 22px;
	cursor: pointer;
	margin-top: 25px;
	padding: 5px 20px 5px 20px;
	text-align:center;
	}
	#reset{
	display:inline;
	position:relative;
	left: 50%;
	width: 137px;	
	height: 50px;
	background-color:#36b452;
	color: #ffffff;
	border-color: #36b452;
	border-radius: 5px;
	border-width: 1.5px;
	border-style: solid;
	font-family: 'Arvo',sans-serif;
	font-size: 22px;
	cursor: pointer;
	margin-top: 25px;
	padding: 5px 20px 5px 20px;
	text-align:center;
	}
.foot{
	background-color:#333;
	color: #999999;
	width: 100%;
	height: 25%;
	position:absolute;
	top: 76%;
	text-shadow: none;
}
.copy pre{
	color: #fff;
	font-size:36px;
	font-family:BlackChancery;
	position:absolute;
	left: 10%;
	text-shadow: none;
}
.copy p{
	font-size: 24px;
	position: absolute;
	top: 32%;
	left: 10%;
	word-wrap:normal;
	text-shadow: none;
}
.cont{
	font-size: 19px;
	position: absolute;
	left: 35%;
	text-shadow: none;
}
.cont p{
	font-size: 24px;
	color: #fff;
	left: 34%;
	position:relative;
	text-shadow: none;
}
.quick{
	position:absolute;
	right: 13%;
	font-size:19px;
	text-shadow: none;
}
.quickly li{
	list-style-type:none;
}
.quickly li a{
	text-decoration:none;
	color: #999;
}
.quickly li a:hover{
	color: #0F3;
}
h3{
	color:#FFF;
}
#forgot{
	text-decoration:none;
	font-size:18px;
	color: #fff;
	font-family: 'Arvo',sans-serif;
	cursor: pointer;
	position: absolute;
	top: 56%;
	left: 30%;
	text-wrap:none;
	display:inline;
}
#forgot:hover{
	color: #36b452;
}
.error{
	width: 100%;
	height:35px;
	position:relative;
	top: 56%;
	font-size:30px;
	text-align:center;
	color:#333;
	}
}
		</style>
	</head>
    <?php
	session_start();
	$_SESSION['count']=2;
    $db = mysqli_connect('localhost','root','root') or die("connection error");
 	$error="";
	$usrname=null;
	$pass=null;
	$flag=0;
 	mysqli_select_db($db,'bankdb') or die(mysqli_error($db));
	
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
	$usrname=swipe($_POST["usrname"]);
	$pass=swipe($_POST["pass"]);
	$query= 'SELECT email,password FROM register WHERE record_id=6';
	$record=mysqli_query($db,$query) or die(mysqli_error($db));
	while($row=mysqli_fetch_assoc($record))
	{
		$ausrname=$row['email'];
		$apassword=$row['password'];
	}
	if($usrname==$ausrname && $pass==$apassword)
{	
header('location: admin.php');	
}
else
{
$query = "SELECT * FROM register WHERE email='$usrname' AND password='$pass'";
	$result = mysqli_query($db,$query) or die(mysqli_error($db));
	$num = mysqli_num_rows($result);
	if($num==1 && ($usrname!="" || $pass!=""))
	{
		$error = "you have logged in successfully";
		$_SESSION['usrname']=$usrname;
		header('location: customer_main.php');
		
	}
	else
	{
		$error = "Invalid username or password";
	}
	}
}
	function swipe($inpt)
	{
		$inpt=trim($inpt);
		$inpt=stripslashes($inpt);
		$inpt=htmlspecialchars($inpt);
		return $inpt;
	}
	
    ?>
	<body>
    	<div>
		<h1 align="center">Login to the new national bank </h1>
		<form action="Login_page.php" method="POST">
			<fieldset>
				
			  <input type="email" name="usrname" class="text1" required value="Username"  onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' ">
				<input type="password"  name="pass" class="text1" required  value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "/>
			  <button id="reset" type="reset">Reset</button>
		      <button id="Login" type="submit">Login</button>
		      <p><a href="#" id="forgot">Forgot Password?</a></p>
			</fieldset>
		</form>
        </div>
<p class="error"><?php echo $error;?></p>

<footer class="foot">
<div class="copy">
<pre>National Bank</pre>
<p align="justify">© 2016 All rights Reserved</p>
</div>
<div class="cont">
<h3>Our Locations</h3>
<div class="prequal">
<pre style="text-shadow: none; color:#bbb; font-size:20px">2304, Sardar Marg, East Delhi-200452;</pre>
<pre style="text-shadow: none; color:#bbb; font-size:20px">12/32, Modern Plaza, Jayanagar, Bangalore-300132;</pre>
</div> 
</div>
<div class="quick">
<ul class="quickly">
<h3 style="font-size:28px; color: #fff" >Quick Links</h3>
<div class="quick1">
<li><a href="welcome.html">Home</a></li>
<li><a href="about_us.html">About Us</a></li>
<li><a href="faq.html">FAQs</a></li>
<li><a href="Contact us.html">Contact Us</a></li>
</div>
</ul>
</div>
</footer>
	</body>
</html>