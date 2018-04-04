<?php
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
//todo esto es lo que vemos como key y value en el json del archivo usuarios.json
//las imagenes se almacenan en la carpeta images/usuarios
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
          $errores['email'] = "Completá tu email";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errores['email'] = "Por favor poné un email correcto";
        } elseif (existeMail($email)){
          $errores['email'] = "¡Ese mail ya existe!";
          }
        if ($pass == "" || $rpass == "") {
          $errores['pass'] = "Por favor completá tus contraseñas.";
          }elseif (strlen($pass) < 8) {
          $errores['pass'] = "La contraseña debe tener al menos 8 caracteres.";
          } elseif ($pass != $rpass) {
            $errores['pass'] = "Tus contraseñas no coinciden.";
        }
       if ($_FILES[$avatar]['error']!= UPLOAD_ERR_OK){
         $errores['avatar'] = "Por favor subí una foto de perfil.";
       } else {
         $ext = strtolower(pathinfo($_FILES[$avatar]['name'], PATHINFO_EXTENSION));
			if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg'){
           $errores['avatar']= "El formato no es válido. Subí archivos JPG, JPEG y PNG";
           }
         }
      return $errores;
  }
  //son cada uno de los errores de los inputs. Espacios vacios, mail invalido, imagen con formato inocorrecto, pass que no coinciden o tienen menos de 8 caracteres.
function traerTodos(){
      $todosJSON = file_get_contents('usuarios.json');
          //esto es un string//
      $usuariosArray = explode(PHP_EOL, $todosJSON);
        //esto es un array//
      array_pop($usuariosArray);
        //para sacar el ultimo espacio vacio//
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
//acá lo que hice fue tomar el ultimo id que tiene el json y sumarle uno para que cada usuario que se cree se le asigne un id un numero mayor al anterior.
function existeMail($mail){
    $todos = traerTodos();
    foreach ($todos as $unUsuario) {
      if ($unUsuario['email']== $mail){
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
// acá abajo las funciones que faltan hacer.
// Hay que meter $_SESSION, setear las cookies, hacer que desloguee y veamos qué de los optativos hacemos.
function guardarUsuario($data, $avatar){
  $usuario = crearUsuario($data, $avatar);
  $userEnJSON = json_encode($usuario);
  file_put_contents('usuarios.json', $userEnJSON . PHP_EOL, FILE_APPEND);
  return $usuario;
}
//function validarLogin($data) {}
function loguear($usuario) {
   $_SESSION['id'] = $usuario['id'];
  header('location: index.php');
  exit;
}
//function estaLogueado() {}
//function traerPorId($id){}
 ?>
