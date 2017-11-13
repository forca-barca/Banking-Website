<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
	<style type="text/css">
	body{
	background-image: url(Capture41.jpg), url(logo-back.jpg);
	background-repeat:no-repeat, repeat;
	background-position:center, left;
	font-family: 'Arvo',serif;
	margin: 0;
	border: 0;
	}
	h1{
		padding: 10px 0 0 0;
		color:#fff;
		text-emphasis:accent;
		background-color:#36c452;
		height: 5%;
		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
	}
	fieldset{
		position:absolute;
		left:35%;
		right:35%;
		border: none;
		background-color:rgba(204,255,204,0.5);
	}
	.text{
		background-color:#FFFFFF;
		color:#003;
		text-align:center;
		height: 30px;
		font-family: 'Arvo',serif;
	}
	form input[type="text"]{
			position:relative;
		margin-left: 50px;
		}
		
	.text:focus{
		background-color: #FFFF99;
		color: #000;
		text-align: left;
		box-shadow: 1px 1px 2px #CF6, 0 0  10px #CCF,0 0 10px #C9F;
		font-family: 'Arvo',serif;
		font-size:18px;
	}
	#address p{
		position:relative;
		bottom: 55%;
		margin-top: 150px;
	}
	#mid{
		position:relative;
		right: 6.5%;
	}
	#fir{
		position:relative;
		right: 0.8%;
	}
	#date{
		position:relative;
		left: 10%;
		margin-top: 12%;
	}
	#num{
		position:relative;
		left: 1.5%;
	}
	#pass{
		position:relative;
		left: 12%;
	}
	#email{
		position:relative;
		left: 20%;
		width:45%;
	}
	form fieldset p,pre{
	font-family:'Arvo',sans-serif;
	color:#444;
	position:relative;
	left: 18%;
	font-size:25px;
	text-shadow: 1px 1px 2px #FF6, 0 0 5px #6F6, 0 0 5px #3C0;
	}
	textarea{
		width: 250px;
		height: 100px;
		font-size: 18px;
		resize:none;
		position: absolute;
		left: 52.5%;
		margin-top: 2%;
		top: 35%;
	}
	textarea:focus{
		background-color: #FFFF99;
		color: #000;
		text-align: left;
		box-shadow: 1px 1px 2px #CF6, 0 0  10px #CCF,0 0 10px #C9F;
		font-family: 'Arvo',serif;
		font-size:18px;
	}
	#Sign_Up{
		position: relative;
	display:block;
	width: 150px;
		
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
	left: 40%;
	padding: 5px 20px 5px 20px;
	text-align:center;
	transition-duration:1s;
	}
	.foot{
	background-color:#333;
	color: #999999;
	width: 100%;
	height: 25%;
	position:absolute;
	top: 92%;
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
.error{
	width: 100%;
	height:35px;
	position:relative;
	top: 76%;
	font-size:30px;
	text-align:center;
	color:#333;
	}
	</style>
 </head>
 <?php
 $db = mysqli_connect('localhost','root','root') or die("connection error");
 $error="";
 mysqli_select_db($db,'bankdb') or die(mysqli_error($db));
 
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
	 $fname=swipe($_POST["fname"]);
	 $mname=swipe($_POST["mname"]);
	 $lname=swipe($_POST["lname"]);
	 $gender=swipe($_POST["gender"]);
	 $addr=swipe($_POST["addr"]);
	 $bdate=swipe($_POST["bdate"]);
	 $mob=swipe($_POST["mob"]);
	 $email=swipe($_POST["email"]);
	 $pass=swipe($_POST["pass"]);
	 $rpass=swipe($_POST["rpass"]);

	 $query="SELECT
	         email  
	 		 FROM 
			 register
			 WHERE 
			 email ='$email'";
	 $result = mysqli_query($db, $query) or die(mysqli_error($db));
	 $num = mysqli_num_rows($result);
	 if($num==0)
	 {
		 list($year,$month,$day) = explode('-',$bdate);
		 if(strlen($fname)>20)
		 $error="firstname must be less than 20 characters";
		 else if(strlen($mname)>20)
		 $error="middlename must be less than 20 characters";
		 else if(strlen($lname)>20)
		 $error="lastname must be less than 20 characters";	 
		 else if(strlen($addr)>70)
		 $error="address must be less than 70 characters";
		 else if($year<1960 || $year>2017)
		 $error = "please enter a year between 1960 and 2017";
		 else if(strlen($mob)!=10 && !ctype_digit($mob))
		 $error = "enter a valid mobile number of 10 digits";
		 else if(strlen($email) > 40)
		 $error = "email address must be less than 40 characters";
		 else if(strlen($pass)<6 || strlen($pass)>20 || $pass=="")
		 $error = "Password must be between 6 to 20 characters";
		 else if($pass!=$rpass)
		 $error = "Please enter same password in both fields";
		 else
		 {
		 $query = "INSERT INTO register(first_name,middle_name,last_name,gender,address,bday,mobile,email,password) VALUES ('$fname','$mname','$lname','$gender','$addr','$bdate','$mob','$email','$pass')";
		 mysqli_query($db,$query) or die(mysqli_error($db));
		 $error = 'account created successfully';
		 }
		 
	 }
	 else
	 {
		 $error = "The email that u entered already exists";
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
  <h1 align="center">Sign Up on the new national bank </h1>
<form action="sign_up.php" method="post">
	<fieldset width=30%>
		<p>	First Name: 		
	  <input type="text" required class="text" id="fir" name="fname"></p>
		<p>Middle Name: <input type="text" class="text" required id="mid" name="mname"></p>
		<p>Last Name: <input type="text" required class="text" name="lname"></p>
		<pre>Gender:         Male :<input type="radio" selected="selected" name="gender" required value="male" > Female:<input type="radio"  name="gender" required value="female"></pre>
		<div id="add"><p>Address:</div><textarea required name="addr"></textarea></p>
		<p>Birth Date:
  			<input type="date" required class="text" id="date" name="bdate"></p>
		<p>Mobile No:<input type="text" max="9999999999" required class="text" id="num" name="mob"></p>
		<p>Email: <input type="email" required class="text"id="email" name="email"></p>
        <p>Password: <input type="password" required class="text" id="pass" name="pass"></p>
        <p>Retype Password: <input type="password" required class="text" name="rpass"></p>
		<button id="Sign_Up">Sign Up</button>
	</fieldset>
</form>
</div>
<p class="error"><?php echo $error;?></p>
<footer class="foot">
<div class="copy">
<pre>National Bank</pre>
<p>© 2016 All rights Reserved</p>
</div>
<div class="cont">
<p>Our Locations</p>
<div class="prequal">
<pre style="text-shadow: none; color:#bbb; font-size:20px">2304, Sardar Marg, East Delhi-200452;</pre>
<pre style="text-shadow: none; color:#bbb; font-size:20px">12/32, Modern Plaza, Jayanagar, Bangalore-300132;</pre>
</div> 
</div>
<div class="quick">
<ul class="quickly">
<p style="font-size:28px; color: #fff">Quick Links</p>
<li><a href="welcome.html">Home</a></li>
<li><a href="about_us.html">About Us</a></li>
<li><a href="faq.html">FAQs</a></li>
<li><a href="Contact us.html">Contact Us</a></li>
</ul>
</div>
</footer>
</body>
</html>