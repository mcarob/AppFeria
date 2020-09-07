<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionPostulacion.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/PromocionPostulacionDAO.php');

class ControladorPostulacion{

		private $postulados;




		public function darListaPostulacionesxEst($cod)
		{
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->ListaDePostulaciones($cod);
		}

		public function agregarPostulacion($Postulacion)
		{
            $this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->agregarPost($Postulacion);
		}

		public function darListaPostulacionesTotal()
		{
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->totalPostulaciones();
		}

		public function HistorialPost()
		{
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->HistorialPostulaciones();
		}


		public function buscarPostulacionXempresa($cod)
		{
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->postulacionXempresa($cod);
		}
		
		public function cambiarEstado($cod,$estado){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->cambiarEstado($cod,$estado);
		}

		public function registrarMotivo($cod,$motivo){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->editarMotivo($cod,$motivo);
		}
		
	
	}


    ?>