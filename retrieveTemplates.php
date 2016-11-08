<?php
	$con = mysqli_connect("localhost", "root", "root")or die(mysql_error());
	mysqli_select_db($con ,"project")or die("Cannot connect to database");
	$query = mysqli_query($con, "Select * from templates WHERE `Template Name` = 'Test without CSS/JS'");
	if (mysqli_num_rows($query)==1) {
		$row = mysqli_fetch_assoc($query);

		echo json_encode($row['Template']);
	} else {
		echo "Doesn't work";
	}
?>