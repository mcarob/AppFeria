<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionPostulacion.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/EnviarCorreos.php');




/**
 * Representa el DAO de la clase PromocionPostulacion
 */
class PromocionPostulacionDAO
{
    
    private $con;
    private $est;

    
    public function __construct()
    {
        $claseCon = new DB();

        $this->con =$claseCon->connect();
    }
    
   
    public function agregarPost(PromocionPostulacion $oferta){
        $sql="insert into promocion_postulacion (COD_PROMOCION_LABORAL, COD_ESTUDIANTE, COD_ESTADO_PROCESO,
        COD_HOJA_VIDA,fecha_postulacion,motivo_resultado, COD_MOTIVO_RECHAZO)
        values 
        (?,?,?,?,now(),?,9)";
        $respuesta=$this->con->prepare($sql)->execute([$oferta->getCodPromo(),$oferta->getCodEstudiante(),$oferta->getCodEstadoProceso(),
        $oferta->getHojaVida(),$oferta->getMotivo()]);
        
        return $respuesta;

    }

    // Lista de empresas con el usuario activo
    public function ListaDePostulaciones($cod){
        $sentencia = $this->con->prepare("SELECT * FROM vistaPostulaciones WHERE cod_estudiante =".$cod);
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }

    public function totalPostulaciones(){
        $sentencia = $this->con->prepare("SELECT * FROM postulaciones_activas1");
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    

    public function HistorialPostulaciones(){
        $sentencia = $this->con->prepare("SELECT * FROM historial_postulaciones");
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    public function cambiarEstado($cod,$estado){
        $sentencia=$this->con->prepare("UPDATE promocion_postulacion set COD_ESTADO_PROCESO=".$estado." WHERE COD_PROMOCION_POSTULACION=".$cod);
        $respuesta=  $sentencia->execute();

        $sentencia = $this->con->prepare("SELECT COD_ESTUDIANTE FROM postulacionesXempresa where COD_PROMOCION_POSTULACION=".$cod);
        $sentencia->execute();
        $em = $sentencia->fetch();

        $sentencia3 = $this->con->prepare("SELECT TITULO_PROMOCION FROM postulacionesXempresa where COD_PROMOCION_POSTULACION=".$cod);
        $sentencia3->execute();
        $em2 = $sentencia3->fetch();    

        $est = new EstudianteDAO();
        $envio = new enviarCorreo();

        $objeto=$est->devolverEstudiantexcodEs($em[0]);
        $concat= $objeto->getNombreEstudiante()." ".$objeto->getApellidoEstudiante();
        ($envio->enviarMensaje($concat, $objeto->getCorreoEstudiante(),"Cambio de estado","Desde la aplicación Feria de Oportunidades hemos registrado que se ha realizado 
        un cambio de estado en la oferta con el nombre ".$em2[0]));

        return $respuesta;
    }

    public function editarMotivo($cod,$motivo, $select){
        $sentencia1=$this->con->prepare("UPDATE promocion_postulacion set COD_MOTIVO_RECHAZO=?,motivo_resultado=? WHERE COD_PROMOCION_POSTULACION=?"); 
        $respuesta=  $sentencia1->execute([$select, $motivo, $cod]);
       return $respuesta;

    }

    public function postulacionXempresa($cod_Empresa){
        $sentencia = $this->con->prepare("SELECT * FROM postulacionesXempresa where (COD_ESTADO_PROCESO=1 or COD_ESTADO_PROCESO=2 or COD_ESTADO_PROCESO=3) and cod_empresa=".$cod_Empresa);
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }


    public function practicantesXempresa($cod){
        $sentencia = $this->con->prepare("SELECT * FROM practicantesXempresa where  COD_ESTADO_PROCESO = 5 and cod_empresa=".$cod);
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    
     public function totalPostulacionesFORXempresa($cod){
        $sentencia = $this->con->prepare("SELECT  * from totalPostulacionesFORXempresa where cod_empresa=".$cod);
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows; 
    }



    public function totalPostulacionesREXempresa($cod){
        $sentencia = $this->con->prepare("SELECT  * from totalPostulacionesREXempresa where cod_empresa=".$cod);
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows; 
    }


    public function totalPostulacionesEPXempresa($cod){
        $sentencia = $this->con->prepare("SELECT  * from totalPostulacionesEPXempresa where cod_empresa=".$cod);
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows; 
    }


    public function totalPostulacionesASXempresa($cod){
        $sentencia = $this->con->prepare("SELECT  * from totalPostulacionesASXempresa where cod_empresa=".$cod);
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows; 
    }

    public function totalPostulacionesA(){
        $sentencia = $this->con->prepare("SELECT  * from totalPostulacionesActivas");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
        
    }

    public function totalPostulacionesI(){
        $sentencia = $this->con->prepare("SELECT  * from totalPostulacionesInactivas");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
        
    }

    public function totalPostulacionesFOR(){
        $sentencia = $this->con->prepare("SELECT  * from totalPostulacionesFOR");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
        
    }
    public function totalPostulacionesChard(){
        $sentencia = $this->con->prepare("SELECT  * from totalPostulacionesChard");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
    }


}
