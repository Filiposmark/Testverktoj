<?php
include_once 'includes/db_connect.php';
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>


<html>

<head>
    <title>Forside</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body class="container-fluid" style="padding: 0px;">
    <!-- second first -->
    <!-- Landing #1 -->
    <div class="container mycont bg">
        <div class="row">
            <div class="col-12 col-xl-4">
                <a class="navbar-brand" href="index.php">
                    <img id="logo" src="https://studerende.ida.dk/wp-content/uploads/2019/04/systime_yellow_rgb.png" width="98" height="24" alt="">
                </a>
            </div>

            <div class="col-12 col-xl-4" style="text-align: center;">
                <div id="heading">
                    <h1>Testværktøj</h1>
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div>
                    <button type="button" data-toggle="modal" data-target="#loginmodal" class="btn btn-dark btn-lg" id="loginbtn">Login</button>
                </div>
            </div>
            <!-- Gem -->
            <!-- new modal -->
            <div class="modal fade" id="loginmodal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form style="padding: 20px;" action="includes/process_login.php" method="post" name="login_form">
                            <div class="form-group">
                                <label style="color: #000;"><b>Username:</b></label>
                                <input type="text" placeholder="Username..." class="form-control" name="username">
                            </div>

                            <div class="form-group">
                                <label style="color: #000;"><b>Password:</b></label>
                                <input type="password" placeholder="Password..." class="form-control" name="password">
                            </div>
                            <div>
                                <a data-toggle="modal" href="#signupmodal">Don't already have an account? - Make one!</a>
                                <hr class="my-4">
                            </div>
                            <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
                        </form>
                    </div>
                </div>
            </div>

            <!-- signin modal -->

            <div class="modal fade" id="signupmodal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form style="padding: 20px; color:#000;" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" name="registration_form">
                            <h1>Register with us</h1>
                            <ul>
                                <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
                                <li>Passwords must be at least 6 characters long</li>
                                <li>Passwords must contain
                                    <ul>
                                        <li>At least one uppercase letter (A..Z)</li>
                                        <li>At least one lowercase letter (a..z)</li>
                                        <li>At least one number (0..9)</li>
                                    </ul>
                                </li>
                                <li>Your password and confirmation must match exactly</li>
                            </ul>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><b>Full name:</b></label>
                                <input type="text" placeholder="Username..." class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><b>Username:</b></label>
                                <input type="text" placeholder="Username..." class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><b>Password:</b></label>
                                <input type="password" placeholder="Password..." class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><b>Confirm Password</b></label>
                                <input type="password" placeholder="Password..." class="form-control" name="confirmpwd">
                            </div>
                            <input type="button" value="Register" onclick="return regformhash(this.form, this.form.username, this.form.password, this.form.confirmpwd);" />
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div style="text-align: center;">
            <h4 class="text-muted">Fjerner broen mellem lærer og elever</h4>
        </div>
        <hr>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <h3>Jonas, 2G</h3>
                    <p><i>"Det er blevet nemmere for mig at gå til min lærer når det bliver svært"</i></p>
                    <img class="img-fluid img-thumbnail" src="https://unord.dk/wp-content/uploads/2019/11/10_klasse-hillerod-teknisk-skole.jpg" style="width:100%">
                </div>

                <div class="col-12 col-xl-6">
                    <h3>Mette, Ny lærer</h3>
                    <p><i>"Jeg er blevet opmærksom på nogle af de mere udfordrede elever"</i></p>
                    <img class="img-fluid img-thumbnail" src="https://www.altinget.dk/images/article/191154/63761.jpg" style="width:100%">
                </div>
            </div>
        </div>
    </div>

    <!-- Landing 2 -->

    <div class="jumbotron jumbotron-fluid" id="landing2">
        <div class="container" id="info">
            <div class="accordion" id="accordion">
                <div class="card">
                    <div class="card-header" id="hvad">
                        <h5 class="mb-0">
                            <button class="btn btn-dark collapsed" type="button" style="width: 100%;" data-toggle="collapse" data-target="#hvad_card" aria-expanded="false" aria-controls="hvad_card">
                                Hvad?
                            </button>
                        </h5>
                    </div>

                    <div id="hvad_card" class="collapse" aria-labelledby="hvad" data-parent="#accordion">
                        <div class="card-body">
                            Testverktoj er et program som kan test elever i deres færdigheder i de fag som de har i skolen.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="hvorfor">
                        <h5 class="mb-0">
                            <button class="btn btn-dark collapsed" style="width: 100%;" type="button" data-toggle="collapse" data-target="#hvorfor_card" aria-expanded="false" aria-controls="hvorfor_card">
                                Hvorfor?
                            </button>
                        </h5>
                    </div>
                    <div id="hvorfor_card" class="collapse" aria-labelledby="hvorfor" data-parent="#accordion">
                        <div class="card-body">
                            Ud fra vores undersøgelser, kan det at man bliver testet faktisk godt både øge det faglige udbytte af undervisningen, men faktisk også kommunikationen mellem lærer og elev!
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="hvordan">
                        <h5 class="mb-0">
                            <button class="btn btn-dark collapsed" style="width: 100%;" type="button" data-toggle="collapse" data-target="#hvordan_card" aria-expanded="false" aria-controls="hvordan_card">
                                Hvordan?
                            </button>
                        </h5>
                    </div>
                    <div id="hvordan_card" class="collapse" aria-labelledby="hvordan" data-parent="#accordion">
                        <div class="card-body">
                            Hvis lærerne ved at der er et problem, så kan de nemmere løse det i undervisningen eller direkte i samarbejde med en elev.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Landing 3 -->

    <div id="end">
        <div class="container" style="color: rgb(235,235,235);" id="end">
            <div class="row">
                <div class="col-3">
                    <p><b>Kontakt</b></p>
                    <div class="row">

                        <ul class="pagination">
                            <li style="margin-left: 15px;" class="page-item"><i class="far fa-envelope"></i></li>
                            <li style="margin-left: 15px;" class="page-item">information@testverktoj.dk</a></li>
                        </ul>

                        
                        <ul class="pagination">
                            
                            <li style="margin-left: 15px;" class="page-item"><i class="fas fa-phone-alt"></i></li>
                            <li style="margin-left: 15px;" class="page-item">99 99 99 99</a></li>
                        </ul>


                    </div>
                </div>

                <div class="col-3">
                    <p><b>Vilkår og betingelser</b></p>
                    <p>BETINGELSER</p>
                    <p>PERSONDATAPOLITIK</p>
                </div>
                <div class="col-3">
                    <p><b>Skole</b></p>
                    <p>GYMNASIE</p>
                    <p>FRI GYMNASIE</p>
                </div>
                <div class="col-3">
                    <p><b>Genjeve</b></p>
                    <p>NYHEDER</p>
                    <p>OM TESTVERKTOJ</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <p>2020</p>
                </div>
                <div class="col-6">
                    <p id="byline">Lavet af Filip og Rasmus</p>
                </div>
            </div>
        </div>
    </div>
</body>