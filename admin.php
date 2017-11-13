<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<title>Admin</title>
<style type="text/css">
	body{
		background-image: url(Capture41.jpg), url(logo-back.jpg);
		background-repeat:no-repeat, repeat;
		background-position:50% 50%, left;
		font-family: 'Arvo',serif;
		margin: 0;
		border: 0;
		}
	h1 {
		padding: 10px 0 10px 0;
		color:#fff;
		width:100%;
		text-emphasis:accent;
		background-color:#36c452;
		height: 5%;
		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
		}
		#head{
			position: relative;
			margin:0;
			top:0px;
			width:100%;
			height:auto;
			border:0;
		}
	table{
		background-color:rgba(204,255,153,0.8);
		border: 2.5px solid #66CC33;
		width: 450px;
		height: auto;
	}
	#heading{
		font-size:20px;
		width:100%;
		height:auto;
		background-color:rgba(51,204,0,1);
		margin: 5px;
		padding: 5px;
		color:#444;
	}
	#heading1{
		font-size:18px;
		width:100%;
		background-color:rgba(0,255,88,1);
		margin: 5px;
		padding: 5px;
		color:#444;
	}
	#heading2{
		font-size:16px;
		width:100%;
		background-color:rgba(0,255,88,1);
		margin: 5px;
		padding: 5px;
		color:#444;
	}
	#link{
		text-decoration: none;
		color:#444;
	
	}
	#Sign_Up{
		position: absolute;
	width: 150px;
	height: 50px;
	background-color:#36c452;
	color: #ffffff;
	border-color: #36c452;
	border-radius: 5px;
	border-width: 1.5px;
	border-style: solid;
	font-family: 'Arvo',sans-serif;
	font-size: 22px;
	cursor: pointer;
	left: 90%;
	top:10%;
	padding: 5px 20px 5px 20px;
	text-align:center;
	transition-duration:1s;
	}
	#Sign_Up1{
	position: absolute;
	width: 350px;
	height: 50px;
	background-color:#555;
	color: #ffffff;
	border-color: #36c452;
	border-radius: 5px;
	border-width: 1.5px;
	border-style: solid;
	font-family: 'Arvo',sans-serif;
	font-size: 22px;
	cursor: pointer;
	left: 40%;
	bottom: 10%;
	padding: 5px 20px 5px 20px;
	text-align:center;
	transition-duration:1s;
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
</style>
</head>
<body>
<div id="head">
<h1 align="center">Administration Page</h1>
<button id="Sign_Up" type="submit">Log out</button>
<script type="text/javascript">
    document.getElementById("Sign_Up").onclick = function () {
        location.href = "Login_page.php";
    };
</script>
</div>
<br/>
<table align="center">
<tr align="center" id="heading"><td colspan="5">Current Customers  <a id="link" href="adminm.php?action=add">[ADD]</a></td></tr>
<tr align="center" id="heading1"><td>First Name</td><td>Last Name</td><td>EDIT</td><td>
DELETE</td></tr>
<?php
$db=mysqli_connect('localhost','root','root','bankdb') or die(mysqli_error($db));

$query='SELECT * FROM register WHERE record_id!=6';
$result= mysqli_query($db,$query) or die(mysqli_error($db));
$num=mysqli_num_rows($result);
if($num>0)
{
	while($row = mysqli_fetch_assoc($result))
	{
			echo '<tr align="center" id="heading2" ><td>';
			echo $row['first_name'];
			echo '</td>';
			echo '<td>';
			echo $row['last_name'];
			echo '</td>';
			echo '<td>';
			echo '<a id="link" href="adminm.php?action=edit&id='.$row['record_id'].'">[EDIT]</a>';
			echo '</td>';
			echo '<td>';
			echo '<a id="link" href="adminm.php?action=delete&id='.$row['record_id'].'">[DELETE]</a>';
			echo '</td></tr>';
	}
}
?>
</table>

