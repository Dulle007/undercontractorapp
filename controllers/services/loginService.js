'use strict';

app.factory('loginService', function($http, $location, sessionService){
	return{
		login: function(usr, $scope){
			var validate = $http.post('model/login.php', usr);
			validate.then(function(response){
				var uid = response.data.usr;
				if(uid){
					sessionService.set('usr',uid);
					$location.path('/home');
				}
				
				else{
					$scope.successLogin = false;
					$scope.errorLogin = true;
					$scope.errorMsg = response.data.message;
				}
			});
		},
		logout: function(){
			sessionService.destroy('usr');
			$location.path('/');
		},
		islogged: function(){
			var checkSession = $http.post('model/session.php');
			return checkSession;
		},
		fetchuser: function(){
			var usr = $http.get('model/fetch.php');
			return usr;
		}
	};
});