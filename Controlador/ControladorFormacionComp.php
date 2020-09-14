<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/FormacionComplementaria.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/FormacionComp.php');

class ControladorFormacionComp{

		private $formacion;




		public function agregar($formacionCom)
		{
			$this->formacion = new FormacionCompDAO();
			return $this->formacion->agregarformacionCom($formacionCom);
		}

		public function editarFormacionComp($formacionCom)
		{
			$this->formacion = new FormacionCompDAO();
			return $this->formacion->EditarFormacionCom($formacionCom);
		}

		public function darFormacionCompxCOD($cod){
			$this->formacion = new FormacionCompDAO();
			return $this->formacion->darFormacionCompxHoja($cod);
		}
    
        
	}


    ?>