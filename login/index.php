<?php

include '../crud/includes/db.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
	header("Location: /movie/movie.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email='$email' AND passwords='$password'";
	$result = mysqli_query($mysqli, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['password'] = $row['passwords'];
		$_SESSION['role'] = $row['role'];


		if ($_SESSION['role'] == 0) {
			header("Location: /movie/movie.php");
		}
		if ($_SESSION['role'] == 1) {
			header("Location: /movie/crud");
		}
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">



	<!-- FORM VALIDATION -->

	<script type="text/javascript">
		function val() {


			var emails = document.getElementsByID("email").value;
			var password = document.getElementsByID("pass").value;

			if (emails == "")
				alert("Woops! Email or Password is Wrong..");


			if (password == "")
				alert("Woops! Email or Password is Wrong..");
		}
	</script>

	<title>Login Form - ONLINE MOVIE BOOKING</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email" onsubmit="return val()" ;>
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" id="email">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" id="pass">
			</div>

			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>




</body>

</html>