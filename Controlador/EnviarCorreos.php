<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"> </script>
<script src="https://cdn.emailjs.com/dist/email.min.js" type="text/javascript"> </script>
<script>
<?php
class Enviar {


    public
    function enviarCorreo($destino,$email,$mensaje) {
        echo "<script> enviar(".$destino.",".$email.",".$mensaje.") </script>";
}
}



?>
<script>
function enviarCorreo(destino, email, message) {
    emailjs.init("user_S0nUbTMeFjFkFtpnbwgk9");
    emailjs.send("service_99n9rjg", "template_6xpna2m", data)
        .then(function(response) {
            if (response.text === 'OK') {
                alert('El correo se ha enviado de forma exitosa');
            }
            console.log("SUCCESS. status=%d, text=%s", response.status, response.text);
        }, function(err) {
            alert('Ocurrió un problema al enviar el correo');
            console.log("FAILED. error=", err);
        });

}
</script>