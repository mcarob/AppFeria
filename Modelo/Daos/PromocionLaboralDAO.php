<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionLaboral.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');


/**
 * Representa el DAO de la clase PromocionPostulacion
 */
class PromocionLaboralDAO
{
    
    private $con;
    private $promocion;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
   



    public function totalVacantesActivas(){
        $sentencia = $this->con->prepare("SELECT * FROM vacantes_disponibles");
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    public function vistaPromocionLaboral(){
        $sentencia = $this->con->prepare("SELECT * FROM promocion_laboral WHERE promocion_estado = 1");
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    public function detallesPostulacion($pCodigoPromocion){
        $sentencia = $this->con->prepare("SELECT * FROM promocion_laboral2 WHERE cod_promocion_laboral =" .$pCodigoPromocion);
        $sentencia->execute();
        $row = $sentencia->fetch();
/*         $promocion = new PromocionLaboral($row[0], $row[1],$row[2], 
        $row[3],$row[4], $row[5], $row[6], 
        $row[7],$row[8], $row[9], $row[10],$row[11], 
        $row[12],$row[13],$row[14],$row[15]);

        return $promocion;
        $em = array();
        while ($fila = $sentencia->fetch()) {
           $em[] = $fila;  
       }*/
       return $row;

    }


    // Metodo 
    public function verOfertas($pCodigo){
        $sentencia = $this->con->prepare("SELECT * FROM promocion_laboral WHERE cod_empresa =:empresa"); 
        $sentencia->execute(['empresa'=>$pCodigo]);
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;  
        }
        return $em;
    }


    // Metodo para mostrar las ofertas activas buscando por el codigo de empresa
    public function verOfertas2($pCodigo){
        $sentencia = $this->con->prepare("SELECT * FROM promocion_laboral WHERE promocion_estado=1 and cod_empresa =:empresa"); 
        $sentencia->execute(['empresa'=>$pCodigo]);
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;  
        }
        return $em;
    }

