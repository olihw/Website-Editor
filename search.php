<?php
	include("header.php");
?>
<title>Search</title>
<script>
$(".navigation-tab").removeClass("active");
$(".navigation-tab").eq(0).addClass("active");
</script>
<body>
<div class="search">
	<div ng-app="myApp2" ng-controller="retrieveTemplates">
		<div class="contents">
			<div class="filter">
				<p>Select a Template Name:</p> 
				<select ng-model="filterName" ng-options="x.templateName for x in templates">
					<option value="{{x.templateName}}">{{x.templateName}}</option>
				</select>
				<p style="display:none;">Enter a Version Name:</p>
				<input style="display:none;" type="text">
				<button ng-click="clearFilter()">Clear Filter</button>
			</div>
			<div class="page" data-id="{{x.templateName}}" ng-repeat="x in templates | filter : {templateName: filterName.templateName}: true">
				<div class="pageTitle" ng-click="openAccordian(x.templateName)">
				<p class="templateTitle">{{x.templateName}}</p>
				<i class="down-arrow"></i>
				<i class="up-arrow"></i>
				</div>
				<div class='accordian-content {{ x.templateName }}'>
					<a href="webpageEditor.php#{{ x.templateName }}"><p>1</p><p>Inital Upload</p></a>
					<div ng-repeat="versions in x.templateVersions">
						<a href="webpageEditor.php#{{ x.templateName }}||{{ versions.version }}">
							<p>{{versions.version}}</p>
							<p>{{versions.name}}</p>
							<p>{{versions.date}}</p>
						</a>
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
		    	$(".page[data-id='"+templateName+"'] .down-arrow").toggle();
				$(".page[data-id='"+templateName+"'] .up-arrow").toggle();
		    }

		    $scope.deletePage = function(templateName) {
		    	$(".page[data-id='"+templateName+"']").remove();
		    }

		    $scope.clearFilter = function() {
		    	$scope.filterName = {};
		    }

		});


	</script>
</div>
</body>
</html> 