<?php
	include("header.php");
?>
<title>Upload Template</title>
<script>
$(".navigation-tab").removeClass("active");
$(".navigation-tab").eq(1).addClass("active");
</script>
<body>
<div class="upload">
	<form action="uploadTemplate.php" method="post" enctype="multipart/form-data">
	<p>TemplateName:</p> 
	<input type="text" name="templateName" id="templateName">
	<input type="file" name="templateUploaded" id="templateUploaded">
	<input class="submit" type="submit" name="submit" value="Upload Template">
	</form>
</div>
</body>
</html> 