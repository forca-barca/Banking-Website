<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
session_start();
$usrname1=$_SESSION['usrname'];
$_SESSION['flag'] = 0;
setcookie('count',2,250);
$db = mysqli_connect('localhost','root','root','bankdb') or die("connection error");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<title>Welcome<?php
$query="SELECT first_name,last_name FROM register WHERE email='$usrname1'";
$result=mysqli_query($db,$query) or die(mysqli_error($db));
$num = mysqli_num_rows($result);

if($num==1)
{
	while($row=mysqli_fetch_assoc($result))
	{	
		echo "  ";
		echo $row['first_name'];
		echo "  ";
		echo $row['last_name'];
	}
}
?></title>
<style type="text/css">
body{
	background-image: url(Capture41.jpg), url(logo-back.jpg);
	background-repeat:no-repeat, repeat;
	background-position:450px 250px;
	font-family: 'Arvo',serif;
	/*background-image: url(capture41.jpg);
	background-size: cover;
	font-family: 'Arvo',sans-serif;*/
	font-size: 20px;
	font-style: italic;
	text-align: center;
	margin: 0px;
	border: 0;
	/*background-size:cover;
	background-position: 5px 5px;*/
}
#left{
	float:left;
	position:absolute;
	left: 0%;
	top: 9.1%;
	width: 50%;
}
#right{
	float:right;
	position:absolute;
	right:0%;
	width: 50%;
	top: 9.1%;
}
#select{
	float:right;
	position:absolute;
	right:0%;
	background-color:rgba(204,255,204,0.5);
	top: 19.2%;
	width: 50%;
	border: thin solid black;
}
fieldset{
	border: thin solid black;
}
h1{
		padding: 10px;
		color:#fff;
		position:absolute;
		width: 100%;
		top: -3%;
		text-emphasis:accent;
		background-color:#36c452;
		height: 5%;
		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
	}
	h2{
		padding: 1px;
		color: #fff;
		top: 9.5%;
		z-index: 40;
		left: 48.5%;
		position:absolute;
		background-color:#039;
		text-emphasis:accent;
		height: 1%;
		text-shadow: 1px 1px 2px black, 0 0 20px #FF0, 0 0 10px #0C0;
		
	}
	h3{
		padding: 10px;
		color: #fff;
		background-color:#039;
		text-emphasis:accent;
		height: 5%;
		text-shadow: 1px 1px 2px black, 0 0 20px #FF0, 0 0 10px #0C0;
	}
	.text{
		background-color:#FFFFFF;
		color:#003;
		text-align:center;
		height: 30px;
		font-family: 'Arvo',serif;
	}
		
	.text:focus{
		background-color: #FFFF99;
		color: #000;
		text-align: left;
		box-shadow: 1px 1px 2px #CF6, 0 0  10px #CCF,0 0 10px #C9F;
		font-family: 'Arvo',serif;
		font-size:18px;
	}
	#add p{
		position:relative;
		bottom: 50%;
		left: -14%;
	}
	#mid{
		position:relative;
		left: -0.3%;
	}
	#acnt{
		position:relative;
		left: 0.8%;
	}
	#lname{
		position:relative;
		left: 1.2%;
	}
	#fir{
		position:relative;
		left: 1%;
	}
	#pan{
		position:relative;
		left: 3%;
	}
	#occ{
		position:relative;
		left: 1.7%;
	}
	#date{
		position:relative;
		left: -1.6%;
		margin-top: 8%;
	}
	#num{
		position:relative;
		left: 4.1%;
	}
	form input[type="text"]{
			position:relative;
		margin-left: 50px;
		}
	form input[type="date"]{
			position:relative;
		margin-left: 90px;
		}
	form fieldset p,pre{
	font-family:'Arvo',sans-serif;
	color:#444;
	height: auto;
	position:relative;
	left: 1%;
	font-size:25px;
	text-shadow: 1px 1px 2px #FF6, 0 0 5px #6F6, 0 0 5px #3C0;
	}
	.main textarea{
		width: 250px;
		height: 100px;
		font-size: 18px;
		resize:none;
		position: absolute;
		left: 53%;
		margin-top:4%;
		top: 45%;
	}
	.main textarea:focus{
		background-color: #FFFF99;
		color: #000;
		text-align: left;
		box-shadow: 1px 1px 2px #CF6, 0 0  10px #CCF,0 0 10px #C9F;
		font-family: 'Arvo',serif;
		font-size:18px;
	}
	.form1{
		position:absolute;
		background-color:rgba(204,255,204,0.5);
		width: 100%;
	}
	form input[type="radio"]{
		height: 19px;
		width: 19px;
	}
	#logout{
		position: relative;
	width: 350px;
	top: 40%;
	float:right;
	height: 50px;
	background-color: #36c452;
	color: #ffffff;
	border-color: #36c452;
	border-radius: 5px;
	border-width: 1.5px;
	border-style: solid;
	font-family: 'Arvo',sans-serif;
	font-size: 22px;
	cursor: pointer;
	padding: 5px;
	}
	.form0{
	position: relative;
	width: 350px;
	height: 50px;
	background-color: #36b452;
	color: #ffffff;
	border-color: #36b452;
	border-radius: 5px;
	border-width: 1.5px;
	border-style: solid;
	font-family: 'Arvo',sans-serif;
	font-size: 22px;
	cursor: pointer;
	padding: 5px;
	/* [disabled]text-align:center; */
	}
	.main1 textarea{
		width: 250px;
		height: 100px;
		font-size: 18px;
		resize:none;
		position: absolute;
		left: 53%;
		margin-top:4%;
		top: 28%;
	}
	.main1 textarea:focus{
		background-color: #FFFF99;
		color: #000;
		text-align: left;
		box-shadow: 1px 1px 2px #CF6, 0 0  10px #CCF,0 0 10px #C9F;
		font-family: 'Arvo',serif;
		font-size:18px;
	}
	#textar{
		width: 250px;
		height: 100px;
		font-size: 18px;
		resize:none;
		position: absolute;
		left: 61%;
		margin-top:4%;
		top: 67%;
	}
	#textar:focus{
		background-color: #FFFF99;
		color: #000;
		text-align: left;
		box-shadow: 1px 1px 2px #CF6, 0 0  10px #CCF,0 0 10px #C9F;
		font-family: 'Arvo',serif;
		font-size:18px;
	}
	a{
		text-decoration:none;
		color: #333;
	}
	.form2{
		background-color:rgba(204,255,204,0.5);
	}
	a:hover{
		color: #0F0;
	}
