<?php
	
	//destroying session
	session_start();
	session_destroy();
	header('location:signup.php');

	//deleting cookie
	setcookie("fName", "", time()- 60, "/", "", 0); 
	setcookie("lName", "", time()- 60, "/", "", 0); 
?>