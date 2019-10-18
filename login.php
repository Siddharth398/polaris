<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel='shortcut icon' type='image/png' href='img/favicon.png'/>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Sign in to your Polaris account | Polaris</title>
	</head>
	<body>
		<div class="grandParentContaniner fixedContainer">
			<div class="parentContainer">
				<form class="form-group login" method="post" action="login.php">
					<?php include('errors.php'); ?>
					<img style="width: 10%; height: 10%" src="img/favicon.png"><br style="margin: 1.5% 0">
					<h5>SIGN IN</h5>
					<div class="input-group">
						<input type="text" name="email" placeholder="Email Address">
					</div>
					<div class="input-group">
						<input type="password" name="password" placeholder="Password">
					</div>
					<div class="input-group">
						<button type="submit" class="btn" name="login_user">LOG IN NOW</button>
					</div>
					<p>Don't have a Polaris account? <a href="register.php">Sign Up</a></p>
				</form>
			</div>
		</div>
	</body>
</html>