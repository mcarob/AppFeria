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
        header('location: Estudiante/postulaciones.php');
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
				header('location: Estudiante/postulaciones.php');
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
						header('location: Estudiante/ListaPostulaciones.php');
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
			}
			
		}else{
			echo($user->darEstado());
		}
      

	}else{
		$errorEntrada="nombre de usuario o contraseña incorrecto";
		include_once 'ingresoF.php';
	}


 	
}else if(isset($_POST['correoOlvidar'])){
	if($user->existeCorreo($_POST['correoOlvidar'])){
		$user->setUser($_POST['correoOlvidar']);
		$respuestaCorreoR=$user->mandarCorreoRecuperacion($user->darCodigo(),$_POST['correoOlvidar']);
		
		if($respuestaCorreoR==1){
			$mostrarDialogo=True;
			$correoE=$_POST['correoOlvidar'];
			$codigoEnviado="Se ha enviado un codigo a su correo, por favor no cierre este dialogo.";
			include_once 'ingresoF.php';
		}else{
			$mostrarDialogo=True;
			$errorCorreo=$respuestaCorreoR;
			include_once 'ingresoF.php';
		}
	}else{
		$mostrarDialogo=True;
		$errorCorreo="No existe el correo en Nuestra Base de Datos";
		include_once 'ingresoF.php';
	}

}else if(isset($_POST['confirmacionCambio'])){
	$correoE=$_POST['correoConf'];
	$respuestaconfiCodigo=$user->validarCorreoContraOlv($correoE,$_POST['confirmacionCambio']);
	if($respuestaconfiCodigo==1){
		$correoE=$_POST['correoConf'];
		$ingresarNuevaContra=true;
		$mostrarDialogo=True;
	}else{
		$correoE=$_POST['correoConf'];
		$errorCodigoConf="Hay un Error en la validación del codigo, confirme el codigo";
		$mostrarDialogo=True;
		$codigoEnviado=True;
	}
	include_once 'ingresoF.php';
}else if(isset($_POST['contrasena1con'])){
	if(isset($_POST['contrasena1con'])==isset($_POST['contrasena2con'])){
		
		$userSession->setCurrentUser($userForm);
		$user->setUser($userForm);
		$tipo=$user->getTipoUsuario();
		$userSession->setTipoUsuario($tipo);
		if($tipo==1 || $tipo==4){
			header('location: Admin/index.php');
			}else if($tipo==2){
			header('location: Estudiante/postulaciones.php');
			}else if($tipo==3){
				header('location: Empresa/index.php');
			}

	}else{
		$mostrarDialogo=True;
		$errorContraconfir="Las contraseñas deben ser iguales, por favor intente nuevamente";
		$ingresarNuevaContra=true;
		include_once 'ingresoF.php';

	}

}else
	{
	include_once 'ingresoF.php';
}




?>

