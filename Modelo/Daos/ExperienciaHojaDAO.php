<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ExperienciaHoja.php');
require_once ( $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');


/**
 * Representa el DAO de la clase Experiencia
 */
class ExperienciaHojaDAO
{
   
    private $con;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
    public function crearExperienciaHoja(ExperienciaHoja $nueva)
    {   
    
            $sql="INSERT into experiencia_hoja (COD_HOJA_VIDA,
            EXPERIENCIA_HOJA_CARGO,
            EXPERIENCIA_HOJA_EMPRESA,
            EXPERIENCIA_HOJA_DESDE,
            EXPERIENCIA_HOJA_HASTA,
            EXPERIENCIA_HOJA_DESCRIPCCION)
            values 
            (?,?,?,?,?,?)";
            $respuesta=$this->con->prepare($sql)->execute([$nueva->getCodHojaVida(),$nueva->getExperienciaCargo(),
            $nueva->getExperienciaEmpresa(), $nueva->getExperienciaDesde(),$nueva->getExperienciaHasta(),
            $nueva->getExperienciaDescripcion()]);
            
            return $respuesta;
    
        
    

    }

    // public function ModificarExperiencia($cod_experiencia, $cargo, $empresa, $desde, $hasta, $descripcion){
    //     $sql = "UPDATE EXPERIENCIA_HOJA SET EXPERIENCIA_HOJA_CARGO='".$cargo."' and EXPERIENCIA_HOJA_EMPRESA='".$empresa."' 
    //     AND EXPERIENCIA_HOJA_DESDE='".$desde."' and EXPERIENCIA_HOJA_HASTA='".$hasta."' and EXPERIENCIA_HOJA_descripcion='".$descripcion."' 
    //     WHERE cod_experiencia_hoja= $cod_experiencia";
    //     $respuesta = $this->con->prepare($sql)->execute();
    //     return $respuesta;
    // }

    public function editarExperienciaHoja(ExperienciaHoja $experiencia)
    {   
    
        
            $sql="UPDATE EXPERIENCIA_HOJA SET (
            EXPERIENCIA_HOJA_CARGO,
            EXPERIENCIA_HOJA_EMPRESA,
            EXPERIENCIA_HOJA_DESDE,
            EXPERIENCIA_HOJA_HASTA,
            EXPERIENCIA_HOJA_DESCRIPCCION)
            values 
            (?,?,?,?,?)";
            $respuesta=$this->con->prepare($sql)->execute([$experiencia->getExperienciaCargo(),
            $experiencia->getExperienciaEmpresa(), $experiencia->getExperienciaDesde(),$experiencia->getExperienciaHasta(),
            $experiencia->getExperienciaDescripcion()]);
            
            return $respuesta;
    


    }

    public function darExperienciaXHoja($cod){
        $sentencia = $this->con->prepare("SELECT * FROM experiencia_hoja WHERE cod_hoja_vida=?");
        $sentencia->execute([$cod]);
        $em = array();
        while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }

    public function pasarInformaciones($var){
        $sql="SELECT  * FROM experiencia_hoja where cod_hoja_vida=?";
        $respuesta=$this->con->prepare($sql);
        $respuesta->execute([$var]);
        return $respuesta->fetchall();
    }


    


}
?>