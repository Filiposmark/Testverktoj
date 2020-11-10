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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body class="container-fluid">
    <!-- second first -->
    <!-- Landing #1 -->
    <div class="container mycont bg" >
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
                    <button type="button" data-toggle="modal" data-target="#loginmodal" class="btn btn-info btn-lg" id="loginbtn">Login</button>
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
        <hr>
        
        <div style="text-align: center;">
            <h2>Fjerner broen mellem lærer og elever</h2>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <h3 style="color: #fff;">Jonas, 2G</h3>
                    <h4 style="color: #999999;"><i>"Det er blevet nemmere for mig at gå til min lærer"</i></h4>
                    <img class="img-fluid img-thumbnail" src="https://unord.dk/wp-content/uploads/2019/11/10_klasse-hillerod-teknisk-skole.jpg" style="width:100%">
                </div>
                <div class="col-12 col-xl-6">
                    <h3 style="color: #fff;">Mette, Ny lærer</h3>
                    <h4 style="color: #999999;"><i>"Jeg er blevet opmærksom på nogle af de mere udfordrede elever"</i></h4>
                    <img class="img-fluid img-thumbnail" src="https://www.altinget.dk/images/article/191154/63761.jpg" style="width:100%">

                </div>
            </div>
        </div>
    </div>

    <!-- Landing 2 -->

    <div class="jumbotron jumbotron-fluid" id="landing2">
        <div class="container" id="info">
            <h1 style="text-align: center; color: #4a4e4d" class="maintit">Generelt om...</h1>
            <hr>
            <div class="row">
                <div class="col-sm cent">
                    <button class="btn btn-dark" data-toggle="collapse" href="#hvad" role="button">Hvad?</button>
                </div>
                <div class="col-sm cent">
                    <button class="btn btn-dark" data-toggle="collapse" href="#hvorfor" role="button">Hvorfor?</button>
                </div>
                <div class="col-sm cent">
                    <button class="btn btn-dark" data-toggle="collapse" href="#hvordan" role="button">Hvordan?</button>
                </div>
            </div>
            <hr>
            <div class="collapse" id="hvorfor">
                <div class="card card-body">
                    <h4 style="text-align: left; color: #4a4e4d" class="maintit"><b>Hvorfor?</b></h4>
                    <hr>

                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>
            <div class="collapse" id="hvad">
                <div class="card card-body">
                    <h4 style="text-align: left; color: #4a4e4d" class="maintit"><b>Hvad?</b></h4>
                    <hr>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>
            <div class="collapse" id="hvordan">
                <div class="card card-body">
                    <h4 style="text-align: left; color: #4a4e4d" class="maintit"><b>Hvordan?</b></h4>
                    <hr>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>
        </div>
    </div>


    <!-- Landing 3 -->

    <div id="end">
        <div class="container" id="end">
            <div class="row">
                <div class="col-3">
                    <p><b>Kontakt</b></p>
                    <div class="row">
                        <div class="col-2" id="tlf1">
                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                            </svg>

                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                            </svg>
                        </div>
                        <div class="col-10">
                            <p id="tlf2">99 99 99 99 <br>desejebois@gmail.com</p>

                        </div>

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
                    <p>OM HELVEDE</p>
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