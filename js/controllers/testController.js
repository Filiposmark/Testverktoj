angular.module('app', [])
    .controller('testController', function ($scope, $http) {
        let test = this;

        $scope.login_id = login_id;
        $scope.login_ticket = login_ticket;
        $scope.test_id = test_id;

        test.test = [];
        test.question_index = 0;


        test.loadTest = function(test_id) {
            $http.get('getservice.php?action=loadTest&login_id='+ $scope.login_id + '&ticket=' + $scope.login_ticket + '&test_id=' + test_id).then(
                function(response) {
                    if (response.data.success) {
                        test.test = response.data.test;

                        // Create object property to hold parsed question answers
                        test.test["questions_parsed"] = [];
                        // Parse the JSON encoded answers
                        test.test.questions.forEach(function(item, index) {
                            let question = {
                                "id": item.id,
                                "question": item.question,
                                "type": item.type,
                                "answers": JSON.parse(item.answers)
                            };
                            test.test["questions_parsed"].push(question);
                        });
                        console.log(test.test);
                    } else {
                        // Request succeeded, but the server tells us that something is wrong
                        console.log("Server error:")
                        console.log(response);
                        test.error = "Serverfejl: loadTests";
                    }
                }, function(response) {
                    // Failed, handle this
                    console.log("Request error: ")
                    console.log(response);
                    test.error = "Klientfejl: loadTests";
                });
        }

        let promise = test.loadTest($scope.test_id);



        test.submitTest = function() {
            let testObject = JSON.stringify(test.test); // JSON encode the whole test-object
            let data = {"action": "finishTest", "login_id": $scope.login_id, "ticket": $scope.login_ticket, "test": testObject};
            $http.post("postservice.php", data).then(function (response) {
                if (response.data.success) {
                    console.log("Success");
                    console.log(response);
                    let cur_hostname = window.location.hostname;
                    window.location.replace("https://" + cur_hostname + "/profile_student.php");
                } else {
                    console.log("Server error:")
                    console.log(response);
                    test.error = "Serverfejl: saveTest";
                }
            }, function (response) {
                console.log("Request error: ")
                console.log(response);
                test.error = "Klientfejl: saveTest";
            });
        }


        test.changeQuestion = function(count) {
            if (count === 1 && test.question_index < test.test.questions_parsed.length-1) {test.question_index++;}
            else if (count === -1 && test.question_index > 0) {test.question_index--;}
        }



    });