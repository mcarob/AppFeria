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



//filtro Sin
public function ofertassinFiltroEstudiante($base,$cantidad)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->ofertassinFiltroEstudiante($base,$cantidad);
}

public function cantidadofertasSinFiltro(){

	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadofertasSinFiltro();
}
// filtro con 

public function ofertasConFiltroEstudiante($empresa,$base,$cantidad)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->ofertasConFiltroEstudiante($empresa,$base,$cantidad);
}

public function cantidadofertasConFiltro($empresa){

	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadofertasConFiltro($empresa);
}
	

# filtros sin
public function ofertasFiltroPalabraSinEmpresaEstudiante($desde,$hasta,$buscar){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->ofertasFiltroPalabraSinEmpresaEstudiante($desde,$hasta,$buscar);
	
}
public function cantidadofertasFiltroPalabraSinEmpresaEstudiante($buscar){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadofertasFiltroPalabraSinEmpresaEstudiante($buscar);
}

# filtros Con
public function ofertasFiltroPalabraConEmpresaEstudiante($emp,$desde,$hasta,$buscar){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->ofertasFiltroPalabraConEmpresaEstudiante($emp,$desde,$hasta,$buscar);
	
}
public function cantidadofertasFiltroPalabraConEmpresaEstudiante($emp,$buscar){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadofertasFiltroPalabraConEmpresaEstudiante($emp,$buscar);
}


# filtros sin
public function ofertasFiltroCiudadSinEmpresaEstudiante($desde,$hasta,$buscar){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->ofertasFiltroCiudadSinEmpresaEstudiante($desde,$hasta,$buscar);
	
}
public function cantidadofertasFiltroCiudadSinEmpresaEstudiante($buscar){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadofertasFiltroCiudadSinEmpresaEstudiante($buscar);
}
# filtros con
public function ofertasFiltroCiudadConEmpresaEstudiante($emp,$desde,$hasta,$buscar){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->ofertasFiltroCiudadConEmpresaEstudiante($emp,$desde,$hasta,$buscar);
	
}
public function cantidadofertasFiltroCiudadConEmpresaEstudiante($emp,$buscar){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadofertasFiltroCiudadConEmpresaEstudiante($emp,$buscar);
}
// filtros sin
public function ofertasFiltroCiudadPalabraSinEmpresaEstudiante($desde,$hasta,$buscar,$ciudad){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->ofertasFiltroCiudadPalabraSinEmpresaEstudiante($desde,$hasta,$buscar,$ciudad);

}
public function cantidadofertasFiltroCiudadPalabraSinEmpresaEstudiante($buscar,$ciudad){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadofertasFiltroCiudadPalabraSinEmpresaEstudiante($buscar,$ciudad);

}
// filtros con
public function ofertasFiltroCiudadPalabraConEmpresaEstudiante($emp,$desde,$hasta,$buscar,$ciudad){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->ofertasFiltroCiudadPalabraConEmpresaEstudiante($emp,$desde,$hasta,$buscar,$ciudad);

}
public function cantidadofertasFiltroCiudadPalabraConEmpresaEstudiante($emp,$buscar,$ciudad){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadofertasFiltroCiudadPalabraConEmpresaEstudiante($emp,$buscar,$ciudad);

}

public function darVacantaseNueva($pCodigo,$desde,$hasta)
{
	$empresa_DAO=new EmpresaDAO();
	$codigo=$empresa_DAO->darEmpresaXCodigo($pCodigo)->getCodEmpresa();
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->verOfertasNueva($codigo,$desde,$hasta);
}

public function OfertasEmpresaPalabra($pCodigo,$desde,$hasta,$buscar){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->OfertasEmpresaPalabra($pCodigo,$desde,$hasta,$buscar);
}


public function cantidadOfertasEmpresaPalabra($cod,$buscar){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadOfertasEmpresaPalabra($cod,$buscar);
}
public function OfertasEmpresaSinFiltro($cod,$desde,$hasta){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->OfertasEmpresaSinFiltro($cod,$desde,$hasta);
}
public function cantidadOfertasEmpresaSinFiltro($empresa){
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->cantidadOfertasEmpresaSinFiltro($empresa);
}

public function verOfertas($cod){

	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->verOfertas($cod);

}

public function verOfertas2($cod){

	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->verOfertas2($cod);

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