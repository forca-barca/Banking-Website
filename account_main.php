<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
 
<title>Account No:<?php $accnt=$_GET['id']; echo $accnt; ?> </title>
<style type="text/css">
body{
	background-image: url(Capture41.jpg), url(logo-back.jpg);
	background-repeat:no-repeat, repeat;
	background-position:450px 250px;
	font-family: 'Arvo',serif;
	font-size: 20px;
	font-style:oblique;
	text-align: center;
	margin: 0px;
	border: 0;
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
		padding: 10px;
		color: #fff;
		width:100%;
		height: auto;
		position:absolute;
		top: 4%;
		background-color:#039;
		text-emphasis:accent;
		text-shadow: 1px 1px 2px black, 0 0 20px #FF0, 0 0 10px #0C0;
		
	}
ul{
	float: left;
	list-style-type:none;
	height:88%;
	width: 17%;
	position:absolute;
	top: 10.5%;
	background-color:#36b452;
}
li{
	float:left;
	margin:7%;
}
li a{
	display: block;
    color: #FFFFFF;
    text-align: center;
    padding: 14px 16px;
	padding-right:25px;
	padding-left:25px;
    text-decoration: none;
	border-right:thick #FFFFFF;
	margin-right: 40px;
	font-family:'Arvo',serif;
	font-size: 20px;
	transition-duration:0.3s;
	transition-property:all;
	transition-timing-function:ease-in;
}
li a.active{
	color: #666;
    background-color: #FFFFFF;
	border-right:1px solid #FFFFFF;
	border-radius:15px;
}
li a:hover{
	background-color: #FFFFFF;
	border-right:1px solid #FFFFFF;
	color: #666;
	width: 100%;
	position:relative;
	left:-15%;
	border-radius:15px;
}
li a:visited{
	text-decoration:none;
}
.main{
	position:absolute;
	left:25%;
	top:25%;
}
.table1{
	background-color:#FFFF99;
	border: thin solid black;
}
.table1 td{
	padding: 5px;
}
#heading{
		font-size:20px;
		width:100%;
		height:auto;
		background-color:rgba(0,255,179,1);
		margin: 2px;
		padding: 2px;
		color:#444;
	}
	#heading1{
		font-size:18px;
		width:100%;
		background-color:rgba(31,255,135,1);
		margin: 2px;
		padding: 2px;
		color:#444;
	}
	#heading2{
		font-size:16px;
		width:100%;
		background-color:rgba(0,255,88,1);
		margin: 2px;
		padding: 2px;
		color:#444;
	}
	.form1{
		background-color:rgba(31,255,135,0.5);
		position:absolute;
		left:30%;
		width:400px;
	}
	.text{
		background-color:#FFFAAF;
		color:#3B403E;
		text-align:center;
		height: 20px;
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
	#submit{
	position: relative;
	display:block;
	width: 250px;
	height: 50px;
	background-color:#fff;
	color: rgba(31,255,135,1);
	border-color: #36b452;
	border-radius: 5px;
	border-width: 1.5px;
	border-style: solid;
	font-family: 'Arvo',sans-serif;
	font-size: 22px;
	cursor: pointer;
	left: 20%;
	padding: 10px 20px 10px 20px;
	text-align:center;
	}
	#submit1{
	position: relative;
	display:block;
	width: 150px;
	height: 40px;
	margin-top:10px;
	background-color:#fff;
	color: rgba(31,255,135,1);
	border-color: #36b452;
	border-radius: 5px;
	border-width: 1.5px;
	border-style: solid;
	font-family: 'Arvo',sans-serif;
	font-size: 22px;
	cursor: pointer;
	left: -30%;
		text-align:center;
	}
	
</style>
</head>
<body>
<?php
session_start();
$usrname=$_SESSION['usrname'];
$action=$_GET['action'];
$flag=$_SESSION['flag'];
$db=mysqli_connect('localhost','root','root','bankdb');
$query = "SELECT registerno FROM accounts WHERE Accountno='$accnt'";
$result=mysqli_query($db,$query) or die(mysqli_error($db));
$num = mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result))
	$regno = $row['registerno'];
if($num!=1)
	echo 'NO SUCH ACCOUNT NUMBER EXISTS';
else
{
$query = "SELECT record_id FROM register WHERE email='$usrname'";
$result=mysqli_query($db,$query) or die(mysqli_error($db));
$num = mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result))
	$recno = $row['record_id'];
if($recno!=$regno)
	echo 'INVALID USER .ACCESS DENIED';
