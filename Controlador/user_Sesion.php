<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user){

        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    } 

    public function setTipoUsuario($tipo){
		$_SESSION['tipo'] = $tipo;
    }

    public function getTipoUsuario(){
		return $_SESSION['tipo'];
    }
    public function closeSession(){
        session_unset();
        session_destroy();
    }



}

?>