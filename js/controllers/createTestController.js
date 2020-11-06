angular.module('app', [])
.controller('createTestController', function ($scope, $http) {
    var test = this;

    test.activeEditingIndex = 0;
    test.questions = [{type:"0"}, {type: "0"}];

    test.addQuestion = function() {
        test.questions.push({type: "0"});
        console.log(test.questions);
        console.log(JSON.stringify(test.questions));
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