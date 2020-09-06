<form autocomplete="off" id="formEmpresaR" action="" method="POST">
<!--    esto es algo comentado---> 
  <div class="wizard-card ct-wizard-green">
    <div class="picture-container">
      <div class="picture">
        <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
        <input type="file" id="wizard-picture">
      </div>
      <h6>Elegir Logo</h6>
    </div>
  </div>
  <br>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">
        <i class="material-icons">face</i>
      </span>
    </div>
    <input  autocomplete="new-false" type="text" class="form-control" id="nombreE" name="nombreE" placeholder="Nombre o Razon Social" aria-label="Nombre Empresa" required>
  </div>
  <div class="row no-gutters">
    <div class="col-md-6 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="material-icons">assignment_ind</i>
          </span>
        </div>
        <input  autocomplete="false" type="text" class="form-control" id="nitE" name="nitE" data-mask="999999999-9" placeholder="NIT" aria-label="Nit Empresa">
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="material-icons">phone</i>
          </span>
        </div>
        <input autocomplete="false"  type="text" class="form-control"  id="telE" name="telE" required placeholder="Teléfono Empresa" aria-label="Telefono Empresa">
      </div>
    </div>
  </div>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">
        <i class="material-icons">email</i>
      </span>
    </div>
    <input  autocomplete="false" type="email" class="form-control"  id="emailE" name="emailE" required  placeholder="Correo Electronico Empresa" aria-label="Username">
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
    </div>
    <div class="custom-file">
      <input  type="file" class="custom-file-input"  id="camaracomercioE" name="camaracomercioE" required  aria-describedby="inputGroupFileAddon01">
      <label class="custom-file-label" for="camaracomercio"   name="camaracomercio" id="nombreccomercio">Subir Camara de Comercio</label>
    </div>
  </div>
  <div class="form-group">
    <textarea class="form-control" id="exampleFormControlTextarea1"   id="descE" name="descE" required  rows="5" style="resize: none;" placeholder="Descripcción Empresa (max 1200)"></textarea>
  </div>

  <div class="card-header card-header-border-bottom">
    <h2>Información Contacto </h2>
  </div>

  <div class="row no-gutters">
    <div class="col-md-6 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="material-icons">assignment_ind</i>
          </span>
        </div>
        <input autocomplete="false" type="text" class="form-control" id="nomC" name="nomC" required placeholder="Nombres" aria-label="Username">
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="material-icons">face</i>
          </span>
        </div>
        <input autocomplete="false"  type="text" class="form-control" id="apeC" name="apeC" required placeholder="Apellidos " aria-label="Username">
      </div>
    </div>
  </div>
  <div class="row no-gutters">
    <div class="col-md-6 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="material-icons">group</i>
          </span>
        </div>
        <input  autocomplete="false" type="text" class="form-control"id="" name="" required  placeholder="Cargo" aria-label="Username">
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="material-icons">phone</i>
          </span>
        </div>
        <input autocomplete="false"  type="text" class="form-control" placeholder="Teléfono " aria-label="Username">
      </div>
    </div>
  </div>
  <div class="form-footer pt-4 pt-5 mt-4" style="float: right;">
    <input type="submit" class="btn btn-primary btn-default" value="Registrar"></input>
    <input type="submit" class="btn btn-primary btn-default" value="Volver a Ingreso"></input>
  </div>
</form>

<script>

document.getElementById('camaracomercio').onchange = function () {
  document.getElementById("nombreccomercio").innerHTML =  this.value.replace(/C:\\fakepath\\/i, '');
};


</script>