<?php

include 'util/helper.php';
include 'DB/temas.php';
if (isset($_SESSION['user_id'])) {

} else {
    redirect("index.php");
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
    <link href="css/all.css" rel="stylesheet">
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
                <span class="nav-link"><?php $user_id = $_SESSION['user_id'];
                    $name = get_name($user_id);
                    echo $name; ?></span>
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

<main role="main" class="container">
    <div class="my-3 p-3 rounded shadow-sm contBG1">
        <h6 class="border-bottom pb-2 mb-0">Todos los temas</h6>
        <?php get_all(); ?>
        
    </div>
</main>
</body>
</html>
