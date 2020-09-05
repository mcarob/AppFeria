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


  

    public function EditarPerfil($cod_administrador, $correo_nuevo, $nombre, $apellido, $correo, $contraseña){
        $sql = "UPDATE ADMINISTRADOR SET correo_Administrador='".$correo_nuevo."' and nombre_administrador='".$nombre."' 
        and apellido_administrador='".$apellido."' and correo_administrador='".$correo."' WHERE COD_ADMINISTRADOR= $cod_administrador";
        $result =mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result);
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

    public function editarAdministrador(Administrador $administador)
    {
        $query=$this->con->prepare('UPDATE administrador WHERE COD_USUARIO=:user');

        
        $result = $sql = "UPDATE administrador SET NOMBRE_ADMINISTRADOR='" . $administrador->getNomAdministrador() . "', CORREO_ADMINISTRADOR='" . $administrador->getCorreoAdministrador() . "' WHERE COD_ADMINISTRADOR =" . $cliente->getCod_Administrador();
        $result = mysqli_query($this->con, $sql);
        return pg_fetch_all($result);
    }

    public function editarPerfilAdministrador($codigo_usuario){

        $query=$this->con->prepare('UPDATE administrador WHERE COD_USUARIO=:user');
        $query->execute(['user'=>$codigo_usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $editar_administrador = new Administrador($kk['COD_ADMINISTRADOR'],$kk['COD_USUARIO'],$kk['NOMBRE_ADMINISTRADOR'],$kk['APELLIDO_ADMINISTRADOR'],$kk['CORREO_ADMINISTRADOR']);
                 return $editar_administrador;
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

    


}
?>