<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
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
.text{
		background-color:#FFFFFF;
		color:#003;
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
	.form0{
	position: relative;
	width: 350px;
	height: 50px;
	background-color: #666;
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
</style>
</head>

<body>
<h1 align="center">Administration Page</h1>
    <?php
	$db=mysqli_connect('localhost','root','root','bankdb') or die(mysqli_error($db));
	$method=$_GET['action'];
	if($method=='edit')
	{
		$id=$_GET['id'];
		$query = 'SELECT * FROM accounts WHERE Accountno='.$id.'';
		$result=mysqli_query($db,$query) or die(mysqli_error($db));
		$num=mysqli_num_rows($result);
		if($num==1)
		{
			while($row=mysqli_fetch_assoc($result))
			{
			echo '<form action="admineditm.php" method="post">';
			echo '<fieldset width=30%>';
			$query = 'SELECT first_name,last_name FROM register WHERE record_id='.$row['registerno'].'';
			$record=mysqli_query($db,$query) or die(mysqli_error($db));
			echo '<p>Account Type : ';
			echo $row['Account'];
			echo '</p><p>Account No : ';
			echo $row['Accountno'];
			while($row1=mysqli_fetch_assoc($record))
			{
				echo '<p> first Name :  ';
				echo $row1['first_name'];
				echo '</p>';
				echo '<p> last Name : ';
				echo $row1['last_name'];
				echo '</p>';
			}
				echo '<p> Branch Code : ';
				echo $row['BranchCode'];
				echo '</p>';
			echo '<input type="hidden"  class="text" readonly name="account" value='.$row['Account'].'>';
		echo '<input type="hidden"   class="text" id="acnt"  name="accountno" readonly value='.$row['Accountno'].'>';
		echo '<p> PAN NO :     <input type="text" class="text" name="panno" id="pan" required value='.$row['panno'].'></p>';
		echo '<p> Occupation:  <input type="text" class="text" name="occupation" id="occ" value='.$row['Occupation'].' required></p>';
		if($row['joint_first_name']!='')
		{
		echo '<p> Joint Person First Name :  <input type="text" class="text" id="fir" name="jfname" value='.$row['joint_first_name'].' required></p>';
		echo '<p> Joint person Middle Name : <input type="text" class="text" id="mid" name="jmname" value='.$row['joint_middle_name'].' required></p>';
		echo '<p> Joint Person Last Name :   <input type="text" class="text" id="lname" name="jlname" value='.$row['joint_last_name'].' required></p>';
		if($row['joint_gender']=='male')
		echo '<pre>Joint Person Gender:         Male :<input type="radio"  name="jgender" checked required value="male" > Female:<input type="radio"  name="jgender" required value="female"></pre>';
		else
		echo '<pre>Joint Person Gender:         Male :<input type="radio"  name="jgender" required value="male" > Female:<input type="radio"  name="jgender" required value="female" checked></pre>';
		echo '<div id="add"><p>Joint Person Address:</div><textarea id="textar" required name="jaddr">';
		echo $row['joint_address'];
		echo '</textarea></p>';
		echo '<p>Joint Person Birth date : <input type="date" class="text" id="date" value='.$row['joint_bday'].' name="jbdate" required></p>';
		echo '<p>Joint Person Mobile :     <input type="text" class="text" id="num" max="999999999999" value='.$row['joint_mobile'].' name="jmob" required></p>';
		echo '<p>Joint Person PAN NO :     <input type="text" class="text" id="pan" name="jpanno" value='.$row['joint_panno'].'  required></p>';
		echo '<p>Joint Person Occupation:  <input type="text" class="text" id="occ" name="joccupation" value='.$row['joint_occupation'].' required></p>';
		}
		echo '<input type="submit" value="Update" class="form0" >';
			echo '</fieldset></form>';
			}
		}
		
		
	}
	else if($method=='delete')
	{
		$id=$_GET['id'];
		$query = 'SELECT * FROM accounts WHERE Accountno='.$id.'';
		$result=mysqli_query($db,$query) or die(mysqli_error($db));
		$num=mysqli_num_rows($result);
		if($num==1)
		{
			$query='DELETE FROM accounts WHERE Accountno='.$id.'';
			mysqli_query($db,$query) or die(mysqli_error($db));
			header('location: admin.php');
		}
	}
	?>
</body>
</html>