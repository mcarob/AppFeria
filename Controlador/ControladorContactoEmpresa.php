<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ContactoEmpresa.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/ContactoEmpresaDAO.php');

class ControladorContactoEmpresa{


		public function actualizarContactoEmpresa(ContactoEmpresa $ContactoEmpresa){
			$contactoEmpresa_DAO=new ContactoEmpresaDAO();
			$resultado_ContactoEmpresa=$contactoEmpresa_DAO->editarPerfil($ContactoEmpresa);
			return $resultado_ContactoEmpresa;
		}

	

	
	}


    ?>