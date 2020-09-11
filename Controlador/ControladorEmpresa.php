<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');

class ControladorEmpresa{

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

		public function actualizarEmpresa(Empresa $empresa){
			$empresa_DAO=new EmpresaDAO();
			$resultado_empresa=$empresa_DAO->editarPerfil($empresa);
			return $resultado_empresa;
		}

		public function darBlobCamara($cod){
			$empresa_DAO=new EmpresaDAO();
			$resultado_empresa=$empresa_DAO->darBlobcc($cod);
			return $resultado_empresa;
		}

	
	}


    ?>