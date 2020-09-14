<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ProcesosFormativos.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');


/**
 * Representa el DAO de la clase PromocionPostulacion
 */
class ProcesosFormativosDAO
{
    
    private $con;
    private $formativos;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    



    public function agregarProcesosFormativos(ProcesosFormativos $formativos){
        
        $sql="insert into procesos_formativos (COD_HOJA_VIDA, PROCESO_FORMATIVO_TITULO, PROCESO_FORMATIVO_DESCRIPCION, PERIODO_ACADEMICO,
        MATERIA_ACADEMICA)
        values 
        (?,?,?,?,?)";
        $respuesta=$this->con->prepare($sql)->execute([$formativos->getCodHojaVida(),$formativos->getPFormativoTitulo(),
        $formativos->getPFormativoDescripcion(), $formativos->getPeriodo(),$formativos->getMateria()]);
        
        return $respuesta;

    }

}
?>