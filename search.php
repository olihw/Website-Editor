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
		<div class="contents">
			<div ng-click="openAccordian()" class="page" ng-repeat="x in templates">
				<div class="pageTitle">
				<a href="webpageEditor.php#{{ x.templateName }}">{{ x.templateName }}</a>
				</div>
				<div class='accordian-content'>
					<div ng-repeat="versions in x.templateVersions">
						<a href="webpageEditor.php#{{ x.templateName }}||{{ versions.version }}">{{versions.version}}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var app = angular.module('myApp', []);
		app.controller('retrieveTemplates', function($scope, $http) {
		    $http.get("searchTemplates.php")
		    .then(function (response) {
		    	console.log(response);
		    	$scope.templates = response.data.templates;
		    });

		    $scope.openAccordian = function() {
		    	this.find(".accordian-content").slideToggle();
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