'use strict';

app.controller('fakturaCtrl', ['$scope', 'loginService', '$location', function ($scope, loginService, $location) {
        //logout
        $scope.logout = function () {
            loginService.logout();
        };
        //fetch login user
        var userrequest = loginService.fetchuser();
        userrequest.then(function (response) {
            $scope.usr = response.data[0];
        });     
        
    }]);

