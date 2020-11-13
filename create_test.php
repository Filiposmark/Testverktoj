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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link href="assets/fontawesome/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body class="container-fluid grey-bg" ng-controller="createTestController as test">

<script>
    // Used by angularjs controller
    let login_id = "<?php echo $_SESSION['user_id']; ?>";
    let login_ticket = "<?php echo $_SESSION['ticket']; ?>";
</script>

<div class="card">
    <div class="card-header">
        <h2>Opret test</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="form-group">
                    <label for="test-title" class="text-bold">Navn</label>
                    <input type="text" class="form-control" placeholder="Testens navn ..." id="test-title" ng-model="test.test.title">
                </div>
            </div>
            <div class="col-12 col-lg-3 col-xl-2">
                <div class="form-group">
                    <label for="test-topic" class="text-bold">Fag</label>
                    <select class="custom-select" id="test-topic" ng-model="test.test.topic">
                        <option value="" disabled selected style="display:none">Vælg et fag ...</option>    <!-- Kind of placeholder which should not be visible -->
                        <option ng-repeat="topic in test.topics" ng-value="topic.id*1">{{topic.title}}</option>   <!-- Hacky, but multiplying with 1 makes the string a number -->
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-xl-6 offset-xl-1">
                <p style="font-weight: bold; margin-bottom: .5em;">Vælg hold, der skal tilkyttes</p>
                <p class="card-text badge-container">
                    <span class="badge badge-pill badge-hover"
                          ng-class="{'badge-success': class.selected, 'badge-danger': !class.selected}"
                          ng-click="class.selected = !class.selected"
                          ng-repeat="class in test.classes">{{class.name}}</span>
                </p>
            </div>
        </div>
    </div>
</div>
<br>
<hr>

<div class="row">
    <div class="col-12 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4>Alle spørgsmål</h4>
            </div>
            <div class="card-body">
                <table class="table test-table table-hover table-clickable">
                    <tr>
                        <th scope="col" class="col-2" style="width: 16.66%">#</th>
                        <th scope="col" class="col-2" style="width: 16.66%">Type</th>
                        <th scope="col" class="col-8" style="width: 66.66%">Spørgsmål</th>
                    </tr>
                    <tr ng-repeat="question in test.questions" ng-click="test.activeEditingIndex = $index" ng-class="{'test-table-row-active': $index == test.activeEditingIndex}">
                        <th class="col-2" style="width: 16.66%">
                            <p>{{$index +1}}</p>
                        </th>
                        <td class="col-2" style="width: 16.66%">
                            <img ng-src="{{test.returnTypeIconPath(question.type)}}" ng-show="question.type != 0" class="img-center" style="height: 20px; width: 20px;">
                        </td>
                        <td class="col-10" style="width: 66.66%">
                            <p class="oneliner">
                                {{question.question}}
                            </p>
                        </td>
                    </tr>
                </table>
                <br>
                <button class="btn btn-success" ng-click="test.addQuestion()">Tilføj spørgsmål</button>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4>Rediger spørgsmål #{{test.activeEditingIndex + 1}}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="quesetion-type-select" class="text-bold">Type</label>
                            <select class="custom-select" id="quesetion-type-select" ng-model="test.questions[test.activeEditingIndex]['type']">
                                <option value="0" selected>Vælg spørgsmålets type ...</option>
                                <option ng-value="1*1">Multiple choice</option>
                                <option ng-value="2*1">Fritekst</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="question-input" class="text-bold">Spørgsmål</label>
                            <input type="text" class="form-control" id="question-input" placeholder="Stil dit spørgsmål her ..." ng-model="test.questions[test.activeEditingIndex]['question']">
                        </div>
                    </div>
                </div>

                <div style="margin-top: 30px;" ng-show="test.questions[test.activeEditingIndex]['type'] == '1'">
                    <h5>Svarmuligheder</h5>
                    <table class="table">
                        <tr ng-repeat="answer in test.questions[test.activeEditingIndex]['answers']">
                            <th style="width: 40px; padding-top: 20px;">{{$index+1}}</th>
                            <td><input type="text" class="form-control" placeholder="Svarmulighed ..." ng-model="answer.answer"></td>
                            <td style="color: grey; padding-top: 20px; width: 50px;" class="hover" ng-click="(answer['correct']==true) ? answer['correct'] = false : answer['correct'] = true">
                                <i class="fa fa-check fa-lg" ng-class="{'answer-correct': answer['correct']}"></i>
                            </td>
                            <td style="width: 50px; padding-top: 15px;"><div class="btn btn-danger btn-pill text-bold" ng-click="test.removeAnswer($index)">-</div> </td>
                        </tr>
                    </table>
                    <div class="btn btn-success btn-pill text-bold" ng-click="test.questions[test.activeEditingIndex]['answers'].push({})">+</div>
                </div>


                <br><br>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-danger" ng-click="test.removeQuestion(test.activeEditingIndex)">Slet spørgsmål</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<div class="row">
    <div class="col-12">
        <button class="btn btn-success" style="float: right;" ng-click="test.saveTest()">Gem test</button>
        <p style="color: red; float: right;">{{test.error}} &nbsp;&nbsp;</p>
    </div>
</div>

</body>
</html>