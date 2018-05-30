<?php

class dbMYSQL {

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
      return $status;
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
// me conecto a la db y creo una tabla 'usuarios' devuelvo errores o exito con la variable status
// No sé qué onda lo de engine, el autoincremente deafult y el charset latin1 pero los saqué de el ej que me había pasado pato de la clase de platos que yo había faltado....

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

      $status = "¡Tu tabla fue creada! :guiño: \n";

      return $stmt;

       }

    catch( PDOException $Exception ) {

      $status = 'No se pudo crear la tabla :(' . $Exception->getMessage() . "\n";
      return false;
    }

  }

//insert into de registros a la DB
// me conecto a la db y hago un try con insert into por cada input del form a la tabla creada anteriormente devuelvo mensaje de error o exito

//no sé como se debería hacer el foreach para que tome los usuarios del json y los meta en la tabla con el insert into...
//kevin nos había dicho que armemos una funcion pedirusuarios() y que si eso retornaba 0 había que hacer la migracion o algo así....

 public function migrar(){

    $db = connectDB();
  try {

      $userjson = json_decode(file_get_contents('usuarios.json'), true);
      foreach ($userjson as $key => $value) {
        // code...
      }

      $sql = "INSERT INTO usuarios (name, lastname, username, email, pass, address, city, provincia, avatar) VALUES (:name, :lastname, :username, :email, :pass, :address, :city, :provincia, :avatar)";

      $query = $db->prepare($sql);

          $query->bindParam(':name', $this->name, PDO::PARAM_STR);
          $query->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
          $query->bindParam(':username', $this->username, PDO::PARAM_STR);
          $query->bindParam(':email', $this->email, PDO::PARAM_STR);
          $query->bindParam(':pass', $this->pass, PDO::PARAM_STR);
          $query->bindParam(':address', $this->address, PDO::PARAM_STR);
          $query->bindParam(':city', $this->city, PDO::PARAM_STR);
          $query->bindParam(':provincia', $this->provincia, PDO::PARAM_STR);
          $query->bindParam(':avatar', $this->avatar, PDO::PARAM_STR);

      $query->execute();

          $status = '¡Usuario insertado con éxito!';
            }
    catch( PDOException $Exception ) {
          $status = '¡Problemas al insertar el registro!' . $Exception->getMessage() . "\n";
                }
    return $status;
  }




}
