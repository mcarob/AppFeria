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

    public function postulacionXempresa($cod_Empresa){
        $sentencia = $this->con->prepare("SELECT * FROM postulacionesXempresa where cod_empresa=".$cod_Empresa);
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    

    


}
?>