else
{
$query="SELECT first_name,last_name FROM register WHERE email='$usrname'";
$result=mysqli_query($db,$query) or die(mysqli_error($db));
$num = mysqli_num_rows($result);

if($num==1)
{
	while($row=mysqli_fetch_assoc($result))
	{	
		echo "<h1> Name:  ";
		echo $row['first_name'];
		echo "  ";
		echo $row['last_name'];
		echo '</h1>';
	}
}
echo '<h2>';
echo 'Account NO. '.$accnt;
echo '</h2>';
?>
<ul>
<li><?php 
			if($action==1)
				echo '<a href="account_main.php?id='.$accnt.'&action=1" class="active">';
			else
				echo '<a href="account_main.php?id='.$accnt.'&action=1">';
		  echo 'Check Balance</a>';?> </li>
<li><?php 	if($action==2)
				echo '<a href="account_main.php?id='.$accnt.'&action=2" class="active">';
			  else
				echo '<a href="account_main.php?id='.$accnt.'&action=2">';
		  echo 'Past Transaction Details</a>';?> </li>
<li><?php 	if($action==3)
				echo '<a href="account_main.php?id='.$accnt.'&action=3" class="active">';
			else
				echo '<a href="account_main.php?id='.$accnt.'&action=3">';
		  echo 'Transfer Money To another Account</a>';?> </li>
<li><?php 	if($action==4)
				echo '<a href="account_main.php?id='.$accnt.'&action=4" class="active">';
			else
				echo '<a href="account_main.php?id='.$accnt.'&action=4">';
		  echo 'Deposit Money using PayPal</a>';?> </li>
<li><?php echo '<a href="customer_main.php">';
		  echo 'Back To Customer Page</a>';?></li>
</ul>
<?php
$query="SELECT Money FROM accounts WHERE Accountno='$accnt'";
		$result = mysqli_query($db,$query) or die(mysqli_error($db));
		while($row=mysqli_fetch_assoc($result))
			$money = $row['Money'];
			$max=$money-500;
			$len=strlen($max);
if($action==0)
{
	echo '<div class="main">';
	echo "Select appropriate Service that you want to avail. The national bank strives to fulfill your needs";
	echo '</div>';
}
else if($action==1)
	{
		echo '<div class="main">';
		echo 'The Current Balance in your account is Rs '.$money;
		echo '</div>';
	}
else if($action==2)
	{
		echo '<div class="main">';
		$query="SELECT * FROM transaction WHERE fromaccount='$accnt'";
		$result=mysqli_query($db,$query) or die(mysqli_error($db));
		$num=mysqli_num_rows($result);
		if($num>0)
		{
		echo '<table class="table1"><tr align="center" id="heading"><td colspan="6">Outgoing Transactions</td></tr>';
		echo '<tr id="heading1" ><td>From Account</td><td>Account Details</td><td>To Account</td><td>Account Details</td><td>Amount</td><td>Time Stamp</td>';

		while($row=mysqli_fetch_assoc($result))
		{
			echo '<tr id="heading2"><td>';
			echo $accnt;
			$query="SELECT registerno,Account,joint_first_name,joint_last_name FROM accounts WHERE Accountno ='$accnt'";
			$result1=mysqli_query($db,$query) or die(mysqli_error($db));
			while($row1=mysqli_fetch_assoc($result1))
			{
				$query = "SELECT first_name,last_name FROM register WHERE record_id=".$row1['registerno']."";
				$result2=mysqli_query($db,$query) or die(mysqli_error($db));
				while($row2=mysqli_fetch_assoc($result2)
)                   $detail=$row2['first_name'].' '.$row2['last_name'];
				if($row1['Account']=='Single')
					$detail=$detail.' '.'Single Account';
				else
					$detail=$detail.' and '.$row1['joint_first_name'].' '.$row1['joint_last_name'].' '.'Joint Account';
				echo '</td><td>';
				echo $detail;
			}
			echo '</td><td>';
			$temp=$row['toaccount'];
			echo $row['toaccount'];
			$query="SELECT registerno,Account,joint_first_name,joint_last_name FROM accounts WHERE Accountno ='$temp'";
			$result1=mysqli_query($db,$query) or die(mysqli_error($db));
			while($row1=mysqli_fetch_assoc($result1))
			{
				$temp=$row1['registerno'];
				$query = "SELECT first_name,last_name FROM register WHERE record_id='$temp'";
				$result2=mysqli_query($db,$query) or die(mysqli_error($db));
				while($row2=mysqli_fetch_assoc($result2))
                   $detail=$row2['first_name'].' '.$row2['last_name'];
				if($row1['Account']=='Single')
					$detail=$detail.' '.'Single Account';
				else
					$detail=$detail.' and '.$row1['joint_first_name'].' '.$row1['joint_last_name'].' '.'Joint Account';
				echo '</td><td>';
				echo $detail;
			}
			echo '</td><td>';
			echo $row['amount'];
			echo '</td><td>';
			echo $row['time'];
			echo '</td></tr>';
		}
		echo '</table><br><br>';
	}
		$query="SELECT * FROM transaction WHERE toaccount='$accnt' AND deposit='no'";
		$result=mysqli_query($db,$query) or die(mysqli_error($db));
		$num=mysqli_num_rows($result);
		if($num>0)
		{
		echo '<table class="table1"><tr align="center" id="heading"><td colspan="6">Inbound Transactions</td></tr>';
		echo '<tr id="heading1"><td>From Account</td><td>Account Details</td><td>To Account</td><td>Account Details</td><td>Amount</td><td>Time Stamp</td>';
		
		while($row=mysqli_fetch_assoc($result))
		{
			echo '<tr id="heading2"><td>';
			echo $row['fromaccount'];
			$query='SELECT registerno,Account,joint_first_name,joint_last_name FROM accounts WHERE Accountno ='.$row['fromaccount'].'';
			$result1=mysqli_query($db,$query) or die(mysqli_error($db));
			while($row1=mysqli_fetch_assoc($result1))
			{
				$query = "SELECT first_name,last_name FROM register WHERE record_id=".$row1['registerno']."";
				$result2=mysqli_query($db,$query) or die(mysqli_error($db));
				while($row2=mysqli_fetch_assoc($result2)
)                   $detail=$row2['first_name'].' '.$row2['last_name'];
				if($row1['Account']=='Single')
					$detail=$detail.' '.'Single Account';
				else
					$detail=$detail.' and '.$row1['joint_first_name'].' '.$row1['joint_last_name'].' '.'Joint Account';
				echo '</td><td>';
				echo $detail;
			}
			echo '</td><td>';
			echo $accnt;
			$query='SELECT registerno,Account,joint_first_name,joint_last_name FROM accounts WHERE Accountno ='.$accnt.'';
			$result1=mysqli_query($db,$query) or die(mysqli_error($db));
			while($row1=mysqli_fetch_assoc($result1))
			{
				$query = "SELECT first_name,last_name FROM register WHERE record_id=".$row1['registerno']."";
				$result2=mysqli_query($db,$query) or die(mysqli_error($db));
				while($row2=mysqli_fetch_assoc($result2)
)                   $detail=$row2['first_name'].' '.$row2['last_name'];
				if($row1['Account']=='Single')
					$detail=$detail.' '.'Single Account';
				else
					$detail=$detail.' and '.$row1['joint_first_name'].' '.$row1['joint_last_name'].' '.'Joint Account';
				echo '</td><td>';
				echo $detail;
			}
			echo '</td><td>';
			echo $row['amount'];
			echo '</td><td>';
			echo $row['time'];
			echo '</td></tr>';
		}
		echo '</table><br><br>';
	}
		$query="SELECT * FROM transaction WHERE toaccount='$accnt' AND deposit='yes'";
		$result=mysqli_query($db,$query) or die(mysqli_error($db));
		$num = mysqli_num_rows($result);
		if($num>0)
		{
		echo '<table class="table1"><tr align="center" id="heading"><td colspan="4">Deposits</td></tr>';
		echo '<tr id="heading1"><td>To Account</td><td>Account Details</td><td>Amount</td><td>Time Stamp</td>';
		while($row=mysqli_fetch_assoc($result))
		{
			echo '<tr id="heading2"><td>';
			echo $accnt;
			$query='SELECT registerno,Account,joint_first_name,joint_last_name FROM accounts WHERE Accountno ='.$accnt.'';
			$result1=mysqli_query($db,$query) or die(mysqli_error($db));
			while($row1=mysqli_fetch_assoc($result1))
			{
				$query = "SELECT first_name,last_name FROM register WHERE record_id=".$row1['registerno']."";
				$result2=mysqli_query($db,$query) or die(mysqli_error($db));
				while($row2=mysqli_fetch_assoc($result2)
)                   $detail=$row2['first_name'].' '.$row2['last_name'];
				if($row1['Account']=='Single')
					$detail=$detail.' '.'Single Account';
				else
					$detail=$detail.' and '.$row1['joint_first_name'].' '.$row1['joint_last_name'].' '.'Joint Account';
				echo '</td><td>';
				echo $detail;
			}
			echo '</td><td>';
			echo $row['amount'];
			echo '</td><td>';
			echo $row['time'];
			echo '</td></tr>';
	}
	echo '</table>';
		}
		echo '</div>';
}
else if($action==3)
{
	echo '<div class="main">';
	echo '<form method="POST" action="transaction.php" class="form1">';
	echo '<p>From Account: '.$accnt.'</p>';
	echo '<input type="hidden" name="fromaccount" value="'.$accnt.'">';
	echo '<p>To Account: <input type="text" required class="text" pattern="[0-9]{10}" size="13" maxlength="10" name="toaccount" ></p>';
	echo '<p>Amount: <input type="text"  required class="text" pattern="[0-9]*" max="'.$max.'"  maxlength="'.$len.'" name="amount"> <br><br>Current Balance is : Rs.'.$money.'</p>';
	echo '<input type="submit" name="submit" id="submit" value="Make Payment">';
	echo '<br><div id="error">';
	if($flag==1)
		echo $_SESSION['error'];
		echo '</div>';
		$_SESSION['flag']=0;
		echo '<br></div></form>';
}
else if($action==4)
{
	echo '<div class="main">';
	?>
    <div align="center">
<table border="0" width="900" cellspacing="0" cellpadding="0">
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><form name="form1" method="POST" action="paypal_entry.php">
		<input type="hidden" name="paymentType" value="Sale" />
				<table width="880" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" class="content4">
                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td width="50%" valign="top">
							<div align="left">
								<table border="0" width="98%" cellspacing="0" cellpadding="4" class="content4" style="border:1px solid #333333; font-family:Verdana; font-size:8pt; color:#000000">
									<tr>
										<td width="100%" align="center" colspan="2" background="images/collectionbg1_see.png">
										<b><font size="2">Personal Information</font></b></td>
									</tr>
									<tr>
										<td width="35%" background="images/collectionbg1_see.png" align="right">
										<b>First Name:</b></td>
										<td width="50%" background="images/collectionbg1_see.png"><input type="text" class="text" name="fname" value="" /></td>
									</tr>
									<tr>
										<td width="35%" background="images/collectionbg1_see.png" align="right">
										<b>Last Name:</b></td>
										<td width="50%" background="images/collectionbg1_see.png"><input type="text"  class="text"name="lname" value="" /></td>
									</tr>
									<tr>
										<td width="35%" background="images/collectionbg1_see.png" align="right">
										<b>Amount: </b> </td>
										<td width="50%" background="images/collectionbg1_see.png"><input type="text" class="text" name="ftotal" value=""></td>
									</tr>
									<tr>
										<td width="100%" colspan="2" align="center" background="images/collectionbg1_see.png"><b>
										<font size="2">Credit Card Information</font></b></td>
									</tr>
									<tr>
										<td width="35%" align="right"><b>Card Type :</b></td>
										<td width="65%" align="left">
										<select name="creditCardType" class="text" style="width:150px;">
					                    <option value="Visa" selected="selected">Visa</option>
					                    <option value="MasterCard">MasterCard</option>
					                    <option value="Discover">Discover</option>
					                    <option value="Amex">American Express</option>
					                    </select></td>
									</tr>
									<tr>
										<td width="35%" align="right"><b>Card Number :</b></td>
										<td width="65%" align="left">
										<input type="text" size="19" maxlength="19" class="text" name="creditCardNumber" style="width:150px;" /></td>
									</tr>
									<tr>
										<td width="35%" align="right"><b>Expiration Date :</b></td>
										<td width="65%" align="left">
                                      <select name="expDateMonth" class="text">
					                    <option value="1">01</option>
					                    <option value="2">02</option>
					                    <option value="3">03</option>
					                    <option value="4">04</option>
					                    <option value="5">05</option>
					                    <option value="6">06</option>
					                    <option value="7">07</option>
					                    <option value="8">08</option>
					                    <option value="9">09</option>
					                    <option value="10">10</option>
					                    <option value="11">11</option>
					                    <option value="12">12</option>
					                    </select> <select name="expDateYear" class="text" size="1">
						                    <option value="2013" selected>2013</option>
						                    <option value="2014">2014</option>
						                    <option value="2015">2015</option>
						                    <option value="2016">2016</option>
						                    <option value="2017">2017</option>
						                    <option value="2019">2019</option>
						                    <option value="2020">2020</option>
						                    <option value="2021">2021</option>
						                    <option value="2022">2022</option>
						                    <option value="2023">2023</option>
						                    <option value="2024">2024</option>
						                    <option value="2025">2025</option>
						                    <option value="2026">2026</option>
						                    <option value="2027">2027</option>
						                    <option value="2028">2028</option>
						                    <option value="2029">2029</option>
						                    <option value="2030">2030</option>
					                    </select></td>
									</tr>
									<tr>
										<td width="35%" align="right"><b>CVV Number :</b></td>
										<td width="65%" align="left">
										<input type="text" size="3" maxlength="4"  class="text" name="cvv2Number" /><input type="hidden" name="paymentType" value="Sale" /></td>
									</tr>
									</table>
							</div>
							</td>
							<td width="50%" valign="top">
							</td>
						</tr>
						<tr>
							<td width="50%" valign="top" align="right" style="padding-right: 10px">
					<input type="submit" value="Submit" name="B1" id="submit1"></td>
							<td width="50%" valign="top">&nbsp;
							</td>
						</tr>
					</table>
					</td>
                  </tr>      

                  </table>
				</form></td>
	</tr>
</table>
</div>
<?php
}
echo '</div>';
}
}
?>
</body>
</html>
