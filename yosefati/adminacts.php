<?php 

require 'admindash.php';

$connect= mysqli_connect('localhost','root','','web_comments');
	
    if(mysqli_connect_errno($connect)){
    	
	echo"ERROR";
	}

if(isset($_REQUEST["id"])){

	$delete = $_REQUEST["id"];

	$query = "DELETE FROM messages WHERE msg_id = '$delete'";

	$qlink = @mysqli_query($connect, $query);

	if($qlink){



		echo 'DONE';

		 
	}else{

		echo 'NOT DONE';

	}
}

	if(isset($_REQUEST["rp"])){

	$reply = $_REQUEST["rp"];

	echo '<br />Recipient Name:<br />';
	echo 'Recipient email:<br /><br />';
	echo '<form method= action=>
			Message:<br /><br /><textarea name=></textarea>
		  </form>';
	echo '';

	/**

	$query = "DELETE FROM messages WHERE msg_id = '$delete'";

	$qlink = @mysqli_query($connect, $query);

	if($qlink){

		  

		echo 'DONE';

		 
	}else{

		echo 'NOT DONE';

	}

	**/
}

	if(isset($_REQUEST["up"])){

	$update = $_REQUEST["up"];

	/**

	$query = "DELETE FROM messages WHERE msg_id = '$delete'";

	$qlink = @mysqli_query($connect, $query);

	if($qlink){

		  

		echo 'DONE';

		 
	}else{

		echo 'NOT DONE';

	}

	**/

	echo '  <h3>Customer Details</h3>
			<form action="" method="">
			<p><b>Customer Name:</b>
			<br /><b>Customer ID:</b>
			<br /><b>Customer Email:</b><br /><br />';

	echo '<b>Job Category</b><select>
			<option value= >option 1</option>
			<option value= >option 2</option>
			<option value= >option 3</option>
			<option value= >option 4</option>
			<option value= >option 5</option>
		 </select><br /><br />';

	echo '<b>Additional Job Details:</b><br />
		  <textarea name=""></textarea></form>';	 		

	mysqli_close($connect);
 }

?>