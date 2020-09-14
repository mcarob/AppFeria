<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/AcademicaHoja.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');


/**
 * Representa el DAO de la clase PromocionPostulacion
 */
class AcademicaHojaDAO
{
    
    private $con;
    private $academica;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    



    public function agregarHojaAcademica(AcademicaHoja $academica){
        
        $sql="insert into academica_hoja (COD_HOJA_VIDA, ACADEMICA_TITULO, ACADEMICA_INSTITUTO, ACADEMICA_DESDE,
        ACADEMICA_HASTA,COD_TIPO_FORMACION)
        values 
        (?,?,?,?,?,?)";
        $respuesta=$this->con->prepare($sql)->execute([$academica->getCodHojaVida(),$academica->getFormacionTitulo(),
        $academica->getFormacionInstitucion(), $academica->getFormacionDesde(), $academica->getFormacionHasta(),
        $academica->getTipoFormacion()]);
        
        return $respuesta;

    }


    public function EDITARHojaAcademica(AcademicaHoja $academica){
        
        $sql="UPDATE academica_hoja SET (ACADEMICA_TITULO, ACADEMICA_INSTITUTO, ACADEMICA_DESDE,
        ACADEMICA_HASTA,COD_TIPO_FORMACION)
        values 
        (?,?,?,?,?)";
        $respuesta=$this->con->prepare($sql)->execute([$academica->getFormacionTitulo(),
        $academica->getFormacionInstitucion(), $academica->getFormacionDesde(), $academica->getFormacionHasta(),
        $academica->getTipoFormacion()]);
        return $respuesta;

    }

}
?>