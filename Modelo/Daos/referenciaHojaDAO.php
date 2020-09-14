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
        
        $sql="insert into hoja_vida (COD_HOJA_VIDA, REFERENCIA_NOMBRE, REFERENCIA_CARGO, REFERENCIA_EMPRESA,REFERENCIA_TELEFONO,
        REFERENCIA_CORREO)
        values 
        (?,?,?,?,?)";
        $respuesta=$this->con->prepare($sql)->execute([$referencia->getCodHojaVida(),
        $referencia->getNombreReferencia(),$referencia->getCargoReferencia(),$referencia->getCargoReferencia(),getEmpresaReferencia(),
        $referencia->getTelefonoReferencia(),$referencia->getCorreoReferencia()]);
        
        return $respuesta;

    }

}
?>