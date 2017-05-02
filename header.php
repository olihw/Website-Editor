<?php
	session_start();

	if (isset($_SESSION['user'])) {

	} else {
		header("Location:index.php");
	}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="JS/main.js"></script>
<link rel="stylesheet" href="css/main.css">
<header>
	<ul class="header-information">
		<li class="company"><? echo $_SESSION['company'];?></li>
		<li class="user">User: <? echo $_SESSION['user'];?></li>
		<li><a class="logout" href="logout.php">Log out</a></li>
	</ul>
	<ul class="navigation">
		<li class="navigation-tab"><a href="search.php">Search</a></li>
		<li class="navigation-tab"><a href="uploadTemplatePage.php">Upload Template</a></li>
		<li class="navigation-tab">Upload Component</li>
		<li class="navigation-tab">User Guide</li>
	</ul>
</header>