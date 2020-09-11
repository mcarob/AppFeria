<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/PHPMailer/src/Exception.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/PHPMailer/src/PHPMailer.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/PHPMailer/src/SMTP.php');


class enviarCorreo{


    public function enviarMensaje($nombre,$para,$asunto,$mensaje){
        echo("entra a la linea 15  enviar correo :D");
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->Username='proyectoferia20202@gmail.com';
        $mail->Password='feria1234';
        
        
        $mail->setFrom('proyectoferia20202@gmail.com','Feria Laboral Universidad El Bosque');
        $mail->addAddress($para);
        $mail->subject=$asunto;
        $mail->isHTML(true);
        $mail->AddEmbeddedImage('../assets/img/logo1.png', 'my-photo', 'logo.png'); 
        $mail->Body='
                    <div style="display:flex;
                    align-items:center;
                    justify-content:center;">  <img  alt="PHPMailer" src="cid:my-photo">    
                    </div>

                    <h1 align=center> Feria de Oportunidades Universidad El Bosque </h1>
                    <br> 
                    <br>
                    <p> Muy buenas '.$nombre.'  </p>
                    <br>
                    <p>'.$mensaje.'  </p>
                    ';
if(!$mail->send()){
    return 0;
}else{
    return 1;
}

    }
}
?>