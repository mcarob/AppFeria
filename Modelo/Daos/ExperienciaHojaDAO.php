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
    
        
            $sql="insert into EXPERIENCIA_HOJA (COD_HOJA_VIDA,
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

    public function ModificarExperiencia($cod_experiencia, $cargo, $empresa, $desde, $hasta, $descripcion){
        $sql = "UPDATE EXPERIENCIA_HOJA SET EXPERIENCIA_HOJA_CARGO='".$cargo."' and EXPERIENCIA_HOJA_EMPRESA='".$empresa."' 
        AND EXPERIENCIA_HOJA_DESDE='".$desde."' and EXPERIENCIA_HOJA_HASTA='".$hasta."' and EXPERIENCIA_HOJA_descripcion='".$descripcion."' 
        WHERE cod_experiencia_hoja= $cod_experiencia";
        $respuesta = $this->con->prepare($sql)->execute();
        return $respuesta;
    }


    


    


}
?>