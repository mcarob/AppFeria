<?php
require_once('Controlador/user_Sesion.php');
include_once('Controlador/user.php');

$userSession = new UserSession();
$user = new Usuario();

if(isset($_SESSION['user'])){
	$user->setUser($userSession->getCurrentUser());
	$tipo=$user->getTipoUsuario();
		if($tipo==1 || $tipo==4){
		header('location: Admin/index.php');
		}else if($tipo==2){
        header('location: Estudiante/index.php');
		}else if($tipo==3){
            header('location: Empresa/index.php');
		}
		include_once 'ingresoF.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){
    $userForm = $_POST['username'];
	$passForm = $_POST['password'];
	if($user->darIngreso($userForm,$passForm)){
        $userSession->setCurrentUser($userForm);
		$user->setUser($userForm);
        $tipo=$user->getTipoUsuario();
        $userSession->setTipoUsuario($tipo);
		if($tipo==1 || $tipo==4){
            header('location: Admin/index.php');
            }else if($tipo==2){
            header('location: Estudiante/index.php');
            }else if($tipo==3){
                header('location: Empresa/index.php');
            }

	}else{
		$errorEntrada="nombre de usuario o contraseña incorrecto";
		include_once 'ingresoF.php';
	}


 	
}else{
    include_once 'ingresoF.php';
}




?>