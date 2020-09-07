<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/UsuarioDAO.php');

class ControladorUsuario{

private $usuario;


    public function actualizarUsuario($codigo,$pass)
    {
        $usuario=new UsuarioHojaDAO();
        return $this->usuario->editarUsuario($codigo,$pass);
    }


}

?>