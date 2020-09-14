<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/FormacionComplementaria.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');

class FormacionCompDAO{

private $con;
private $formativos;


public function __construct()
{
    $claseCon = new DB();
    $this->con =$claseCon->connect();
}


public function agregarformacionCom(FormacionComplementaria $formacion){
        
    $sql="insert into procesos_formativos (COD_HOJA_VIDA,
    COD_TIPO_FORMACION_COMPLEMENTARIA,
    TITULO_FORMACION_COMPLEMENTARIA,
    FECHA_FORMACION_COMPLEMENTARIA,
    INSTITUCION_EDUCATIVA_COMPLEMENTARIA)
    values 
    (?,?,?,?,?)";
    $respuesta=$this->con->prepare($sql)->execute([$formacion->getCodHojaVida(),$formacion->getCodTipoFormacion(),
    $formacion->getTituloFormacion(), $formacion->getFechaFormacion(),$formacion->getIntitucionFormacion()]);
    
    return $respuesta;

}



public function EditarformacionCom(FormacionComplementaria $formacion){
        
    $sql="UPDATE procesos_formativos SET (COD_HOJA_VIDA,
    COD_TIPO_FORMACION_COMPLEMENTARIA,
    TITULO_FORMACION_COMPLEMENTARIA,
    FECHA_FORMACION_COMPLEMENTARIA,
    INSTITUCION_EDUCATIVA_COMPLEMENTARIA)
    values 
    (?,?,?,?,?)";
    $respuesta=$this->con->prepare($sql)->execute([$formacion->getCodHojaVida(),$formacion->getCodTipoFormacion(),
    $formacion->getTituloFormacion(), $formacion->getFechaFormacion(),$formacion->getIntitucionFormacion()]);
    
    return $respuesta;

}


    public function darFormacionCompxHoja($cod){
        $sentencia = $this->con->prepare("SELECT * FROM procesos_formativos WHERE COD_HOJA_VIDA=" . $cod);
        $sentencia->execute();
        while ($fila = $sentencia->fetch()) {
            $formativos = new FormacionComplementaria(
                $fila[0],
                $fila[1],
                $fila[2],
                $fila[3],
                $fila[4],
                $fila[5]
            );
        }
        return $formativos;
    }

}
