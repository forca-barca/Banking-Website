<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$db=mysqli_connect('localhost','root','root') or die("Unable to establish a connection");

mysqli_select_db($db,'bankdb') or die(mysqli_error($db));
$query = 'CREATE TABLE register(
			record_id INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT,
			first_name VARCHAR(20) NOT NULL DEFAULT 0,
			middle_name VARCHAR(20) NOT NULL DEFAULT 0,
			last_name VARCHAR(20) NOT NULL DEFAULT 0,
			gender ENUM("male","female") NOT NULL,
			address VARCHAR(70) NOT NULL DEFAULT 0,
			bday DATE NOT NULL DEFAULT 0,
			mobile INTEGER(10) NOT NULL DEFAULT 0,
			email VARCHAR(25) NOT NULL DEFAULT 0,
			password VARCHAR(20) NOT NULL,
			
			PRIMARY KEY (record_id)
			)
ENGINE=InnoDB';
mysqli_query($db,$query) or die(mysqli_error($db));
echo 'table created successfully';	
?>
</body>
</html>