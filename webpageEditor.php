<?php
	include("header.php");
?>
<title>Webpage Editor</title>
<script>
	$('body').append('<iframe id="htmlContainer '+$(".company").text()+'" class="htmlContainer template" width="100%" height="100%" src="iframeEditor.php#'+location.hash.substring(1)+'"></iframe>')
</script>
<body>
<a href="search.php"><button>Back to search</button></a>
</body> 