angular.module('app', [])
    .controller('createTestController', function ($scope, $http) {
        var test = this;

        $scope.login_id = login_id;
        $scope.login_ticket = login_ticket;

        test.now = new Date();

        test.activeEditingIndex = 0;
        test.questions = [{type:"0", answers:[{}, {}]}];
        test.topics = [];
        test.classes = [];
        test.test = {
            title: "",
            topic: 0,
            date_available: new Date(test.now.getFullYear(), test.now.getMonth(), test.now.getDay(), test.now.getHours(), test.now.getMinutes()), // A bit hacky, but it works .....
            date_closed: new Date(test.now.getFullYear(), test.now.getMonth(), test.now.getDay(), test.now.getHours(), test.now.getMinutes()),
            questions: [{}],
            classes: [{}]
        };

        test.addQuestion = function() {
            test.questions.push({type: "0", answers:[{}, {}]});
            test.activeEditingIndex = test.questions.length-1;
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
                    } else {
                        // Request succeeded, but the server tells us that something is wrong
                        console.log("Server error:")
                        console.log(response);
                        test.error = "Serverfejl: loadTopics";
                    }
                }, function(response) {
                    // Failed, handle this
                    console.log("Request error: ")
                    console.log(response);
                    test.error = "Klientfejl: loadTopics";
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
                    } else {
                        // Request succeeded, but the server tells us that something is wrong
                        console.log("Server error:")
                        console.log(response);
                        test.error = "Serverfejl: loadClasses";
                    }
                }, function(response) {
                    // Failed, handle this
                    console.log("Request error: ")
                    console.log(response);
                    test.error = "Klientfejl: loadClasses";
                });
        }

        let promise_classes = test.loadClasses();





        test.saveTest = function() {
            test.error = "";
            test.test.questions = test.questions;
            test.test.classes = [];
            for (let i=0; i<test.classes.length; i++) {
                if (test.classes[i].selected) {test.test.classes.push(test.classes[i].id);}
            }
            test.test.date_available_millis = test.test.date_available.getTime();
            test.test.date_closed_millis = test.test.date_closed.getTime();
            console.log("Test main obj: ");
            console.log(test.test);

            if (test.test.title === "") {
                test.error = "Du skal give testen et navn.";
            } else if (test.test.topic == null) {
                test.error = "Du skal vælge et fag.";
            } else if (test.classes.length === 0) {
                test.error = "Du skal vælge et eller flere hold.";
            } else if (test.test.date_available === "" || test.test.date_closed === "") {
                //test.error = "Du skal vælge, hvornår testen åbner og lukker";
            } else {
                // "Everything" is ok, submit test.
                let testObject = JSON.stringify(test.test); // JSON encode the whole test-object
                console.log(testObject);
                let data = {"action": "saveTest", "login_id": $scope.login_id, "ticket": $scope.login_ticket, "test": testObject};
                $http.post("postservice.php", data).then(function (response) {
                    if (response.data.success) {
                        console.log("Success");
                        console.log(response);
                        let cur_hostname = window.location.hostname;
                        window.location.replace("https://" + cur_hostname + "/profile_teacher.php");
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
        }

    });