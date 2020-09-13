<form autocomplete="off" id="formEmpresaR" action="javascript:registrarEmpresa()" method="POST">
    <!--    esto es algo comentado--->
    <div class="wizard-card">
        <div class="picture-container">
            <div class="picture">
                <img src="assets/img/default-avatar1.png" class="picture-src" id="wizardPicturePreview" title="" />
                <input type="file" id="logo" name="logo" required>
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
        <input type="text" id="registroE" name="REM" value="REM" hidden>
        <input autocomplete="new-false" type="text" class="form-control" id="nombreE" name="nombreE"
            placeholder="Nombre o Razon Social" aria-label="Nombre Empresa" maxlength="60" required>
    </div>
    <div class="row no-gutters">
        <div class="col-md-6 mb">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">assignment_ind</i>
                    </span>
                </div>
                <input autocomplete="false" type="text" class="form-control" id="nitE" name="nitE"
                    data-mask="999999999-9" placeholder="NIT" maxlength="11" pattern="(^[0-9]{9}-{1}[0-9]{1})"
                    title="El Formmato de Nit es xxxxxxxxx-x" aria-label="Nit Empresa">
            </div>
        </div>
        <div class="col-md-6 mb">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">phone</i>
                    </span>
                </div>
                <input autocomplete="false" type="text" class="form-control" id="telE" name="telE" required
                    placeholder="Teléfono Empresa" maxlength="15" pattern="(^[+]?[0-9]{7,15})"
                    title="El Formato de telefono puede comenzar con + o solo numeros (max 15)"
                    aria-label="Telefono Empresa">
            </div>
        </div>
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">email</i>
            </span>
        </div>
        <input autocomplete="false" type="text"
            pattern="^[_A-Za-z0-9-+]+(.[_A-Za-z0-9-]+)@[A-Za-z0-9-]+(.[A-Za-z0-9]+)(.[A-Za-z]{2,})$"
            title="No Cumple con el Formato de Correo Electrónico" class="form-control" id="emailE" name="emailE"
            required placeholder="Correo Electronico Empresa" maxlength="60" aria-label="Username">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="camaracomercioE" name="camaracomercioE" required
                aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="camaracomercio" name="camaracomercio" id="nombreccomercio">Subir
                Camara de Comercio</label>
        </div>
    </div>
    <div class="form-group">
        <textarea class="form-control" id="exampleFormControlTextarea1" id="descE" name="descE" required rows="5"
            style="resize: none;" maxlength="1200" placeholder="Descripcción Empresa (max 1200)"></textarea>
    </div>


    <h2 style="color: black;">Información del Contacto </h2>

    <br>
    <div class="row no-gutters">
        <div class="col-md-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">assignment_ind</i>
                    </span>
                </div>
                <input autocomplete="false" type="text" class="form-control" title="Solo Caracteres Alfabeticos"
                    pattern="^[a-zA-Z ]*$" id="nomC" name="nomC" required placeholder="Nombres" maxlength="30"
                    aria-label="Username">
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                </div>
                <input autocomplete="false" type="text" class="form-control" id="apeC"
                    title="Solo Caracteres Alfabeticos" pattern="^[a-zA-Z ]*$" name="apeC" required
                    placeholder="Apellidos " maxlength="30" aria-label="Username">
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-md-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">group</i>
                    </span>
                </div>
                <input autocomplete="false" type="text" class="form-control" id="cargoC" name="cargoC" required
                    placeholder="Cargo" maxlength="30" aria-label="Username">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">phone</i>
                    </span>
                </div>
                <input autocomplete="false" type="text" class="form-control" id="telC" name="telC" required
                    placeholder="Teléfono " maxlength="15" pattern="(^[+]?[0-9]{7,15})"
                    title="El Formato de telefono puede comenzar con + o solo numeros (max 15)" aria-label="Username">
            </div>
        </div>
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">email</i>
            </span>
        </div>
        <input autocomplete="false" type="text" class="form-control" id="emailC" name="emailC" required
            placeholder="Correo Electronico Contacto"
            pattern="^[_A-Za-z0-9-+]+(.[_A-Za-z0-9-]+)@[A-Za-z0-9-]+(.[A-Za-z0-9]+)(.[A-Za-z]{2,})$"
            title="No Cumple con el Formato de Correo Electrónico" maxlength="60" aria-label="Username">
    </div>
    <div class="form-footer " style="float: right;">
        <input type="submit" class="btn btn-primary btn-default" value="Registrar"></input>
    </div>
</form>

<script>
function devolver() {
    window.location.href = "index.php";
}
</script>
<script>
function registrarEmpresa() {
    if (verificarCaramara(document.getElementById("nitE").value)) {

        var myform = document.getElementById("formEmpresaR");
        var datos = new FormData(myform);
        $.ajax({
            type: "POST",
            data: datos,
            url: "RegistrarC.php",
            processData: false,
            contentType: false,
            success: function(r) {

                console.log(r);

                if (r == 1) {

                    window.location.href = "index.php";


                } else {
                    toastr["success"](r, "Error");

                }
            }
        });
    } else {
        toastr["success"]("no se puede validar el NIT", "Error");
    }

}

function verificarCaramara(varnit) {

    var digitos = varnit.split("");
    var v = 41 * digitos[0] +
        37 * digitos[1] +
        29 * digitos[2] +
        23 * digitos[3] +
        19 * digitos[4] +
        17 * digitos[5] +
        13 * digitos[6] +
        7 * digitos[7] +
        3 * digitos[8];
    v = v % 11;
    if (v >= 2) {
        v = 11 - v;
    }
    return v == digitos[10];
}
</script>


<script>
document.getElementById('camaracomercioE').onchange = function() {
    document.getElementById("nombreccomercio").innerHTML = this.value.replace(/C:\\fakepath\\/i, '');
};
</script>