<?php include_once 'header.php';
require_once('soporte.php');

if (!$auth->estaLogueado()) {
header('location:ingresar.php');
exit;
  	}
$usuario = $db->traerPorId($_SESSION['id']);
   ?>

<div class="container-perfil">
 <img class="banner-perfil" src="images/banner-death-star.png" alt="perfil">
  </div>
  <section class="container-avatar">
      <div class="row">
        <!-- <div class="perfil-col-izq col-xs-12 col-lg-3 pr-3">
          <div>
            <img src="<?=$usuario->getName()?>" alt="avatar" class="imagen-avatar">
          </div>
          <ul class="list-group">
            <li class="list-group-item active"><?=" ".$usuario->getName()?>
            <?=" ".$usuario->getLastname()?></li>
            <li class="list-group-item"><a href="#" >Mis Ventas</a></li>
            <li class="list-group-item"><a href="#" >Mis Compras</a></li>
            <li class="list-group-item"><a href="logout.php">CERRAR SESIÓN</a></li>
          </ul>

          </div> -->

          <div class="card col-xs-12 col-lg-3 pr-3" style="width: 18rem;">
            <img class="card-img-top imagen-perfil" src="<?=$usuario->getPicture()?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="perfil-nombre"><?=" ".$usuario->getName()?>
              <?=" ".$usuario->getLastname()?></h5>
            </div>
            <ul class="list-group menu-perfil">
              <a href="#" class="opcion-menu" ><li class="list-group-item ">Mis Ventas</li></a>
              <a href="#" class="opcion-menu" ><li class="list-group-item">Mis Compras</li></a>
              <a href="logout.php" class="opcion-menu" ><li class="list-group-item ">CERRAR SESIÓN</li></a>
            </ul>
          </div>
        <div class="card-datos col-xs-12 col-lg-9">
          <div class="col-12">
            <h2 class="titulo-perfil">Datos Personales</h2>
          </div>
          <div class="card-datos">
           <ul >
              <li>Nombre de Usuario: <p> <?=" ".$usuario->getUsername()?></p></li>
              <li>Correo Electrónico:<p><?=" ".$usuario->getEmail()?></p> </li>
              <li>Dirección: <p><?=" ".$usuario->getAddress()?></p> </li>
              <li>Editar Contraseña: <a href="#">Modificar</a> </li>
              </ul>
          </div>
          <div class="col-12">
            <h1 class="text-center productos">MIS PRODUCTOS</h1>
          </div>
          <div class="row productos">
            <div class="col-12 col-md-4 col-lg-4">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top img-prod-en-perfil" src="images/star-wars/robot-BB-8.jpeg" alt="BB-8">
                <div class="card-body">
                  <h5 class="card-title">BB-8</h5>
                  <p class="card-text">Robot BB-8, 2-In-1 - Star Wars The Last Jedi.</p>
                  <a href="#" class="btn btn-primary">Editar Producto</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top img-prod-en-perfil" src="images/star-wars/darth-holografica.jpeg" alt="darth-vader">
                <div class="card-body">
                  <h5 class="card-title">Funko Darth Vader</h5>
                  <p class="card-text">Funko holográfico de Darth Vader.</p>
                  <a href="#" class="btn btn-primary">Editar Producto</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top img-prod-en-perfil" src="images/star-wars/mochila.jpeg" alt="mochila-starwars">
                <div class="card-body">
                  <h5 class="card-title">Mochila Star Wars</h5>
                  <p class="card-text">Mochila estampada Star Wars The Last Jedi.</p>
                  <a href="#" class="btn btn-primary">Editar Producto</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>


<?php include_once 'footer.php'; ?>
