<?php include_once 'header.php';
require_once ('funciones.php');

if (!estaLogueado()) {
header('location: ingresar.php');
exit;
  	}
$usuario = traerPorId($_SESSION['id']);
   ?>

<div class="container-perfil">
 <img class="banner-perfil" src="images/banner-luna.png" alt="perfil">
  </div>
  <section class="container-avatar">
      <div class="row">
        <div class="col-12">
          <h2>Datos Personales</h2>
        </div>
        <br>
        <div class="col-6 pr-3">
          <div>
            <img src="<?=$usuario['imagen']?>" alt="avatar" class="imagen-avatar">
          </div>
          </div>
        <div class="card-datos col-6">
          <div class="card-datos">
           <ul class= "mis-datos pl-5"><strong>
              <li>Nombre:<?=" ".$usuario['name']?></li>
              <li>Apellido:<?=" ".$usuario['lastname']?></li>
              <li>Nombre de Usuario:<?=" ".$usuario['username']?></li>
              <li>Correo Electrónico:<?=" ".$usuario['email']?></li>
              <li>Dirección:<?=" ".$usuario['address']?></li>
              <li>Editar Contraseña:</li></strong>
              <a href="#" class="btn btn-primary">Mis Ventas</a>
              <a href="#" class="btn btn-primary">Mis Compras</a>
              </ul>
                </div>
              </div>
        </div>
        <div class="btn-logout">
          <a class="btn btn-primary" href="logout.php">CERRAR SESIÓN</a>
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
            <img class="card-img-top" src="images/star-wars/darth-holografica.jpeg" alt="darth-vader">
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
              <h5 class="card-title">Mochila Star Wars</h5>
              <p class="card-text">Mochila estampada Star Wars The Last Jedi.</p>
              <a href="#" class="btn btn-primary">Editar Producto</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include_once 'footer.php'; ?>
