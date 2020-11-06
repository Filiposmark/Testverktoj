angular.module('app', [])
    .controller('createTestController', function ($scope, $http) {
        var test = this;

        test.activeEditingIndex = 0;
        test.questions = [{type:"0", answers:[{}, {}]}];

        test.addQuestion = function() {
            test.questions.push({type: "0", answers:[{}, {}]});
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
            console.log("Remove " + index);
            if (test.questions[test.activeEditingIndex]['answers'] > 2) {
                test.questions[test.activeEditingIndex]['answers'].splice(index, 1);
            }
        }


        test.returnTypeIconPath = function(type) {
            if (type === "1") {
                return "assets/icons/radio-button-group.png";
            } else if (type === "2") {
                return "assets/icons/pen.png";
            } else {
                return "#";
            }
        }

    });