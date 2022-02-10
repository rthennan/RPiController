<?php
	$msg='';
	session_start();
	if (isset($_POST["submit"])) {
		
		$email = $_POST["email"];
		$creds = file('tmpdir/creds.txt');
		if(password_verify($email,trim($creds[0]))&&password_verify($_POST["password"],trim($creds[1]))){
			$_SESSION["email"] = $email;
			$_SESSION["loggedIn"] = 1;			
			header("Location: ctrl.php");
			exit();
			
            } 
		else
			$msg = "Please check your inputs!";
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Are you sure</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<img src="logo.png" width=100%><br><br>
				<div class="message">
					<?php if ($msg != "") echo $msg . "<br><br>"; ?>
				</div>
				<form method="post" action="index.php">
					<input class="form-control" type="text" name="email" placeholder="Email"/><br />	
					<input class="form-control" minlength="5" name="password" type="password" placeholder="Password..."><br>
					<input class="btn btn-primary" name="submit" type="submit" value="Login"><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>
