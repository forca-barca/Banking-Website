<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
session_start();
$usrname1=$_SESSION['usrname'];
$account=$_SESSION['account'];
$accountno=$_SESSION['accountno'];
$db=mysqli_connect('localhost','root','root','bankdb') or die('connection error');

$query="SELECT record_id FROM register WHERE email='$usrname1'";
$result=mysqli_query($db,$query) or die(mysqli_error($db));
$num = mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result))
	{
		$record=$row['record_id'];
	}
if($_SERVER["REQUEST_METHOD"]=="POST")
 {
	 if($account=='joint')
	 {
	 $jfname=swipe($_POST["jfname"]);
	 $jmname=swipe($_POST["jmname"]);
	 $jlname=swipe($_POST["jlname"]);
	 $jgender=swipe($_POST["jgender"]);
	 $jaddr=swipe($_POST["jaddr"]);
	 $jbdate=swipe($_POST["jbdate"]);
	 $jmob=swipe($_POST["jmob"]);
	 $joccu=swipe($_POST["joccupation"]);
	 $jpanno=swipe($_POST["jpanno"]);
	 }
	 $branch=swipe($_POST['branch']);
	 $occu=swipe($_POST["occupation"]);
	 $panno=swipe($_POST["panno"]);
		 
		 
		 if($account=='joint')		
		 	$query = "INSERT INTO pending(Accountno,registerno,BranchCode,Account,joint_first_name,joint_middle_name,joint_last_name,joint_gender,joint_address,joint_bday,joint_mobile,occupation,panno,joint_occupation,joint_panno) VALUES ('$accountno','$record','$branch','$account','$jfname','$jmname','$jlname','$jgender','$jaddr','$jbdate','$jmob','$occu','$panno','$joccu','$jpanno')";
		else
			$query= "INSERT INTO pending(Accountno,registerno,BranchCode,Account,occupation,panno) VALUES ('$accountno','$record','$branch','$account','$occu','$panno')";
		 mysqli_query($db,$query) or die(mysqli_error($db));
		 $_SESSION['status']='success';
		 $_SESSION['flag1']=1;
		 header("location: customer_main.php");
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
</body>
</html>