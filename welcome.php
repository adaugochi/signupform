<?php
	//starting a session
	session_start(); //comment out when using cookie
?>

<!DOCTYPE html>
<html>
<head>
	<title>welcome page</title>
</head>
<style type="text/css">
	body {
		text-align: center;
	}
	#logout {
		font-size: 20px;
	}
</style>
<body>
	<!--using php session variable-->
	<h2> 
		<?php 
			if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
				echo "Welcome ". $_SESSION['firstname']." ".$_SESSION['lastname']. "<br>";
		?>
	</h2>
	<p>	
		<?Php
				echo 'This is your home page, click <a href="readmore.php">here</a> to see your profile <br><br>';
				echo '<a href="logout.php" id="logout"><button>Logout </button></a>';
			} else {
				echo "Sorry... Not recognized!";
			}
			
		?>	
	</p>

	<!--using php cookie-->
	<h2> 
		<?php 
			if (isset($_COOKIE['fName']) && isset($_COOKIE['lName'])) {
				echo "Welcome ". $_COOKIE['fName']." ".$_COOKIE['lName']. "<br>";
		?>
	</h2>
	<p>	
		<?Php
				echo 'This is your home page, click <a href="readmore.php">here</a> to see your profile <br><br>';
				echo '<a href="logout.php" id="logout"><button>Logout </button></a>';
			} else {
				echo "Sorry... Not recognized!";
			}
			
		?>	
	</p>
</body>
</html>