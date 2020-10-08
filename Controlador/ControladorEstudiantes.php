
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');

class ControladorEstudiantes	{

		private $estudiantes;



		public function verFormalizado($cod)
		{
			$this->estudiantes = new EstudianteDAO();
			return $this->estudiantes->verFormalizado($cod);
		}

		public function darListaEstudianteActivos()
		{
			$this->estudiantes = new EstudianteDAO();
			return $this->estudiantes->vistaEstudiantes();
		}

		public function actualizarPerfil(Estudiante $estudiante)
		{
			$this->estudiantes=new EstudianteDAO();
			return $this->estudiantes->editarPerfil($estudiante);
		}
		
		public function darEstudiante($id){
			$this->estudiantes=new EstudianteDAO();
			return $this->estudiantes->devolverEstudiante($id);
		}


		public function darEstA()
		{
			$this->estudiantes = new EstudianteDAO();
			return $this->estudiantes->totalEstudiantesA();
		}

		public function darEstI()
		{
			$this->estudiantes = new EstudianteDAO();
			return $this->estudiantes->totalEstudiantesi();
		}

		public function darTotalEst()
		{
			$this->estudiantes = new EstudianteDAO();
			return $this->estudiantes->totalEstudiantes();
		}

		public function editarNotificacion($cod_desde,$cod_para,$mensaje,$cod_select){
			$this->estudiantes = new EstudianteDAO();
			return $this->estudiantes->agregarNoti($cod_desde,$cod_para, $mensaje, $cod_select);
		}



	}


    ?>