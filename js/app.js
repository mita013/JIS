'use strict';

var app = angular.module('myApp', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider.when('/login', {
		templateUrl: 'partials/login.html',
		controller: 'LoginController'
	});
	$routeProvider.when('/homePersonal', {
		templateUrl: 'partials/homePersonal.html',
		controller: 'PersonalController'
	});
	$routeProvider.when('/homeCompany', {
		templateUrl: 'partials/homeCompany.html',
		controller: 'CompanyController'
	});
	$routeProvider.when('/homeSchool', {
		templateUrl: 'partials/homeSchool.html',
		controller: 'SchoolController'
	});
	$routeProvider.when('/homeAdmin', {
		templateUrl: 'partials/homeAdmin.html',
		controller: 'AdminController'
	});
	$routeProvider.otherwise({
		redirectTo: '/login'
	});
}]);

app.run(['$rootScope', '$location', 'loginService', function($rootScope, $location, loginService){
	var permissionRute = ['/homePersonal','/homeAdmin','/homeSchool','/homeCompany'] ;
	$rootScope.$on('$routeChangeStart', function(event, oldUrl, newUrl){
		if ( permissionRute.indexOf($location.path()) != -1  ) {
			loginService.isLogin();
		};
	});
}]);