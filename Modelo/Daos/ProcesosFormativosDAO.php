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
        
        $sql="insert into proceso_formativos (COD_HOJA_VIDA, PROCESO_FORMATIVO_TITULO, PROCESO_FORMATIVO_DESCRIPCION, PERIODO_ACADEMICO,
        MATERIA_ACADEMICA)
        values 
        (?,?,?,?,?)";
        $respuesta=$this->con->prepare($sql)->execute([$formativos->getCodHojaVida(),$formativos->getPFormativoTitulo(),
        $formativos->getPFormativoDescripcion(), $formativos->getPeriodo(),$formativos->getMateria()]);
        
        return $respuesta;

    }


    public function editarProcesos(ProcesosFormativos $formativos){
        
        $sql="UPDATE proceso_formativos  SET (PROCESO_FORMATIVO_TITULO, PROCESO_FORMATIVO_DESCRIPCION, PERIODO_ACADEMICO,
        MATERIA_ACADEMICA)
        values 
        (?,?,?,?)";
        $respuesta=$this->con->prepare($sql)->execute([$formativos->getPFormativoTitulo(),
        $formativos->getPFormativoDescripcion(), $formativos->getPeriodo(),$formativos->getMateria()]);
        
        return $respuesta;

    }


    public function buscarProcesos($codigoHoja){
        
        $sentencia = $this->con->prepare("SELECT * FROM proceso_formativos WHERE cod_hoja_vida=?");
        $sentencia->execute($codigoHoja);
        $em = array();
        while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;

    }
    public function pasarInformaciones($var){
        $sql="SELECT  * FROM proceso_formativos where cod_hoja_vida=?";
        $respuesta=$this->con->prepare($sql);
        $respuesta->execute([$var]);
        return $respuesta->fetchall();

    }



}
?>