    public function verOfertas3($pCodigo,$base,$cantidad){
        $sentencia = $this->con->prepare("SELECT * FROM  listar_promociones_disponibilidad WHERE promocion_estado=1 and cod_empresa =? and disponible>0 LIMIT ?, ?"); 
        $sentencia->execute([$pCodigo,$base,$cantidad]);
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;  
        }
        return $em;
    }
    public function vistaPromocionLaboral2($base,$cantidad){
        $sentencia = $this->con->prepare("SELECT * FROM  listar_promociones_disponibilidad WHERE promocion_estado=1  and disponible>0 LIMIT ?, ?"); 
        $sentencia->execute([$base,$cantidad]);
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }

    public function cantidadOfertas3($cod){
        $sentencia = $this->con->prepare("SELECT * FROM  listar_promociones_disponibilidad WHERE promocion_estado=1 and cod_empresa =? and disponible>0"); 
        $sentencia->execute([$cod]);
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;  
        }
        return count($em);
    }

    public function cantidadOfertas4(){
        $sentencia = $this->con->prepare("SELECT * FROM  listar_promociones_disponibilidad WHERE promocion_estado=1  and disponible>0"); 
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;  
        }
        return count($em);
    }


    public function ofertasActivasEinactivas($pCodigo){
        $sentencia = $this->con->prepare("SELECT * FROM promocion_laboral WHERE promocion_estado!=3 and cod_empresa =:empresa"); 
        $sentencia->execute(['empresa'=>$pCodigo]);
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }


    public function agregarOfertas(PromocionLaboral $oferta){
        
        $sql="insert into promocion_laboral (PROMOCION_PERFIL, PROMOCION_CONOCIMIENTO_BASE, PROMOCIO_HORARIO, PROMOCION_COMPENSACION,
        PROMOCION_RANGO_COMPENSACION, PROMOCION_BENEFICIOS, PROMOCION_CARGO_FUNCION, PROMOCION_INICIO, PROMOCION_DESCRIPCCION,
        COD_EMPRESA, PROMOCION_FECHA, PROMOCION_CIUDAD, TITULO_PROMOCION, LIMITE_VACANTES, PROMOCION_ESTADO)
        values 
        (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $respuesta=$this->con->prepare($sql)->execute([$oferta->getPromocionPerfil(),null,$oferta->getPromocionHorario(),$oferta->getPromocionCompensacion(),$oferta->getPromocionRangoCompensacion(),
        $oferta->getPromocionBeneficios(),$oferta->getPromocionCargoFuncion(),$oferta->getPromocionInicio(),$oferta->getPromocionDescripcion()
        ,$oferta->getCodEmpresa(),$oferta->getPromocionFecha(),$oferta->getPromocionCiudad(),$oferta->getTituloPromocion(),$oferta->getLimiteVacantes(),1]);
        
        return $respuesta;

    }

    public function cambiarEstado($cod){
        $promocion=$this->darPromocionXCodigo($cod);
        if($promocion->getPromocionEstado()==1)
        {
            $sentencia=$this->con->prepare("UPDATE promocion_laboral set PROMOCION_ESTADO= 2 WHERE COD_PROMOCION_LABORAL=".$cod);
            $respuesta=$sentencia->execute();
            return $respuesta;
            
        }else if($promocion->getPromocionEstado()==2)
        {
            $sentencia=$this->con->prepare("UPDATE promocion_laboral set PROMOCION_ESTADO= 1 WHERE COD_PROMOCION_LABORAL=".$cod);
            $respuesta=$sentencia->execute();
            return $respuesta;
        }else{

        }

    }  

    public function eliminar($cod){
        $promocion=$this->darPromocionXCodigo($cod);
        $sentencia=$this->con->prepare("UPDATE promocion_laboral set PROMOCION_ESTADO= 3 WHERE COD_PROMOCION_LABORAL=".$cod);
        $respuesta=$sentencia->execute();
        return $respuesta;

    }  

    public function darPromocionXCodigo($cod){
        
        $sentencia = $this->con->prepare("SELECT * FROM promocion_laboral WHERE COD_PROMOCION_LABORAL=".$cod);
        $sentencia->execute();
        while ($fila = $sentencia->fetch()) {
            $promocion = new PromocionLaboral($fila[0],
            $fila[1],$fila[2],$fila[3],$fila[4],$fila[5],
            $fila[6],$fila[7],$fila[8],$fila[9],
            $fila[10],$fila[11],$fila[12],$fila[13],$fila[14],
            $fila[15]);
        }
        return $promocion;
    }
    
    public function editarVacante(PromocionLaboral $promocion)
    {
        $sentencia = $this->con->prepare("UPDATE promocion_laboral SET 
        promocion_perfil='".$promocion->getPromocionPerfil()."',
        promocion_conocimiento_base='".$promocion->getPromocionConocimientoBase()."',
        promocio_horario='".$promocion->getPromocionHorario()."',
        promocion_compensacion=".$promocion->getPromocionCompensacion().",
        promocion_rango_compensacion='".$promocion->getPromocionRangoCompensacion()."',
        promocion_beneficios='".$promocion->getPromocionBeneficios()."',
        promocion_cargo_funcion='".$promocion->getPromocionCargoFuncion()."',
        promocion_inicio='".$promocion->getPromocionInicio()."',
        promocion_descripccion='".$promocion->getPromocionDescripcion()."',
        promocion_fecha='".$promocion->getPromocionFecha()."',
        promocion_ciudad='".$promocion->getPromocionCiudad()."',
        titulo_promocion='".$promocion->getTituloPromocion()."',
        limite_vacantes=".$promocion->getLimiteVacantes().",
        promocion_estado=".$promocion->getPromocionEstado()." 
        WHERE COD_PROMOCION_LABORAL =".$promocion->getCodPromocion());

        $res=$sentencia->execute();
        return $res;
    }

    // public function cambiarEstado(PromocionLaboral $promocion)
    // {
    //     if($promocion->getPromocionEstado()==1)
    //     {
    //     $sentencia = $this->con->prepare("UPDATE promocion_laboral SET 
    //     promocion_estado=".2." WHERE COD_PROMOCION_LABORAL =".$promocion->getCodPromocion());
    //     }else if($promocion->getPromocionEstado()==2)
    //     {
    //     $sentencia = $this->con->prepare("UPDATE promocion_laboral SET 
    //     promocion_estado=".1." WHERE COD_PROMOCION_LABORAL =".$promocion->getCodPromocion());
    //     }

    // }
}
?>