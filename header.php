<?php
	session_start();

	if (isset($_SESSION['user'])) {

	} else {
		header("Location:index.php");
	}

?>
<link rel="stylesheet" href="css/main.css">
<header>
	<p class="company">Company: <? echo $_SESSION['company'];?></p>
	<p class="user">User: <? echo $_SESSION['user'];?></p>
	<a class="logout" href="logout.php">Log out</a>
</header>