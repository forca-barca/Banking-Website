<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Admin: Add</title>
<style type="text/css">
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
<?php
 $db = mysqli_connect('localhost','root','root') or die("connection error");
 $error="";
 mysqli_select_db($db,'bankdb') or die(mysqli_error($db));
 
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
	 $fname=swipe($_POST["fname"]);
	 $mname=swipe($_POST["mname"]);
	 $lname=swipe($_POST["lname"]);
	 $gender=swipe($_POST["gender"]);
	 $addr=swipe($_POST["addr"]);
	 $bdate=swipe($_POST["bdate"]);
	 $mob=swipe($_POST["mob"]);
	 $email=swipe($_POST["email"]);
	 $pass=swipe($_POST["pass"]);
	 $rpass=swipe($_POST["rpass"]);

	 $query="SELECT
	         email  
	 		 FROM 
			 register
			 WHERE 
			 email ='$email'";
	 $result = mysqli_query($db, $query) or die(mysqli_error($db));
	 $num = mysqli_num_rows($result);
	 if($num==0)
	 {
		 list($year,$month,$day) = explode('-',$bdate);
		 if(strlen($fname)>20)
		 $error="firstname must be less than 20 characters";
		 else if(strlen($mname)>20)
		 $error="middlename must be less than 20 characters";
		 else if(strlen($lname)>20)
		 $error="lastname must be less than 20 characters";	 
		 else if(strlen($addr)>70)
		 $error="address must be less than 70 characters";
		 else if($year<1960 || $year>2017)
		 $error = "please enter a year between 1960 and 2017";
		 else if(strlen($mob)!=10 && !ctype_digit($mob))
		 $error = "enter a valid mobile number of 10 digits";
		 else if(strlen($email) > 40)
		 $error = "email address must be less than 40 characters";
		 else if(strlen($pass)<6 || strlen($pass)>20 || $pass=="")
		 $error = "Password must be between 6 to 20 characters";
		 else if($pass!=$rpass)
		 $error = "Please enter same password in both fields";
		 else
		 {
		 $query = "INSERT INTO register(first_name,middle_name,last_name,gender,address,bday,mobile,email,password) VALUES ('$fname','$mname','$lname','$gender','$addr','$bdate','$mob','$email','$pass')";
		 mysqli_query($db,$query) or die(mysqli_error($db));
		 $error = 'account created successfully';
		 }
		 
	 }
	 else
	 {
		 $error = "The email that u entered already exists";
	 }
}

 function swipe($inpt)
	{
		$inpt=trim($inpt);
		$inpt=stripslashes($inpt);
		$inpt=htmlspecialchars($inpt);
		return $inpt;
	}
	if($error=='account created successfully')
header('location: admin.php');
else
header('location: adminm.php');
 ?>
<body>
</body>
</html>