<?php
$destinatario = "morwisolucionesinmobiliaria@gmail.com"; // Cambiar por tu correo
$asunto = "Nuevo mensaje de contacto";

$nombre = htmlspecialchars($_POST['nombre']);
$celular = htmlspecialchars($_POST['celular']);
$correo = htmlspecialchars($_POST['correo']);
$mensaje = htmlspecialchars($_POST['mensaje']);

$contenido = "Nombre: $nombre\nCelular: $celular\nCorreo: $correo\nMensaje: $mensaje";

$headers = "From: $correo\r\n";
$headers .= "Reply-To: $correo\r\n";
$headers .= "X-Mailer: PHP/".phpversion();

if(mail($destinatario,$asunto,$contenido,$headers)){
    header("Location: gracias2.html");
    exit;
}else{
    echo "Error al enviar el correo. Intenta nuevamente.";
}
?>
