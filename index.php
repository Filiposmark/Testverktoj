<html>

<head>
    <title>Forside</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

   

    <!-- second first -->
    <!-- Landing #1 -->

    <div class="jumbotron jumbotron-fluid colbg" id="landing">
        <div class="container">
            <div class="row">
                <div class="col-3 cent">
                    <nav>
                        <a class="navbar-brand" href="#">
                            <img src="https://ideologi.systime.dk/typo3conf/ext/systime_internetbook/Resources/Public/Images/systimelogo.png" width="30" height="30" style="background-color: #d0e1f9;">
                        </a>
                    </nav>
                </div>
                <div class="col-6 cent">
                    <h1 class="maintit" style="padding-top: 300px;">Helvede</h1>
                    <hr class="new4" id="tithr">
                    <h5 style="color: #4a4e4d; font-weight: 400;">Fjerner broen mellem lærer og elev.</h5>

                </div>
                <div class="col-3">
                    <div class="card" style="width: 15rem" id="logincard">
                        <div class="card-body">
                            <h5 class="card-title">Logind eller opret bruger</h5>
                            <hr class="new4" id="cu">
                            <p class="card-text">Her kan du logge ind eller lave en ny profil</p>
                            <button type="button" class="logincardbtn" data-toggle="modal" data-target="#exampleModalLong">
                                Login eller opret profil
                            </button>

                            <!-- modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modtit">Login - Ny profil</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- login -->
                                        <div class="modal-body">
                                            <div class="container-fluid" id="signinup">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <div class="card" id="login">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Login</h5>
                                                                <p class="card-body" id="loginb">This is where you can login to an existing profile.</p>
                                                                <a href="login.php" class="btn btn-primary" id="loginbtn">Go to login</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm">
                                                        <div class="card" id="signup">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Sign-up</h5>
                                                                <p class="card-body" id="signupb">This is where you can sign up if you don't have an existing profile.</p>
                                                                <a href="signup.php" class="btn btn-primary" id="signupbtn">Go to sign-up</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- login modal -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <button class="btns" data-toggle="collapse" href="#hvad" role="button">Hvad?</button>
                </div>
                <div class="col-sm cent">
                    <button class="btns" data-toggle="collapse" href="#hvorfor" role="button">Hvorfor?</button>
                </div>
                <div class="col-sm cent">
                    <button class="btns" data-toggle="collapse" href="#hvordan" role="button">Hvordan?</button>
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