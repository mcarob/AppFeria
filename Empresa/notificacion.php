<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 3)) {
    header("location: ../index.php");
}
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');

$user = new Usuario();
$empresa_dao = new EmpresaDAO();

$user->setUser($_SESSION['user']);
$codigo= $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);
$lista= $empresa_dao->darNotificacionxEmpresa($codigo);

include ('menuEmpresa.php');
include ('Header.php');
?>


<div class="content-wrapper">
    <div class="content">
        <div class="card card-default mb-0">
            <div class="row bg-white no-gutters chat">
                <div class="col-lg-4">
                    <!-- Chat Left Side -->
                    <div class="chat-left-side">

                        <form class="chat-search">
                           <h4> <label  value="Notificaciones recibidas">Notificaciones Recibidas</label></h4>
                        </form>

                        <ul class="list-unstyled border-top mb-0" id="chat-left-content">

                            <?php
                            
                            foreach($lista as $key){
                            ?>
                            <li>
                                <a onclick="darNot('<?php echo $key[4] ?>',' <?php  echo $key[5] ?>')" class="media media-message">
                                   
                                    <div class="media-body d-flex justify-content-between">
                                        <div class="message-contents">
                                            <h4 class="title">Administración</h4>
                                            <p class="last-msg"><?php echo $key[4] ?></p>
                                        </div>

                                        <span class="date"><?php echo $key[5] ?></span>

                                    </div>
                                </a>
                            </li>

                            <?php
                            }
                            ?>
                            
                        </ul>
                    </div>

                </div>
                <div class="col-lg-8">
                    <!-- Chats -->
                    <div class="chat-right-side">
                        <div class="media media-chat align-items-center mb-0 media-chat-header" href="#">
                            <div class="media-body w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="heading-title mb-0"><a href="#">Administración</a></h3>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="chat-right-content" id="chat-right-content">
                            <div class="media media-chat media-left">
                                <div class="media-body">
                                    <p class="message" id="mensaje"></p>
                                    <div class="date-time" id="fec"></div>
                                </div>
                            </div>
                        </div>

   

    
                    </div>

                </div>
            </div>
        </div>

    </div>



    
</div>


<script>

        function darNot(cod, fecha2){
            far = document.getElementById('mensaje');
            fecha = document.getElementById('fec');
            far.innerHTML=cod;
            console.log(fecha);
            fecha.innerHTML=fecha2;
        }

</script>


<?php
include('Footer.php')
?>