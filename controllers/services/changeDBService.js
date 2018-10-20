'use strict';

app.factory('changeDBService', function ($http, $location, sessionService, loginService) {
    return{
        connectToDB: function () {
            var usr = loginService.fetchuser();
            var send = $http.post('model/', usr);
            send.then(function (response) {
                response.data.usr;
            });
        },
        fetchDBData: function () {
            var usr = $http.get('model/fetchDB_params.php');
            return usr;
        }

    };
});