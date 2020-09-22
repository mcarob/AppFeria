<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Administrador.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ContactoEmpresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/EnviarCorreos.php');
/*   
tipo 1 admin
tipo 2 estudiante
tipo 3 empresa
tipo 4 admin-auditor
*/
class Usuario extends DB{

    private $tipoUsuario;
    private $nombreUsuario;
    private $correo;
    private $contacto_empresa;
    private $codigo;
    private $codigo2;
    private $estado;
    private $verificacion;
    private $estado_empresa;
    private $codigoEmpresa;


    public function darCodigoEmpresa(){
        return $this->codigoEmpresa;
    }
    

    public function darEstado_empresa(){
        return $this->estado_empresa;
    }

    public function darEstado(){
        return $this->estado;
    }
    public function darVerificacion(){
        return $this->verificacion;
    }

    public function darnombreContactoE(){
        return $this->contacto_empresa;
    }
    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }

    public function darCorreo(){
        return $this->correo;
    }
    public function darNombreUsuario(){
        return $this->nombreUsuario;
    }
    public function cambiarEstadoValido(){
        $query=$this->connect()->prepare('UPDATE usuario SET ESTADO_USUARIO=1 WHERE COD_USUARIO=?');
        $query->execute([$this->codigo]);
    }

    public function darIngreso($user,$pass){
        $md5pass =md5($pass);
        $query=$this->connect()->prepare('SELECT * FROM usuario WHERE USER_USUARIO=:user and CONTRA_USUARIO=:cont');
        $query->execute(['user'=>$user,'cont'=>$md5pass]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $thipou=$kk['COD_TIPO_USUARIO'];
                $this->estado=$kk['ESTADO_USUARIO'];
                $this->verificacion=$kk['CODIGO_VERIFICACION'];
                return $thipou;
            }
        }else{ 
            return 0;
        }
    }

    public function darCodigo(){

        
        return $this->codigo;

    }

    public function darCodigo2(){

        
        return $this->codigo;

    }

    public function setUser($usuario){
        $query=$this->connect()->prepare('SELECT * FROM usuario WHERE USER_USUARIO=:user');
        $query->execute(['user'=>$usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $thipou=$kk['COD_TIPO_USUARIO'];
                $cod_usuario=$kk['COD_USUARIO'];
                $this->codigo=$cod_usuario;
                $this->tipoUsuario= $thipou;
                $this->estado_empresa=$kk['VALIDADO'];
                if($thipou==1 || $thipou==4){
                    $query=$this->connect()->prepare('SELECT * FROM administrador WHERE COD_USUARIO=:id');
                    $query->execute(['id'=>$cod_usuario]);
                    foreach ($query as $kk) {
                        $this->nombreUsuario=$kk['NOMBRE_ADMINISTRADOR']." ".$kk['APELLIDO_ADMINISTRADOR'];
                        $this->correo=$kk['CORREO_ADMINISTRADOR'];
                    }
                }else if($thipou==2){
                    $query=$this->connect()->prepare('SELECT * FROM estudiante WHERE COD_USUARIO=:id');
                    $query->execute(['id'=>$cod_usuario]);
                    foreach ($query as $kk) {
                        $this->nombreUsuario=$kk['NOMBRE_ESTUDIANTE']." ".$kk['APELLIDO_ESTUDIANTE'];
                        $this->correo=$kk['CORREO_ESTUDIANTE'];
                    }
                }else {
                    $query=$this->connect()->prepare('SELECT * FROM infoempresa_contacto WHERE COD_USUARIO=:id');
                    $query->execute(['id'=>$cod_usuario]);
                    foreach ($query as $kk) {
                        $this->nombreUsuario=$kk['RAZON_SOCIAL'];
                        $this->correo=$kk['CORREO_CONTACTO'];
                        $this->contacto_empresa=$kk['NOM_CONTACTO']." ".$kk['APELLIDO_CONTACTO'];
                        $this->codigoEmpresa=$kk['COD_EMPRESA'];
                    }
                }
            }
        }
    }
    public function existeCorreo($usuario){
        $query=$this->connect()->prepare('SELECT * FROM usuario WHERE USER_USUARIO=:user');
        $query->execute(['user'=>$usuario]);
        if($query->rowCount()){
            return 1;
        }
        else{
            return 0;
        }
    }
    public function mandarCorreoRecuperacion($usuario){
        $classEnviar= new enviarCorreo();
        $codigo=intval(rand(0,9).rand(0,9).rand(0,9).rand(0,9));
        $md5Codigo=md5($codigo);
        $mensaje=' Para continar con el proceso de Recuperación de Contraseña, por favor ingresa  el codigo de verificacion que esta a continuación :  '.$codigo. " podrás actualizar tu contraseña
        para quqe puedas volver a ingresar a la aplicación, recuerda que si no completas este proceso, tendrás que volver a pedir un codigo de verificación.";
        if($this->tipoUsuario==1 ||  $this->tipoUsuario=4){

            $r1=$classEnviar->enviarMensaje($this->nombreUsuario,$usuario,'Recuperación de Contraseña Oportunidades El Bosque',$mensaje);
        }else if( $this->tipoUsuario==2){

            $r1=$classEnviar->enviarMensaje($this->nombreUsuario,$usuario,'Recuperación de Contraseña Oportunidades El Bosque',$mensaje);
        }else{

            $r1=$classEnviar->enviarMensaje($this->nombreUsuario,$usuario,'Recuperación de Contraseña Oportunidades El Bosque',$mensaje);
        }
        if($r1){
            $query=$this->connect()->prepare('UPDATE usuario SET CODIGO_VERIFICACION=? WHERE USER_USUARIO=?');
            $query->execute([$md5Codigo,$this->codigo]);
            return 1;
        }else{
            return "hubo unos problemas, por favor vuelve a intentar mas tarde, trabajamos para arreglar el inconveniente";
        }


    }

    public function setUserxCod($usuario){
        $query=$this->connect()->prepare('SELECT * FROM usuario WHERE COD_USUARIO=:user');
        $query->execute(['user'=>$usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $thipou=$kk['COD_TIPO_USUARIO'];
                $cod_usuario=$kk['COD_USUARIO'];
                $this->codigo=$cod_usuario;
                $this->tipoUsuario= $thipou;
                $this->estado_empresa=$kk['VALIDADO'];
                if($thipou==1 || $thipou==4){
                    $query=$this->connect()->prepare('SELECT * FROM administrador WHERE COD_USUARIO=:id');
                    $query->execute(['id'=>$cod_usuario]);
                    foreach ($query as $kk) {
                        $this->nombreUsuario=$kk['NOMBRE_ADMINISTRADOR']." ".$kk['APELLIDO_ADMINISTRADOR'];
                        $this->correo=$kk['CORREO_ADMINISTRADOR'];
                    }
                }else if($thipou==2){
                    $query=$this->connect()->prepare('SELECT * FROM estudiante WHERE COD_USUARIO=:id');
                    $query->execute(['id'=>$cod_usuario]);
                    foreach ($query as $kk) {
                        $this->nombreUsuario=$kk['NOMBRE_ESTUDIANTE']." ".$kk['APELLIDO_ESTUDIANTE'];
                        $this->correo=$kk['CORREO_ESTUDIANTE'];
                    }
                }else {
                    $query=$this->connect()->prepare('SELECT * FROM infoempresa_contacto WHERE COD_USUARIO=:id');
                    $query->execute(['id'=>$cod_usuario]);
                    foreach ($query as $kk) {
                        $this->nombreUsuario=$kk['RAZON_SOCIAL'];
                        $this->correo=$kk['CORREO_CONTACTO'];
                        $this->contacto_empresa=$kk['NOM_CONTACTO']." ".$kk['APELLIDO_CONTACTO'];
                    }
                }
            }
        }
    }


}

?>