<br><br>
<?php
$db=mysqli_connect('localhost','root','root','bankdb') or die(mysqli_error($db));



$query='SELECT * FROM accounts';
$result= mysqli_query($db,$query) or die(mysqli_error($db));
$num=mysqli_num_rows($result);
if($num!=0)
{
	echo '<table align="center">
<tr align="center" id="heading"><td colspan="19">Existing Accounts</td></tr>
<tr align="center" id="heading1"><td>Accountno</td><td>First Name</td><td>Last Name</td><td>Account</td><td>Branch Code</td><td>Balance</td><td>
Occupation</td><td>panno</td><td>joint first name</td><td>joint middle name</td><td>joint last name</td><td>joint gender</td><td>joint address</td><td>joint bday</td><td>joint mobile</td><td>joint occupation</td><td>joint panno</td><td>Edit</td><td>Delete</td></tr>';
	while($row = mysqli_fetch_assoc($result))
	{
			echo '<tr align="center" id="heading1" ><td>';
			echo $row['Accountno'];
			echo '</td>';
			echo '<td>';
			$query = 'SELECT first_name,last_name FROM register WHERE record_id='.$row['registerno'].'';
			$record=mysqli_query($db,$query) or die(mysqli_error($db));
			while($row1=mysqli_fetch_assoc($record))
			{
				echo $row1['first_name'];
				echo '</td><td>';
				echo $row1['last_name'];
			}
			echo '</td>';
			echo '<td>';
			echo $row['Account'];
			echo '</td>';
			echo '<td>';
			echo $row['BranchCode'];
			echo '</td>';
			echo '<td>';
			echo 'Rs. '.$row['Money'];
			echo '</td>';
			echo '<td>';
			echo $row['Occupation'];
			echo '</td>';
            echo '<td>';
			echo $row['panno'];
			echo '</td>';
            echo '<td>';
			if($row['Account']=='Joint')
			{
			echo $row['joint_first_name'];
			echo '</td>';
            echo '<td>';
			echo $row['joint_middle_name'];
			echo '</td>';
            echo '<td>';
			echo $row['joint_last_name'];
			echo '</td>';
            echo '<td>';
			echo $row['joint_gender'];
			echo '</td>';
            echo '<td>';
			echo $row['joint_address'];
			echo '</td>';
            echo '<td>';
			echo $row['joint_bday'];
			echo '</td>';
            echo '<td>';
			echo $row['joint_mobile'];
			echo '</td>';
            echo '<td>';
			echo $row['joint_occupation'];
			echo '</td>';
            echo '<td>';
			echo $row['joint_panno'];
			echo '</td>';
			}
			else
			{
			echo 'Not-Applicable';
			echo '</td>';
            echo '<td>';
			echo 'Not-Applicable';
			echo '</td>';
            echo '<td>';
			echo 'Not-Applicable';
			echo '</td>';
            echo '<td>';
			echo 'Not-Applicable';
			echo '</td>';
            echo '<td>';
			echo 'Not-Applicable';
			echo '</td>';
            echo '<td>';
			echo 'Not-Applicable';
			echo '</td>';
            echo '<td>';
			echo 'Not-Applicable';
			echo '</td>';
            echo '<td>';
			echo 'Not-Applicable';
			echo '</td>';
            echo '<td>';
			echo 'Not-Applicable';
			echo '</td>';	
			}
            echo '<td>';
			echo '<a id="link" href="adminmm.php?action=edit&id='.$row['Accountno'].'">[EDIT]</a>';
			echo '</td>';
            echo '<td>';
			echo '<a id="link" href="adminmm.php?action=delete&id='.$row['Accountno'].'"">[DELETE]</a>';
			echo '</td>';
			echo '</tr>';
	}
}
?>
</table>
<br><br>
<button id="Sign_Up1" type="submit">Check Pending Requests</button>
<script type="text/javascript">
    document.getElementById("Sign_Up1").onclick = function () {
        location.href = "admin_approve.php";
    };
</script>
</body>
</html>