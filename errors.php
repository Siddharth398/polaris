<html>
	<head>
		<link rel='stylesheet' type='text/css' href='style.css'/>    
	</head>
	<body>
		<?php  if (count($errors) > 0) : ?>
		<div class="error">
			<?php foreach ($errors as $error) : ?>
			<p style="color: white;"><?php echo $error ?></p>
			<?php endforeach ?>
		</div>
		<br style="margin: 0.1% 0">
		<?php  endif ?>
	</body>
</html>