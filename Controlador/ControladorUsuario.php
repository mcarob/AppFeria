<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/UsuarioDAO.php');

class ControladorUsuario{

private $usuario;


    public function actualizarUsuario($codigo,$pass)
    {
        $this->usuario=new UsuarioDAO();
        return $this->usuario->editarUsuario($codigo,$pass);
    }

    public function validarContra($id,$contra)
    {
        
        $this->usuario=new UsuarioDAO();
        return $this->usuario->validacion($id,$contra);
    }
}

?>