<!DOCTYPE html>
<html>
<head>
	<title>CMS Login</title>
	<link rel="stylesheet" type="text/css" href="../css/loginPage.css">
</head>
<body>
	<div class="container">
	<div class="imgcontainer">
    	<img src="../img/Mario.png" alt="Avatar" class="avatar">
  	</div>
		<form method="POST" action="login-action.php">
			<div class="form-row">
			<label class="loginLabel">Username</label>
			<input type="text" name="username">
			</div>
			<div class="form-row">
			<label class="loginLabel">Password</label>
			<input type="password" name="password">
			</div>
			<div class="btwrapper">
				<button type="submit">Login</button>
			</div>
		</form>
	</div>
</body>
</html>