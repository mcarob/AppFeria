<!--    esto es algo comentado--->
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    
    <input type="text" class="form-control" aria-label="Username" id="nombre" name="nombre"
        value="<?php echo ($estudiante->getNombreEstudiante())?>" readonly>
</div>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Apellidos" aria-label="Username" name="apellidos"
        id="apellidos" value="<?php echo($estudiante->getApellidoEstudiante())?>" readonly>
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
            <input type="text" class="form-control" placeholder="Teléfono" aria-label="Username" id="telefono"
                name="telefono" pattern="(^[+]?[0-9]{7,15})"
                title="El Formato de telefono puede comenzar con + o solo numeros (max 15)" required value=<?php echo($datosPersonales->getHojaCelular())?>>
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
            <select type="text" class="form-control" placeholder="" aria-label="Username" id="ciudad" name="ciudad"
                required value="<?php echo($datosPersonales->getHojaCiudad())?>">
                <option value="md"> Medellin </option>
                <option value="bg"> Bogota </option>
                <option value="cl"> Cali </option>
                <option value="brr"> Barranquilla </option>
                <option value="ct"> Cartagena </option>
                <option value="sc"> Soacha </option>
                <option value="cu"> Cucuta </option>
                <option value="so"> Soledad </option>
                <option value="bu"> Bucaramanga</option>
                <option value="be"> Bello </option>
                <option value="vv"> Villavicencio </option>
                <option value="ib"> Ibague</option>
                <option value="sm"> Santa Marta </option>
                <option value="vll"> Valledupar </option>
                <option value="mz"> Manizales </option>
                <option value="pr"> Pereira </option>
                <option value="mn"> Monteria </option>
                <option value="nv"> Neiva </option>
                <option value="ps"> Pasto </option>
                <option value="ar"> Armenia </option>
                <option value="zq"> Zipaquira </option>
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
            <input type="text" class="form-control" placeholder="Direccion" aria-label="Username" id="direccion"
                name="direccion" required value="<?php echo($datosPersonales->getHojaDireccion())?>">
        </div>
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

<!-- SI TIENE 2 REF -->

<?php if(sizeof($datosReferencia)==2){?>
<h3>Referencia No. 1:</h3>
<br><br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" id="nombreR1" name="nombreR1" value="<?php echo($referencia1['REFERENCIA_NOMBRE'])?>" >
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">email</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Correo" aria-label="Username" id="correoR1" name="correoR1" value="<?php echo($referencia1['REFERENCIA_CORREO'])?>">
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Empresa" aria-label="Username" id="empresaR1" name="empresaR1" value="<?php echo($referencia1['REFERENCIA_EMPRESA'])?>">
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
                name="cargoR1"value="<?php echo($referencia1['REFERENCIA_CARGO'])?>">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">phone</i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Teléfono" aria-label="Username" id="telefonoR1"
                name="telefonoR1" value="<?php echo($referencia1['REFERENCIA_TELEFONO'])?>">
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
    <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" id="nombreR2" name="nombreR2" value="<?php echo($referencia2['REFERENCIA_NOMBRE'])?>">
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">email</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Correo" aria-label="Username" id="correoR2" name="correoR2" value="<?php echo($referencia2['REFERENCIA_CORREO'])?>">
</div>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Empresa" aria-label="Username" id="empresaR2" name="empresaR2" value="<?php echo($referencia2['REFERENCIA_EMPRESA'])?>">
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
                name="cargoR2" value="<?php echo($referencia2['REFERENCIA_CARGO'])?>">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">phone</i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Teléfono" aria-label="Username" id="telefonoR2"
                name="telefonoR2" value="<?php echo($referencia2['REFERENCIA_TELEFONO'])?>">
        </div>
    </div>
</div>
<?php }?>


<!-- TIENE SOLO 1 REF -->
<?php if(sizeof($datosReferencia)==1){?>
<h3>Referencia No. 1:</h3>
<br><br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" id="nombreR1" name="nombreR1" value="<?php echo($referencia1['REFERENCIA_NOMBRE'])?>" >
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">email</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Correo" aria-label="Username" id="correoR1" name="correoR1" value="<?php echo($referencia1['REFERENCIA_CORREO'])?>">
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Empresa" aria-label="Username" id="empresaR1" name="empresaR1" value="<?php echo($referencia1['REFERENCIA_EMPRESA'])?>">
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
                name="cargoR1"value="<?php echo($referencia1['REFERENCIA_CARGO'])?>">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">phone</i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Teléfono" aria-label="Username" id="telefonoR1"
                name="telefonoR1" value="<?php echo($referencia1['REFERENCIA_TELEFONO'])?>">
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
    <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" id="nombreR2" name="nombreR2">
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">email</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Correo" aria-label="Username" id="correoR2" name="correoR2" >
</div>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Empresa" aria-label="Username" id="empresaR2" name="empresaR2">
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
                name="cargoR2" >
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">phone</i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Teléfono" aria-label="Username" id="telefonoR2"
                name="telefonoR2">
        </div>
    </div>
</div>
<?php }?>

<!-- NO TIENE REF -->
<?php if(sizeof($datosReferencia)==0){?>
<h3>Referencia No. 1:</h3>
<br><br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" id="nombreR1" name="nombreR1"  >
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">email</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Correo" aria-label="Username" id="correoR1" name="correoR1" >
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Empresa" aria-label="Username" id="empresaR1" name="empresaR1" >
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
            <input type="text" class="form-control" placeholder="Teléfono" aria-label="Username" id="telefonoR1"
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
    <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" id="nombreR2" name="nombreR2">
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">email</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Correo" aria-label="Username" id="correoR2" name="correoR2" >
</div>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <i class="material-icons">face</i>
        </span>
    </div>
    <input type="text" class="form-control" placeholder="Empresa" aria-label="Username" id="empresaR2" name="empresaR2">
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
                name="cargoR2" >
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">phone</i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Teléfono" aria-label="Username" id="telefonoR2"
                name="telefonoR2">
        </div>
    </div>
</div>
<?php }?>