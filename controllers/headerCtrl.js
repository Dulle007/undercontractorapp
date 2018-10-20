'use strict';

app.controller('headerCtrl', ['$scope', 'loginService', function ($scope, loginService) {
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

