let app = angular.module('app', []);


app.factory("LoadClasses", function ($http) {
    return {
        load: function(login_id, login_ticket) {
            return $http.get('getservice.php?action=loadClasses&login_id=' + login_id + '&ticket=' + login_ticket).then(
                function (response) {
                    if (response.data.success) {
                        console.log(response.data.classes);
                        return response.data.classes;
                    } else {
                        // Request succeeded, but the server tells us that something is wrong
                        console.log("Server error:")
                        console.log(response);
                        return [];
                    }
                }, function (response) {
                    // Failed, handle this
                    console.log("Request error: ")
                    console.log(response);
                    return [];
                });
        }
    }
});



app.controller('studentProfileController', function ($scope, $http, LoadClasses) {
    let student = this;

    $scope.login_id = login_id;
    $scope.login_ticket = login_ticket;

    student.classes = [];

    student.init = function() {
        LoadClasses.load($scope.login_id, $scope.login_ticket).then(function(response) {
            student.classes = response;
        });
    };

    let promise = student.init();

});