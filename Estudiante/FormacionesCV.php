<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
        <div class="buttons">
            <button type="button" class="btn btn-warning clone" style="background-color: #0B7984; border-color: #0B7984;">
                <font color="White">Añadir Formacion</font>
            </button>
            <button type="button" class="btn btn-warning remove" style="background-color: #0B7984; border-color: #0B7984;">
                <font color="White">Eliminar</font>
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
                            <option disabled="" selected="">Seleccionar tipo de formacion</option>
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
                        <input autocomplete="false" type="text" class="form-control" placeholder="Institucion" aria-label="Username">
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
                        <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username">
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
                        <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username">
                    </div>
                </div>
            </div>
        </div>
        <div class="results">
        </div>
    </div>

    <h3>Formacion Complementaria:</h3>
    <br>
    <div class="sumaCom">
        <div class="buttons">
            <button type="button" class="btn btn-warning cloneCom" style="background-color: #0B7984; border-color: #0B7984;">
                <font color="White">Añadir Formacion</font>
            </button>
            <button type="button" class="btn btn-warning removeCom" style="background-color: #0B7984; border-color: #0B7984;">
                <font color="White">Eliminar</font>
            </button>
        </div>
        <br>
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
                            <option disabled="" selected="">Seleccionar tipo de formacion</option>
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
                        <input autocomplete="false" type="text" class="form-control" placeholder="Nombre del curso" aria-label="Username">
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
                        <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username">
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
                        <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username">
                    </div>
                </div>
            </div>
        </div>
        <div class="resultsCom">
        </div>
    </div>

    
    

    <br><br>
    <script>
        $('.suma').on('click', '.remove', function() {
            $('.remove').closest('.suma').find('.element').not(':first').last().remove();
        });

        $('.suma').on('click', '.clone', function() {
            $('.clone').closest('.suma').find('.element').first().clone().appendTo('.results');
        });

        $('.sumaCom').on('click', '.removeCom', function() {
            $('.removeCom').closest('.sumaCom').find('.elementCom').not(':first').last().remove();
        });

        $('.sumaCom').on('click', '.cloneCom', function() {
            $('.cloneCom').closest('.sumaCom').find('.elementCom').first().clone().appendTo('.resultsCom');
        });

        $('.sumaPro').on('click', '.removePro', function() {
            $('.removePro').closest('.sumaPro').find('.elementPro').not(':first').last().remove();
        });

        $('.sumaPro').on('click', '.clonePro', function() {
            $('.clonePro').closest('.sumaPro').find('.elementPro').first().clone().appendTo('.resultsPro');
        });

        $('.sumaAca').on('click', '.removeAca', function() {
            $('.removeAca').closest('.sumaAca').find('.elementAca').not(':first').last().remove();
        });

        $('.sumaAca').on('click', '.cloneAca', function() {
            $('.cloneAca').closest('.sumaAca').find('.elementAca').first().clone().appendTo('.resultsAca');
        });


        

        
    </script>
</form>