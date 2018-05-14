<?php
require_once('db.php');

class dbJSON extends DB{
  private $archive;

  public function __construct(){
    $this-> archive = "usuarios.json";
  }
  public function guardarUsuario(Usuario $usuario, DB $db){

  $user =  $usuario -> crearUsuario($db);
    $userEnJSON = json_encode($user);
    file_put_contents($this->archive, $userEnJSON . PHP_EOL, FILE_APPEND);
    return $user;
  }

  public function traerTodos(){
    $todosJSON = file_get_contents($this->archive);
    $usuariosArray = explode(PHP_EOL, $todosJSON);
    array_pop($usuariosArray);
    $usuarios = [];
      foreach ($usuariosArray as $usuario) {
          $usuarioJSON =  json_decode($usuario, true);
          $usuario = new Usuario($usuarioJSON['name'], $usuarioJSON['lastname'], $usuarioJSON['username'], $usuarioJSON['email'],$usuarioJSON['pass'], $usuarioJSON['address'], $usuarioJSON['city'], $usuarioJSON['provincia'],  $usuarioJSON['avatar']);
          $usuario->setId($usuarioJSON['id']);
          $usuarios[] = $usuario;
        }
    return $usuarios;
}


  public function existeMail($email){
    $todos = $this->traerTodos();
    foreach ($todos as $unUsuario) {
      if ($unUsuario->getEmail() == $email){
        return $unUsuario;
      }
    } return false;
  }

  public function traerUltimoID(){
        $todos = $this-> traerTodos();
          if (count($todos) == 0){
            return 1;
          }
    $ultimoUsuario = array_pop($todos);
    $id = $ultimoUsuario->getId();
    return $id + 1;
  }

public function guardarImagen($avatar, $email){
    $errores =[];
    if ($_FILES[$avatar]['error'] == UPLOAD_ERR_OK){
      $nombreArchivo = $_FILES[$avatar]['name'];
      $ext = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
      $archivoTemp = $_FILES[$avatar]['tmp_name'];
    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' ||$ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG') {
      $ubicacion = dirname(__file__);
      $ubicacionFisica = $ubicacion . '/../images/usuarios/' . $email . '.' . $ext;
      move_uploaded_file($archivoTemp, $ubicacionFisica);
          } else {
            $errores['avatar'] = "El formato no es válido. Subí archivos JPG, JPEG y PNG";
        }
      } else {
        $errores['avatar'] = "Subí una imagen.";
      }
      return $errores;
  }

public function traerPorId($id){
    $usuariosTodos = $this->traerTodos();
    foreach ($usuariosTodos as $usuario) {
      if ($id == $usuario->getId()) {
        return $usuario;
      }
    }
    return false;
  }
}



 ?>
