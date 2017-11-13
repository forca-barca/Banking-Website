<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$db=mysqli_connect('localhost','root','root','bankdb') or die('connection error');
		$account=$_POST['account'];
		$accountno=$_POST['accountno'];
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
	 $occu=swipe($_POST["occupation"]);
	 $panno=swipe($_POST["panno"]);
		 
		 
		 if($account=='joint')		
		 	$query = "UPDATE accounts
						SET Occupation=$occu,
							panno=$panno,
							joint_first_name=$jfname,
							joint_middle_name=$jmname,
							joint_last_name=$jlname,
							joint_gender=$jgender,
							joint_address=$jaddr,
							joint_bday=$jbdate,
							joint_mobile=$jmob,
							joint_occupation=$joccu,
							joint_panno=$jpanno
						WHERE 	
							Accountno = '$accountno'";
		else
			$query = "UPDATE accounts
						SET Occupation='$occu',
							panno='$panno'
						WHERE 	
							Accountno = $accountno";
		 mysqli_query($db,$query) or die(mysqli_error($db));
		 header("location: admin.php");
 function swipe($inpt)
	{
		$inpt=trim($inpt);
		$inpt=stripslashes($inpt);
		$inpt=htmlspecialchars($inpt);
		return $inpt;
	}
	?>
</body>
</html>