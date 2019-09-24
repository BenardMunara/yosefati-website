<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
</head>
<body>
	<div>
		<img src="images/logo1.jpg" alt="Profile" />
		<h4> Welcome Admin <?php echo $_SESSION['userID']; ?> </h4><br>
		<a href="logout.php"><button type="submit" class="btn">LOGOUT</button></a>
   </div><br />
	<div>
		<form action="admindash.php" method="get">
			<input type="text" name="keywrds" placeholder="Enter Parameters...">
			<button type="submit" class="btn">Search</button>
		</form>
	</div>	
</body>
</html>	
<?php
 
	$userr = $_SESSION['userID'];
 	
	if($userr) {
		
	$connect= mysqli_connect('localhost','root','','web_comments');
	
    if(mysqli_connect_errno($connect)){
    	
	echo"ERROR";
	}
	
	if(isset($_GET['keywrds'])) {
		
		$searchq = $_GET['keywrds'];
		
		$searchquery = "SELECT * FROM messages WHERE fname LIKE '%$searchq%' OR email LIKE '%$searchq%' 
						OR lname LIKE '%$searchq%' OR msg_id LIKE '%$searchq%'";
		
		$result = @mysqli_query($connect, $searchquery);
		
		//$effect = @mysqli_num_rows($searchquery);
		
		echo "<br /><p>Executing search for <b>$searchq</b></p>";
		
		if($searchq=='') {
				
				echo '<br/>Please enter search parameters!<br/>';
			 } 
			
		else{
		 
			while($row = mysqli_fetch_array($result)) {
				 
				echo '<b>First Name:</b> ' . $row['fname'] . '<br/>';
				echo '<b>Last Name: </b>' . $row['lname'] . '<br/>';
				echo '<b>E-mail: </b>' . $row['email'] . '<br/>';
				echo '<b>Message:</b> ' . $row['message'] . '<br /><br /> '; 
				echo "<a href=adminacts.php?id=$row[msg_id]><button type=submit>Delete</button></a>"; 
				echo " <a href=adminacts.php?rp=$row[msg_id]><button type=submit>Reply</button></a>" ;
				echo " <a href=adminacts.php?up=$row[msg_id]><button type=submit>Update to Customers</button></a>" . '<br /><br />'; 
				  
			         

	/**		    	 
			
		<!--	
			<form method = "post" action="adminacts.php">
			 <button type="submit" name="reply" value="reply">Reply</button> 	
			 <button type="submit" name="update" value="update">Update</button> 
			 <button type="submit" name="delet" value="delet">Delete</button> 
			 <input type="hidden" name="email" value= "<?php $row["email"] ?>"  />
			</form>
			<br /><br /> 	--> **/
 
 
    
				 
			} 

			 
		}
		
		if(!$result) {
			
			echo 'No results found!!';
		}
		
		
}
mysqli_close($connect); 
}		
/**	 
	$query = "SELECT name, email, comment FROM comments";

	$response = @mysqli_query($connect, $query);

	if($response){
		 
		echo '<table align="left" cellspacing="5" cellpadding="8">
		<tr><td align="left"><b> NAME</b></td>
		<td align="left"><b> E-MAIL</b></td>
		<td align="left"><b> MESSAGE</b></td>';
		while($row = mysqli_fetch_array($response)){
			echo '<tr><td align="left">' .
			$row['name'] . '</td>';
			echo '<td align="left">' .
			$row['email'] . '</td>';
			echo '<td align="left">' .
			$row['comment'] . '</td>';

			echo '</tr>';
		}
		echo '</table>';
	}
	else{
		echo 'FAILED';
		echo mysqli_error($connect);
	}
 **/

 else {
	header('location:login.html');
}
	?>