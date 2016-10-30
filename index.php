<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body {
			margin: 0;
		}
		.login-container {
			width: 400px;
		    margin: 0 auto;
		    border: 1px solid;
		    position: relative;
    		transform: translateY(-50%);
    		top: 50%;
		}

		.login-container h1 {
			text-align: center;
		}
		.error-message {
			display: none;
			color: red;
			text-align: center;
		}

		.submit {
			width: 80px;
			height: 30px;
			position: absolute;
			bottom: 0;
			right: 0;
			margin: 5px;
		}

		.login-inputs {
			margin: 10px 10px;
			width: 62%;
		}

		.login-inputs input {
			float: right;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("body").height($(window).height());
			if(window.location.search.substring(1) == "error=1") {
				$(".error-message").show();
			}
		});
	</script>
</head>
<body>
<div class="login-container">
	<form action="login.php" method="post">
		<h1>Login</h1>
		<p class="error-message">Incorrect login details please try again</p>
		<div class="login-inputs">
			<label for="username">Username</label><input type="text" name="username" required="required"/>
		</div>
		<div class="login-inputs">
			<label for="password">Password</label><input type="password" name="password" required="required"/>
		</div>
		<input type="submit" class="submit" value="Submit"/>
	</form>
</div>
</body>
</html>
