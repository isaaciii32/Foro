<?php 
    include'util/helper.php';

    if (isset($_SESSION['user_id'])) {
        redirect("landing.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if (isset($_POST['singin'])) {
            
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $id_user = login($email,$pass);

            if ($id_user == FALSE) {
                echo '<script language="javascript">alert("Usuario incorrecto");</script>';
            }
            else
            {
                $_SESSION['user_id'] = $id_user;
                redirect("landing.php");
                echo '<script language="javascript">alert("er 4");</script>';
            }
        }
    }

    

 ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Offcanvas template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">
</head>

<body id="bodyBG">
<nav class="navbar navbar-expand-lg fixed-top navbar-dark shadow-sm" id="navbarBG">
    <a class="navbar-brand mr-auto mr-lg-0" href="#"><img class="mr-3" src="vector-letter-c-vintage-style.png" alt=""
                                                          width="28" height="28"></a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" role="navigation" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<div class="nav-scroller shadow-sm" id="navscrollBG">
    <nav class="nav nav-underline">
        <a class="nav-link" href="#">Debe iniciar sesion para hacer uso del foro</a>
    </nav>
</div>

<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm" id="textBANNER">
        <img class="mr-3" src="vector-letter-c-vintage-style.png" alt="" width="48" height="48">
        <div class="lh-100">
            <h5 class="mb-0 lh-100">Foro de discusion</h5>
        </div>
    </div>

    <div class="my-3 p-3 rounded shadow-sm contBG1">
        <h6 class="border-bottom pb-2 mb-0">Bienvenido</h6>
        <div class="media welcome pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 parrafo">
                Aqui usted podra ver y ser parte de variadas discusiones.
                <br><br>
                Primero debera crearse una cuenta, luego de eso usted tiene la posibilidad de crear nuevas discusiones o
                participar en aquellas
                que ya se encuentran creadas.
            </p>
        </div>
        <div class="text-center">
            <button type="button" class="btn boton" data-toggle="modal" data-target="#ModalSignIn">
                Iniciar Sesion
            </button>
            <button type="button" class="btn boton" data-toggle="modal" data-target="#ModalSignUp">
                Registrarse
            </button>
            <div class="modal fade" id="ModalSignIn" tabindex="-1" role="dialog" aria-labelledby="ModalSignInTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <form class="form-signin" action="index.php" method="post" onsubmit="return validar_signin()" novalidate>
                                <img class="mb-4" src="vector-letter-c-vintage-style.png" alt="" width="72" height="72">
                                <h1 class="h3 mb-3 font-weight-normal sesion">Ingrese sus credenciales</h1>
                                <label for="inputEmail" class="sr-only">Email</label>
                                <input onfocus="this.placeholder = 'Email...'" type="email" id="inputEmail" name="email" class="form-control" placeholder="Email..." autofocus>
                                <label for="inputPassword" class="sr-only">Contraseña</label>
                                <input onfocus="this.placeholder = 'Contraseña...'" type="password" id="inputPassword" name="pass" class="form-control" placeholder="Contraseña...">
                                <input type="submit" value="Iniciar" name="singin" class="btn btn-lg btn-block boton">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ModalSignUp" tabindex="-1" role="dialog" aria-labelledby="ModalSignUpTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <form class="form-signin" action="index.php" method="post" onsubmit="return validar_signup()" novalidate>
                                <img class="mb-4" src="vector-letter-c-vintage-style.png" alt="" width="72" height="72">
                                <h1 class="h3 mb-3 font-weight-normal sesion">Cree un nuevo usuario</h1>
                                <label for="inputUsername" class="sr-only">Nombre de usuario</label>
                                <input onfocus="this.placeholder = 'Nombre usuario...'" type="text" id="inputUsername" name="sname" class="form-control" placeholder="Nombre usuario..." required autofocus>
                                <label for="inputEmailsignup" class="sr-only">Email</label>
                                <input onfocus="this.placeholder = 'Email...'" type="email" id="inputEmailsignup" name="semail" class="form-control" placeholder="Email..." required autofocus>
                                <label for="inputPasswordsignup" class="sr-only">Contraseña</label>
                                <input onfocus="this.placeholder = 'Contraseña...'" type="password" id="inputPasswordsignup" name="spass" class="form-control" placeholder="Contraseña..." required>
                                <label for="inputPassword2" class="sr-only">Repetir Contraseña</label>
                                <input onfocus="this.placeholder = 'Repetir contraseña...'" type="password" id="inputPassword2" name="spass2" class="form-control" placeholder="Repetir contraseña..." required>
                                <input type="submit" name="singup" value="Crear cuenta" class="btn btn-lg btn-block boton">
                            </form>
                            <?php 
                                

                                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                                    if (isset($_POST['singup'])) {

                                        $sname = $_POST['sname'];
                                        $semail = $_POST['semail'];
                                        $spass = $_POST['spass'];
                                        $spass2 = $_POST['spass2'];

                                        if ($spass == $spass2) {
                                            create_user($sname,$semail,$spass);
                                        }
                                    }
                                }
                             ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="JS/validate.js"></script>
</body>
</html>
