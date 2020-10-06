<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ReferenciaHoja.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');


/**
 * Representa el DAO de la clase PromocionPostulacion
 */
class ReferenciaHojaDAO
{
    
    private $con;
    private $referencia;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    



    public function agregarReferenciaHojaDeVida(ReferenciaHoja $referencia){
        $sql="insert into referencia_hoja (COD_HOJA_VIDA, REFERENCIA_NOMBRE, REFERENCIA_CARGO, REFERENCIA_EMPRESA,REFERENCIA_TELEFONO,
        REFERENCIA_CORREO)
        values 
        (?,?,?,?,?,?)";
        $respuesta=$this->con->prepare($sql)->execute([$referencia->getCodHojaVida(),$referencia->getNombreReferencia(),$referencia->getCargoReferencia(),$referencia->getEmpresaReferencia(),
        $referencia->getTelefonoReferencia(),$referencia->getCorreoReferencia()]);
        
        return $respuesta;

    }


    public function buscarReferenciaHojaDeVida($codigoHoja){
        
        $sentencia = $this->con->prepare("SELECT * FROM referencia_hoja WHERE cod_hoja_vida=?");
        $sentencia->execute([$codigoHoja]);
        $em = array();
        while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;

    }

    public function pasarInformaciones($var){
        $sql="SELECT  * FROM referencia_hoja where cod_hoja_vida=?";
        $respuesta=$this->con->prepare($sql);
        $respuesta->execute([$var]);
        return $respuesta->fetchall();
    }
    
}
?>