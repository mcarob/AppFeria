<!--    esto es algo comentado--->
<div class="wizard-card ct-wizard-green">
</div>
<br>
<h3>Perfil:</h3>
<br>
<div class="form-group">
    <textarea class="form-control" id="perfil" name="perfil" rows="5" style="resize: none;" placeholder="Descripcción del perfil (max 1200)"></textarea>
</div>
<h3>Formacion Academica:</h3>
<br>
<div class="suma">
    <div class="buttons">
        <button type="button" name="add" id="addf1" class="btn btn-success" style="background-color: #0B7984; border-color: #0B7984;">Añadir campo</button>
        </button>
    </div>
    <br>
    <div class="element">
        <div class="row no-gutters">
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">assignment_ind</i>
                        </span>
                    </div>
                    <select autocomplete="false" type="text" class="form-control" data-mask="999999999-9" aria-label="Username">
                        <option disabled="" selected="" id="academica" name="academica">Seleccionar tipo de formacion</option>
                        <option value="bg"> Bachiller </option>
                        <option value="md"> Bachiller Tecnico </option>
                        <option value="cl"> Pregrado </option>
                        <option value="cl"> Postgrado </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">phone</i>
                        </span>
                    </div>
                    <input autocomplete="false" type="text" class="form-control" placeholder="Institucion" name="institucion" id="institucion" aria-label="Username">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <h5>Fecha de inicio</h5>
                <br>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">assignment_ind</i>
                        </span>
                    </div>
                    <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="inicioAca" name="inicioAca">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <h5>Fecha de finalizacion</h5>
                <br>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">assignment_ind</i>
                        </span>
                    </div>
                    <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="finAca" name="finAca">
                </div>
            </div>
        </div>
    </div>
    <div class="results" id="agregarf1">
    </div>
</div>

<h3>Formacion Complementaria:</h3>
<br>
<div class="sumaCom">
    <div class="buttons">
        <button type="button" name="addf2" id="addf2" class="btn btn-success" style="background-color: #0B7984; border-color: #0B7984;">Añadir campo</button>
        </button>
        <br><br>
    </div>
    <div class="elementCom">
        <div class="row no-gutters">
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">assignment_ind</i>
                        </span>
                    </div>
                    <select autocomplete="false" type="text" class="form-control" data-mask="999999999-9" aria-label="Username">
                        <option disabled="" selected="" id="complementaria" name="complementaria">Seleccionar tipo de formacion</option>
                        <option value="bg"> Seminario </option>
                        <option value="md"> Diplomado </option>
                        <option value="cl"> Curso </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">phone</i>
                        </span>
                    </div>
                    <input autocomplete="false" type="text" class="form-control" placeholder="Nombre del curso" aria-label="Username" id="nombreCurso" name="nombreCurso">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <h5>Fecha de inicio</h5>
                <br>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">assignment_ind</i>
                        </span>
                    </div>
                    <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="inicioComp" name="inicioComp">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <h5>Fecha de finalizacion</h5>
                <br>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">assignment_ind</i>
                        </span>
                    </div>
                    <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="finComp" name="finComp">
                </div>
            </div>
        </div>
    </div>
    <div class="resultsCom" id="agregarf2">
    </div>
</div>




<br><br>
<script>
    $(document).ready(function() {
        var i = 1;
        $('#addf1').click(function() {
            i++;
            $('#agregarf1').append('<div id="row' + i +
                '" class="suma"> <div class="buttons"> </div> <br> <div class="element"> <div class="row no-gutters"> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <select autocomplete="false" type="text" class="form-control" data-mask="999999999-9" aria-label="Username"> <option disabled="" selected="" id="academica" name="academica">Seleccionar tipo de formacion</option> <option value="bg"> Bachiller </option> <option value="md"> Bachiller Tecnico </option> <option value="cl"> Pregrado </option> <option value="cl"> Postgrado </option> </select> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">phone</i> </span> </div> <input autocomplete="false" type="text" class="form-control" placeholder="Institucion"  name="institucion" id="institucion" aria-label="Username"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de inicio</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="inicioAca" name="inicioAca"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de finalizacion</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="finAca" name="finAca"> </div> </div><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn_remove">Remover</button><br>');

        });

        $('#addf2').click(function() {
            i++;
            $('#agregarf2').append('<div id="row' + i +
                '" class="sumaCom"> <div class="buttons"> <br> </div> <div class="elementCom"> <div class="row no-gutters"> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <select autocomplete="false" type="text" class="form-control" data-mask="999999999-9" aria-label="Username"> <option disabled="" selected="" id="complementaria" name="complementaria">Seleccionar tipo de formacion</option> <option value="bg"> Seminario </option> <option value="md"> Diplomado </option> <option value="cl"> Curso </option> </select> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">phone</i> </span> </div> <input autocomplete="false" type="text" class="form-control" placeholder="Nombre del curso" aria-label="Username" id="nombreCurso" name="nombreCurso"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de inicio</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="inicioComp" name="inicioComp"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de finalizacion</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="finComp" name="finComp"> </div> </div><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn_remove">Remover</button>');

        });


        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });





    });
</script>