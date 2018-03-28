<?php include_once 'header.php'; ?>

<form>
<div class="container" style="background-color: rgba(255, 255, 255, 0.9);">

    <h1 class="ttitulo-principal text-center pt-3">REGISTRARME</h1>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNombre" class="form-group-input">Nombre</label>
      <input type="text" class="form-control" id="inputNombre" placeholder="Nombre">
    </div>

    <div class="form-group col-md-6">
      <label for="inputApellido" class="form-group-input">Apellido</label>
      <input type="text" class="form-control" id="inputApellido" placeholder="Apellido">
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4" class="form-group-input">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="usuario@dominio.com">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4" class="form-group-input">Contraseña</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Contraseña">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4 pl-lg-4 pl-md-4">
    <label for="inputAddress" class="form-group-input">Dirección</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Calle y altura">
  </div>
    <div class="form-group col-md-4">
      <label for="inputCity" class="form-group-input">Ciudad</label>
      <input type="text" class="form-control" id="inputCity" placeholder="Ciudad">
    </div>
    <div class="form-group col-md-4 pr-lg-4 pr-md-4">
      <label for="inputState" class="form-group-input">Provincia</label>
      <select id="inputState" class="form-control">
        <option selected>Seleccionar...</option>
        <option value="Provincia">CABA</option>
        <option value="Provincia">Buenos Aires</option>
        <option value="Provincia">Catamarca</option>
        <option value="Provincia">Chaco</option>
        <option value="Provincia">Corrientes</option>
        <option value="Provincia">Entre Ríos</option>
        <option value="Provincia">Formosa</option>
        <option value="Provincia">Jujuy</option>
        <option value="Provincia">Mendoza</option>
        <option value="Provincia">La Pampa</option>
        <option value="Provincia">Córdoba</option>
        <option value="Provincia">San Juan</option>
        <option value="Provincia">San Luis</option>
        <option value="Provincia">Santa Fe</option>
        <option value="Provincia">Misiones</option>
        <option value="Provincia">Neuquén</option>
        <option value="Provincia">La Rioja</option>
        <option value="Provincia">Tucumán</option>
        <option value="Provincia">Río Negro</option>
        <option value="Provincia">Salta</option>
        <option value="Provincia">Santiago del Estero</option>
        <option value="Provincia">Santa Cruz</option>
        <option value="Provincia">Chubut</option>
        <option value="Provincia">Tierra del Fuego</option>
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-8 text-center pt-3 pb-4">
    <div class="form-check pb-3">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Recordarme
      </label>
    </div>
  <button type="submit" class="btn btn-block disabled">Unirme</button>
  </div>
</div>
</div>
</form>
<?php include_once 'footer.php'; ?>
