'use strict';

app.controller('loginCtrl', function($scope, loginService){
	$scope.errorLogin = false;
	
	$scope.login = function(usr){
		loginService.login(usr, $scope);
	};

	$scope.clearMsg = function(){
		$scope.errorLogin = false;
	};
});