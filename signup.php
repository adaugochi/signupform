<?php
	
	session_start();

	require "dbconn.php";

	$message = "";	

	if(isset($_POST['submit'])){
		$email 		= 	checkInput($_POST['email']);
		$password 	= 	md5(checkInput($_POST['password']));

		if (!empty($email) && !empty($password)) {
			
			$query = "SELECT * FROM `users` WHERE `Email` = '$email' AND `password` = '$password'";
			$query_run = mysql_query($query);

			if (mysql_num_rows($query_run) == 1) {
				while ($query_row = mysql_fetch_assoc($query_run)) {
					$_SESSION['firstname'] = strtoupper($query_row['firstName']);
					$_SESSION['lastname'] = strtoupper($query_row['lastName']);
					$_SESSION['Email'] = ($query_row['Email']);
					$_SESSION['phoneNumber'] = ($query_row['phoneNumber']);
					$_SESSION['gender'] = ($query_row['gender']);
					$_SESSION['country'] = ($query_row['country']);
				}
				
				header('location:welcome.php');

			} else {
				$message = "Invalid login credentials";
			}
		} else {
			$message = "Please enter your login credentials";
		}
	}



	function checkInput($userinput) {
		$userinput = trim($userinput);
		$userinput = stripslashes($userinput);
		$userinput = htmlspecialchars($userinput);
		return $userinput;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>sign up page</title>
</head>
<style>
	body{
		background-color: white;

	}

	.container {
		margin : 100px 350px 100px 350px;
		background-color: darkgray;
		color: black;
		border-radius: 10px;
		box-shadow: 1px 2px 5px rgba(0.3, 0.3, 0.3, 0.3);
	}
	input {
		width: 500px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 15px;
        margin-left: 60px;
        color: dimgray;
    }
    input:focus{
    	border-color: deepskyblue;
    }
    	
	label {
   		font-weight: bold;
   		color: white;
   		font-size: 20px;	
   		margin-left: 60px;
   		margin-top: 10px;
	}

	button {
    	padding: 15px 35px 15px 35px;
		color: white;
		background-color: teal;
		border: none;
		border-radius: 10px;
		margin-top: 20px;
		font-size: 15px;
		font-weight: bold;
		margin-left: 250px;
		margin-bottom: 20px;
	}

	button:hover {
		background-color: lightseagreen;
	}

	h3 {
		font-weight: bold;
   		font-size: 30px;
   		margin-bottom: 20px;	
   		padding: 30px 0px 20px 200px;
   		color: white;
   		background-color: teal;
   		border-top-right-radius: 10px;
   		border-top-left-radius: 10px;
	}

	.error {
		color: red;
		font-size: 16px;
		margin-left: 60px;
	}
</style>
<body>
	<div class="container">
		<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="signup">
			<h3>Sign Up</h3>
			<span class="error"><?php echo $message; ?></span>
			<br><br>
			<label for="email">Email:</label>
			<br><br>
			<input type="text" name="email" placeholder="Eg. xyz@abc.com">
			<br><br>
			<label for="password">Password:</label>
			<br><br>
			<input type="password" name="password" placeholder="Enter password">
			<br><br>
			<button name="submit">Sign Up</button>
		</form>
	</div>
</body>
</html>    