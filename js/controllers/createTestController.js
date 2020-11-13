angular.module('app', [])
    .controller('createTestController', function ($scope, $http) {
        var test = this;

        $scope.login_id = login_id;
        $scope.login_ticket = login_ticket;

        test.activeEditingIndex = 0;
        test.questions = [{type:"0", answers:[{}, {}]}];
        test.topics = [];
        test.classes = [];
        test.test = {
            title: "",
            topic: 0,
            questions: [{}]
        };

        test.addQuestion = function() {
            test.questions.push({type: "0", answers:[{}, {}]});
            test.activeEditingIndex = test.questions.length-1;
            console.log(test.questions);
            console.log(JSON.stringify(test.questions));
        }

        test.removeQuestion = function(index) {
            if(test.questions.length > 1) {
                test.questions.splice(index, 1);
            }
            if (test.activeEditingIndex > 0) {
                test.activeEditingIndex--;
            }
        }

        test.removeAnswer = function(index) {
            if (test.questions[test.activeEditingIndex]['answers'].length > 2) {
                test.questions[test.activeEditingIndex]['answers'].splice(index, 1);
            }
        }


        test.returnTypeIconPath = function(type) {
            if (type === 1) {
                return "assets/icons/radio-button-group.png";
            } else if (type === 2) {
                return "assets/icons/pen.png";
            } else {
                return "#";
            }
        }


        test.loadTopics = function() {
            $http.get('getservice.php?action=loadTopics&login_id='+ $scope.login_id + '&ticket=' + $scope.login_ticket).then(
                function(response) {
                    if (response.data.success) {
                        test.topics = response.data.topics;
                        console.log(test.topics);
                    } else {
                        // Request succeeded, but the server tells us that something is wrong
                        console.log("Server error:")
                        console.log(response);
                    }
                }, function(response) {
                    // Failed, handle this
                    console.log("Request error: ")
                    console.log(response);
                });
        }

        let promise_topics = test.loadTopics();




        test.loadClasses = function() {
            $http.get('getservice.php?action=loadClasses&login_id='+ $scope.login_id + '&ticket=' + $scope.login_ticket).then(
                function(response) {
                    if (response.data.success) {
                        test.classes = response.data.classes;
                        for (let i=0; i<test.classes.length; i++) {
                            test.classes[i].selected = false;
                        }
                        console.log(test.classes);
                    } else {
                        // Request succeeded, but the server tells us that something is wrong
                        console.log("Server error:")
                        console.log(response);
                    }
                }, function(response) {
                    // Failed, handle this
                    console.log("Request error: ")
                    console.log(response);
                });
        }

        let promise_classes = test.loadClasses();





        test.saveTest = function() {
            test.test.questions = test.questions;
            test.test.classes = [];
            for (let i=0; i<test.classes.length; i++) {
                if (test.classes[i].selected) {test.test.classes.push(test.classes[i].id);}
            }
            console.log("Test main obj: ");
            console.log(test.test);
        }

    });