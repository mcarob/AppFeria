    <!--    esto es algo comentado--->



    <h3>Experiencia Academica:</h3>
    <br>
    <div class="sumaAca">
        <div class="buttons">

            <button type="button" name="add" id="add" class="btn btn-success"
                style="background-color: #0B7984; border-color: #0B7984;">Añadir</button>
        </div>
        <br>
        <div class="elementAca" id="expAcademicas">
            <p>(0)Experiencias Académicas</p>
        </div>
        <div class="resultsAca" id="agregar">

        </div>
    </div>

    <br><br>
    <h3>Experiencia Laboral:</h3>
    <br>
    <div class="sumaPro">
        <div class="buttons">
            <button type="button" name="add2" id="add2" class="btn btn-success"
                style="background-color: #0B7984; border-color: #0B7984;">Añadir</button>


        </div>
        <br>
        <div class="elementPro" id="expLaborales">
            <p>(0)Experiencias Laborales</p>

        </div>
        <br>
        <br>
        <div id="agregar2" class="resultsPro">
        </div>
    </div>

    <input type="hidden" id="numExAcademicas" name="numExAcademicas" value="">
    <input type="hidden" id="numExProfesionales" name="numExProfesionales" value="">





    <script>
$(document).ready(function() {

    $('#add').click(function() {
        if (x != 0) {
            document.getElementById("AC" + x).disabled = true;
        }
        x++;
        cambiar = document.getElementById("expAcademicas");
        cambiar.innerHTML = "<p>(" + x + ")Experiencias Académicas</p>";


        $('#agregar').append('<div id="row3' + x +
            '" class="sumaAca"> <div class="buttons"> </div> <br> <div class="elementAca"> <div class="row no-gutters"> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">class</i> </span> </div> <input type="text" class="form-control" placeholder="Título del proyecto" aria-label="Username" id="experienciaAcademica' +
            x + '[]" required name="experienciaAcademica' + x +
            '[]"> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">class</i> </span> </div> <input type="text" class="form-control" placeholder="Materia" aria-label="Username" id="experienciaAcademica' +
            x + '[]" required name="experienciaAcademica' + x +
            '[]"> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">date_range</i> </span> </div> <select type="text" class="form-control" aria-label="Username" id="experienciaAcademica' +
            x + '[]" required name="experienciaAcademica' + x +
            '[]"><option value="Periodo 2015-1">Periodo 2015-1 </option> <option value="Periodo 2015-2">Periodo 2015-2 </option> <option value="Periodo 2016-1">Periodo 2016-1 </option> <option value="Periodo 2016-2">Periodo 2016-2 </option> <option value="Periodo 2017-1">Periodo 2017-1 </option> <option value="Periodo 2017-2">Periodo 2017-2 </option> <option value="Periodo 2018-1">Periodo 2018-1 </option> <option value="Periodo 2018-2">Periodo 2018-2 </option> <option value="Periodo 2019-1">Periodo 2019-1 </option> <option value="Periodo 2019-2">Periodo 2019-2 </option> <option value="Periodo 2020-1">Periodo 2020-1 </option> <option value="Periodo 2020-2">Periodo 2020-2 </option> </select> </div> </div> </div> <div class="form-group"> <textarea class="form-control" id="experienciaAcademica' +
            x + '[]" required name="experienciaAcademica' + x +
            '[]" rows="5" style="resize: none;" placeholder="Describa del proyecto"></textarea> </div> </div><button type="button" name="remove" id="AC' +
            x + '" class="btn btn-danger btn_removeE1">Remover</button></div></div></div>');

    });

    $('#add2').click(function() {
        if (y != 0) {
            document.getElementById("PR" + y).disabled = true;
        }
        y++;
        cambiar = document.getElementById("expLaborales");
        cambiar.innerHTML = "<p>(" + y + ")Experiencias Laborales</p>";
        $('#agregar2').append('<div id="row4' + y +
            '" class="elementPro"> <div class="row no-gutters"> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">work</i> </span> </div> <input type="text" class="form-control" placeholder="Cargo" aria-label="Username" id="experienciaProfesional' +
            y + '[]" required name="experienciaProfesional' + y +
            '[]"> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">account_balance</i> </span> </div> <input type="text" class="form-control" placeholder="Empresa" aria-label="Username" id="experienciaProfesional' +
            y + '[]" required name="experienciaProfesional' + y +
            '[]"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de Inicio</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">date_range</i> </span> </div> <input type="date" class="form-control" placeholder="" aria-label="Username" id="experienciaProfesional' +
            y + '[]" required name="experienciaProfesional' + y +
            '[]"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de Finalización</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">date_range</i> </span> </div> <input type="date" class="form-control" placeholder="" aria-label="Username" id="experienciaProfesional' +
            y + '[]" required name="experienciaProfesional' + y +
            '[]"> </div> </div> </div> <div class="form-group"> <textarea class="form-control" rows="5" style="resize: none;" placeholder="Describa el cargo" id="experienciaProfesional' +
            y + '[]" required name="experienciaProfesional' + y +
            '[]"></textarea> </div><button type="button" name="remove" id="PR' + y +
            '" class="btn btn-danger btn_removeE2">Remover</button><br><br></div></div></div>');

    });


    $(document).on('click', '.btn_removeE1', function() {
        var button_id = $(this).attr("id");
        $('#row3' + x + '').remove();
        x--;
        if (x >= 1) {
            document.getElementById("AC" + x).disabled = false;
        }
        cambiar2 = document.getElementById("expAcademicas");
        cambiar2.innerHTML = "<p>(" + x + ")Experiencias academicas</p>";
    });

    $(document).on('click', '.btn_removeE2', function() {
        var button_id = $(this).attr("id");
        $('#row4' + y + '').remove();
        y--;
        if (y >= 1) {
            document.getElementById("PR" + y).disabled = false;
        }
        cambiar2 = document.getElementById("expLaborales");
        cambiar2.innerHTML = "<p>(" + y + ")Experiencias laborales</p>";
    });




});
    </script>