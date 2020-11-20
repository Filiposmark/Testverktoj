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



app.factory("LoadTests", function($http) {
    return {
        load: function(login_id, login_ticket) {
            return $http.get('getservice.php?action=loadTests&login_id=' + login_id + '&ticket=' + login_ticket).then(
                function (response) {
                    if (response.data.success) {
                        console.log(response.data.tests);
                        return response.data.tests;
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



app.controller('studentProfileController', function ($scope, LoadClasses, LoadTests) {
    let student = this;

    $scope.login_id = login_id;
    $scope.login_ticket = login_ticket;

    student.classes = [];
    student.tests = {"active": [], "upcoming": [], "completed": []};

    student.init = function() {
        LoadClasses.load($scope.login_id, $scope.login_ticket).then(function(response) {
            student.classes = response;
        });
        LoadTests.load($scope.login_id, $scope.login_ticket).then(function(response) {
            let now = new Date();
            response.forEach(function(test) {
                // Convert timestamp to readable format
                let date_available = new Date(test.date_available);
                let date_closed = new Date(test.date_closed);
                test["date_available_string"] = date_available.toLocaleString("da-DK");
                test["date_closed_string"] = date_closed.toLocaleDateString("da-DK");
                if (test.date_available < now && now < test.date_closed) {
                    student.tests["active"].push(test);
                } else if (test.date_available > now) {
                    student.tests["upcoming"].push(test);
                } else if (test.date_closed < now) {
                    student.tests["completed"].push(test);
                } else {
                    console.log("Something odd happened to this test:");
                    console.log(test);
                }
            });
            console.log(student.tests);
        });
    };

    let promise = student.init();
});



app.controller('teacherController', function($scope, LoadClasses, LoadTests) {
    let teacher = this;

    $scope.login_id = login_id;
    $scope.login_ticket = login_ticket;

    teacher.classes = [];
    teacher.tests = {"active": [], "upcoming": [], "completed": []};

    teacher.init = function() {
        LoadClasses.load($scope.login_id, $scope.login_ticket).then(function(response) {
            teacher.classes = response;
        });
        LoadTests.load($scope.login_id, $scope.login_ticket).then(function(response) {
            let now = new Date().getTime();
            response.forEach(function(test) {
                // Convert timestamp to readable format
                let date_available = new Date(test.date_available);
                let date_closed = new Date(test.date_closed);
                test["date_available_string"] = date_available.toLocaleString("da-DK");
                test["date_closed_string"] = date_closed.toLocaleDateString("da-DK");
                if (test.date_available < now && now < test.date_closed) {
                    teacher.tests["active"].push(test);
                } else if (test.date_available > now) {
                    teacher.tests["upcoming"].push(test);
                } else if (test.date_closed < now) {
                    teacher.tests["completed"].push(test);
                } else {
                    console.log("Something odd happened to this test:");
                    console.log(test);
                }
            });
            console.log(teacher.tests);
        });
    };

    let promise = teacher.init();
});
