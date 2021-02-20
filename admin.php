<?php 
   include'util/helper.php';
   only_admin();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST['singin'])){
            $sname = $_POST['name'];
            $semail = $_POST['email'];
            $spass = $_POST['pass'];
            $user_type = $_POST['type'];

            if ($user_type == 1) {
                create_user($sname,$semail,$spass);
            }else
            {
                create_admin($sname,$semail,$spass);
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
    <link href="css/admin.css" rel="stylesheet">
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
                <a class="nav-link" href="landing.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="newtopic.php">Nuevo tema</a>
            </li>
            <?php user_type(); ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item active profileimgdiv">
                <img class="mini-profile nav-link rounded-circle" src=<?php $user_id = $_SESSION['user_id']; $rute=get_img($user_id); echo "".$rute.""; ?> alt=""/>
            </li>
            <li class="nav-item active">
                <span class="nav-link"><?php $user_id = $_SESSION['user_id']; $name = get_name($user_id); echo $name; ?></span>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="logout.php">Cerrar sesion</a>
            </li>
        </ul>
    </div>
</nav>
<div class="nav-scroller shadow-sm" id="navscrollBG">
    <nav class="nav nav-underline">
        <a class="nav-link" href="profile.php">Mi Perfil</a>
        <a class="nav-link" href="tags.php">
            Categorias
            <span id="badgeBG" class="badge badge-pill align-text-bottom">6</span>
        </a>
    </nav>
</div>

<div class="container emp-profile shadow-sm">
        <div class="row">
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?php $user_id = $_SESSION['user_id']; $name = get_name($user_id); echo $name; ?>
                    </h5>
                    <h6>
                        Administrador
                    </h6><br>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Agregar nuevo usuario</a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-md-6">
                <h6>Aqui podra ver una lista con todos los usuarios registrados y agregar nuevos</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="container">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre usuario</th>
                                <th>E-mail</th>
                                <th>Tipo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php show_users() ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form method="post" onsubmit="return validar_admin_newuser()" novalidate action="admin.php" name="singin">
                            <div class="form-group">
                                <label for="adminUser">Nombre de usuario</label>
                                <input onfocus="this.placeholder = 'Nombre usuario...'" type="text" name="name" class="form-control" id="adminUser" aria-describedby="emailHelp" placeholder="Nombre...">
                            </div>
                            <div class="form-group">
                                <label for="adminEmail">E-mail</label>
                                <input onfocus="this.placeholder = 'E-mail...'" type="email" name="email" class="form-control" id="adminEmail" aria-describedby="emailHelp" placeholder="E-mail...">
                            </div>
                            <div class="form-group">
                                <label for="adminPasswd">Contraseña</label>
                                <input onfocus="this.placeholder = 'Contraseña...'" type="password" name="pass" class="form-control" id="adminPasswd" placeholder="Contraseña...">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="usuarioNormal" name="type" value="normal" checked>
                                <label class="form-check-label" for="usuarioNormal">
                                    Usuario normal
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="usuarioAdministrador" value="administrador">
                                <label class="form-check-label" for="usuarioAdministrador">
                                    Administrador
                                </label>
                            </div><br>
                            <input type="submit" class="btn boton" name="singin" value="Ingresar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<script src="JS/validate.js"></script>
</body>
</html>
