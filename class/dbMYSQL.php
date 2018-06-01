<?php


class dbMYSQL{

//para crear la db
//me conecto al servidor y creo la db, devuelvo status con mensaje de exito o exception de errores
public function createDB(){

  $serve_name = 'localhost';
  $db_user = 'root';
  $db_pass = '';

  try {
      $db = new PDO('mysql:host='.$serve_name,$db_user,$db_pass);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "CREATE DATABASE usuarios_db";

      $db->exec($sql);

      $status = "¡Hell yeah! La db fue creada con éxito ;) \n";
      return true;
      }
  catch(PDOException $Exception) {
      $status = 'Houston we have a problem. La db no se creó ';
        return false;
    }

}

//conectarse a la DB
//me conecto a la db que creé antes
public function connectDB(){
  $dsn = 'mysql:host=localhost; dbname=usuarios_db; charset=utf8';
  $db_user = 'root';
  $db_pass = '';
  $opt = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];

  try {
    $db = new PDO($dsn, $db_user, $db_pass, $opt);
    return $db;
  }
  catch( PDOException $Exception ) {
  $status = 'No se pudo conectar a la db' . $Exception->getMessage();
    return false;
  }

  }



//crear tabla

public function createTable(){

  $db = $this->connectDB();

    try {
      $sql = 'CREATE TABLE usuarios (
         id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
         name varchar(50) NOT NULL,
         lastname varchar(50) NOT NULL,
         username varchar(50) NOT NULL,
         email varchar(50) NOT NULL,
         pass varchar(150) NOT NULL,
         address varchar(50) NOT NULL,
         city varchar(50) NOT NULL,
         provincia varchar(50) NOT NULL,
         avatar varchar(50) NOT NULL
       )';

      $stmt = $db->prepare($sql);

      $stmt->execute();

      return $stmt;

       }

    catch( PDOException $Exception ) {

      $status = 'No se pudo crear la tabla :(' . $Exception->getMessage() . "\n";
      return false;
    }

  }


//insert into de registros a la DB

 public function migrar(){

   $db = $this->connectDB();


  try {
   $userjson = file_get_contents('usuarios.json');
   $arrayjson = explode(PHP_EOL, $userjson);

  array_pop($arrayjson);


    foreach ($arrayjson as $user) {

     $usuariosPHP = json_decode($user, true);

      $sql = "INSERT INTO usuarios (name, lastname, username, email, pass, address, city, provincia, avatar) VALUES (:name, :lastname, :username, :email, :pass, :address, :city, :provincia, :avatar)";

      $name = $usuariosPHP['name'];
      $lastname = $usuariosPHP['lastname'];
      $username = $usuariosPHP['username'];
      $email = $usuariosPHP['email'];
      $pass = $usuariosPHP['pass'];
      $address = $usuariosPHP['address'];
      $city = $usuariosPHP['city'];
      $provincia = $usuariosPHP['provincia'];
      $avatar = $usuariosPHP['avatar'];


      $stmt = $db->prepare($sql);

      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
      $stmt->bindParam(':address', $address, PDO::PARAM_STR);
      $stmt->bindParam(':city', $city, PDO::PARAM_STR);
      $stmt->bindParam(':provincia', $provincia, PDO::PARAM_STR);
      $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);


      $stmt->execute();



     $status = '¡Usuario insertado con éxito!';
     
    } 

    return true;
  }

    catch( PDOException $Exception ) {
          $status = '¡Problemas al insertar el registro!' . $Exception->getMessage() . "\n";
          return false;
                }
  }


}
