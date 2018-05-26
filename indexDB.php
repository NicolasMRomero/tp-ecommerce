<?php
require_once('soporte.php');

//no sé si la clase que armé debería extender de $db al igual que dbJSON
//por algun motivo no me toma el css del style que tiene la url con la foto del background
//cambié un poco el html porque eran etiquetas <a> y no <button> así que no pasaba naranja cuando los clickeaba 


if($_POST){

    if(isset($_POST['createdb'])){
      $action = $db->createDB();
    }

      if(isset($_POST['createtable'])){
        if ($db->createDB() == true){  //--> como llamo a la function conectar a la base en crear tabla estoy evitando repertirlo acá-> se supone que si no conecta va a dar error
        /* $action = connectDB();
        } else {
         $status = 'Tenés que conectarte a la db';
        }
        if(connectDB() == true){ */
          $action = $db->createTable();
        }
      }

      if(isset($_POST['migrar'])){

          }

}

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenidos a Geek Zone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
  </head>

  <body>
    <header>
      <nav class="navbar navbar-light bg-light">
        <div class="row">
         <div class="col-lg-6"  style="text-align:center">
        <a class="logo-nav" href=""><img src="images/logo-E.png" alt="logo-E"></a>
          </div>
           </div>
      </nav>
    </header>

    <form  action="" method="post">
      <div class="container container-portada">
        <section>

            <div class="form-row ">

            <div class="form-group buttons col-md-4 pl-4">
                <button type="submit" class="btn btn-lg active botones-portada" name="createdb">Crear Base de Datos</button>
            </div>

        <div class="form-group buttons col-md-4 pl-4">
          <button type="submit" class="btn btn-lg active botones-portada"  name="createtable">Crear Tabla</button>
        </div>

        <div class="form-group buttons col-md-4 pl-4">
            <button type="submit" class="btn btn-lg active botones-portada" name= "migrar">Migrar Usuarios</button>
        </div>


      </div>
    </section>
    </div>
      </form>

     </body>
    </html>
