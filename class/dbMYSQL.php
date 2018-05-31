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
         name varchar(50) NOT NULL,
         lastname varchar(50) NOT NULL,
         username varchar(50) NOT NULL,
         email varchar(50) NOT NULL,
         pass varchar(150) NOT NULL,
         address varchar(50) NOT NULL,
         city varchar(50) NOT NULL,
         provincia varchar(50) NOT NULL,
         avatar varchar(50) NOT NULL,
         id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
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
   //si saco esto me dice que db no está definida

  try {
   $userjson = file_get_contents('usuarios.json');
   $arrayjson = explode(PHP_EOL, $userjson);

    array_pop($arrayjson);
    foreach ($arrayjson as $user) {
     $usuariosPHP = json_decode($user, true);

      $sql = "INSERT INTO usuarios (name, lastname, username, email, pass, address, city, provincia, avatar) VALUES (:name, :lastname, :username, :email, :pass, :address, :city, :provincia, :avatar)";

    $user = [];
    //si no pongo esta variable como array me dice que -> Warning: Illegal string offset 'name' in /Applications/XAMPP/xamppfiles/htdocs/tp-ecommerce/class/dbMYSQL.php on line 113

    $stmt = $db->prepare($sql);
           $stmt->bindParam(':name', $user['name'], PDO::PARAM_STR);
           $stmt->bindParam(':lastname', $user['lastname'], PDO::PARAM_STR);
           $stmt->bindParam(':username', $user['username'], PDO::PARAM_STR);
           $stmt->bindParam(':email', $user['email'], PDO::PARAM_STR);
           $stmt->bindParam(':pass', $user['pass'], PDO::PARAM_STR);
           $stmt->bindParam(':address', $user['address'], PDO::PARAM_STR);
           $stmt->bindParam(':city', $user['city'], PDO::PARAM_STR);
           $stmt->bindParam(':provincia', $user['provincia'], PDO::PARAM_STR);
           $stmt->bindParam(':avatar', $user['avatar'], PDO::PARAM_STR);

   $stmt->execute();

   return $stmt;

     $status = '¡Usuario insertado con éxito!';
   }
//el return no sé si va dentro o fuera del foreach. probé todas las formas y no cambia. 

  }

    catch( PDOException $Exception ) {
          $status = '¡Problemas al insertar el registro!' . $Exception->getMessage() . "\n";
          return false;
                }
  }


}
