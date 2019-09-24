<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<?php
	session_start();
	$connect= mysqli_connect('localhost','root','','yosefati');
    if(mysqli_connect_errno($connect)){
	echo"ERROR";
	}

	    $userID=$_POST['userId'];
	    $password=$_POST['password'];
		$check= "SELECT * FROM admin WHERE userID='$userID' and password='$password'";
		$cred = mysqli_query($connect, $check);
		$found = mysqli_num_rows($cred);
		if($found==1){
			// echo 'FOUND';
			$_SESSION['userID'] = $userID;
			header('location:admindash.php');
	}
		else{
			// echo 'ERROR NOT FOUND';
			header('location:login.html');
		}
?>		 
</body>
</html>