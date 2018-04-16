<?php
require_once('funciones.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Geek Zone</title>
    <meta name="description" content="Sitio web e-commerce">
    <meta name="keywords" content="Star wars, Transformers, The Simpsons, Funko, Tienda Geeks">
    <meta name="author" content="Pau, Gise, Nico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  </head>
  <body>
    <!-- Hearder -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light " style="z-index:66">
        <div class="col-lg-5 collapse navbar-collapse" id="navbarSupportedContent" style="text-align:left">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Productos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Star Wars</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Transformers</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Los Simpsons</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Funko</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Tienda Geek</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="perfil.php" style="<?= !estaLogueado() ? 'display: none;' : '' ; ?>">Mi Perfil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ingresar.php" style="<?= estaLogueado() ? 'display: none;' : '' ; ?>">Ingresar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registrarse.php" style="<?= estaLogueado() ? 'display: none;' : '' ; ?>">Registrarse</a>
            </li>
              </ul>
                </div>
              <div class="col-lg-2"  style="text-align:center">
              <a class="navbar-brand logo-menu" href="index.php"><img src="images/logo-E.png" alt="logo-E"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              </div>
          <div class="col-lg-5"  style="text-align:right">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0 buscar" type="submit"><i class="fas fa-search"></i></button>
            </form>
            </div>
      </nav>
    </header>
