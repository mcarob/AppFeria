<form autocomplete="off" id="formEstudianteR" action="">
    <br>
    <div class="card-header card-header-border-bottom">
        <h2>Información Del Estudiante </h2>
    </div>

    <div class="row no-gutters">
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">assignment_ind</i>
                    </span>
                </div>
                <input autocomplete="off" type="text" class="form-control" placeholder="Nombres" aria-label="Username"
                    required>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                </div>
                <input autocomplete="off" type="text" class="form-control" placeholder="Apellidos "
                    aria-label="Username">
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
                <input autocomplete="off" type="text" class="form-control" placeholder="Cedula" aria-label="Username">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">phone</i>
                    </span>
                </div>
                <input type="text" autocomplete="off" class="form-control" placeholder="Teléfono "
                    aria-label="Username">
            </div>
        </div>
    </div>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">email</i>
            </span>
        </div>
        <input type="text" autocomplete="off" class="form-control" placeholder="Correo Electronico"
            aria-label="Username" style="display:none;">
        <input type="text" autocomplete="off" class="form-control" placeholder="Correo Electronico"
            aria-label="Username">
        <div class="input-group-append">
            <span class="input-group-text" id="inputGroupAppend">@unbosque.edu.co</span>
        </div>
    </div>


    <div class="form-group">
        <label for="exampleFormControlSelect1">Programa Académico</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>Ingeniería de Sistemas</option>
            <option>BioIngeniería</option>
            <option>Ingeniería Ambiental</option>
            <option>Ingeniería Electrónica</option>
            <option>Ingeniería Industrial</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Semestre Actual</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>Semestre 1</option>
            <option>Semestre 2</option>
            <option>Semestre 3</option>
            <option>Semestre 4</option>
            <option>Semestre 5</option>
            <option>Semestre 6</option>
            <option>Semestre 7</option>
            <option>Semestre 8</option>
            <option>Semestre 9</option>
            <option>Semestre 10</option>
        </select>
    </div>
    <div class="row no-gutters">
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">assignment_ind</i>
                    </span>
                </div>
                <input autocomplete="off" type="password" class="form-control" placeholder="Contraseña"
                    style="display:none;" aria-label="Username">
                <input autocomplete="off" type="password" class="form-control" placeholder="Contraseña"
                    aria-label="Username">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                </div>
                <input autocomplete="off" type="password" class="form-control" placeholder="Validar Contraseña "
                    aria-label="Username">
            </div>
        </div>
    </div>
    <div class="form-footer pt-4 pt-5 mt-4" style="float: right;">
        <input type="submit" class="btn btn-primary btn-default" value="Registrar"></input>
        <input type="submit" class="btn btn-primary btn-default" value="Volver a Ingreso" formaction="index.php"></input>
    </div>
</form>