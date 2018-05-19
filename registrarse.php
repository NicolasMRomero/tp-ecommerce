<?php include_once 'header.php';
// CAMBIO
require_once('soporte.php');
// CAMBIO
if ($auth->estaLogueado()) {
		header('Location: perfil.php');
		exit;
	}

$name ="";
$lastname = "";
$username = "";
$email = "";
$address = "";
$city = "";
$pass = "";
$rpass = "";
$provincia = "";
$errores = [];

if ($_POST) {
    $name = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $provincia = trim($_POST['provincia']);
    $pass = trim($_POST['pass']);
    $rpass = trim($_POST['rpass']);
// CAMBIO
    $errores = $validar->validarRegister($db, 'avatar');

	  if (empty($errores)) {
    // CAMBIO
			$errores = $db->guardarImagen('avatar', $email);

		if (empty($errores)) {
			$ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
			$avatar = 'images/usuarios/' . $email . '.' . $ext;

			$usuario = new Usuario($_POST["name"], $_POST['lastname'], $_POST['username'], $_POST["email"], $_POST["pass"], $_POST["address"], $_POST['city'], $_POST['provincia'], $avatar);

        $usuario = $db->guardarUsuario($usuario, $db);
        // loguear($usuario);
				header('location: perfil.php'); exit;
    }
  }
}

 ?>

 <body class="body-forms">
<form method="post" enctype="multipart/form-data">
    <div class="container" style="background-color: rgba(255, 255, 255, 0.9);">

    <h1 class="ttitulo-principal text-center pt-3">REGISTRARME</h1>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNombre" class="form-group-input">Nombre</label>
                <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" name="name" value="<?=$name?>">
                    <?php if (isset($errores['name'])): ?>
                          <span class="form-group-input" style="color: #603260;"><?=$errores['name'];?></span>
                    <?php endif; ?>
            </div>
            <div class="form-group col-md-6">
                    <label for="inputApellido" class="form-group-input">Apellido</label>
                    <input type="text" class="form-control" id="inputApellido" placeholder="Apellido" name="lastname"
                    value="<?=$lastname?>">
                        <?php if (isset($errores['lastname'])): ?>
                            <span class="form-group-input" style="color: #603260;"><?=$errores['lastname'];?></span>
                      <?php endif; ?>
            </div>
            <div class="form-group col-md-6">
                <label for="inputNombre" class="form-group-input">Nombre de usuario</label>
                <input type="text" class="form-control" id="inputNombreUsuario" placeholder="Nombre de usuario" name="username" value="<?=$username?>">
                  <?php if (isset($errores['username'])): ?>
                    <span class="form-group-input" style="color: #603260;"><?=$errores['username'];?></span>
                  <?php endif; ?>
            </div>
          <div class="form-group col-md-6">
              <label for="inputEmail4" class="form-group-input">Email</label>
              <input type="email" class="form-control" id="inputEmail4" placeholder="usuario@dominio.com" name="email" value="<?=$email?>">
                <?php if (isset($errores['email'])): ?>
          				<span class="form-group-input" style="color: #603260;"><?=$errores['email'];?></span>
          			<?php endif; ?>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4" class="form-group-input">Contraseña</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Contraseña" name="pass" value="">
              <?php if (isset($errores['pass'])): ?>
                <span class="form-group-input" style="color: #603260;"><?=$errores['pass'];?></span>
              <?php endif; ?>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4" class="form-group-input">Confirmar contraseña</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Contraseña" name="rpass" value="">
              <?php if (isset($errores['rpass'])): ?>
                <span class="form-group-input" style="color: #603260;"><?=$errores['rpass'];?></span>
              <?php endif; ?>
          </div>
      </div>
  <div class="form-row">
        <div class="form-group col-md-4 pl-lg-4 pl-md-4">
            <label for="inputAddress" class="form-group-input">Dirección</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Calle y altura" name="address" value="<?=$address?>">
                <?php if (isset($errores['address'])): ?>
                    <span class="form-group-input" style="color: #603260;"><?=$errores['address'];?></span>
                <?php endif; ?>
        </div>
            <div class="form-group col-md-4">
              <label for="inputCity" class="form-group-input">Ciudad</label>
                <input type="text" class="form-control" id="inputCity" placeholder="Ciudad" name="city" value="<?=$city?>">
                <?php if (isset($errores['city'])): ?>
                    <span class="form-group-input" style="color: #603260;"><?=$errores['city'];?></span>
                <?php endif; ?>
            </div>
          <div class="form-group col-md-4 pr-lg-4 pr-md-4">
            <label for="inputState" class="form-group-input">Provincia</label>
              <?php
              $provincias = ['CABA', 'Buenos Aires', 'Catamarca', 'Chaco', 'Corrientes', 'Entre Ríos', 'Formosa', 'Jujuy', 'Mendoza', 'La Pampa', 'Córdoba', 'San Juan', 'San Luis', 'Santa Fe', 'Misiones', 'Neuquén', 'La Rioja', 'Tucumán', 'Río Negro',
              'Salta', 'Santiago del Estero', 'Chubut', 'Tierra del Fuego'];
              ?>
                        <select class="form-control"  id="inputState" class="" name="provincia">
                            <option value="">Seleccionar...</option>
                            <?php foreach ($provincias as $value): ?>
                                <?php if ($value == $provincia): ?>
                                    <option selected value="<?=$value?>"><?=$value?></option>
                                <?php else: ?>
                                    <option value="<?=$value?>"><?=$value?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errores['provincia'])): ?>
            				<span class="form-group-input" style="color: #603260;"><?=$errores['provincia'];?></span>
            			<?php endif; ?>
          </div>
    </div>
  <div class="form-group col-md-6">
          <label class="form-group-input pt-4"> Subí tu imagen de perfil</label>
            <input type="file" name="avatar" class="form-control mb-2">
              <?php if (isset($errores['avatar'])): ?>
                  <span class="form-group-input" style="color: #603260;"><?=$errores['avatar'];?></span>
              <?php endif; ?>
    </div>
    <div class="form-row">
        <div class="form-group col-md-8 text-center pt-3 pb-4">
        <button type="submit" class="btn btn-block disabled">Unirme</button>
        </div>
      </div>
    </div>
</form>
<?php include_once 'footer.php'; ?>
