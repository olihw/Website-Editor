<?php
	include("header.php");
?>
<title>Search</title>
<script>
</script>
<body>
<div class="search">
	<h2>Search</h2>
	<div ng-app="myApp2" ng-controller="retrieveTemplates">
		<div class="contents">
			<div class="page" ng-repeat="x in templates">
				<div class="pageTitle" ng-click="openAccordian(x.templateName)">
				<a href="webpageEditor.php#{{ x.templateName }}">{{ x.templateName }}</a>
				</div>
				<div class='accordian-content {{ x.templateName }}'>
					<div ng-repeat="versions in x.templateVersions">
						<a href="webpageEditor.php#{{ x.templateName }}||{{ versions.version }}">{{versions.version}}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var app = angular.module('myApp2', []);
		app.controller('retrieveTemplates', function($scope, $http) {
		    $http.get("searchTemplates.php")
		    .then(function (response) {
		    	console.log(response);
		    	$scope.templates = response.data.templates;
		    });

		    $scope.openAccordian = function(templateName) {
		    	$(".accordian-content."+templateName).slideToggle();
		    }


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