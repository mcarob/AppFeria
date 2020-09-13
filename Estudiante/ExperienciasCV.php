    <!--    esto es algo comentado--->



    <h3>Experiencia Academica:</h3>
    <br>
    <div class="sumaAca">
        <div class="buttons">

            <button type="button" name="add" id="add" class="btn btn-success"
                style="background-color: #0B7984; border-color: #0B7984;">Añadir</button>
        </div>
        <br>
        <div class="elementAca">
            <div class="row no-gutters">
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">assignment_ind</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="text" class="form-control" data-mask="999999999-9"
                            placeholder="Titulo del proyecto" aria-label="Username" id="proyecto" name="proyecto">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">phone</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="text" class="form-control" placeholder="Materia"
                            aria-label="Username" id="materia" name="materia">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">assignment_ind</i>
                            </span>
                        </div>
                        <select autocomplete="false" type="text" class="form-control" data-mask="999999999-9"
                            aria-label="Username" id="periodo" name="periodo">
                            <option disabled="" selected="">Seleccionar periodo</option>
                            <option value="bg">Periodo 2015-1 </option>
                            <option value="md">Periodo 2015-2 </option>
                            <option value="cl">Periodo 2016-1 </option>
                            <option value="cl">Periodo 2016-2 </option>
                            <option value="cl">Periodo 2017-1 </option>
                            <option value="cl">Periodo 2017-2 </option>
                            <option value="cl">Periodo 2018-1 </option>
                            <option value="cl">Periodo 2018-2 </option>
                            <option value="cl">Periodo 2019-1 </option>
                            <option value="cl">Periodo 2019-2 </option>
                            <option value="cl">Periodo 2020-1 </option>
                            <option value="cl">Periodo 2020-2 </option>

                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <textarea class="form-control" id="descProy" name="descProy" rows="5" style="resize: none;"
                    placeholder="Describa del proyecto"></textarea>
            </div>
        </div>
        <div class="resultsAca" id="agregar">

        </div>
    </div>

    <br><br>
    <h3>Experiencia Profesional:</h3>
    <br>
    <div class="sumaPro">
        <div class="buttons">
            <button type="button" name="add2" id="add2" class="btn btn-success"
                style="background-color: #0B7984; border-color: #0B7984;">Añadir</button>


        </div>
        <br>
        <div class="elementPro">
            <div class="row no-gutters">
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">assignment_ind</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="text" class="form-control" data-mask="999999999-9"
                            placeholder="Cargo" aria-label="Username" id="cargoPro" name="cargoPro">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">phone</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="text" class="form-control" placeholder="Empresa"
                            aria-label="Username" id="empresa" name="empresa">
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
                        <input autocomplete="false" type="date" class="form-control" placeholder=""
                            aria-label="Username" id="inicioLab" name="inicioLab">
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
                        <input autocomplete="false" type="date" class="form-control" placeholder=""
                            aria-label="Username" id="finLab" name="finLab">
                    </div>
                </div>

            </div>
            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" style="resize: none;"
                    placeholder="Describa el cargo" id="desCargo" name="desCargo"></textarea>
            </div>

        </div>
        <div id="agregar2" class="resultsPro">
        </div>
    </div>

    <script>
$(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
        $('#agregar').append('<div id="row' + i +
            '" class="sumaAca"> <div class="buttons"> </div> <br> <div class="elementAca"> <div class="row no-gutters"> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="text" class="form-control" data-mask="999999999-9" placeholder="Titulo del proyecto" aria-label="Username" id="proyecto" name="proyecto"> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">phone</i> </span> </div> <input autocomplete="false" type="text" class="form-control" placeholder="Materia" aria-label="Username" id="materia" name="materia"> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <select autocomplete="false" type="text" class="form-control" data-mask="999999999-9" aria-label="Username" id="periodo" name="periodo"> <option disabled="" selected="">Seleccionar periodo</option> <option value="bg">Periodo 2015-1 </option> <option value="md">Periodo 2015-2 </option> <option value="cl">Periodo 2016-1 </option> <option value="cl">Periodo 2016-2 </option> <option value="cl">Periodo 2017-1 </option> <option value="cl">Periodo 2017-2 </option> <option value="cl">Periodo 2018-1 </option> <option value="cl">Periodo 2018-2 </option> <option value="cl">Periodo 2019-1 </option> <option value="cl">Periodo 2019-2 </option> <option value="cl">Periodo 2020-1 </option> <option value="cl">Periodo 2020-2 </option> </select> </div> </div> </div> <div class="form-group"> <textarea class="form-control" id="descProy" name="descProy" rows="5" style="resize: none;" placeholder="Describa del proyecto"></textarea> </div> </div><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">Remover</button>');

    });

    $('#add2').click(function() {
        i++;
        $('#agregar2').append('<div id="row' + i +
            '" class="elementPro"> <div class="row no-gutters"> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="text" class="form-control" data-mask="999999999-9" placeholder="Cargo" aria-label="Username" id="cargoPro" name="cargoPro"> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">phone</i> </span> </div> <input autocomplete="false" type="text" class="form-control" placeholder="Empresa" aria-label="Username" id="empresa" name="empresa"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de inicio</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="inicioLab" name="inicioLab"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de finalizacion</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="finLab" name="finLab"> </div> </div> </div> <div class="form-group"> <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" style="resize: none;" placeholder="Describa el cargo" id="desCargo" name="desCargo"></textarea> </div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remover</button><br><br>');

    });


    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });





});
    </script>