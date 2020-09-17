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
    

    
    public function buscarIdHoja($codigoEstudiante)
    {
        try {
            $sentencia = $this->con->prepare("call agregarHojaVida(?,@res)");
            $sentencia->execute([$codigoEstudiante]);
            $row = $this->con->query("SELECT @res as re12")->fetch();  
            $codigoHoja=$row['re12']; 
        } catch (\Throwable $th){
            print("ERROR");
        }
        return $codigoHoja;
    }
    

    public function agregarHojaDeVida(HojaDeVida $hoja){
        
        try {
            $sentencia = $this->con->prepare("call agregarHojaVida(?,@res)");
            $sentencia->execute([$hoja->getCodEstudiante()]);
            $row = $this->con->query("SELECT @res as re12")->fetch();
            $codigo=$row['re12'];
            $sql=$this->con->prepare("update hoja_vida set HOJA_CELULAR=?, HOJA_DIRECCION=?, HOJA_CIUDAD=?,PERFIL_HOJA=? WHERE COD_HOJA_VIDA=?");
            $respuesta=$sql->execute([$hoja->getHojaCelular(),$hoja->getHojaDireccion(),$hoja->getHojaCiudad(),$hoja->getPerfil(),$codigo]);
            $sentencia2 = $this->con->prepare("call eliminarHojaVida(?)");
            $sentencia2->execute([$codigo]);
            } catch (\Throwable $th){
                print_r($th);
                return 0;
            }

            return $codigo;

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
    public function buscarHojaDeVida1($cod){
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