<?php
require_once('soporte.php');
include_once('header.php');

  if(isset($_POST['createdb'])){
    $db->createDB();
  }

  if(isset($_POST['createtable'])){
    $db->createTable();
  }

  if(isset($_POST['migrar'])){
    if($db->migrar()){
    header('location: index.php');
    }
  }  
?>
<body class="body-forms">
  <form method="post" enctype="multipart/form-data">
    <div class="container form-login" style="background-color: rgba(255, 255, 255, 0.9); padding: 80px">
      <h1 class="ttitulo-principal text-center pt-3">MIGRAR DATOS DE USUARIOS</h1>
        <div class="form-row">
          <div class="form-group col-md-4 text-center pt-3 pb-4">
            <button type="submit" name="createdb"  style="<?= (isset($_POST['createdb'])) || (isset($_POST['createtable']))? 'display: none' : '';?>" class="btn btn-block disabled">Crear base de datos</button>
            
              <button type="submit" name="createtable" style="<?= (isset($_POST['createdb']))? '' : 'display: none'?>" class="btn btn-block disabled">Crear tabla</button>
            
              <button type="submit" name="migrar" style="<?= (isset($_POST['createtable']))? '' : 'display: none'?>" class="btn btn-block disabled">Migrar</button>
           
          </div>
        </div>
    </div>
  </form>

<?php include_once 'footer.php'; ?>
