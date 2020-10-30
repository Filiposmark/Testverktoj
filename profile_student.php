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
                <h1 class="display-4">Hej, <?php echo $_SESSION["name"]; ?>!</h1>
                <p class="lead">Herunder kan du se alle dine tests - gennemførste og kommende. Du kan også se dit fremskridt i hvert fag.</p>
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
                            <th>Lærer</th>
                            <th>Aktiv indtil</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span class="badge badge-pill badge-primary">3I MAT</span></td>
                            <td><i class="fas fa-chart-line fa-lg"></i></td>
                            <td>Funktioner</td>
                            <td>Larisa Shestakova</td>
                            <td>29-10-2020</td>
                            <td><div class="btn btn-success">Start test</div></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card profile-card">
                <div class="card-body">
                    <h3 class="card-title">Dine hold</h3>
                    <p class="card-text badge-container">
                        <span class="badge badge-pill badge-primary badge-lg badge-hover">3I MAT</span>
                        <span class="badge badge-pill badge-primary badge-lg badge-hover">3I KIT</span>

                    </p>
                </div>
            </div>
            <div class="card profile-card">
                <div class="card-body">
                    <h3 class="card-title">Din progression</h3>
                    <h6 class="card-subtitle mb-2 text-muted">Klik på et hold for at se din progression</h6>
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
                            <th>Hold</th>
                            <th></th>
                            <th>Testens navn</th>
                            <th>Lærer</th>
                            <th>Dato</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span class="badge badge-pill badge-primary">3I KIT</span></td>
                            <td><i class="fas fa-palette fa-lg"></i></td>
                            <td>Farveteori</td>
                            <td>Thomas Fredfeldt</td>
                            <td>12-11-2020</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card profile-card">
                <div class="card-body">
                    <h3 class="card-title">Gennemførte tests</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Hold</th>
                            <th></th>
                            <th>Testens navn</th>
                            <th>Lærer</th>
                            <th>Dato</th>
                            <th>Resultat</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span class="badge badge-pill badge-primary">3I KIT</span></td>
                            <td><i class="fas fa-palette fa-lg"></i></td>
                            <td>Farveteori</td>
                            <td>Thomas Fredfeldt</td>
                            <td>12-11-2020</td>
                            <td>10</td>
                            <td><div class="btn btn-secondary">Se resultat</div></td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-pill badge-primary">3I KIT</span></td>
                            <td><i class="fas fa-palette fa-lg"></i></td>
                            <td>Farveteori</td>
                            <td>Thomas Fredfeldt</td>
                            <td>12-11-2020</td>
                            <td>10</td>
                            <td><div class="btn btn-secondary">Se resultat</div></td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-pill badge-primary">3I KIT</span></td>
                            <td><i class="fas fa-palette fa-lg"></i></td>
                            <td>Farveteori</td>
                            <td>Thomas Fredfeldt</td>
                            <td>12-11-2020</td>
                            <td>10</td>
                            <td><div class="btn btn-secondary">Se resultat</div></td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-pill badge-primary">3I KIT</span></td>
                            <td><i class="fas fa-palette fa-lg"></i></td>
                            <td>Farveteori</td>
                            <td>Thomas Fredfeldt</td>
                            <td>12-11-2020</td>
                            <td>10</td>
                            <td><div class="btn btn-secondary">Se resultat</div></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php else : echo "Du skal være logget ind for at se siden. <a href='login.php'>Log ind her</a>"; endif; ?>
</body>
</html>

