<?php

require_once('../Entidades/IdiomasHoja.php');
require_once('../conexion/db.php');

/**
 * Representa el DAO de la clase Usuario
 */
class IdiomasHojaDAO
{
   
    private $con;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
    public function crearIdiomaHoja( IdiomasHoja $nuevoIdioma)
    {   
        $sql = "INSERT INTO idiomas_hoja VALUES (default ,'" . $nuevoIdioma->getCodHojaVida() . "','" . $nuevoIdioma->getNomIdioma() ."', $nuevoIdioma->getNivelRango())";
        $result =pg_query($this->con, $sql);
        return pg_fetch_all($result);

    }


    public function ModificarIdiomas($cod_idioma_hoja, $nombre, $rango){
        $sql = "UPDATE idiomas_hoja SET IDIOMAS_HOJA_IDIOMA='".$nombre."' and COD_NIVEL_RANGO=$rango WHERE COD_CARRO= $cod_idioma_hoja";
        $result =pg_query($this->con, $sql);
        return pg_fetch_all($result);
    }


    


    


}
