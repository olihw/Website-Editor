<?php
	session_start();

	if (isset($_SESSION['user'])) {

	} else {
		header("Location:index.php");
	}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="css/main.css">
<header>
	<p class="company">Company: <? echo $_SESSION['company'];?></p>
	<p class="user">User: <? echo $_SESSION['user'];?></p>
	<a class="logout" href="logout.php">Log out</a>
</header>