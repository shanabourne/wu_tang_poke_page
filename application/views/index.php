<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login/Registration</title>
</head>
<body>
	
</body>
	<?= $this->session->flashdata("errors"); ?>

	<h1>Welcome to Dojo's Poke Page for Wu Tang Members!</h1>
	
	<h2>Register</h2>
<!-- Form to Register -->
	<form action="/logins/register_user" method="post">
		<p><input type="text" name="name" placeholder="Name"></p>

		<p><input type="text" name="alias" placeholder="Nickname"></p>

		<p><input type="text" name="email" placeholder="Email"></p>

		<p><input type="text" name="password" placeholder="Password"></p>
		<p>*Password should be at least 8 characters*</p>
		<p><input type="text" name="confirm" placeholder="Confirm Password"></p>

		<p><input type="text" name="date_of_birth" placeholder="Birthday (YYYY-MM-DD)"></p>

		<p><input type="submit" value="Register"></a></p>
	</form>

	<h2>Login</h2>
<!-- Form to login -->
	<form action="/logins/login_user" method="post">
		<p><input type="text" name="email" placeholder="Email"></p>

		<p><input type="text" name="password" placeholder="Password"></p>

		<p><input type="submit" value="Login"></a>
	</form>

</body>
</html>