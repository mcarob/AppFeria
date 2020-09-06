<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
    $('.btn-addBody').click(function(event) {
        $('.añade').append('<div class="añade">¡Felicidades! Has insertado un nuevo DIV en el BODY</div>')
    });
</script>
<form autocomplete="off">
    <!--    esto es algo comentado--->
    <div class="wizard-card ct-wizard-green">
    </div>
    <br>
    <h3>Perfil:</h3>
    <br>
    <div class="form-group">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" style="resize: none;" placeholder="Descripcción del perfil (max 1200)"></textarea>
    </div>
    <h3>Formacion Academica:</h3>
    <br>
    <div class="suma">
        <div class="sub-suma">
            <div class="row no-gutters">
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">assignment_ind</i>
                            </span>
                        </div>
                        <select autocomplete="false" type="text" class="form-control" data-mask="999999999-9" aria-label="Username">
                            <option disabled="" selected="">Seleccionar tipo de formacion</option>
                            <option value="bg"> Bachiller </option>
                            <option value="md"> Bachiller Tecnico </option>
                            <option value="cl"> Universitario </option>
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
                        <input autocomplete="false" type="text" class="form-control" placeholder="Institucion" aria-label="Username">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">assignment_ind</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">assignment_ind</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-warning add" style="background-color: #0B7984; border-color: #0B7984;">
        <font color="White">Añadir Formacion</font>
    </button>
    <br><br>
    <h3>Formacion Profesional:</h3>
    <br>
    <div class="sumaPro">
        <div class="sub-sumaPro">
            <div class="row no-gutters">
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">assignment_ind</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="text" class="form-control" data-mask="999999999-9" placeholder="Cargo" aria-label="Username">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">phone</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="text" class="form-control" placeholder="Empresa" aria-label="Username">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">assignment_ind</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">assignment_ind</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-warning addPro" style="background-color: #0B7984; border-color: #0B7984;">
        <font color="White">Añadir Profesion</font>
    </button>
    <br><br>
    <script>
        $('.add').click(function() {
            $('.suma').append('<div class="sub-suma"><div class="row no-gutters"><div class="col-md-6 mb-3"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="material-icons">assignment_ind</i></span></div><select autocomplete="false" type="text" class="form-control" data-mask="999999999-9" aria-label="Username"><option disabled="" selected="">Seleccionar tipo de formacion</option><option value="bg"> Bachiller </option><option value="md"> Bachiller Tecnico </option><option value="cl"> Universitario </option></select></div> </div><div class="col-md-6 mb-3"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="material-icons">phone</i></span></div><input autocomplete="false" type="text" class="form-control" placeholder="Institucion" aria-label="Username"></div></div><div class="col-md-6 mb-3"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="material-icons">assignment_ind</i></span></div><input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username"></div></div><div class="col-md-6 mb-3"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="material-icons">assignment_ind</i></span></div><input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username"></div></div></div></div></div><button type="button" class="btn btn-warning" style="background-color: #0B7984; border-color: #0B7984;"><font color="White">Eliminar</font></button><br><br>');
        });


        $('.addPro').click(function() {
            $('.sumaPro').append('<div class="row no-gutters"><div class="col-md-6 mb-3"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="material-icons">assignment_ind</i> </span></div><input autocomplete="false" type="text" class="form-control" data-mask="999999999-9" placeholder="Cargo" aria-label="Username" ></div></div><div class="col-md-6 mb-3"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> <i class="material-icons">phone</i></span></div><input autocomplete="false" type="text" class="form-control" placeholder="Empresa" aria-label="Username"> </div></div><div class="col-md-6 mb-3"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> <i class="material-icons">assignment_ind</i></span></div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username"></div></div><div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"><span class="input-group-text"><i class="material-icons">assignment_ind</i></span></div><input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username"></div></div></div><button type="button" class="btn btn-warning btn-remove" style="background-color: #0B7984; border-color: #0B7984;"><font color="White">Eliminar</font></button><br><br>');
        });


        function añadir1() {

            $('.sumaPro').append('<div class="row no-gutters"><div class="col-md-6 mb-3"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="material-icons">assignment_ind</i> </span></div><input autocomplete="false" type="text" class="form-control" data-mask="999999999-9" placeholder="Cargo" aria-label="Username" ></div></div><div class="col-md-6 mb-3"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> <i class="material-icons">phone</i></span></div><input autocomplete="false" type="text" class="form-control" placeholder="Empresa" aria-label="Username"> </div></div><div class="col-md-6 mb-3"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> <i class="material-icons">assignment_ind</i></span></div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username"></div></div><div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"><span class="input-group-text"><i class="material-icons">assignment_ind</i></span></div><input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username"></div></div></div><button type="button" class="btn btn-warning btn-remove" style="background-color: #0B7984; border-color: #0B7984;"><font color="White">Eliminar</font></button><br><br>');
        }

        function eliminar1() {

            ('.sub-suma').remove();
        }
    </script>

</form>