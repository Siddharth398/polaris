<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel='shortcut icon' type='image/png' href='img/favicon.png'/>
		<title>Register for a Polaris account | Polaris</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>	
		<div class="grandParentContaniner fixedContainer">
			<div class="parentContainer">
				<form class="form-group register" method="post" action="register.php">
						<?php include('errors.php'); ?>
						<img style="width: 10%; height: 10%" src="img/favicon.png"><br style="margin: 1.5% 0">
						<h5>SIGN UP</h5>
						<div class="input-group">
							<input type="text" name="fname" value="<?php echo $fname; ?>" placeholder="*First Name">
						</div>
						<div class="input-group">
							<input type="text" name="lname" value="<?php echo $lname; ?>" placeholder="*Last Name">
						</div>
						<div class="input-group">
							<input type="text" name="disname" value="<?php echo $disname; ?>" placeholder="*Display Name">
						</div>
						<div class="input-group">
							<input type="email" name="email" value="<?php echo $email; ?>" placeholder="*Email Address">
						</div>
						<div class="input-group">
							<input type="password" name="password_1" placeholder="*Password">
						</div>
						<div class="input-group">
							<input type="password" name="password_2" placeholder="*Retype Password">
						</div>
						<div class="input-group">
							<button type="submit" class="btn" name="reg_user">CREATE ACCOUNT</button>
						</div>
							<p>Have a Polaris account?  <a href="login.php">Sign In</a>
						</p>
				</form>
			</div>
		</div>
	</body>
</html>