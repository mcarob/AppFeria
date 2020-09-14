<?php
require_once('Controlador/user_Sesion.php');
include_once('Controlador/user.php');

$userSession = new UserSession();
$user = new Usuario();
$userForm = "";
	$passForm = "";
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
		if($user->darEstado()==1){
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
		}elseif($user->darEstado()==2){
			if(isset($_POST['verifi'])){
				if(md5(($_POST['verifi']))==$user->darVerificacion()){
					$userSession->setCurrentUser($userForm);
					$user->setUser($userForm);
					$tipo=$user->getTipoUsuario();
					$userSession->setTipoUsuario($tipo);
					$user->cambiarEstadoValido();
					if($tipo==1 || $tipo==4){
						header('location: Admin/index.php');
						}else if($tipo==2){
						header('location: Estudiante/index.php');
						}else if($tipo==3){
						header('location: Empresa/index.php');
						}
				}else{
					$mostrarCodigo=true;
					$errorEntrada="El codigo de verificación es incorrecto";
					include_once 'ingresoF.php';
				}
				
			}else{
				$mostrarCodigo=true;
				include_once 'ingresoF.php';
				echo("entraaaaaar 37");
			}
			
		}else{
			echo($user->darEstado());
			echo("entro en 41");
		}
      

	}else{
		$errorEntrada="nombre de usuario o contraseña incorrecto";
		include_once 'ingresoF.php';
	}


 	
}else{
    include_once 'ingresoF.php';
}




?>

