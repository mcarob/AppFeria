<form autocomplete="off" id="formEstudianteR" action="javascript:agregarEstudiante()" method="POST">
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
                <input type="text" id="RES" name="RES" value="RES" hidden>
                <input autocomplete="off" type="text" class="form-control" placeholder="Nombres" id="nombreES" name="nombreES" aria-label="Username" required
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
                <input autocomplete="off" type="text" class="form-control" id="apellidoES" name="apellidoES" placeholder="Apellidos " required
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
                <input autocomplete="off" type="text" class="form-control" placeholder="Cedula" aria-label="Username"      id="cedulaES" name="cedulaES" required minlength="6"
                maxlength="15" 
                >
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">phone</i>
                    </span>
                </div>
                <input type="text" autocomplete="off" class="form-control"  maxlength="15" pattern="(^[+]?[0-9]{7,15})"
                    title="El Formato de telefono puede comenzar con + o solo numeros (max 15)"
                    id="telES" name="telES"
                    aria-label="Username"
                    maxlength="15" 
                    placeholder="Telefono o Celular"
                    title="El Formato de telefono puede comenzar con + o solo numeros (max 15)"
                    required>
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
        <input type="text" autocomplete="off" class="form-control" placeholder="Correo Electronico" id="correoES" name="correoES"
        pattern="^[A-Za-z]+$"
            title="No Cumple con el Formato, no debe contener caracteres especiales ni números" maxlength="30"  required

            aria-label="Username">
        <div class="input-group-append">
            <span class="input-group-text" id="inputGroupAppend">@unbosque.edu.co</span>
        </div>
    </div>


    <div class="form-group">
        <label for="prog_academico">Programa Académico</label>
        <select class="form-control" id="prog_academico" name="prog_academico">
            <option value="1" >Ingeniería de Sistemas</option>
            <option value="2">BioIngeniería</option>
            <option value="3">Ingeniería Ambiental</option>
            <option value="4">Ingeniería Electrónica</option>
            <option value="5" selected>Ingeniería Industrial</option>
        </select>
    </div>
    <div class="form-group">
        <label for="semestre">Semestre Actual</label>
        <select class="form-control" id="semestre" name="semestre">
            <option value ="Semestre 1" >Semestre 1</option>
            <option value ="Semestre 2">Semestre 2</option>
            <option value ="Semestre 3">Semestre 3</option>
            <option value ="Semestre 4">Semestre 4</option>
            <option value ="Semestre 5" selected>Semestre 5</option>
            <option value ="Semestre 6">Semestre 6</option>
            <option value ="Semestre 7">Semestre 7</option>
            <option value ="Semestre 8">Semestre 8</option>
            <option value ="Semestre 9">Semestre 9</option>
            <option value ="Semestre 10">Semestre 10</option>
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
                required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
                    aria-label="Username" id="contraES" name="contraES"
                    title="El formato de la contraseña debe ser contener al menos 1 mayúscula, 1 minúscula y 1 numero min 6 caracteres ">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                </div>
                <input autocomplete="off" type="password" class="form-control" placeholder="Validar Contraseña " required id="contraCo" name="contraCo"
                    aria-label="Username" >
            </div>
        </div>
    </div>
    <div class="form-footer pt-4 pt-5 mt-4" style="float: right;">
        <input type="submit" class="btn btn-primary btn-default" value="Registrar"></input>

    </div>
</form>

<script>
function devolver() {
    window.location.href = "index.php";
}
</script>

<script>
    function agregarEstudiante(){

        if(validarContra()){
        datos = $('#formEstudianteR').serialize();
       $.ajax({
           type: "POST",
           data: datos,
           url: "RegistrarC.php",
           success: function(r) {
       
               console.log(r);
               if (r == 1) {
                    document.getElementById("formEstudianteR").reset();
                    toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    toastr["success"]("Se ha registrado satisfactoriamente su correo", "ERROR");

               } else if (r == 3) {
                   toastr["warning"](r, "ERROR");
               } else {
                   toastr["warning"](r, "ERROR");
       
               }
           }
       });

        }
    }

    function validarContra() {
        if ($('#contraES').val() != $('#contraCo').val()) {
            toastr["warning"]("Las contraseñas no coinciden, por favor, vuelva a escribirlas correctamente", "ERROR");
            return false;
        }
        return true;
    }

</script>