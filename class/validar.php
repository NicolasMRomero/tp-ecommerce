<?php

class Validate{
  //hint que recibe un objeto de tipo db
public function validarRegister(DB $db, $avatar){
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
        } elseif ($db->existeMail($email)){
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

  function validarIngresar(DB $db) {
  		$errores = [];
  		$email = trim($_POST['email']);
  		$pass = trim($_POST['pass']);
  		if ($email == '') {
  			$errores['email'] = "Ingresá tu mail.";
  		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			$errores['email'] = "El mail ingresado es inocorrecto.";
  		} elseif (!$usuario = $db->existeMail($email)) {
  			$errores['email'] = "Este mail no está registrado. ¡Unite!";
  		} else {
        if (!password_verify($pass, $usuario->getPassword())) {
           	$errores['pass'] = "Alguno de los datos es incorrecto.";
        	}
        }
  		return $errores;
  	}

}
