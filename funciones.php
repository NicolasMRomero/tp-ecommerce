<?php

function crearUsuario($data){
    $usuario = [
        'name' => $data['name'],
        'lastname'=> $data['lastname'],
        'username' => $data['username'],
        'email' => $data['email'],
        'pass' => password_hash($data['pass'], PASSWORD_DEFAULT),
        'address' => $data['address'],
        'city' => $data['city'],
        'provincia' => $data['provincia'],
        'avatar' =>'/images/'. '/usuarios/' . $_POST['email'],
        //veamos como queremos guardar la imagen, le puse la ruta y el mail
        'id'=> traerUltimoID(),
    ];
    return $usuario;
}
//todo esto es lo que vemos como key y value en el json del archivo usuarios.json
//las imagenes se almacenan en la carpeta images/usuarios

function validar($data, $avatar){
      $arrayDevolver = [];
      $name = trim($_POST['name']);
      $lastname = trim($_POST['lastname']);
      $username = trim($_POST['username']);
      $email = trim($_POST['email']);
      $address = trim($_POST['address']);
      $city = trim($_POST['city']);
      $provincia = trim($_POST['provincia']);
      $pass = trim($_POST['pass']);
      $rpass = trim($_POST['rpass']);
      $avatar = $_FILES['avatar']['error'];

        if ($name == "") {
          $arrayDevolver['name'] = "Completá tu nombre.";
          }
        if ($lastname == "") {
              $arrayDevolver['lastname'] = "Completá tu apellido.";
            }
        if ($name == "") {
            $arrayDevolver['username'] = "Completá tu nombre de usuario.";
              }
        if ($address == "") {
          $arrayDevolver['address'] = "¿Dónde vivís?";
              }
        if ($city == "") {
          $arrayDevolver['city'] = "Indicanos cuál es tu ciudad.";
                }
        if ($provincia == "") {
            $arrayDevolver['provincia'] = "¿Cuál es tu provincia?";
            }
        if ($email == "") {
          $arrayDevolver['email'] = "Completá tu email";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $arrayDevolver['email'] = "Por favor poné un email correcto";
        } elseif (existeMail($email)){
          $arrayDevolver['email'] = "¡Ese mail ya existe!";
          }
        if ($pass == "" || $rpass == "") {
          $arrayDevolver['pass'] = "Por favor completá tus contraseñas.";
          }elseif (strlen($pass) < 8) {
          $arrayDevolver['pass'] = "La contraseña debe tener al menos 8 caracteres.";
          } elseif ($pass != $rpass) {
            $arrayDevolver['pass'] = "Tus contraseñas no coinciden.";
        }
       if ($avatar != UPLOAD_ERR_OK){
         $arrayDevolver['avatar'] = "Por favor subí una foto de perfil.";
       } elseif (guardarImagen($avatar) == false) {
           $arrayDevolver ['avatar']= "El formato no es válido, subí archivos JPG, JPEG y PNG";
           }

      return $arrayDevolver;
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
  if ($_FILES['avatar']['error'] == UPLOAD_ERR_OK){
    $nombreArchivo = $_FILES['avatar']['name'];
    $ext = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    $archivoTemp = $_FILES['avatar']['tmp_name'];

  if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' ||$ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG') {
    $ubicacion = dirname(__file__);
    $ubicacionFisica = $ubicacion . '/images/'. '/usuarios/'  . $_POST['email'] . '.' . $ext;
    move_uploaded_file($archivoTemp, $ubicacionFisica);
    $seSubio = "archivo subido exitosamente";
        } else {
          $seSubio = "El formato no es válido. Subí archivos JPG, JPEG y PNG";
      }
    }
    return $avatar;
}
//acá no se si tiene que devolver true o $avarar :/ me genera dudas...




// acá abajo las funciones que faltan hacer.
// Hay que meter $_SESSION, setear las cookies, hacer que desloguee y veamos qué de los optativos hacemos.

/*
function guardarUsuario($data, $avatar){}

function validarLogin($data) {}

function loguear($usuario) {}

function estaLogueado() {}

function traerPorId($id){}    */

 ?>