</style>
</head>
<body>
<div id='header'>
<h1>Welcome <?php
$query="SELECT * FROM register WHERE email='$usrname1'";
$result=mysqli_query($db,$query) or die(mysqli_error($db));
$num = mysqli_num_rows($result);

if($num==1)
{
	while($row=mysqli_fetch_assoc($result))
	{	if($row['gender']=='male')
			echo 'Mr. ';
		 else
			echo 'Ms. ';	
			$fname=$row['first_name'];
			$mname=$row['middle_name'];
			$lname=$row['last_name'];
			$gender=$row['gender'];
			$mob=$row['mobile'];
			$add=$row['address'];
			$bdate=$row['bday'];
			$regno=$row['record_id'];
		echo $row['first_name'];
		echo "  ";
		echo $row['last_name'];
	}
}
?></h1>
<button name="signout" type="submit" id="logout">SIGN OUT</button>
<script type="text/javascript">
    document.getElementById("logout").onclick = function () {
        location.href = "Login_page.php";
    };
</script>
</div>
<table>
<tr>
<td>
<div id='left'>
<h3 align="center" style="position:relative; width:100%  top: 85%;">Create a New Account</h3>
<form action="customer_main_php.php"  class="form2"method="get">
<fieldset id="account">
<pre>Select Account type:    Single account:<input type="radio" checked name="account_type" class="form0" required="required" value="single" /> Joint Account:<input type="radio" selected="selected" name="account_type" class="form0" required="required" value="joint" /> </pre>
<input type="submit" name="generate" class="form0" value="Generate Account No." />
</fieldset>
</form>
<div class="form1">
<?php
 if($_SESSION['count']!=2)
 {
	$account=$_SESSION['account'];
	$error=$_SESSION['error'];
	$accountno=$_SESSION['accountno'];
if($error=="unsuccessful")
	echo "you have created the maximum amount of accounts possible on this Name";
else
{
	if($account=="single")
	{
		echo '<form action="customer_new_account.php" method="post" class="main">';
		echo '<fieldset>';
		echo '<p > Account Type :<input type="text" class="text" disabled="disabled" value='.$account.'></p>';
		echo '<p > Account No.:  <input type="text" disabled="disabled" id="acnt" class="text" value='.$accountno.'></p>';
		echo '<p > Branch Code: <input type="text" maxlength="99999" class="text" name="branch" id="br" ></p>';
		echo '<p > First Name :  <input type="text" disabled="disabled" id="fir" class="text" value='.$fname.'></p>';
		echo '<p > Middle Name : <input type="text" disabled="disabled" class="text" id="mid" value='.$mname.'></p>';
		echo '<p > Last Name :   <input type="text" disabled="disabled" id="lname" class="text" value='.$lname.'></p>';
		if($gender=='male')
			{
			echo '<pre>Gender:         Male :<input type="radio"  name="gender" checked disabled required value="male" > Female:<input type="radio"  name="gender" required disabled value="female"></pre>';
			}
			else
			{
				echo '<pre>Gender:         Male :<input type="radio"  disabled name="gender" required value="male" > Female:<input type="radio" checked name="gender" required value="female" disabled ></pre>';
			}
		echo '<div id="add"><p>Address:</div><textarea required disabled name="addr">';
		echo  $add;
		echo '</textarea></p>';
		echo '<p> Birth date : <input type="date" class="text" id="date" disabled value='.$bdate.'></p>';
		echo '<p> Mobile :     <input type="text" class="text" id="num" disabled value='.$mob.'></p>';
		echo '<p> PAN NO :     <input type="text" class="text" id="pan" name="panno" required></p>';
		echo '<p> Occupation:  <input type="text" class="text" id="occ" name="occupation" required></p>';
		echo '<input type="submit" value="Submit Request" class="form0" >';
		echo '</fieldset>';
		echo '</form>';
	}
	else
	{
		echo '<form action="customer_new_account.php" method="post" class="main1">';
		echo '<fieldset>';
		echo '<p> Account Type :<input type="text" disabled="disabled" class="text" value='.$account.'></p>';
		echo '<p> Account No.:  <input type="text" disabled="disabled" class="text" id="acnt" value='.$accountno.'></p>';
			echo '<p > Branch Code: <input type="text" maxlength="99999" class="text" name="branch" id="br" ></p>';
		echo '<p> First Name :  <input type="text" disabled="disabled" id="fir" class="text" value='.$fname.'></p>';
		echo '<p> Middle Name : <input type="text" disabled="disabled" class="text" id="mid" value='.$mname.'></p>';
		echo '<p> Last Name :   <input type="text" disabled="disabled" class="text" id="lname" value='.$lname.'></p>';
		if($gender=='male')
			{
			echo '<pre>Gender:         Male :<input type="radio"  name="gender" checked disabled required value="male" > Female:<input type="radio"  name="gender" required disabled value="female"></pre>';
			}
			else
			{
				echo '<pre>Gender:         Male :<input type="radio"  disabled name="gender" required value="male" > Female:<input type="radio" checked name="gender" required value="female" disabled ></pre>';
			}
		echo '<div id="add"><p>Address:</div><textarea required id="texta" disabled name="addr">';
		echo  $add;
		echo '</textarea></p>';
		echo '<p> Birth date : <input type="date" class="text" disabled id="date" value='.$bdate.'></p>';
		echo '<p> Mobile :     <input type="text" class="text" disabled id="num" value='.$mob.'></p>';
		echo '<p> PAN NO :     <input type="text" class="text" name="panno" id="pan" required></p>';
		echo '<p> Occupation:  <input type="text" class="text" name="occupation" id="occ" required></p>';
		echo '<p> Joint Person First Name :  <input type="text" class="text" id="fir" name="jfname" required></p>';
		echo '<p> Joint person Middle Name : <input type="text" class="text" id="mid" name="jmname" required></p>';
		echo '<p> Joint Person Last Name :   <input type="text" class="text" id="lname" name="jlname" required></p>';
		echo '<pre>Joint Person Gender:         Male :<input type="radio"  name="jgender" checked required value="male" > Female:<input type="radio"  name="jgender" required value="female"></pre>';
		echo '<div id="add"><p>Joint Person Address:</div><textarea id="textar" required name="jaddr">';
		echo '</textarea></p>';
		echo '<p>Joint Person Birth date : <input type="date" class="text" id="date" name="jbdate" required></p>';
		echo '<p>Joint Person Mobile :     <input type="text" class="text" id="num" max="999999999999" name="jmob" required></p>';
		echo '<p>Joint Person PAN NO :     <input type="text" class="text" id="pan" name="jpanno" required></p>';
		echo '<p>Joint Person Occupation:  <input type="text" class="text" id="occ" name="joccupation" required></p>';
		echo '<input type="submit" value="Submit Request" class="form0" >';
		echo '</fieldset>';
		echo '</form>';
	}
}
}
?>
<?php
if(isset($_SESSION['status']) && $_SESSION['status']=='success' && $_SESSION['flag1']==1)
{
	echo 'Request sent Successfully';
	$_SESSION['flag1']=0;
}
?>
</div>
</td>
</div>
<h2 align="center">OR</h2>
<div id="right">
<h3 align="center">Select an Existing Account</h3>
<td>
<?php
$query='SELECT * FROM accounts WHERE registerno='.$regno.'';
$result=mysqli_query($db,$query) or die(mysqli_error($db));
echo '<table id="select">';
echo '<tr><td>';
	echo 'Account No.';
	echo '</td><td>';
	echo 'Account Type';
	echo '</td><td>';
	echo 'Branch Code';
	echo '</td><td>';
	echo 'Account Holder';
	echo '</td><td>';
	echo 'Joint Account Holder';
	echo '</td>';
while($row=mysqli_fetch_assoc($result))
{
	$num=$row['Accountno'];
	$type=$row['Account'];
	$branch=$row['BranchCode'];
	$name=$fname."  ".$lname;
	$jname=$row['joint_first_name']."  ".$row['joint_last_name'];
	echo '<tr><td>';
	echo '<a href="account_main.php?id='.$num.'&action=0" >'.$num.'</a>';
	echo '</td><td>';
	echo $type;
	echo '</td><td>';
	echo $branch;
	echo '</td><td>';
	echo $name;
	echo '</td>';
	if($jname!=' ')
	{
		echo '<td>';
		echo $jname;
		echo '</td>';
	}
	echo '</tr>';
}
echo '</table>';
?>
</div>
</td>
</tr>
</table>
</body>
</html>
