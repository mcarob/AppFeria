<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');


class ControladorRegistros
{

    private $daoEmpresa;
    private $entidadEmpresa;
    private $daoEstudiante;


    public function verificarNIT($nit)
    {
        $daoEmpresa = new EmpresaDAO();
        return $daoEmpresa->buscarEmpresaxNit($nit);
    }
    public function buscarCorreo($correo)
    {
        $daoEmpresa = new EmpresaDAO();
		return $daoEmpresa->buscarCorreo($correo);
	}
	public function registrarEmpresa($var){
		$daoEmpresa = new EmpresaDAO();
		return $daoEmpresa->registrarEmpresaProcedimiento($var);
    }
    public function usuarioEstudianteExiste($user){
        
        $daoEstudiante= new EstudianteDAO();
        return ($daoEstudiante->buscarCorreo($user));
    }
    public function registrarEstudiante($arreglo){
        
        $daoEstudiante= new EstudianteDAO();
        return ($daoEstudiante->registrarEstudiante($arreglo));

    }
}
/*  */
/*  */
?>				