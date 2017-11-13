<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
session_start();
$usrname1=$_SESSION['usrname'];
$count=$_SESSION['count'];
$count1=$_COOKIE['count'];
//echo $count;
//echo $count1;
$db=mysqli_connect('localhost','root','root','bankdb') or die('connection error');
$query="SELECT record_id FROM register WHERE email='$usrname1'";
$result=mysqli_query($db,$query) or die(mysqli_error($db));
$num = mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result))
	{
		$record=$row['record_id'];
	}
	$query="SELECT registerno FROM accounts WHERE registerno=$record";
	$result=mysqli_query($db,$query) or die(mysqli_error($db));
	$num=mysqli_num_rows($result);
	$account=generate($record,$count);
	$count++;
	$_SESSION['count']=$count;
	$gender=$_GET['account_type'];
	if($num<=7)
	{
	$error='success';
	}
	else
	{
		$error='unsuccessful';
	}
$_SESSION['account']=$gender;
$_SESSION['error']=$error;
$_SESSION['accountno']=$account;
header('location: customer_main.php');
function generate($rec,$count)
{
	if($_GET['account_type']=='joint')
		return 1000000000+20000000+(time()%1000000);
	else
		return 1000000000+10000000+(time()%1000000);		
}
?>
<body>
</body>
</html>