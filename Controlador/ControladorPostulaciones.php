<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionPostulacion.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/PromocionPostulacionDAO.php');

class ControladorPostulacion{

		private $postulados;



		public function darNombreCiudad($cod)
		{
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->buscarNomCiudad($cod);
		}
		public function darListaPostulacionesxEst($cod)
		{
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->ListaDePostulaciones($cod);
		}

		public function darListaPostulacionesxpost($cod)
		{
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->ListaDePostulacionesXcodPost($cod);
			
		}

		public function agregarPostulacion($Postulacion)
		{
            $this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->agregarPost($Postulacion);
		}
		public function agregarLegalizacion($legal)
		{
            $this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->agregarLel($legal);
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
		

		public function legalizarC($estudiante_codigo,$cod_postulacion1 ,$codempre,$codciu){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->legalizar($estudiante_codigo,$cod_postulacion1 ,$codempre,$codciu);
		}
		public function cambiarEstado($cod,$estado){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->cambiarEstado($cod,$estado);
		}

		public function registrarMotivo($cod,$motivo, $des){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->editarMotivo($cod,$motivo, $des);
		}
		
		public function practicantesXe($cod){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->practicantesXempresa($cod);
		}

		public function darPostA(){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->totalPostulacionesA();
		}

		public function darPostI(){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->totalPostulacionesI();
		}

		public function darPostFor(){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->totalPostulacionesFOR();
			
		}

		public function darPost(){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->totalPostulacionesChard();
		}

		public function darPostAXE($cod){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->totalPostulacionesASXempresa($cod);
		}
		public function darPostIXE($cod){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->totalPostulacionesREXempresa($cod);
		}
		public function darPostEPXE($cod){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->totalPostulacionesEPXempresa($cod);
		}
		public function darPostFORXE($cod){
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->totalPostulacionesFORXempresa($cod);
		}
		
	
	}


    ?>