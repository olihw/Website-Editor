<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body {
			margin: 0;
		}
		.login-container {
			width: 500px;
		    margin: 0 auto;
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
			right: 0;
			margin: 5px;
			border: solid 1px;
		    background-color: white;
		    font-weight: bold;
		    font-size: 18px;
		    top: 62px;
		}

		.login-inputs {
			margin: 10px 10px;
			text-align: center;
		}

		.login-inputs input {
			margin-left: 20px;
			border: solid 1px;
			border-color: grey;
		}
		.register-form {
			margin-top: 50px;
			display: none;
		}
		.register-text {
			display: block;
			padding-top: 20px;
		}
		.register-title {
			text-align: center;
			font-weight: bold;
			font-size: 20px;
		}
		.submit-register {
			width: 80px;
			height: 30px;
			position: absolute;
			right: 0;
			margin: 5px;
			border: solid 1px;
		    background-color: white;
		    font-weight: bold;
		    font-size: 18px;
		    margin: 0 auto;
		    left: 0;
		    margin-top: 20px;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("body").height($(window).height());
			if(window.location.search.substring(1) == "error=1") {
				$(".error-message").show();
			}

			$(".register-title").click(function() {
				$("form").eq(0).hide();
				$("form").eq(1).show();
				$(this).hide();

			})
		});
	</script>
</head>
<body>
<div class="login-container">
	<h1>Webpage Editor</h1>
	<form action="login.php" method="post">
		<p class="error-message">Incorrect login details please try again</p>
		<div class="login-inputs">
			<label for="username">Username</label><input type="text" name="username" required="required"/>
		</div>
		<div class="login-inputs">
			<label for="password">Password</label><input type="password" name="password" required="required"/>
		</div>
		<input type="submit" class="submit" value="Login"/>
	</form>
	<p class="register-title">Click to Register</p>
	<form action="passwordhash.php" method="post" class="register-form">
		<div class="login-inputs">
			<label for="companyName">Company Name: </label>
			<input type="text" name="companyName">
		</div>
		<div class="login-inputs">
			<label for="user">Username: </label>
			<input type="text" name="user">
		</div>
		<div class="login-inputs">
			<label for="password">Password: </label>
			<input type="password" name="password">
		</div>
		<div class="login-inputs">
			<label for="passwordVerify">Re-enter password: </label>
			<input type="password" name="passwordVerify">
		</div>
		<input class="submit-register" type="submit" name="submit-register">
	</form>
</div>
</body>
</html>
