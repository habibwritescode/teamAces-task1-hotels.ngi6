<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Team Aces Log-in Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
					<?php 
					if (isset($_SESSION['loginError'])){
						foreach ($_SESSION['loginError'] as $error) {
							echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
							unset($errors);
						}
						unset($_SESSION['loginError']);
					}
					if(isset($_GET['success'])){
						echo '<div class="alert alert-success" role="alert">'.'Sign up was successful, please use your registration details to login'.'</div>';
					}
					?>
				<form 
				action="./scripts/login.php"
            	method="post"
				class="login100-form validate-form">
					<span class="login100-form-title pb-1">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="images/avatar1.jpg" alt="AVATAR">
					</span>

					<div class="wrap-input100 my-4">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 mb-3">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn add-paddingtop">
						<button class="login100-form-btn" type="submit" name="login-submit">
							Login
						</button>
					</div>
					<div>
						Don't have an account?
						<a href="index.php"  style="color: aquamarine">Sign Up</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
</body>
</html>