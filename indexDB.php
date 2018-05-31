<?php
require_once('soporte.php');

if($_POST){

    if(isset($_POST['createdb'])){
    $db->createDB();
    }

    if(isset($_POST['createtable'])){
    $db->createTable();
      echo "¡Tu tabla fue creada! ;) \n";
    }

      if(isset($_POST['migrar'])){
          $db->migrar();
          if($db->migrar()){
          header('location: index.php');
        }else{
          echo "no se pudo";
        }
    }
//si pongo un if else, entra directo al else.
//si dejo solo el migrar() me retorna el echo pero entra al false de la función y no hace nada, mas que imprimir el echo.
//en la tabla solo tengo una row con todos los campos en NULL
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
      <div class="container-portada">
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
