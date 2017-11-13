<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Transaction</title>
</head>
<?php 
session_start();
$db=mysqli_connect('localhost','root','root','bankdb') or mysqli_error('Connection Error');

$toaccount=swipe($_POST['toaccount']);
$fromaccount=swipe($_POST['fromaccount']);
$amount=swipe($_POST['amount']);
$query="SELECT Money FROM accounts WHERE Accountno='$fromaccount'";
$result = mysqli_query($db,$query) or die(mysqli_error($db));
while($row=mysqli_fetch_assoc($result))
		$money = $row['Money'];
$max=$money-500;
$query="SELECT Money FROM accounts WHERE Accountno='$toaccount'";
$result = mysqli_query($db,$query) or die(mysqli_error($db));
$num=mysqli_num_rows($result);
if($num!=1)
	$error = 'INVALID ACCOUNT NUMBER!!!';
else if($toaccount == $fromaccount)
	$error = 'YOU CANNOT TRANSFER FUNDS TO THE SAME ACCOUNT ENTER ANOTHER ACCOUNTNO';
else if($amount>$money)
	$error = 'INSUFFICIENT FUNDS IN YOUR ACCOUNT TO FINISH THIS OPERATION';
else if($amount>=$max && $amount<$money)
	$error = 'YOU NEED TO HAVE ATLEAST Rs.500 IN YOUR ACCOUNT AT ANY TIME';
else
	$error = 'Transaction Request Made';
$_SESSION['error'] = $error;
$_SESSION['flag']=1;
if($error=='Transaction Request Made')
{
date_default_timezone_set("Asia/Calcutta");
$t=time();
$year=date("Y-m-d H:i:s",$t);
$query = "INSERT INTO transactionverify(toaccount,fromaccount,amount,time) VALUES ('$toaccount','$fromaccount','$amount','$year')";
mysqli_query($db,$query);
}
header('location: account_main.php?id='.$fromaccount.'&action=3');
 
function swipe($inpt)
{
$inpt=trim($inpt);
$inpt=stripslashes($inpt);
$inpt=htmlspecialchars($inpt);
return $inpt;
}
?>
<body>
</body>
</html>