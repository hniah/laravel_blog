<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation Email</title>
	</head>
	<body>
		<h1>Thank for sign up!</h1>
		<p>
			Your need to <a href="{{ url('register/confirm/'.$user->token) }}">confirm your email address
			</a>.
		</p>
	</body>
</html>