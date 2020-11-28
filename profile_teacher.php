<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html ng-app="app">

<head>
    <title>Profil</title>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="includes/PapaParse-5.0.2/papaparse.min.js"></script>
    <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js></script>
    <link href="assets/fontawesome/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body class="container-fluid grey-bg" ng-controller="teacherController as teacher">

    <script>
        // Used by angularjs controller
        let login_id = "<?php echo $_SESSION['user_id']; ?>";
        let login_ticket = "<?php echo $_SESSION['ticket']; ?>";
    </script>


    <?php if (login_check($mysqli) == true) : ?>
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1 class="display-4">Hej,
                        <?php echo $_SESSION["name"]; ?>!</h1>
                    <p class="lead">Herunder kan du se alle dine tests - gennemførte og kommende. Du kan også se din klasses fremskridt, såvel som individuelle elever.</p>
                    <a href="includes/logout.php" class="btn btn-light logout-header" style="display: inline-block;">Log ud</a>
                    <a href="profile_student.php" class="btn btn-secondary logout-header" style="display: inline-block;">Se som elev</a>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card profile-card">
                    <div class="card-body">
                        <h3 class="card-title">
                            Aktive tests
                            <a href="create_test.php" class="btn btn-info" style="float: right;">Opret test</a>
                        </h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Hold</th>
                                    <th></th>
                                    <th>Testens navn</th>
                                    <th>Aktiv indtil</th>
                                    <th>Antal afleverede</th>
                                    <th>Rediger test</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="test in teacher.tests['active']">
                                    <td><span class="badge badge-pill badge-primary">{{test.class_name}}</span></td>
                                    <td><i class="fas fa-chart-line fa-lg"></i></td>
                                    <td>{{test.title}}</td>
                                    <td>{{test.date_closed_string}}</td>
                                    <td>0/24</td>
                                    <td>
                                        <div class="btn btn-primary" id="rediger">Rediger</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card profile-card">
                    <div class="card-body">
                        <h3 class="card-title">
                            Dine hold
                            <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#createclass">Opret hold</button>
                        </h3>

                        <!-- Modal for createing class -->
                        <div class="modal fade" id="createclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Indsæt en .csv fil og tryk på opret hold.</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Actual modal -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-users"></i>
                                                </span>
                                            </div>
                                            <!-- Class name -->
                                            <input type="text" class="form-control" name="class_name" placeholder="Klassens navn..." aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <p class="lead">.csv filen skal opflyde følgende krav:</p>
                                        <ul>
                                            <li>Headeren skal have følgende opsætning: ID,Fornavn,Efternavn,Studieretning</li>
                                            <li>Elevernes information skal altså skrives på overstående form fx: <br> L 3a 11,Filip,Osmark,Matematik A - Fysik A</li>
                                        </ul>
                                        <input type="file" id="upload-file" accept=".csv">
                                        <label class="btn btn-primary" for="upload-file">Vælg en fil...</label>
                                        <button class="btn btn-success" style="float: right;" id="upload-btn">Upload fil</button>
                                        <script type="text/javascript">
                                            let upload = document.getElementById("upload-btn").addEventListener('click', () => {
                                                Papa.parse(document.getElementById("upload-file").files[0], {
                                                    header: true,
                                                    download: true,
                                                    dynamicTyping: true,
                                                    encoding: "UTF-8",
                                                    complete: function(results) {
                                                        console.log(results.data);
                                                        let information = JSON.stringify(results.data);
                                                        $.ajax({
                                                            url: "recieve.php",
                                                            data: information,
                                                            type: 'post',
                                                            success: function(data) {
                                                                console.log(data);
                                                            }
                                                        });
                                                    }
                                                });
                                            });
                                        </script>
                                        <!-- Actual modal - End -->
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- Modal for createing class - End -->

                    <div class="modal fade" id="opretholdmodal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form style="padding: 20px;" action="includes/process_registerclass.php" method="post" name="classregister_form">
                                    <div class="form-group">
                                        <label style="color: #000;"><b>Hold navn:</b></label>
                                        <input type="text" placeholder="Hold navn..." class="form-control" name="username">
                                    </div>

                                    <div class="form-group">
                                        <label style="color: #000;"><b>Årgang:</b></label>
                                        <input type="password" placeholder="Årgang..." class="form-control" name="password">
                                    </div>
                                    <div>
                                        <a data-toggle="modal" href="#">Tilknyt elever</a>
                                        <hr class="my-4">
                                    </div>
                                    <button class="btn btn-primary">Opret hold</button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <p class="card-text badge-container">
                        <span class="badge badge-pill badge-primary badge-lg badge-hover" ng-repeat="class in teacher.classes">{{class.name}}</span>
                    </p>
                </div>
            </div>
            <div class="card profile-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title">Se progression:</h3>
                        </div>
                        <div class="col-6">
                            <div class="btn-group" role="group" id="seholdelev" style="float:right;">
                                <button type="button" class="btn btn-primary">Se hold</button>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Se elev
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Elev #1</a>
                                        <a class="dropdown-item" href="#">Elev #2</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">Klik på et hold for at se progression</h6>
                    <div class="graph">
                        <img src="https://heap.io/wp-content/uploads/2017/01/11.png" class="img-responsive" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">

            <div class="card profile-card">
                <div class="card-body">
                    <h3 class="card-title">Kommende tests</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fag</th>
                                <th></th>
                                <th>Testens navn</th>
                                <th>Sidst brugt</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="test in teacher.tests['upcoming']">
                                <td><span class="badge badge-pill badge-primary">{{test.class_name}}</span></td>
                                <td><i class="fas fa-chart-line fa-lg"></i></td>
                                <td>{{test.title}}</td>
                                <td>{{test.date_available_string}}</td>
                                <td>
                                    <div class="btn btn-secondary">Opret test med skabelon</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>



        <script src="js/controllers/profileController.js"></script>
    <?php else : echo "Du skal være logget ind for at se siden. <a href='login.php'>Log ind her</a>";
    endif; ?>

</body>

</html>