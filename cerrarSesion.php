<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user_Sesion.php');

	$Usersesion= new UserSession();
	$Usersesion->closeSession();

	header("location: index.php");


 ?>