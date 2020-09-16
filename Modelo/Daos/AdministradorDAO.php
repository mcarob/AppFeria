<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Administrador.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');

/**
 * Representa el DAO de la clase Usuario
 */
class AdministradorDAO
{
   
    private $con;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
    public function crearAdministrador( Administrador $nuevoAdministrador)
    {   
        $sql = "INSERT INTO ADMINISTRADOR VALUES (default , 2 '". "','" . $nuevoAdministrador->getNomAdministrador() . "','". $nuevoAdministrador->getApellidoAdministrador(). "','" . $nuevoAdministrador->getCorreoAdministrador().")'";
       
        

    }
 
    public function devolverAdministrador($codigo_usuario){

        $query=$this->con->prepare('SELECT * FROM administrador WHERE COD_USUARIO=:user');
        $query->execute(['user'=>$codigo_usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $administrador_devolver = new Administrador($kk['COD_ADMINISTRADOR'],$kk['COD_USUARIO'],$kk['NOMBRE_ADMINISTRADOR'],$kk['APELLIDO_ADMINISTRADOR'],$kk['CORREO_ADMINISTRADOR']);
                 return $administrador_devolver;
            }
        }
    }

    public function buscarAdministradorCOD($pAdm)
    {
        $sql = 'SELECT * FROM administrador WHERE COD_ADMINISTRADOR = ' . $pAdm;
        if (!$result = pg_query($this->con, $sql)) die();
        $row = pg_fetch_array($result);

        $administador = new Administrador($row[0], $row[1], $row[2], $row[3], $row[4]);
        return $administador;
    }

    public function editarPerfil(Administrador $administrador){
        $sentencia = $this->con->prepare("UPDATE administrador SET 
        COD_USUARIO=".$administrador->getCodUsuario().",
        NOMBRE_ADMINISTRADOR='".$administrador->getNomAdministrador()."',
        APELLIDO_ADMINISTRADOR='".$administrador->getApellidoAdministrador()."',
        CORREO_ADMINISTRADOR='".$administrador->getCorreoAdministrador()."'      
        WHERE COD_ADMINISTRADOR =".$administrador->getCodAdministrador());
        
        $res=$sentencia->execute();
        return $res;
    }
    


}
?>