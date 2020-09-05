<?php

require_once('../Entidades/ExperienciaHoja.php');
require_once('../conexion/db.php');

/**
 * Representa el DAO de la clase Usuario
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
        $sql = "INSERT INTO EXPERIENCIA_HOJA VALUES (default ,'" . $nueva->getCodHojaVida() . "','" . $nueva->getExperienciaCargo() . "','" . $nueva->getExperienciaEmpresa() . "','" . $nueva->getExperienciaDesde() . "','" . $nueva->getExperienciaHasta() . "','" . $nueva->getExperienciaDescripcion()."')";
        $result =mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result);

    }

    public function ModificarExperiencia($cod_experiencia, $cargo, $empresa, $desde, $hasta, $descripcion){
        $sql = "UPDATE EXPERIENCIA_HOJA SET EXPERIENCIA_HOJA_CARGO='".$cargo."' and eXPERIENCIA_HOJA_EMPRESA='".$empresa."' 
        AND EXPERIENCIA_HOJA_DESDE='".$desde."' and EXPERIENCIA_HOJA_HASTA='".$hasta."' and EXPERIENCIA_HOJA_descripcion='".$descripcion."' 
        WHERE cod_experiencia_hoja= $cod_experiencia";
        $result =pg_query($this->con, $sql);
        return pg_fetch_all($result);
    }


    


    


}
?>