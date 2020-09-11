<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"> </script>
<script src="https://cdn.emailjs.com/dist/email.min.js" type="text/javascript"> </script>

<?php
class Enviar {


    public function enviarCorreo($destino, $email, $mensaje) {
        echo "<script> enviarCorreo(".$destino.
        ",".$email.
        ",".$mensaje.
        ") 
</script>";
}
}



?>

<script>
    function enviarCorreo(destino, email, message) {
    emailjs.init("user_S0nUbTMeFjFkFtpnbwgk9");
    emailjs.send("service_99n9rjg", "template_6xpna2m", data)
    .then(function(response) {
    if (response.text === 'OK') {
     <?php  return 1; ?>
    }
    <?php  return 2; ?>
    }, function(err) {
        <?php  return 0; ?>
    });

    }
</script>