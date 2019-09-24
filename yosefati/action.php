<!DOCTYPE html>
<html>
<head>
	<title>Prompt Message</title>
	<style>
		#message{width:250px; height:170px; background-color: #87CEFA; font-family: cursive; text-align: center; margin-left: 550px;}
		#message h4{background-color: #CDC673;}
	    .btn{background: transparent; border: 2px solid black;}
	    .btn:hover{background-color: black; color: white;}
	    .error{color:red;}
	</style>
</head>
<body>
<?php
 $connect= mysqli_connect('localhost','root','','yosefati');('localhost');
 if(mysqli_connect_errno($connect)){
	echo"ERROR";
	}
	//CREATING VARIABLE
	$message=$_POST['message'];
	$email=$_POST['email'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	//executing query
	$insert = mysqli_query($connect, "INSERT INTO messages(fname, lname, email, message) VALUES
	('$fname', '$lname', '$email','$message')");
	if($insert ){
	/**
	if(mysql_affected_rows($insert)>0){
	echo'<script type="text/javascript">alert("SUCCESS")</script>';
	}else{
	echo'<script type="text/javascript">alert("ERROR")</script>';
	}
	**/

 	echo '
    <div id="message">
        <h4>MESSAGE SENT</h4>
        <p>To return to home page click the Link below!</p>
        <a href="index.php"><button type="button" class="btn">BACK</button></a>
    </div>';
 }
 else{
 	echo'<div id="message">
        <h4 class="error">ERROR MESSAGE</h4>
        <p>There seem to be a Error!<br>Click on the Link below to try again</p>
        <a href="index.php"><button type="button" class="btn">TRY AGAIN</button></a>
    </div>';
 }
 mysqli_close($connect);
 ?>
 </body>
</html>