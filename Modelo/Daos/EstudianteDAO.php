<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
require_once ( $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/conexion/db.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/EnviarCorreos.php');

 
/**
 * Representa el DAO de la clase Estudiante
 */
class EstudianteDAO
{
    
    private $con;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
    



    // Lista de estudiantes con el usuario activo
    public function vistaEstudiantes(){
        $sentencia = $this->con->prepare("SELECT * FROM vistaestudiantes WHERE  COD_ESTUDIANTE not in (select COD_ESTUDIANTE from legalizacion) and  estado_usuario=1");
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    
    public function devolverEstudiante($codigo_usuario){

        $query=$this->con->prepare('SELECT * FROM estudiante WHERE COD_USUARIO=:user');
        $query->execute(['user'=>$codigo_usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $estudiante_devolver = new Estudiante($kk['COD_ESTUDIANTE'],$kk['CED_ESTUDIANTE'],$kk['CORREO_ESTUDIANTE'],$kk['COD_USUARIO'],$kk['NOMBRE_ESTUDIANTE'],$kk['APELLIDO_ESTUDIANTE'],$kk['COD_PROGRAMA_ACADEMICO'],$kk['SEMESTRE_ESTUDIANTE']);
                return $estudiante_devolver;
            }
        }
    }
    public function devolverEstudianteEmpresa($codigo_usuario){

        $query=$this->con->prepare('SELECT * FROM estudiante WHERE COD_ESTUDIANTE=:user');
        $query->execute(['user'=>$codigo_usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $estudiante_devolver = new Estudiante($kk['COD_ESTUDIANTE'],$kk['CED_ESTUDIANTE'],$kk['CORREO_ESTUDIANTE'],$kk['COD_USUARIO'],$kk['NOMBRE_ESTUDIANTE'],$kk['APELLIDO_ESTUDIANTE'],$kk['COD_PROGRAMA_ACADEMICO'],$kk['SEMESTRE_ESTUDIANTE']);
                return $estudiante_devolver;
            }
        }
    }
    public function devolverEstudiantexcodEs($codigo_usuario){

        $query=$this->con->prepare('SELECT * FROM estudiante WHERE COD_ESTUDIANTE=:user');
        $query->execute(['user'=>$codigo_usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $estudiante_devolver = new Estudiante($kk['COD_ESTUDIANTE'],$kk['CED_ESTUDIANTE'],$kk['CORREO_ESTUDIANTE'],$kk['COD_USUARIO'],$kk['NOMBRE_ESTUDIANTE'],$kk['APELLIDO_ESTUDIANTE'],$kk['COD_PROGRAMA_ACADEMICO'],$kk['SEMESTRE_ESTUDIANTE']);
                return $estudiante_devolver;
            }
        }
    }
    

    public function editarPerfil(Estudiante $estudiante){
        $sentencia = $this->con->prepare("UPDATE estudiante SET 
        CED_ESTUDIANTE='".$estudiante->getCedEstudiante()."',
        CORREO_ESTUDIANTE='".$estudiante->getCorreoEstudiante()."',
        COD_USUARIO=".$estudiante->getCodUsuario().",
        NOMBRE_ESTUDIANTE='".$estudiante->getNombreEstudiante()."',
        APELLIDO_ESTUDIANTE='".$estudiante->getApellidoEstudiante()."',
        COD_PROGRAMA_ACADEMICO=".$estudiante->getCodProgamaAcademico().",
        SEMESTRE_ESTUDIANTE='".$estudiante->getSemestreEstudiante()."' 
        WHERE COD_ESTUDIANTE =".$estudiante->getCodEstudiante());

        $res=$sentencia->execute();
        return $res;
    }
    public function buscarCorreo($correo){
        $sentencia = $this->con->prepare("SELECT  * from usuario where USER_USUARIO=?");
        $sentencia->execute([$correo]);
        $nrows = $sentencia->fetchAll();

        return $nrows;
    }


    public function totalEstudiantesA(){
        $sentencia = $this->con->prepare("SELECT  * from totalestudiantesactivos");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
        
    }


    public function totalEstudiantesI(){
        $sentencia = $this->con->prepare("SELECT  * from totalestudiantesinactivos");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
    }

    public function totalEstudiantes(){
        $sentencia = $this->con->prepare("SELECT  * from totalestudiantes");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
    }

   
    public function registrarEstudiante($v){
        #cedula,correo,nombre,apellido,programa,semestre,contrasena,verificacion
        $classEnviar= new enviarCorreo();
        $codigo=intval(rand(0,9).rand(0,9).rand(0,9).rand(0,9));
        $md5Codigo=md5($codigo);
        $mensaje='Muchas gracias por registrarse en la aplicación de "Feria de Oportunidades Universidad El Bosque", para continuar con el proceso de inscripción, por favor ingrese a la aplicación con su correo electrónico, 
        para su primer ingreso, deberá ingresar el código de verificación que está a continuación :  '.$codigo. " podrás acceder a toda la funciones, te recomendamos que eches un ojo a la hoja de vida, para que así todas las
        empresas registradas en la aplicación puedan ver tu perfil.";

        $sentencia = $this->con->prepare("CALL agregar_estudiante(?, ?, ?, ?, ?, ?, ?, ?)");
        $r=$sentencia->execute([$v[0],$v[1],$v[2],$v[3],$v[4],$v[5],$v[6],$md5Codigo]);  
        if($r==1){
            $r1=$classEnviar->enviarMensaje($v[2]." ".$v[3],$v[1],'Registro Plataforma Oportunidades El Bosque',$mensaje);
            if($r1==0){
                $sentencia2 = $this->con->prepare("call borrar_registro_estudiante(?)");
                 $sentencia2->execute([$v[1]]);
                return "Hubo un error en nuestro servidor de Correo electrónico por el momento no podemos procesar tu solicitud, intentalo mas tarde";
            }else{
                return 1;            
            }
        }else{
            return "Hubo un error con el registro, por favor vuelva a interlo en unos minutos.  ";
        }

    }

    public function verFormalizado($cod)
    {
        $sentencia = $this->con->prepare("SELECT * FROM legalizacion WHERE COD_ESTUDIANTE=".$cod);
        $sentencia->execute();
        return $sentencia->fetch();
    }

    public function agregarNoti($cod_desde,$cod_para, $mensaje, $cod_select){
        $sentencia=$this->con->prepare("INSERT INTO notificacion ( NOTIFACION_DESDE, NOTIFACION_PARA, PROMOCION_PERFIL, MENSAJE_NOTIFICACION, FECHA_ENVIO) 
        VALUES (?,?,?,?,now())"); 
        $respuesta=  $sentencia->execute([$cod_desde,$cod_para,$cod_select, $mensaje]);
        $envio = new enviarCorreo();
        $objeto=$this->devolverEstudiante($cod_para);
        $concat= $objeto->getNombreEstudiante()." ".$objeto->getApellidoEstudiante();
        ($envio->enviarMensaje($concat, $objeto->getCorreoEstudiante(),"Cambio de estado","Desde la aplicación Feria de Oportunidades hemos registrado que tienes una
        nueva notificación"));
        return $respuesta;
    }

    public function darNotificacionxEst($cod){
        $sentencia = $this->con->prepare("SELECT * FROM notificacion WHERE NOTIFACION_PARA=".$cod." ORDER BY FECHA_ENVIO DESC;");
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function desactivarPostulacion($cod)
    {
        $sentencia = $this->con->prepare("SELECT activas FROM estudiante_postulaciones_activas WHERE cod_estudiante=".$cod);
        $sentencia->execute();
        $cantidad=$sentencia->fetch();
        return $cantidad;
    }

    public function validarPostulacion($vacante,$estudiante)
    {
        $sentencia = $this->con->prepare("SELECT COUNT(cod_promocion_laboral) AS repetidas FROM promocion_postulacion WHERE  cod_promocion_laboral=".$vacante." and cod_estudiante=".$estudiante);
        $sentencia->execute();
        $cantidad=$sentencia->fetch();
        return $cantidad;
    }

}
?>