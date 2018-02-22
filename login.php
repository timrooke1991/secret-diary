<?php

	session_start();

	if ($_GET["logout"] == 1 AND $_SESSION['id']) {session_destroy();

		$message = "You have been logged out. Have a nice day!";

	}

	include("connection.php");

	if ($_POST['submit'] == "sign up") {

		if (!$_POST['email']) {

			$error.="<br />Please enter your email";

		}	else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

			$error.="<br />Please enter a valid email address";

		}

		if(!$_POST['password']) {

			$error.="<br />Please enter your password";

		}	else {

				if (strlen($_POST['password']) < 8) {

					$error.="<br />Please enter at least 8 characters";

				}
				
				if (!preg_match(('`[A-Z]`'), ($_POST['password']))) {

					$error.="<br />Your password needs to have a capital letter";

				}
			}

		if($error) {

			$error = "There were error(s) in your signup details:".$error;

			print_r($error);

		} else {

			$link= mysqli_connect("localhost", "mySql USER NAME", "mySql Password ", "mySql Database name");

			$query="SELECT * FROM `users` WHERE `email`='".mysqli_real_escape_string($link,$_POST['email'])."'";

			$result = mysqli_query($link, $query);	
			
			$results = mysqli_num_rows($result);

			if ($results) {

				$error = "That email address is already registered. Do you want to log in?";

				print_r($error);

			} else {

				$query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".sha256(md5($_POST['email']).$_POST['password'])."')";   
    			
    			mysqli_query($link, $query);
    		
    			echo "You've been signed up!";

    			$_SESSION['id']=mysqli_insert_id($link);

    			header("Location: mainpage.php");
			}


		}
		
	}

	if ($_POST['submit'] == "Log In") {	
	
		$query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['loginemail'])."'AND password='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."'LIMIT 1";

		$result = mysqli_query($link, $query);
		
		$row = mysqli_fetch_array($result);
		
		if ($row) {

			$_SESSION['id']=$row['id'];

			header("Location: mainpage.php");
			
			//Redirect to login page

		} else {

			$error = "We could not find a user with that email and password";

			print_r($error);

		}

	}

?>


<form method="post">

					<input type="email" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>"/>

					<input type="password" name="password" value="<?php echo addslashes($_POST['password']); ?>"/>

					<input type="submit" name="submit" value="sign up"/>

				</form>

				<form method="post">

					<input type="email" name="loginemail" id="loginemail" value="<?php echo addslashes($_POST['email']); ?>"/>

					<input type="password" name="loginpassword" value="<?php echo addslashes($_POST['password']); ?>"/>

					<input type="submit" name="submit" value="Log In"/>

				</form>
