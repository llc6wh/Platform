<html>
<head>

<style>
	body{
		background-image: url(/images/);
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	#Title{
		text-align: center;
	}

	form {
		position: fixed;
		top: 40%;
		left:43%;
		width:250px;
	}
</style>

</head>

<body>
	<h2 id="Title">Platform</h2>

	<button align="right" type="button"><a href=signup.php>Sign Up for Platform</a></button>

	<form id="login_form" action="login.php" method="post" autocomplete="off">
		Email:  <input type="text" name="email_addr" placeholder="johndoe@gmail.com"></br><p>
		Password: <input type="password" name="login_password" placeholder="Enter your password">
		<input type="submit" value="Log In">
	</form>



</body>



</html>
