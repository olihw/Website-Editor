<?php
	include("header.php");
?>
<title>Upload Template</title>
<script>
$(".navigation-tab").removeClass("active");
$(".navigation-tab").eq(2).addClass("active");
$("#uploadComponent").submit(function(e){
			$.ajax({
				url: 'uploadComponent.php',
				type: 'POST',
				data: new FormData(this),
				processData: false,
				contentType: false,
				success: function(response) {
				}
			});
		})
</script>
<body>
<div class="upload">
	<form method="post" enctype="multipart/form-data" id="uploadComponent">
		<p>Component Name</p> 
		<input type="text" name="componentName" id="componentName">
		<input type="file" name="componentUploaded" id="componentUploaded">
		<input type="submit" class="submit" id="submit" name="submit" value="Upload component">
	</form>
</div>
</body>
</html> 