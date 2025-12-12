<?php
// Configuración del correo
$destinatario = "morwisolucionesinmobiliaria@gmail.com"; // Cambia esto por tu correo
$asunto = "Nuevo mensaje de contacto desde la propiedad 001 me interesa";

// Obtener datos del formulario y sanitizar
$nombre = htmlspecialchars(trim($_POST['nombre']));
$telefono = htmlspecialchars(trim($_POST['telefono']));
$correo = htmlspecialchars(trim($_POST['correo']));
$mensaje = htmlspecialchars(trim($_POST['mensaje']));

// Validación básica
if(empty($nombre) || empty($telefono) || empty($correo) || empty($mensaje)){
    echo "Por favor completa todos los campos.";
    exit;
}

// Preparar el cuerpo del mensaje
$cuerpo = "Nombre: $nombre\n";
$cuerpo .= "Teléfono: $telefono\n";
$cuerpo .= "Correo: $correo\n\n";
$cuerpo .= "Mensaje:\n$mensaje";

// Cabeceras
$headers = "From: $correo\r\n";
$headers .= "Reply-To: $correo\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Enviar correo
if(mail($destinatario, $asunto, $cuerpo, $headers)){
    echo "<script>alert('Mensaje enviado correctamente.'); window.location='index.html';</script>";
} else {
    echo "<script>alert('Error al enviar el mensaje. Intenta nuevamente.'); window.history.back();</script>";
}
?>
