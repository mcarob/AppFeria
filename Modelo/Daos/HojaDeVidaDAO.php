<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/HojaDeVida.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');


/**
 * Representa el DAO de la clase PromocionPostulacion
 */
class HojaDeVidaDAO
{
    
    private $con;
    private $hoja;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    



    public function agregarHojaDeVida(HojaDeVida $hoja){
        
        $sql="insert into hoja_vida (COD_ESTUDIANTE, HOJA_CELULAR, HOJA_DIRECCION, HOJA_CIUDAD,
        PERFIL_HOJA)
        values 
        (?,?,?,?,?)";
        $respuesta=$this->con->prepare($sql)->execute([$hoja->getCodEstudiante(),$hoja->getHojaCelular(),
        $hoja->getHojaDireccion(),$hoja->getHojaCiudad(),$hoja->getPerfil()]);
        
        return $respuesta;

    }

}
?>