<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$db=mysqli_connect('localhost','root','root','bankdb') or die(mysqli_error($db));
$accntno=$_GET['id'];
if($_GET['method']==1)
{
if($_GET['do']=='approve')
	{
		$query='SELECT * FROM pending WHERE Accountno = '.$accntno.'';
		$result= mysqli_query($db,$query) or die(mysqli_error($db));
		$num=mysqli_num_rows($result);
		while($row=mysqli_fetch_assoc($result))
		{	
			$jfname=$row['joint_first_name'];
			$jmname=$row['joint_middle_name'];
			$jlname=$row['joint_last_name'];
			$jgender=$row['joint_gender'];
			$jmob=$row['joint_mobile'];
			$jadd=$row['joint_address'];
			$jbdate=$row['joint_bday'];
			$regno=$row['registerno'];
			$account=$row['Account'];
			$accountno=$row['Accountno'];
			$occu=$row['Occupation'];
			$panno=$row['panno'];
			$joccu=$row['joint_occupation'];
			$jpanno=$row['joint_panno'];
			$branch=$row['BranchCode'];
		}
		$query = "INSERT INTO accounts(Accountno,registerno,Account,BranchCode,joint_first_name,joint_middle_name,joint_last_name,joint_gender,joint_address,joint_bday,joint_mobile,occupation,panno,joint_occupation,joint_panno) VALUES ('$accountno','$regno','$account','$branch','$jfname','$jmname','$jlname','$jgender','$jadd','$jbdate','$jmob','$occu','$panno','$joccu','$jpanno')";
		mysqli_query($db,$query);
	}
	$query='DELETE FROM pending WHERE Accountno= '.$accntno.'';
	mysqli_query($db,$query);
	header('location: admin_approve.php');
}
else if($_GET['method']==2)
{
	if($_GET['do']=='approve')
	{
		$query='SELECT * FROM transactionverify WHERE srno = '.$accntno.'';
		$result= mysqli_query($db,$query) or die(mysqli_error($db));
		$num=mysqli_num_rows($result);
		while($row=mysqli_fetch_assoc($result))
		{	
			$toaccount=$row['toaccount'];
			$fromaccount=$row['fromaccount'];
			$amount=$row['amount'];
			$time=$row['time'];
		}
		$query = "INSERT INTO transaction(toaccount,fromaccount,amount,time) VALUES ('$toaccount','$fromaccount','$amount','$time')";
		mysqli_query($db,$query);
		$query = "UPDATE accounts SET money=money+'$amount' WHERE Accountno = '$toaccount'";
		mysqli_query($db,$query);
		$query = "UPDATE accounts SET money=money-'$amount' WHERE Accountno = '$fromaccount'";
		mysqli_query($db,$query);
	}
	$query='DELETE FROM transactionverify WHERE srno= '.$accntno.'';
	mysqli_query($db,$query);
	header('location: admin_approve.php');
}
?>
</body>
</html>