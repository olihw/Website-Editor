<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST['password'];
	$con = mysqli_connect("localhost", "maoh3", "9P1SYmEK4I")or die(mysql_error());
	mysqli_select_db($con ,"c452project")or die("Cannot connect to database");
	$query = mysqli_query($con, "Select * from users WHERE Username = '$username'");
	if (mysqli_num_rows($query)==1) {
		$row = mysqli_fetch_assoc($query);
		if(password_verify($password, $row['Password'])) {
			session_start();
			$_SESSION['user'] = $username;
			$_SESSION['company'] = $row['Company'];
			header("location: search.php");
		} else {
			header("location: index.php?error=1");
		}
	} else {
		header("location: index.php?error=1");
	}
}
?>