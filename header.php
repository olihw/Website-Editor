<?php
	session_start();

	if (isset($_SESSION['user'])) {

	} else {
		header("Location:index.php");
	}

?>
<header>
	<p>User: <? echo $_SESSION['user'];?></p>
	<p>Company: <? echo $_SESSION['company'];?></p>
	<a href="logout.php">Log out</a>
</header>