<?php
	include("header.php");
?>
<title>Search</title>
<script>
</script>
<body>
<div class="search">
	<div ng-app="myApp2" ng-controller="retrieveTemplates">
		<div class="contents">
			<div class="page" data-id="{{x.templateName}}" ng-repeat="x in templates">
				<div class="pageTitle" ng-click="openAccordian(x.templateName)">
				<a href="webpageEditor.php#{{ x.templateName }}">{{ x.templateName }}</a>
				<i class="down-arrow"></i>
				<i class="up-arrow"></i>
				</div>
				<div class='accordian-content {{ x.templateName }}'>
					<div ng-repeat="versions in x.templateVersions">
						<a href="webpageEditor.php#{{ x.templateName }}||{{ versions.version }}">{{versions.version}}</a>
					</div>
				</div>
				<span  ng-click="deletePage(x.templateName)" class="deletePage">Delete</span>
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

		    $scope.deletePage = function(templateName) {
		    	$(".page[data-id='"+templateName+"']").remove();
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