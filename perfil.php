<?php include_once 'header.php'; ?>
  <?php require_once ('funciones.php')
  if (!estaLogueado()) {
		header('location: ingresar.php');
		exit;
	}
   ?>

<div class "container-perfil">
 <img class= "banner-perfil" src="images/banner-luna.png" alt="perfil">
  </div>
  <section class="container-avatar">
      <div class="row">
        <div class="col-12">
          <h2>Datos Personales</h2>
        </div>
        <br>
        <div class="imagen-avatar col-3">
          <div class="imagen-avatar">
            <img src="images/img-avatar.png" alt="avatar">
          </div>
        </div>
        <div class="card-datos col-9">
          <div class="card-datos">
            <ul class= "mis-datos">
              <li>Nombre:</li>
              <li>Apellido:</li>
              <li>Nombre de Usuario:</li>
              <li>Correo Electrónico:</li>
              <li>Dirección:</li>
              <li>Editar Contraseña:</li>
                <a href="#" class="btn btn-primary">Mis Ventas</a>
                <a href="#" class="btn btn-primary">Mis Compras</a>
            </ul>
          </div>
        </div>
      </div>
  </section>
  <section class="encabezado" >
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="text-center productos">MIS PRODUCTOS</h1>
        </div>
      </div>
      <div class="row productos">
        <div class="col-12 col-md-4 col-lg-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="images/star-wars/robot-BB-8.jpeg" alt="BB-8">
            <div class="card-body">
              <h5 class="card-title">BB-8</h5>
              <p class="card-text">Robot BB-8, 2-In-1 Mega Play Set - Star Wars The Last Jedi.</p>
              <a href="#" class="btn btn-primary">Editar Producto</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="images/star-wars/darth-holográfica.jpeg" alt="darth-vader">
            <div class="card-body">
              <h5 class="card-title">Funko Darth Vader</h5>
              <p class="card-text">Funko holográfico de Darth Vader.</p>
              <a href="#" class="btn btn-primary">Editar Producto</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="images/star-wars/mochila.jpeg" alt="mochila-starwars">
            <div class="card-body">
              <h5 class="card-title">Mochila StarWars</h5>
              <p class="card-text">Mochila estampada StarWars The Last Jedi.</p>
              <a href="#" class="btn btn-primary">Editar Producto</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>






<?php include_once 'footer.php'; ?>
