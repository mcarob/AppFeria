<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
require_once( $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');


/**
 * Representa el DAO de la clase Estudiante
 */
class EstudianteDAO
{
    
    private $con;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
    public function crearEstudiante( Estudiante $nuevoEstudiante)
    {   
        $sql = "INSERT INTO ESTUDIANTE VALUES (default ,'" . $nuevoEstudiante->getCedEstudiante() . "','" . $nuevoEstudiante->getCorreoEstudiante() . "', . 1 . ,'" . $nuevoEstudiante->getNombreEstudiante(). "','" . $nuevoEstudiante->getApellidoEstudiante(). "','" . $nuevoEstudiante->getCodProgamaAcademico(). "','" . $nuevoEstudiante->getSemestreEstudiante(). "','" . $nuevoEstudiante->getCorreoPersonal().")'";
        $result =mysqli_query($this->con, $sql);
        return mysqli_fetch_all($result);

    }



    // Lista de estudiantes con el usuario activo
    public function vistaEstudiantes(){
        $sentencia = $this->con->prepare("SELECT * FROM vistaEstudiantes where estado_usuario=1");
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    
    public function devolverEstudiante($codigo_usuario){

        $query=$this->con->prepare('SELECT * FROM estudiante WHERE COD_USUARIO=:user');
        $query->execute(['user'=>$codigo_usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $estudiante_devolver = new Estudiante($kk['COD_ESTUDIANTE'],$kk['CED_ESTUDIANTE'],$kk['CORREO_ESTUDIANTE'],$kk['COD_USUARIO'],$kk['NOMBRE_ESTUDIANTE'],$kk['APELLIDO_ESTUDIANTE'],$kk['COD_PROGRAMA_ACADEMICO'],$kk['SEMESTRE_ESTUDIANTE']);
                return $estudiante_devolver;
            }
        }
    }
    

    public function editarPerfil(Estudiante $estudiante){
        $sentencia = $this->con->prepare("UPDATE estudiante SET 
        CED_ESTUDIANTE='".$estudiante->getCedEstudiante()."',
        CORREO_ESTUDIANTE='".$estudiante->getCorreoEstudiante()."',
        COD_USUARIO=".$estudiante->getCodUsuario().",
        NOMBRE_ESTUDIANTE='".$estudiante->getNombreEstudiante()."',
        APELLIDO_ESTUDIANTE='".$estudiante->getApellidoEstudiante()."',
        COD_PROGRAMA_ACADEMICO=".$estudiante->getCodProgamaAcademico().",
        SEMESTRE_ESTUDIANTE=".$estudiante->getSemestreEstudiante()."
        WHERE COD_ESTUDIANTE =".$estudiante->getCodEstudiante());

        $res=$sentencia->execute();
        return $res;
    }
    public function buscarCorreo($correo){
        $sentencia = $this->con->prepare("SELECT  * from usuario where USER_USUARIO=?");
        $sentencia->execute([$correo]);
        $nrows = $sentencia->fetchAll();

        return $nrows;
    }

}
?>