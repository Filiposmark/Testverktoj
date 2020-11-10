<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Profil</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link href="assets/fontawesome/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body class="container-fluid grey-bg">
    <?php if (login_check($mysqli) == true) : ?>
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1 class="display-4">Hej,
                        <?php echo $_SESSION["name"]; ?>!</h1>
                    <p class="lead">Herunder kan du se alle dine tests - gennemførte og kommende. Du kan også se din klasses fremskridt, såvel som individuelle elever.</p>
                    <a href="includes/logout.php" class="btn btn-light logout-header" style="display: inline-block;">Log ud</a>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card profile-card">
                    <div class="card-body">
                        <h3 class="card-title">Aktive tests</h3>
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
                                <tr>
                                    <td><span class="badge badge-pill badge-primary">3I MAT</span></td>
                                    <td><i class="fas fa-chart-line fa-lg"></i></td>
                                    <td>Funktioner</td>
                                    <td>29-10-2020</td>
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
                        <h3 class="card-title">Dine hold</h3>
                        <td>
                            <button class="btn btn-primary" id="oprethold" data-toggle="modal" data-target="#opretholdmodal">Opret hold</button>
                        </td>

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
                            <span class="badge badge-pill badge-primary badge-lg badge-hover">3I MAT</span>
                            <span class="badge badge-pill badge-primary badge-lg badge-hover">3I KIT</span>
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
                                <div class="btn-group" role="group" id="seholdelev">
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
                        <h3 class="card-title">Gemte test</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Fag</th>
                                    <th></th>
                                    <th>Testens navn</th>
                                    <th>Årgang</th>
                                    <th>Sidst brugt</th>
                                    <th>Varighed</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge badge-pill badge-primary">KIT</span></td>
                                    <td><i class="fas fa-palette fa-lg"></i></td>
                                    <td>Farveteori</td>
                                    <td>2G</td>
                                    <td>12-11-2020</td>
                                    <td>30 min</td>
                                    <td>
                                        <div class="btn btn-secondary">Opret test med skabelon</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-pill badge-primary">KIT</span></td>
                                    <td><i class="fas fa-palette fa-lg"></i></td>
                                    <td>Farveteori</td>
                                    <td>1G</td>
                                    <td>12-11-2020</td>
                                    <td>45 min</td>
                                    <td>
                                        <div class="btn btn-secondary">Opret test med skabelon</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-pill badge-primary">KIT</span></td>
                                    <td><i class="fas fa-palette fa-lg"></i></td>
                                    <td>Farveteori</td>
                                    <td>2G</td>
                                    <td>12-11-2020</td>
                                    <td>60 min</td>
                                    <td>
                                        <div class="btn btn-secondary">Opret test med skabelon</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-pill badge-primary">KIT</span></td>
                                    <td><i class="fas fa-palette fa-lg"></i></td>
                                    <td>Farveteori</td>
                                    <td>3G</td>
                                    <td>12-11-2020</td>
                                    <td>120 min</td>
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


    <?php else : echo "Du skal være logget ind for at se siden. <a href='login.php'>Log ind her</a>";
    endif; ?>

</body>

</html>