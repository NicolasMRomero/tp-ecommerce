<?php include_once 'header.php';
require_once('funciones.php');

if ($_POST){
  $suscriptor = [
    'email' => trim($_POST['email']),
    'id' => traerUltIDSuscriptos()
  ];
    $suscriptorJSON = json_encode($suscriptor);
  file_put_contents('suscriptos.json', $suscriptorJSON . PHP_EOL, FILE_APPEND);
}

$erroremail = '';
if ($_POST){
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $erroremail = "Poné un email correcto";
      } else{
        $erroremail= "¡Listo! Quedamos en contacto 😉";
      }
}
?>
    <section class="slider">
      <div id="sliderPortada" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
           <div class="carousel-item active">
             <img class="d-block w-100" src="images/slider/slider_star_wars.jpg" alt="imagen star wars">
             <div class="carousel-caption">
               <h5>Star Wars</h5>
               <p class="d-none d-md-block">Recuerda, la Fuerza estará contigo… siempre</p>
             </div>
           </div>
           <div class="carousel-item">
             <img class="d-block w-100" src="images/slider/slider_the_simpsons.jpg" alt="Second slide">
             <div class="carousel-caption d-none d-md-block">
               <h5>The Simpsons</h5>
               <p class="d-none d-md-block"> "Jeff" Albertson estaría orgulloso de nosotros</p>
             </div>
           </div>
           <div class="carousel-item">
             <img class="d-block w-100" src="images/slider/slider_transformers.jpg" alt="Third slide">
             <div class="carousel-caption d-none d-md-block">
               <h5>Transformers</h5>
               <p class="d-none d-md-block">Llegados directamente desde Cybertron!</p>
             </div>
           </div>
         </div>
         <a class="carousel-control-prev" href="#sliderPortada" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Anterior</span>
         </a>
         <a class="carousel-control-next" href="#sliderPortada" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Siguiente</span>
         </a>
       </div>
    </section>
    <section class="encabezado" >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="text-center productos">PRODUCTOS DESTACADOS</h1>
          </div>
        </div>
        <div class="row productos">
          <div class="col-12 col-md-4 col-lg-4">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="images/productos/kylo.jpg" alt="Kylo Ren">
              <div class="card-body">
                <h5 class="card-title">Kylo Ren</h5>
                <p class="card-text">Desde Star Wars Episodio VII - The Force Awakens, ¡llega Kylo Ren Pop!</p>
                <a href="#" class="btn d-block agregar-al-carrito">Agregar al carrito  <i class="fas fa-shopping-cart"></i></a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 col-lg-4">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="images/productos/optimus-prime.jpg" alt="Optimus Prime">
              <div class="card-body">
                <h5 class="card-title">Optimus Prime</h5>
                <p class="card-text">Derrotá a los decepticons junto líder de los Autobots. Al alcance de tu mano!</p>
                <a href="#" class="btn d-block agregar-al-carrito">Agregar al carrito  <i class="fas fa-shopping-cart"></i></a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 col-lg-4">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="images/productos/krusty.jpg" alt="Payaso Krusty">
              <div class="card-body">
                <h5 class="card-title">Payaso Krusty</h5>
                <p class="card-text">Si! Es Krusty, el payaso de la tele! Un producto de la "Korporación Krusty"</p>
                <a href="#" class="btn d-block agregar-al-carrito">Agregar al carrito  <i class="fas fa-shopping-cart"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!--Productos por Categoria-->
<section class="encabezado" >
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center pb-4">CATEGORÍAS PRINCIPALES</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card mb-3" style="width: 18rem;">
          <img class="card-img-top" src="images/simpsons/simpsons-categoria2.jpg" alt="imagen the simpsons">
          <div class="card-body">
            <h2 class="card-text text-center">THE SIMPSONS</h2>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-6">
        <div class="card mb-3" style="width: 18rem;">
          <img class="card-img-top" src="images/star-wars/lego-starwars.jpg" alt="imagen star wars">
          <div class="card-body">
            <h2 class="card-text text-center">STAR WARS</h2>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-6">
        <div class="card mb-3" style="width: 18rem;">
          <img class="card-img-top" src="images/transformers/transformers.jpg" alt="imagen transformers">
          <div class="card-body">
            <h2 class="card-text text-center">TRANSFORMERS</h2>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-6">
        <div class="card mb-3" style="width: 18rem;">
          <img class="card-img-top" src="images/funko/funko-harry.jpg" alt="imagen funko">
          <div class="card-body">
            <h2 class="card-text text-center">FUNKO</h2>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-6">
        <div class="card mb-3" style="width: 18rem;">
          <img class="card-img-top" src="images/tienda-geek/space-invaders.jpg" alt="imagen tienda geek">
          <div class="card-body">
            <h2 class="card-text text-center">TIENDA GEEK</h2>
          </div>
        </div>
      </div>


      <div class="col-12 col-md-6 col-lg-6">
        <div class="card mb-3" style="width: 18rem;">
          <video class="card-img-top" src="videos/videosemana.mp4" type="video.mp4" muted autoplay controls></video>
          <div class="card-body">
            <h2 class="card-text text-center">VIDEO DE LA SEMANA</h2>
          </div>
        </div>
      </div>
    </div>

    </div>
</section>
<!--newsletter-->
<section>
  <div class="container-newsletter">
    <div class="row">
    <div class="col-12 text-center">
      <form method="post">
        <div class="form-group">
         <label for="exampleInputEmail1">
           <h6 class="font-weight-bold">
               <strong>Suscribite a nuestro newsletter</strong>
           </h6></label>
           <input type="email" class="form-control form-newsletter" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresá tu email" name="email" value="<?=isset($_POST['email'])? $_POST['email'] : ''?>">
           <span class="form-group-input" style="color: #603260; padding-right:15%;"> <?=$erroremail?> </span>
            <br>
          <button type="submit" class="btn btn-primary">ENVIAR</button>
        </div>
      </form>
    </div>
  </div>
  </div>
</section>

<?php include_once 'footer.php'; ?>
