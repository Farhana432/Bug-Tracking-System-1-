<?php
include 'lib/function.php';
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--Bootstrap CSS -->

	<title>SignUP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
		crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<style>
	* {
		margin: 0px;
		padding: 0px;
	}

	body {
		background-image: url("image2/pic2.jpg");
	}

	.already {
		text-decoration: none;
		color: aquamarine;

	}
	</style>
</head>

<body>
	<div class="login-body">

		<div class="login">
			<h2>Sign UP</h2>
			<form id="login" method="post">
				<?php
        signup();
      ?>
				<label id="name"> Username :</label>
				<br>
				<input type="text" name="username" id="name" placeholder="Enter your Name">
				<br><br>
				<label id="name"> Password :</label>
				<br>
				<input type="password" name="upassword" id="name" placeholder="Enter your Password">
				<br><br>

				<a href="login.php" class="already"> already have account? </a><br><br>
				<input type="submit" value="Submit" name="signupbtn" id="submit">
			</form>

		</div>

	</div>
	<script type="text/javascript" src="script.js/script.js"></script>
</body>

</html>