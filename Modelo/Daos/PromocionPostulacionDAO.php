<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionPostulacion.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');


/**
 * Representa el DAO de la clase PromocionPostulacion
 */
class PromocionPostulacionDAO
{
    
    private $con;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
   


    // Lista de empresas con el usuario activo
    public function ListaDePostulaciones($cod){
        $sentencia = $this->con->prepare("SELECT * FROM listaPostulaciones WHERE cod_estudiante =".$cod);
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }

    public function totalPostulaciones(){
        $sentencia = $this->con->prepare("SELECT * FROM postulaciones_activas");
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
        return $respuesta;
    }

    public function editarMotivo($cod,$motivo){
        $sentencia=$this->con->prepare("UPDATE promocion_postulacion set motivo_resultado='".$motivo."' WHERE COD_PROMOCION_POSTULACION=".$cod);
        $respuesta=  $sentencia->execute();
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
    

    


}
?>