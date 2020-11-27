<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html ng-app="app">
<head>
    <title>Opret test</title>

    <!-- AngularJS - the framework doing magic in this file -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="js/controllers/createTestController.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link href="assets/fontawesome/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body class="container-fluid image-bg" ng-controller="testController as test">
<?php if (login_check($mysqli) == true) : ?>
    <script>
        // Used by angularjs controller
        let login_id = "<?php echo $_SESSION['user_id']; ?>";
        let login_ticket = "<?php echo $_SESSION['ticket']; ?>";
        let test_id = "<?php echo $_GET['id']; ?>";
    </script>

    <div class="row">
        <div class="col-12 offset-0 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
            <div class="question-box">
                <p class="question-helper">Spørgsmål {{test.question_index +1}}/{{test.test.questions.length}}</p>
                <h4 class="question-title">{{test.test.questions_parsed[test.question_index].question}}</h4>
                <hr>
                <div ng-if="test.test.questions_parsed[test.question_index].type == 2">
                    <p>Besvar spørgsmålet nedenfor:</p>
                    <input type="text" class="question-freetext form-control" placeholder="Dit svar ..." ng-model="test.test.questions_parsed[test.question_index].answer">
                </div>
                <div class="answers-select" ng-if="test.test.questions_parsed[test.question_index].type == 1">
                    <p>Vælg en af mulighederne:</p>
                    <div class="card" ng-repeat="answer in test.test.questions_parsed[test.question_index].answers" ng-class="{'selected': test.test.questions_parsed[test.question_index].answer == $index}">
                        <div class="card-body" ng-click="test.test.questions_parsed[test.question_index].answer = $index">
                            {{answer.answer}}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="center">
                    <p class="hover inline" ng-click="test.changeQuestion(-1)"><i class="fa fa-arrow-left fa-lg"></i></p> &nbsp;
                    <button class="btn btn-success btn-sm" ng-click="test.submitTest()">Aflever test</button> &nbsp;
                    <p class="hover inline" ng-click="test.changeQuestion(1)"><i class="fa fa-arrow-right fa-lg"></i></p>
                </div>

            </div>
        </div>
    </div>




    <script src="js/controllers/testController.js"></script>
<?php else : echo "Du skal være logget ind for at se siden. <a href='index.php'>Log ind her</a>"; endif; ?>
</body>
</html>