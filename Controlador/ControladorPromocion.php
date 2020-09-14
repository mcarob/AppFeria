<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/PromocionLaboralDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');


class ControladorPromocion{

private $promociones;

public function darListaPromociones()
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->vistaPromocionLaboral();
}
public function darListaPromociones2($base,$cantidad)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->vistaPromocionLaboral2($base,$cantidad);
}
public function darInformacion($pCodigo)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->detallesPostulacion($pCodigo);
}


public function darVacantase($pCodigo)
{
	$empresa_DAO=new EmpresaDAO();
	$codigo=$empresa_DAO->darEmpresaXCodigo($pCodigo)->getCodEmpresa();
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->verOfertas($codigo);
}


public function verOfertas($cod){

	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->verOfertas($cod);

}

public function verOfertas2($cod){

	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->verOfertas2($cod);

}
public function verOfertas3($cod,$base,$cantidad){

	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->verOfertas3($cod,$base,$cantidad);

}
public function cantidadOfertas3($cod){

	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadOfertas3($cod);
	

}
public function cantidadOfertas4(){

	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadOfertas4();
}
	

public function agregarPromocion($promocion)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->agregarOfertas($promocion);
}

public function darListaVacantesTotal()
{
	$this->postulados = new PromocionLaboralDAO();
	return $this->postulados->totalVacantesActivas();
}
public function actualizarPromocion($pPromocion)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->editarVacante($pPromocion);
}
public function darOferta($pCodigo)
{
	$oferta_DAO=new PromocionLaboralDAO();
	$promocion=$oferta_DAO->darPromocionXCodigo($pCodigo);
	return $promocion;
}
public function actualizarVacante(PromocionLaboral $promocion)
{
	$oferta_DAO=new PromocionLaboralDAO();
	$promocion=$oferta_DAO->editarVacante($promocion);
	return $promocion;
}

public function cambiarEstadoVacante($codigo)
{
	$oferta_DAO=new PromocionLaboralDAO();
	$promocion=$oferta_DAO->cambiarEstado($codigo);
	return $promocion;
}

public function eliminarVacante($codigo)
{
	$oferta_DAO=new PromocionLaboralDAO();
	$promocion=$oferta_DAO->eliminar($codigo);
	return $promocion;
}


public function OfertasXempresaAI($cod){
	$oferta_DAO=new PromocionLaboralDAO();
	$promocion=$oferta_DAO->ofertasActivasEinactivas($cod);
	return $promocion;
}




}




?>