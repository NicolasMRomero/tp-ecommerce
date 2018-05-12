<?php
session_start();
	if (isset($_COOKIE['id'])) {
		$_SESSION['id'] = $_COOKIE['id'];
	}


function crearUsuario($data, $avatar){
    $usuario = [
        'name' => $data['name'],
        'lastname'=> $data['lastname'],
        'username' => $data['username'],
        'email' => $data['email'],
        'pass' => password_hash($data['pass'], PASSWORD_DEFAULT),
        'address' => $data['address'],
        'city' => $data['city'],
        'provincia' => $data['provincia'],
        'imagen' => 'images/' .'usuarios/'. $data['email'] . '.' . pathinfo($_FILES[$avatar]['name'], PATHINFO_EXTENSION),
        'id'=> traerUltimoID()
    ];
    return $usuario;
}

function validar($data, $avatar){
      $errores = [];
      $name = trim($_POST['name']);
      $lastname = trim($_POST['lastname']);
      $username = trim($_POST['username']);
      $email = trim($_POST['email']);
      $address = trim($_POST['address']);
      $city = trim($_POST['city']);
      $provincia = trim($_POST['provincia']);
      $pass = trim($_POST['pass']);
      $rpass = trim($_POST['rpass']);
        if ($name == "") {
          $errores['name'] = "Completá tu nombre.";
          }
        if ($lastname == "") {
              $errores['lastname'] = "Completá tu apellido.";
            }
        if ($name == "") {
            $errores['username'] = "Completá tu nombre de usuario.";
              }
        if ($address == "") {
          $errores['address'] = "¿Dónde vivís?";
              }
        if ($city == "") {
          $errores['city'] = "Indicanos cuál es tu ciudad.";
                }
        if ($provincia == "") {
            $errores['provincia'] = "¿Cuál es tu provincia?";
            }
        if ($email == "") {
          $errores['email'] = "Completá tu mail.";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errores['email'] = "Por favor poné un mail correcto.";
        } elseif (existeMail($email)){
          $errores['email'] = "¡Ese email ya existe!";
          }
        if ($pass == "" || $rpass == "") {
          $errores['pass'] = "Por favor completá tus contraseñas.";
        }elseif (strlen($pass) < 7) {
          $errores['pass'] = "La contraseña debe tener al menos 7 caracteres.";
          } elseif ($pass != $rpass) {
            $errores['pass'] = "Tus contraseñas no coinciden.";
        }
       if ($_FILES[$avatar]['error']!= UPLOAD_ERR_OK){
         $errores['avatar'] = "Por favor subí una foto de perfil.";
       } else {
         $ext = strtolower(pathinfo($_FILES[$avatar]['name'], PATHINFO_EXTENSION));
			if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg'){
           $errores['avatar']= "El formato no es válido. Subí archivos jpg, jpeg o png.";
           }
         }
      return $errores;
  }

function traerTodos(){
      $todosJSON = file_get_contents('usuarios.json');
      $usuariosArray = explode(PHP_EOL, $todosJSON);
      array_pop($usuariosArray);
      $todosPHP = [];
        foreach ($usuariosArray as $unUsuario) {
            $todosPHP[] =  json_decode($unUsuario, true);
          }
      return $todosPHP;
  }
function traerUltimoID(){
      $todos = traerTodos();
        if (count($todos) == 0){
          return 1;
        }
  $ultimoUsuario = array_pop($todos);
  $ultimoID = $ultimoUsuario['id'];
  return $ultimoID + 1;
}

function existeMail($email){
    $todos = traerTodos();
    foreach ($todos as $unUsuario) {
      if ($unUsuario['email'] == $email){
        return $unUsuario;
      }
    } return false;
}

function guardarImagen($avatar){
  $errores =[];
  if ($_FILES[$avatar]['error'] == UPLOAD_ERR_OK){
    $nombreArchivo = $_FILES[$avatar]['name'];
    $ext = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    $archivoTemp = $_FILES[$avatar]['tmp_name'];
  if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' ||$ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG') {
    $ubicacion = dirname(__file__);
    $ubicacionFisica = $ubicacion . '/images/' .'/usuarios/' . $_POST['email'] . '.' . $ext;
    move_uploaded_file($archivoTemp, $ubicacionFisica);
        } else {
          $errores['avatar'] = "El formato no es válido. Subí archivos JPG, JPEG y PNG";
      }
    } else {
      $errores['avatar'] = "Subí una imagen.";
    }
    return $errores;
}

function guardarUsuario($data, $avatar){
  $usuario = crearUsuario($data, $avatar);
  $userEnJSON = json_encode($usuario);
  file_put_contents('usuarios.json', $userEnJSON . PHP_EOL, FILE_APPEND);
  return $usuario;
}

function validarLogin($data) {
		$errores = [];
		$email = trim($data['email']);
		$pass = trim($data['pass']);
		if ($email == '') {
			$errores['email'] = "Ingresá tu mail.";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errores['email'] = "El mail ingresado es inocorrecto.";
		} elseif (!$usuario = existeMail($email)) {
			$errores['email'] = "Este mail no está registrado. ¡Unite!";
		} else {
      if (!password_verify($pass, $usuario['pass'])) {
         	$errores['pass'] = "Alguno de los datos es incorrecto.";
      	}
      }
		return $errores;
	}

function loguear($usuario) {
   $_SESSION['id'] = $usuario['id'];
  header('location: perfil.php');
  exit;
}

function estaLogueado() {
		return isset($_SESSION['id']);
	}

  function traerPorId($id){
    $usuariosTodos = traerTodos();
    foreach ($usuariosTodos as $usuario) {
      if ($id == $usuario['id']) {
        return $usuario;
      }
    }
    return false;
  }

function traerSuscriptos(){
      $suscriptosJSON = file_get_contents('suscriptos.json');
      $suscriptosArray = explode(PHP_EOL, $suscriptosJSON);
      array_pop($suscriptosArray);
      $suscriptosPHP = [];
        foreach ($suscriptosArray as $unSuscripto) {
            $suscriptosPHP[] = json_decode($unSuscripto, true);
          }
  return $suscriptosPHP;
  }

function traerUltIDSuscriptos(){
      $todos = traerSuscriptos();
        if (count($todos) == 0){
          return 1;
        }
  $ultimoSuscripto = array_pop($todos);
  $ultimoIDSuscripto = $ultimoSuscripto['id'];
  return $ultimoIDSuscripto + 1;
}

 ?>
