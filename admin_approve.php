<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Admin_approve</title>
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
		}
	h1 {
		padding: 10px 0 10px 0;
		position:relative;
		top: -10%;
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
	width: 350px;
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
	left: 84%;
	top:10%;
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
<h1 align="center">Administration Approval Page</h1>
<button id="Sign_Up" type="submit">Back to admin main page</button>
<script type="text/javascript">
    document.getElementById("Sign_Up").onclick = function () {
        location.href = "admin.php";
    };
</script>
</div>

<?php
$db=mysqli_connect('localhost','root','root','bankdb') or die(mysqli_error($db));

$query='SELECT * FROM pending';
$result= mysqli_query($db,$query) or die(mysqli_error($db));
$num=mysqli_num_rows($result);
if($num!=0)
{
	echo '<table align="center">
<tr align="center" id="heading"><td colspan="21">Current Pending Requests</td></tr>
<tr align="center" id="heading1"><td>Accountno</td><td>First Name</td><td>Last Name</td><td>Address</td><td>Birth Date</td><td>mobile no.</td><td>Branch Code</td><td>Account</td><td>
Occupation</td><td>panno</td><td>joint first name</td><td>joint middle name</td><td>joint last name</td><td>joint gender</td><td>joint address</td><td>joint bday</td><td>joint mobile</td><td>joint occupation</td><td>joint panno</td><td>Approve</td><td>Reject</td></tr>';
	while($row = mysqli_fetch_assoc($result))
	{
			echo '<tr align="center" id="heading1" ><td>';
			echo $row['Accountno'];
			echo '</td>';
			echo '<td>';
			$query= 'SELECT * FROM register WHERE record_id = '.$row['registerno'].'';
			$record=mysqli_query($db,$query);
			while($row1=mysqli_fetch_array($record))
			{
				echo $row1['first_name'];
				echo '</td><td>';
				echo $row1['last_name'];
				echo '</td><td>';
				echo $row1['address'];
				echo '</td><td>';
				echo $row1['bday'];
				echo '</td><td>';
				echo $row1['mobile'];
				echo '</td><td>';
				
			}
			echo $row['BranchCode'];
			echo '</td>';
			echo '<td>';
			echo $row['Account'];
			echo '</td>';
			echo '<td>';
			echo $row['Occupation'];
			echo '</td>';
            echo '<td>';
			echo $row['panno'];
			echo '</td>';
            echo '<td>';
			if($row['Account']=='joint')
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
            echo '<td>';
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
            echo '<td>';
			}
			echo '<a id="link" href="admin_approve_add.php?do=approve&id='.$row['Accountno'].'&method=1">[APPROVE]</a>';
			echo '</td>';
            echo '<td>';
			echo '<a id="link" href="admin_approve_add.php?do=reject&id='.$row['Accountno'].'&method=1">[REJECT]</a>';
			echo '</td>';
			echo '</tr>';
	}
}
else 
	echo 'No Pending Account Requests';
?>
</table>
<br><br>
<?php 
$query ='SELECT * FROM transactionverify';
$result=mysqli_query($db,$query) or die(mysqli_error($db));
$num=mysqli_num_rows($result);
if($num!=0)
{
	echo '<table align="center"><tr align="center" id="heading"><td colspan="8">Current Pending Transactions</td></tr><tr align="center" id="heading1"><td>To-Account</td><td>Current Balance</td><td>From-Account</td><td>Current Balance</td><td>Amount</td><td>Time-Stamp</td><td>APPROVE</td><td>REJECT</td></tr>';
	while($row=mysqli_fetch_assoc($result))
	{
	echo '<tr id="heading1" align="center"><td>';
	echo $row['toaccount'];
	echo '</td><td>';
	$query='SELECT money FROM accounts WHERE Accountno='.$row['toaccount'].'';
	$result1=mysqli_query($db,$query) or die(mysqli_error($db));
	while($row1=mysqli_fetch_assoc($result1))
		echo $row1['money'];
	echo '</td><td>';
	echo $row['fromaccount'];
	echo '</td><td>';
	$query='SELECT money FROM accounts WHERE Accountno='.$row['fromaccount'].'';
	$result1=mysqli_query($db,$query) or die(mysqli_error($db));
	while($row1=mysqli_fetch_assoc($result1))
		echo $row1['money'];
	echo '</td><td>';
	echo $row['amount'];
	echo '</td><td>';
	echo $row['time'];
	echo '</td><td>';
	echo '<a id="link" href="admin_approve_add.php?do=approve&id='.$row['srno'].'&method=2">[APPROVE]</a>';
	echo '</td><td>';
	echo '<a id="link" href="admin_approve_add.php?do=reject&id='.$row['srno'].'&method=2">[REJECT]</a>';
	echo '</td></tr>';
	}

}
else
	echo 'No Pending Transactions';

?>
</table>
</body>
</html>