'use strict';

app.controller('homeCtrl', ['$scope', 'loginService', '$location', function ($scope, loginService, $location) {
        var dbdata = {
            host_name: "",
            database_name: "",
            user_db: "",
            password_db: ""
        };

        //logout
        $scope.logout = function () {
            loginService.logout();
        };

        //fetch login user
        var userrequest = loginService.fetchuser();
        userrequest.then(function (response) {
            $scope.usr = response.data[0];//take users data
            var dbparam = response.data[0];

             dbdata = {
                host_name: dbparam.host_name,
                database_name: dbparam.database_name,
                user_db: dbparam.user_db,
                password_db: dbparam.password_db
            };

           /*dbdata = {
             host_name: "mysql678.loopia.se",
             database_name: "consultech_rs_db_16",
             user_db: "ucdb_gp@c45698",
             password_db: "^ucdb_gp#2018"
             };
            console.log(dbdata);*/

            var userrequestdb = loginService.fetchdbdata(dbdata);
            userrequestdb.then(function (response) {
                $scope.usrdb = response.data[0];
            });

        });






        $scope.goToFaktura = function () {
            $location.path("/faktura");
        };
    }]);