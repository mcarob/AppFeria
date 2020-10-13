<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionPostulacion.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Legalizar.php');
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
        $sql1="select * from promocion_postulacion where COD_ESTUDIANTE=? and COD_PROMOCION_LABORAL=?";
        $r1=$this->con->prepare($sql1);
        $r1->execute([$oferta->getCodEstudiante(),$oferta->getCodPromo()]);
        $entro=false;
        if(count($r1->fetchall())){  
            $entro=true;
            return 0;
        }
        if(!$entro){
            $sql="insert into promocion_postulacion (COD_PROMOCION_LABORAL, COD_ESTUDIANTE, COD_ESTADO_PROCESO,
            COD_HOJA_VIDA,fecha_postulacion,motivo_resultado, COD_MOTIVO_RECHAZO)
            values 
            (?,?,?,?,now(),?,9)";
            $respuesta=$this->con->prepare($sql)->execute([$oferta->getCodPromo(),$oferta->getCodEstudiante(),$oferta->getCodEstadoProceso(),
            $oferta->getHojaVida(),$oferta->getMotivo()]); 
            return $respuesta;  
        }

    }


    public function agregarLel(Legalizar $datos){
        $sql="insert into legalizacion (COD_EMPRESA, COD_ESTUDIANTE, FECHA_LEGALIZACION,
        COD_CIDAD)
        values 
        (?,?,now(),?)";
        $respuesta=$this->con->prepare($sql)->execute([$datos->getCodEmpresa(),$datos->getCodEstudiante(),$datos->getCodCiudad()]);
        
        return $respuesta;
    }


    // Lista de empresas con el usuario activo
    public function ListaDePostulaciones($cod){
        $sentencia = $this->con->prepare("SELECT * FROM vistapostulaciones WHERE cod_estudiante =".$cod);
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }

    public function ListaDePostulacionesXcodPost($cod){
        $sentencia = $this->con->prepare("SELECT * FROM promocion_postulacion WHERE COD_PROMOCION_POSTULACION =".$cod);
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

        $sentencia = $this->con->prepare("SELECT COD_ESTUDIANTE FROM postulacionesxempresa where COD_PROMOCION_POSTULACION=".$cod);
        $sentencia->execute();
        $em = $sentencia->fetch();

        $sentencia3 = $this->con->prepare("SELECT TITULO_PROMOCION FROM postulacionesxempresa where COD_PROMOCION_POSTULACION=".$cod);
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

    public function legalizar($estudiante_codigo,$cod_postulacion1 ,$codempre,$codciu){
        $sentencia=$this->con->prepare("call legalizar_estudiante(?,?,?,?)" );
        $respuesta=  $sentencia->execute([$estudiante_codigo, $cod_postulacion1, $codempre, $codciu]);
        return $respuesta;
    }

    public function editarMotivo($cod,$motivo, $select){
        $sentencia1=$this->con->prepare("UPDATE promocion_postulacion set COD_MOTIVO_RECHAZO=?,motivo_resultado=? WHERE COD_PROMOCION_POSTULACION=?"); 
        $respuesta=  $sentencia1->execute([$select, $motivo, $cod]);
       return $respuesta;

    }

    public function postulacionXempresa($cod_Empresa){
        $sentencia = $this->con->prepare("SELECT * FROM postulacionesxempresa where (COD_ESTADO_PROCESO=1 or COD_ESTADO_PROCESO=2 or COD_ESTADO_PROCESO=3 or COD_ESTADO_PROCESO=7) and cod_empresa=".$cod_Empresa);
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }


    public function practicantesXempresa($cod){
        $sentencia = $this->con->prepare("SELECT * FROM formalizados_vista where COD_EMPRESA=".$cod);
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    
     public function totalPostulacionesFORXempresa($cod){
        $sentencia = $this->con->prepare("SELECT  * from totalpostulacionesforxempresa where cod_empresa=".$cod);
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows; 
    }



    public function totalPostulacionesREXempresa($cod){
        $sentencia = $this->con->prepare("SELECT  * from totalpostulacionesrexempresa where cod_empresa=".$cod);
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows; 
    }


    public function totalPostulacionesEPXempresa($cod){
        $sentencia = $this->con->prepare("SELECT  * from totalpostulacionesepxempresa where cod_empresa=".$cod);
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows; 
    }


    public function totalPostulacionesASXempresa($cod){
        $sentencia = $this->con->prepare("SELECT  * from totalpostulacionesasxempresa where cod_empresa=".$cod);
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows; 
    }

    public function totalPostulacionesA(){
        $sentencia = $this->con->prepare("SELECT  * from totalpostulacionesactivas");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
        
    }

    public function totalPostulacionesI(){
        $sentencia = $this->con->prepare("SELECT  * from totalpostulacionesinactivas");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
        
    }

    public function totalPostulacionesFOR(){
        $sentencia = $this->con->prepare("SELECT  * from totalpostulacionesfor");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
        
    }
    public function totalPostulacionesChard(){
        $sentencia = $this->con->prepare("SELECT  * from totalpostulacioneschard");
        $sentencia->execute();
        $nrows = $sentencia->fetchAll();
        return $nrows;
    }

    public function buscarNomCiudad($cod)
    {
        
        $sentencia = $this->con->prepare("SELECT  * FROM ciudad WHERE COD_CIUDAD=?");
        $sentencia->execute([$cod]);
        $nrows = $sentencia->fetch();
        return $nrows; 

    }

}
