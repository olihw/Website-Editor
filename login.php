<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
echo "1";
	$username = $_POST["username"];
	$password = $_POST['password'];
	$con = mysqli_connect("localhost", "root", "root")or die(mysql_error());
	mysqli_select_db($con ,"project")or die("Cannot connect to database");
	$query = mysqli_query($con, "Select * from users WHERE Username = '$username'");
	if (mysqli_num_rows($query)==1) {
		$row = mysqli_fetch_assoc($query);
		if(password_verify($password, $row['Password'])) {
			session_start();
			$_SESSION['user'] = $username;
			header("location: search.html");
		} else {
			header("location: index.php?error=1");
		}
	} else {
		header("location: index.php?error=1");
	}
}
?>