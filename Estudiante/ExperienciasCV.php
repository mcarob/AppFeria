<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<form autocomplete="off">
    <!--    esto es algo comentado--->
   

    <h3>Experiencia Academica:</h3>
    <br>
    <div class="sumaAca">
        <div class="buttons">
            <button type="button" class="btn btn-warning cloneAca" style="background-color: #0B7984; border-color: #0B7984;">
                <font color="White">Añadir Experiencia</font>
            </button>
            <button type="button" class="btn btn-warning removeAca" style="background-color: #0B7984; border-color: #0B7984;">
                <font color="White">Eliminar</font>
            </button>
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
                        <input autocomplete="false" type="text" class="form-control" data-mask="999999999-9" placeholder="Titulo del proyecto" aria-label="Username">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">phone</i>
                            </span>
                        </div>
                        <input autocomplete="false" type="text" class="form-control" placeholder="Materia" aria-label="Username">
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
            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" style="resize: none;" placeholder="Describa del proyecto"></textarea>
            </div>
        </div>
        <div class="resultsAca">
        </div>
    </div>

    <br><br>
    <h3>Experiencia Profesional:</h3>
    <br>
    <div class="sumaPro">
        <div class="buttons">
            <button type="button" class="btn btn-warning clonePro" style="background-color: #0B7984; border-color: #0B7984;">
                <font color="White">Añadir Cargo</font>
            </button>
            <button type="button" class="btn btn-warning removePro" style="background-color: #0B7984; border-color: #0B7984;">
                <font color="White">Eliminar</font>
            </button>
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
            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" style="resize: none;" placeholder="Describa el cargo"></textarea>
            </div>
        </div>
        <div class="resultsPro">
        </div>
    </div>
    <button type="button" class="btn btn-warning " style="background-color: #0B7984; border-color: #0B7984;">
                <font color="White">Guardar</font>
            </button>

    

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