<?php include_once 'header.php';
require_once('funciones.php');

if (estaLogueado()){
  header('Location: perfil.php');
  exit;
}

$email = "";
$errores = [];
if ($_POST){
  $email = trim($_POST['email']);
  $errores = validarLogin($_POST);
  if (empty($errores)){
    $usuario = existeMail($email);
    loguear($usuario);
    if (isset($_POST['recordarme'])){
      setcookie('id', $usuario['id'], time() + 3600 * 24 * 30);
    }
    header('Location: perfil.php');
    exit;
  }
}
?>
<body class="body-forms">
<form method="post" enctype="multipart/form-data">
      <div class="container" style="background-color: rgba(255, 255, 255, 0.9);">
          <h1 class="ttitulo-principal text-center pt-3">INICIAR SESIÓN</h1>
      <div class="form-row">
          <div class="form-group">
            <label for="inputEmail1" class="form-group-input">Email</label>
            <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="usuario@dominio.com" name="email"   value="<?=$email?>">
              <small id="emailHelp" class="form-text"><a href="#">¡Olvidé mi contraseña!</a></small>
              <?php if (isset($errores['email'])): ?>
                <span class="form-group-input" style="color: #603260;"><?=$errores['email'];?></span>
              <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="inputPassword4" class="form-group-input pt-3">Contraseña</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Contraseña" name="pass" value="">
            <?php if (isset($errores['pass'])): ?>
              <span class="form-group-input" style="color: #603260;"><?=$errores['pass'];?></span>
            <?php endif; ?>
        </div>
    </div>
        <div class="form-row">
            <div class="form-group col-md-8 text-center pt-3 pb-4">
                <div class="form-check pb-3">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck" name="recordarme">
                  Recordarme </label>
                </div>
              <button type="submit" class="btn btn-block disabled">Ingresar</button>
            </div>
      </div>
      <div>
          <span class="titulo-icons"> o conectarme con</span>
      </div>
          <div class="icons-login d-flex justify-content-center p-3">
            <a href="#" class="btn-fcbk">
              <i class="ion-social-facebook"></i></a>
            <a href="#" class="btn-google bg-white">
              <img src="images/icon-google.png" alt="GOOGLE"></a>
          </div>
      <div class="signup pt-3 pb-4 text-center">
        <a href="registrarse.php">¿Todavía no te registraste? UNITE</a>
      </div>
  </div>
</form>

<?php include_once 'footer.php'; ?>
