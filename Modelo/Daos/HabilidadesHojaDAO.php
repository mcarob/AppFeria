<?php
// NO SIRVE
require_once('../Entidades/HabilidadesHoja.php');
require_once('../conexion/db.php');


class HabilidadesHojaDAO
{
   
    private $con;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
    
    public function crearHabilidades(HabilidadesHoja $nueva)
    {   
        $sql = "INSERT INTO HABILIDAD_HOJA VALUES (default ,'" . $nueva->getCodHojaDeVida() . "','" . $nueva->getNomHabilidad() . "', $nueva->getCodHabilidad())";
        $result =mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result);

    }

    public function ModificarHabilidad($cod_habilidad, $nombre, $nivel){
        $sql = "UPDATE HABILIDAD_HOJA SET HABILIDAD_NOMBRE='".$nombre."' and COD_NIVEL_RANGO='".$nivel."' 
          WHERE cod_habilidad_hoja= $cod_habilidad";
        $result =mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result);
    }


    


    


}
?>