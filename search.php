<?php
	include("header.php");
?>
<title>Search</title>
<script>
</script>
<body>
<div class="search">
	<h2>Search</h2>
	<div ng-app="myApp" ng-controller="retrieveTemplates">
	<table>
		<tr ng-repeat="x in templates">
			<td><a href="webpageEditor.php#{{ x.templateName }}">{{ x.templateName }}</a></td>
		</tr>
	</table>
	</div>
	<script>
		var app = angular.module('myApp', []);
		app.controller('retrieveTemplates', function($scope, $http) {
		    $http.get("searchTemplates.php")
		    .then(function (response) {
		    	$scope.templates = response.data.templates;
		    });
		});
	</script>
</div>
<div class="upload">
	<h2>Upload Template</h2>
	<form action="uploadTemplate.php" method="post" enctype="multipart/form-data">
		<input type="file" name="templateUploaded" id="templateUploaded">
		</br>TemplateName: <input type="text" name="templateName" id="templateName">
		</br><input type="submit" name="submit" value="Upload Template">
	</form>
</div>
</body>
</html> 