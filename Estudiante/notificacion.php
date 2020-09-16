<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 2)) {
    header("location: ../index.php");
}
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
 
$user = new Usuario();
$user2 = new Usuario();
$empresa = new EmpresaDAO();
$estudiante_dao = new EstudianteDAO();
$user->setUser($_SESSION['user']);
$codigo= $user->darCodigo();

$estudiante = $estudiante_dao->devolverEstudiante($codigo);
$lista= $estudiante_dao->darNotificacionxEst($codigo);



include ('menuEstudiante.php');
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
                           <h4> <label  value="Notificaciones recibidas">Notificaciones recibidas</label></h4>
                        </form>

                        <ul class="list-unstyled border-top mb-0" id="chat-left-content">

                            <?php
                            foreach($lista as $key){
                                $user2->setUserxCod($key[1]);
                            ?>
                            <li>
                                <a onclick="darNot('<?php echo $key[4] ?>',' <?php  echo $key[5] ?>','<?php $empresa->darEmpresaXCodigo($key[1])->getRazonSocial();?>')" class="media media-message">
                                   
                                    <div class="media-body d-flex justify-content-between">
                                        <div class="message-contents">
                                            <h4 class="title"> <?PHP $user2->setUser($key[1])->darNombreUsuario(); ?> </h4>
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
                                    <h3 class="heading-title mb-0" id="nombre"><a href="#"></a></h3>
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

        function darNot(cod, fecha2, nombre2){
            far = document.getElementById('mensaje');
            fecha = document.getElementById('fec');
            nombre=document.getElementById('nombre');
            far.innerHTML=cod;
            nombre=innerHTML=nombre2;
            fecha.innerHTML=fecha2; 
        }

</script>


<?php
include('Footer.php')
?>