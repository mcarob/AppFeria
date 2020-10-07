<!--    esto es algo comentado--->
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ListasDesplegables.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/Ciudades.php');

$ciudadesCon=new Ciudades();
$departamentos=$ciudadesCon->darTodosDepartamentos();


?>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Nombres" aria-label="Username" id="nombre" name="nombre"
        value="<?php echo($estudiante->getNombreEstudiante())?>" readonly>
</div>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" name="apellidos" id="apellidos"
        value="<?php echo($estudiante->getApellidoEstudiante())?>" readonly>
</div>
<div class="row no-gutters">
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">assignment_ind</i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Documento de identidad" aria-label="Username"
                id="cedula" name="cedula" value="<?php echo($estudiante->getCedEstudiante())?>" readonly>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">phone</i>
                </span>
            </div>
            <input type="number" class="form-control" placeholder="Teléfono" aria-label="Username" id="telefono"
                name="telefono" required>
        </div>
    </div>
</div>
<div class="row no-gutters">
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">home</i>
                </span>
            </div>
            <select type="text" class="form-control" placeholder="" aria-label="Username" id="depa-lista"
                name="departamento" required onchange="getCity(this.value);">
                <option>Seleccione un Departamento</option>
                <?php
                    foreach ($departamentos as $depar) {
                    ?>
                <option value="<?php echo ($depar[0] ); ?>">
                    <?php echo $depar[1]; ?></option>
                <?php
                    }
                    ?>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">home</i>
                </span>
            </div>
            <select name="ciudad" id="ciudad" class="form-control">
                <option>Seleccione una Ciudad</option>
            </select>
        </div>
    </div>
</div>
    <div class="input-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">home</i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Direccion" aria-label="Username" id="direccion"
                name="direccion" required>
        </div>
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">email</i>
            </span>
        </div>
        <input type="text" class="form-control" placeholder="Correo Electronico" aria-label="Username" id="correo"
            name="correo" value="<?php echo($estudiante->getCorreoEstudiante())?>" readonly>
    </div>
    <br>
    <h3>Referencia No. 1:</h3>
    <br><br>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">face</i>
            </span>
        </div>
        <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" id="nombreR1"
            name="nombreR1">
    </div>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">email</i>
            </span>
        </div>
        <input type="text" class="form-control" placeholder="Correo" aria-label="Username" id="correoR1"
            name="correoR1">
    </div>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">face</i>
            </span>
        </div>
        <input type="text" class="form-control" placeholder="Empresa" aria-label="Username" id="empresaR1"
            name="empresaR1">
    </div>
    <div class="row no-gutters">
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">assignment_ind</i>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Cargo" aria-label="Username" id="cargoR1"
                    name="cargoR1">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">phone</i>
                    </span>
                </div>
                <input type="number" class="form-control" placeholder="Teléfono" aria-label="Username" id="telefonoR1"
                    name="telefonoR1">
            </div>
        </div>

    </div>
    <h3>Referencia No. 2:</h3>
    <br><br>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">face</i>
            </span>
        </div>
        <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" id="nombreR2"
            name="nombreR2">
    </div>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">email</i>
            </span>
        </div>
        <input type="text" class="form-control" placeholder="Correo" aria-label="Username" id="correoR2"
            name="correoR2">
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">face</i>
            </span>
        </div>
        <input type="text" class="form-control" placeholder="Empresa" aria-label="Username" id="empresaR2"
            name="empresaR2">
    </div>
    <div class="row no-gutters">
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">assignment_ind</i>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Cargo" aria-label="Username" id="cargoR2"
                    name="cargoR2">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">phone</i>
                    </span>
                </div>
                <input type="number" class="form-control" placeholder="Teléfono" aria-label="Username" id="telefonoR2"
                    name="telefonoR2">
            </div>
        </div>
    </div>