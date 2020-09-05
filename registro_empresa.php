<form autocomplete="off">
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
    <input  autocomplete="new-false" type="text" class="form-control" placeholder="Nombre o Razon Social" aria-label="Username">
  </div>
  <div class="row no-gutters">
    <div class="col-md-6 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="material-icons">assignment_ind</i>
          </span>
        </div>
        <input  autocomplete="false" type="text" class="form-control" data-mask="999999999-9" placeholder="NIT" aria-label="Username">
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="material-icons">phone</i>
          </span>
        </div>
        <input autocomplete="false"  type="text" class="form-control" placeholder="Teléfono Empresa" aria-label="Username">
      </div>
    </div>
  </div>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">
        <i class="material-icons">email</i>
      </span>
    </div>
    <input  autocomplete="false" type="text" class="form-control" placeholder="Correo Electronico Empresa" aria-label="Username">
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
    </div>
    <div class="custom-file">
      <input  type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
      <label class="custom-file-label" for="inputGroupFile01">Subir Camara de Comercio</label>
    </div>
  </div>
  <div class="form-group">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" style="resize: none;" placeholder="Descripcción Empresa (max 1200)"></textarea>
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
        <input autocomplete="false" type="text" class="form-control" placeholder="Nombres" aria-label="Username">
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="material-icons">face</i>
          </span>
        </div>
        <input autocomplete="false"  type="text" class="form-control" placeholder="Apellidos " aria-label="Username">
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
        <input  autocomplete="false" type="text" class="form-control" placeholder="Cargo" aria-label="Username">
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