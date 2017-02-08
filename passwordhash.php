<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

	$username = $_POST["username"];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]);
	$con = mysqli_connect("localhost", "maoh3", "9P1SYmEK4I")or die(mysql_error());
	mysqli_select_db($con ,"c452project")or die("Cannot connect to database");
	$query = mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
	// $query = mysqli_query($con, "Select * from users");
	// while($row = mysqli_fetch_array($query)) {
	// 	echo $row['Company'];
	// }
}
?>