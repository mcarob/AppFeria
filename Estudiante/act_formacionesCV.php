<!--    esto es algo comentado--->
<div class="wizard-card ct-wizard-green">
</div>
<br>


<h3>Perfil: <button type="button" class="btn mb-1 btn-success btn-pill" data-container="body" data-toggle="popover"
        data-placement="right"
        data-content="Recuerde que en el perfil debe añadir informacion como, idiomas, hobbies, caracteristicas personales.">?</button>
</h3>

<br>
<div class="form-group">
    <textarea class="form-control" id="perfil" name="perfil" rows="5" style="resize: none;"
        placeholder="Descripcción del perfil (max 1200)"><?php echo($datosPersonales->getPerfil()) ?></textarea>
</div>

<h3>Formacion Academica:</h3>
<br>
<div class="suma">
    <div class="buttons">
        <button type="button" name="add" id="addf1" class="btn btn-success"
            style="background-color: #0B7984; border-color: #0B7984;">Añadir campo</button>
        </button>
    </div>
    <br>
    <div class="element" id="formAca">
        <p>(<?php echo($cantidadAcademicas)?>)formaciones academicas</p>
    </div>
    <div class="results" id="agregarf1">
        <?php for($i=0; $i<$cantidadAcademicas; $i++){ $academica=$formacionesAcademicas[$i];?>

        <div id="row1<?php echo($i+1)?>" class="suma">
            <div class="buttons"> </div> <br>
            <div class="element">
                <div class="row no-gutters">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="material-icons">face</i> </span> </div> <input type="text"
                                class="form-control" placeholder="Titulo" aria-label="Username"
                                value="<?php echo($academica['ACADEMICA_TITULO']) ?>" id="academica<?php echo($i+1)?>[]"
                                required name="academica<?php echo($i+1)?>[]">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="material-icons">assignment_ind</i> </span> </div> <select type="text"
                                class="form-control" aria-label="Username" id="academica<?php echo($i+1)?>[]" required
                                name="academica<?php echo($i+1)?>[]"
                                value="<?php echo($academica['COD_TIPO_FORMACION']) ?>">
                                <option value="1"> Bachillerato </option>
                                <option value="2"> Tecnico profesional </option>
                                <option value="3"> Tecnologico</option>
                                <option value="4"> Profesional </option>
                                <option value="5"> Especializacion tecnica </option>
                                <option value="6"> Especializacion tecnologica </option>
                                <option value="7"> Especializacion profesional </option>
                                <option value="8"> Maestria </option>
                                <option value="9"> Doctorado </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="material-icons">phone</i> </span> </div> <input type="text"
                                class="form-control" placeholder="Institucion" name="academica<?php echo($i+1)?>[]"
                                required id="academica<?php echo($i+1)?>[]" aria-label="Username"
                                value="<?php echo($academica['ACADEMICA_INSTITUTO']) ?>">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5>Fecha de inicio</h5> <br>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="material-icons">assignment_ind</i> </span> </div> <input required
                                type="date" class="form-control" placeholder="" aria-label="Username"
                                id="academica<?php echo($i+1)?>[]" required name="academica<?php echo($i+1)?>[]"
                                value="<?php echo($academica['ACADEMICA_DESDE']) ?>">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5>Fecha de finalizacion</h5> <br>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="material-icons">assignment_ind</i> </span> </div> <input type="date"
                                class="form-control" placeholder="" aria-label="Username" required
                                id="academica<?php echo($i+1)?>[]" required name="academica<?php echo($i+1)?>[]"
                                value="<?php echo($academica['ACADEMICA_HASTA']) ?>">
                        </div>
                    </div>
                    <button type="button" name="remove" id="A<?php echo($i+1)?>" class="btn btn-danger btn_removeF1"
                        <?php if( ($i+1)<$cantidadAcademicas ){echo("disabled");} ?>>Remover</button><br>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
</div>
<br>
<br>

<h3>Formacion Complementaria:</h3>
<br>
<div class="sumaCom">
    <div class="buttons">
        <button type="button" name="addf2" id="addf2" class="btn btn-success"
            style="background-color: #0B7984; border-color: #0B7984;">Añadir campo</button>
        </button>
        <br><br>
    </div>
    <div class="elementCom" id="formLab">
        <p>(<?php echo($cantidadComplementarias) ?>)formaciones complementaria</p>
    </div>

    <div class="resultsCom" id="agregarf2">

        <?php for($j=0; $j<$cantidadComplementarias; $j++) {$complementaria=$formacionesComplementarias[$j];?>

        <div id="row2<?php echo($j+1)?>" class="suma">
            <div class="buttons"> </div> <br>
            <div class="element">
                <div class="row no-gutters">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="material-icons">face</i> </span> </div> <input type="text"
                                class="form-control" placeholder="Titulo" aria-label="Username"
                                id="complementaria<?php echo($j+1)?>[]" required
                                value="<?php echo($complementaria['TITULO_FORMACION_COMPLEMENTARIA']) ?>"
                                name="complementaria<?php echo($j+1)?>[]">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="material-icons">assignment_ind</i> </span> </div> <select 
                                type="text" class="form-control" aria-label="Username"
                                id="complementaria<?php echo($j+1)?>[]" required
                                name="complementaria<?php echo($j+1)?>[]"
                                value="<?php echo($complementaria['COD_TIPO_FORMACION_COMPLEMENTARIA']) ?>">
                                <option value="1"> Curso </option>
                                <option value="2"> Seminario </option>
                                <option value="3"> Taller</option>
                                <option value="4"> Diplomado </option>
                                <option value="5"> Certificacion </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="material-icons">phone</i> </span> </div> <input type="text"
                                class="form-control" placeholder="Institucion" name="complementaria<?php echo($j+1)?>[]"
                                required id="complementaria<?php echo($j+1)?>[]" aria-label="Username"
                                value="<?php echo($complementaria['INSTITUCION_EDUCATIVA_COMPLEMENTARIA']) ?>">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5>Cantidad de horas</h5> <br>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="material-icons">face</i> </span> </div> <input type="number"
                                class="form-control" placeholder="Horas" aria-label="Username"
                                id="complementaria<?php echo($j+1)?>[]" required
                                name="complementaria<?php echo($j+1)?>[]"
                                value="<?php echo($complementaria['FECHA_FORMACION_COMPLEMENTARIA']) ?>">
                        </div>
                    </div>
                </div>
            </div><button type="button" name="remove" id="L<?php echo($j+1)?>" class="btn btn-danger btn_removeF2"
                <?php if( ($j+1)<$cantidadComplementarias ){echo("disabled");} ?>>Remover</button><br>
        </div>

        <?php } ?>

    </div>
</div>


<input type="hidden" id="numComplementaria" name="numComplementaria" value="">
<input type="hidden" id="numAcademica" name="numAcademica" value="">




<br><br>
<script>
$(document).ready(function() {

    $('#addf1').click(function() {
        if (i != 0) {
            document.getElementById("A" + i).disabled = true;
        }
        i++;
        cambiar = document.getElementById("formAca");
        cambiar.innerHTML = "<p>(" + i + ")formaciones academicas</p>";


        $('#agregarf1').append('<div id="row1' + i +
            '" class="suma"> <div class="buttons"> </div> <br> <div class="element"> <div class="row no-gutters"> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">face</i> </span> </div> <input type="text" class="form-control" placeholder="Titulo" aria-label="Username" id="academica' +
            i + '[]" required name="academica' + i +
            '[]"> </div><div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <select type="text" class="form-control"  aria-label="Username" id="academica' +
            i + '[]" required name="academica' + i +
            '[]"> <option value="1"> Bachillerato </option><option value="2"> Tecnico profesional </option><option value="3"> Tecnologico</option><option value="4"> Profesional </option><option value="5"> Especializacion tecnica </option><option value="6"> Especializacion tecnologica </option><option value="7"> Especializacion profesional </option><option value="8"> Maestria </option><option value="9"> Doctorado </option> </select> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">phone</i> </span> </div> <input type="text" class="form-control" placeholder="Institucion" name="academica' +
            i + '[]"  required id="academica' + i +
            '[]" aria-label="Username"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de inicio</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input  required type="date" class="form-control" placeholder="" aria-label="Username" id="academica' +
            i + '[]" required name="academica' + i +
            '[]"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de finalizacion</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input type="date" class="form-control" placeholder="" aria-label="Username" required id="academica' +
            i + '[]" required name="academica' + i +
            '[]"> </div> </div><button type="button" name="remove" id="A' +
            i + '" class="btn btn-danger btn_removeF1">Remover</button><br></div></div></div>');

    });


    $('#addf2').click(function() {
        if (j != 0) {
            document.getElementById("L" + j).disabled = true;
        }

        j++;
        cambiar = document.getElementById("formLab");
        cambiar.innerHTML = "<p>(" + j + ")formaciones complementarias</p>";
        $('#agregarf2').append('<div id="row2' + j +
            '" class="suma"> <div class="buttons"> </div> <br> <div class="element"> <div class="row no-gutters"> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">face</i> </span> </div> <input type="text" class="form-control" placeholder="Titulo" aria-label="Username" id="complementaria' +
            j + '[]" required name="complementaria' + j +
            '[]"> </div><div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <select type="text" class="form-control"  aria-label="Username" id="complementaria' +
            j + '[]" required name="complementaria' + j +
            '[]"> <option value="1"> Curso </option><option value="2"> Seminario </option><option value="3"> Taller</option><option value="4"> Diplomado </option><option value="5"> Certificacion </option> </select> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">phone</i> </span> </div> <input type="text" class="form-control" placeholder="Institucion" name="complementaria' +
            j + '[]"  required id="complementaria' + j +
            '[]" aria-label="Username"> </div> </div> <div class="col-md-6 mb-3"> <h5>Cantidad de horas</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">face</i> </span> </div> <input type="number" class="form-control" placeholder="Titulo" aria-label="Username" id="complementaria' +
            j + '[]" required name="complementaria' + j +
            '[]"> </div> </div> </div> </div><button type="button" name="remove" id="L' +
            j + '" class="btn btn-danger btn_removeF2">Remover</button><br></div>');

    });


    $(document).on('click', '.btn_removeF1', function() {
        var button_id = $(this).attr("id");
        $('#row1' + i + '').remove();
        i--;
        if (i >= 1) {
            document.getElementById("A" + i).disabled = false;
        }

        cambiar = document.getElementById("formAca");
        cambiar.innerHTML = "<p>(" + i + ")formaciones academicas</p>";
    });

    $(document).on('click', '.btn_removeF2', function() {
        var button_id = $(this).attr("id");
        $('#row2' + j + '').remove();
        j--;
        if (j >= 1) {
            document.getElementById("L" + j).disabled = false;
        }
        cambiar = document.getElementById("formLab");
        cambiar.innerHTML = "<p>(" + j + ")formaciones complemetarias</p>";
    });





});
</script>