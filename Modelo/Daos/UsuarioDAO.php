<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Usuario.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');

/**
 * Representa el DAO de la clase Usuario
 */
class UsuarioDAO
{
   
    private $con;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
    public function crearUsuario(Usuario $nuevo)
    {   
        $sql = "INSERT INTO usuario VALUES (default ,'" . $nuevo->getNomUsuario() . "','" . $nuevo->getClave() . "','" . $nuevo->getValidado() . "','" . $nuevo->getFechaCreacion() . "','" . $nuevo->getTipoUsuario() . "','" . $nuevo->getEstadoUsuario()."')";
        $result =mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result);

    }


    public function editarUsuario($codigo,$pass)
    {
        $pass2 = md5($pass);
        $sentencia = $this->con->prepare("UPDATE usuario SET CONTRA_USUARIO='".$pass2."' WHERE COD_USUARIO =".$codigo);
        $res=$sentencia->execute();
        return $res;
    }

    public function validacion($id,$contra)
    {
        
        $sentencia = $this->con->prepare("SELECT * from usuario where cod_usuario=? and contra_usuario=?");
        $sentencia->execute([$id,md5($contra)]);
        $number_of_rows = $sentencia->fetchAll();
        return $number_of_rows;
    }
   



    


    


}
?>