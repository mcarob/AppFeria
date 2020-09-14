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

    public function buscarHojaDeVida($cod){
        $sentencia = $this->con->prepare("SELECT * FROM hoja_vida WHERE COD_HOJA_VIDA=?" );
        $sentencia->execute($cod);
        while ($fila = $sentencia->fetch()) {
            $hoja = new HojaDeVida(
                $fila[0],
                $fila[1],
                $fila[2],
                $fila[3],
                $fila[4],
                $fila[5]
            );
        }
        return $hoja;
    }

    


}
?>