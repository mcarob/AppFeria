
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');

class ControladorEstudiantes	{

		private $estudiantes;




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
	}


    ?>