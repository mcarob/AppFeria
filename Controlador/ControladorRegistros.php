<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');

class ControladorRegistros
{

    private $daoEmpresa;
    private $entidadEmpresa;

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
}
/*  */
/*  */
?>				