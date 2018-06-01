<?php include_once 'header.php';
require_once('soporte.php');

?>
<body class="body-forms">
<form method="post" enctype="multipart/form-data">
      <div class="container form-login" style="background-color: rgba(255, 255, 255, 0.9);">
          <h1 class="ttitulo-principal text-center pt-3">MIGRAR DATOS DE USUARIOS</h1>
        <div class="form-row">
          <div class="form-group col-md-4 text-center pt-3 pb-4">
            <button type="submit" name="createdb"  style="<?= isset($_POST['createdb']) || isset($_POST['createtable'])  ? 'display: none' : '';?>" class="btn btn-block disabled">Crear base de datos</button>
            <?php if (isset($_POST['createdb'])): $db->createDB();?>
              <button type="submit" name="createtable" class="btn btn-block disabled">Crear tabla</button>
            <?php endif;?>
            <?php if (isset($_POST['createtable'])): $db->createTable();?>
              <button type="submit" name="migrar" class="btn btn-block disabled">Migrar</button>
            <?php endif;?>
          </div>
        </div>
  </div>
</form>

<?php include_once 'footer.php'; ?>
