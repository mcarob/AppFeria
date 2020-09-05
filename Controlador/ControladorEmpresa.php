<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');

class ControladorEmpresas{

		private $empresas;

		public function darListaEmpresas()
		{
			$this->empresas = new EmpresaDAO();
			return $this->empresas->vistaEmpresas();
		}

		public function darListaEmpresasInscritas()
		{
			$this->empresas = new EmpresaDAO();
			return $this->empresas->vistaEmpresasInscritas();
		}

		public function validarEmpresa($COD){
			$this->empresas = new EmpresaDAO();
			return $this->empresas->validar($COD);
		}

	

	
	}


    ?>