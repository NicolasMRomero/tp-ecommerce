<?php
require_once('soporte.php');
include_once('header.php');


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

?>


<body class="body-forms">
  <form  action="" method="post">
        <div class="form-row ">
          <div class="form-group buttons col-lg-4 pl-4">
            <button type="submit" class="btn btn-lg active botones-portada" name="createdb">Crear Base de Datos</button>
          </div>

          <div class="form-group buttons col-lg-4 pl-4">
            <button type="submit" class="btn btn-lg active botones-portada"  name="createtable">Crear Tabla</button>
          </div>

          <div class="form-group buttons col-lg-4 pl-4">
            <button type="submit" class="btn btn-lg active botones-portada" name= "migrar">Migrar Usuarios</button>
          </div>
        </div>
  </form>

<?php include_once 'footer.php'; ?>