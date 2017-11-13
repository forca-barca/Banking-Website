<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><head>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<title>Admin: Modify Record</title>
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
		top: 36%;
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

<body>
<h1 align="center">Administration Page</h1>
    <?php
	$db=mysqli_connect('localhost','root','root','bankdb') or die(mysqli_error($db));
	$method=$_GET['action'];
	if($method=='edit')
	{
		$id=$_GET['id'];
		$query = 'SELECT * FROM register WHERE record_id='.$id.'';
		$result=mysqli_query($db,$query) or die(mysqli_error($db));
		$num=mysqli_num_rows($result);
		if($num==1)
		{
			while($row=mysqli_fetch_assoc($result))
			{
			echo '<form action="adminedit.php" method="post">';
			echo '<fieldset width=30%>';
			echo '<p>First Name:<input type="text" required class="text" id="fir" name="fname" value='.$row['first_name'].'></p>';
			echo '<p>Middle Name: <input type="text" class="text" required id="mid" name="mname" value='.$row['middle_name'].'></p>';
			echo '<p>Last Name: <input type="text" required class="text" name="lname" value='.$row['last_name'].'></p>';
			if($row['gender']=='male')
			{
			echo '<pre>Gender:         Male :<input type="radio"  name="gender" checked required value="male" > Female:<input type="radio"  name="gender" required value="female"></pre>';
			}
			else
			{
				echo '<pre>Gender:         Male :<input type="radio"  name="gender" required value="male" > Female:<input type="radio" checked name="gender" required value="female"></pre>';
			}
			echo '<div id="#add"><p>Address:</div><textarea required  name="addr">';
			echo  $row['address'];
			echo '</textarea></p>';
			echo '<p>Birth Date:	<input type="date" required class="text" id="date" name="bdate" value='.$row['bday'].'></p>';
			echo '<p>Mobile No:<input type="text" max="9999999999" required class="text" id="num" name="mob" value='.$row['mobile'].'></p>';
			echo '<p>Email: <input type="email" required class="text"id="email" name="email" value='.$row['email'].' ></p>';
			echo '<p>Password: <input type="password" required class="text" id="pass" name="pass" value='.$row['password'].'></p>';
			echo '<input type="hidden" name="id" value='.$row['record_id'].'>';
        	echo '<button id="Sign_Up">Update</button>';
			echo '</fieldset></form>';
			}
		}
	}
	else if($method=='add')
	{
		echo '<form action="adminadd.php" method="post">';
			echo '<fieldset width=30%>';
			echo '<p>First Name:<input type="text" required class="text" id="fir" name="fname" ></p>';
			echo '<p>Middle Name: <input type="text" class="text" required id="mid" name="mname" ></p>';
			echo '<p>Last Name: <input type="text" required class="text" name="lname" ></p>';
			echo '<pre>Gender:         Male :<input type="radio"  name="gender" required value="male" > Female:<input type="radio"  name="gender" required value="female"></pre>';
			echo '<div id="#add"><p>Address:</div><textarea required  name="addr">';
			echo '</textarea></p>';
			echo '<p>Birth Date:	<input type="date" required class="text" id="date" name="bdate" ></p>';
			echo '<p>Mobile No:<input type="text" max="9999999999" required class="text" id="num" name="mob" ></p>';
			echo '<p>Email: <input type="email" required class="text"id="email" name="email"></p>';
			echo '<p>Password: <input type="password" required class="text" id="pass" name="pass"></p>';
			echo '<p>Retype Password: <input type="password" required class="text" name="rpass"></p>';
        	echo '<button id="Sign_Up">Add</button>';
			echo '</fieldset></form>';
	}
	else if($method=='delete')
	{
		$id=$_GET['id'];
		$query = 'SELECT * FROM register WHERE record_id='.$id.'';
		$result=mysqli_query($db,$query) or die(mysqli_error($db));
		$num=mysqli_num_rows($result);
		if($num==1)
		{
			$query='DELETE FROM register WHERE record_id='.$id.'';
			mysqli_query($db,$query) or die(mysqli_error($db));
			header('location: admin.php');
		}
	}
	?>
   </body>
</html>