<?php

include '../crud/includes/db.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
	header("Location: ./index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($mysqli, $sql);
		if (!$result->num_rows > 0) {

			// SQL COMMAND
			$sql = "INSERT INTO users (username, email, passwords)
					VALUES ('$username', '$email', '$password')";

			//QUREY EXCUTED! ADDED TO DATABASE
			$result = mysqli_query($mysqli, $sql);


			// VALIDATION FOR REGISTRATION FORM
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				header("Location: ./index.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - ONLINE MOVIE TICKET BOOKING</title>
</head>

<body>
	<script>
		function vard() {
			var username = document.getElementById("username").value;
			var pass1 = document.getElementById("pass1").value;
			var pass2 = document.getElementById("pass2").value;


			if (username.length < 1) {

				alert("User Name is required!");

				document.getElementById("username").style.border = "4px solid red";

				document.getElementById("user_name").focus();

				return false;

			} else if (pass1.length < 1) {
				alert("Password field is required!");

				document.getElementById("pass").style.border = "4px solid red";

				document.getElementById("pass").focus();
				return false;
			} else if (pass.length < 6 || pass.length > 9) {
				alert("Password must be between 6 and 9 ");
				

				document.getElementById("pass1").style.border = "4px solid red";

				document.getElementById("pass1").focus();
				return false;
			} else {
				return true;
			}



			// return false;
		}
	</script>


	<div class="container">
		<form action="" method="POST" class="login-email" onsubmit="return vard();">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" id="username" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" id="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" id="pass1" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" id="pass2" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>

</html>