<?php

require_once('../Entidades/Usuario.php');
require_once('../conexion/db.php');

/**
 * Representa el DAO de la clase Usuario
 */
class UsuarioHojaDAO
{
   
    private $con;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
    public function crearUsuario(Usuario $nuevo)
    {   
        $sql = "INSERT INTO USUARIO VALUES (default ,'" . $nuevo->getNomUsuario() . "','" . $nuevo->getClave() . "','" . $nuevo->getValidado() . "','" . $nuevo->getFechaCreacion() . "','" . $nuevo->getTipoUsuario() . "','" . $nuevo->getEstadoUsuario()."')";
        $result =mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result);

    }

    public function editarUsuario(Usuario $usuario, $pass2)
    {
        $pass = md5($pass2);
        $sql = "UPDATE USUARIO SET clave='".$pass."' WHERE cod_usuario = ".$usuario->getCodUsuario();
        $result =pg_query($this->con, $sql);
        return pg_fetch_all($result);

    }

   



    


    


}
?>