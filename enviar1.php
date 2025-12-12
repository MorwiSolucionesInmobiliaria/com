<?php
// =============================
// CONFIGURACIÓN DEL CORREO
// =============================

// Coloca aquí el correo donde quieres recibir los mensajes
$destino = "morwisolucionesinmobiliaria@gmail.com";

// Recibir los datos del formulario
$nombre  = $_POST['nombre'] ?? '';
$celular = $_POST['celular'] ?? '';
$correo  = $_POST['correo'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

// Validación básica
if (!$nombre || !$celular || !$correo || !$mensaje) {
    echo "Error: Faltan datos obligatorios.";
    exit;
}

// Formato del correo
$asunto = "Nuevo mensaje desde tu web - Morwi Soluciones Inmobiliarias, formulario para contacto con el cliente";

$cuerpo = "
<h2>Nuevo mensaje desde el sitio web</h2>
<p><strong>Nombre:</strong> $nombre</p>
<p><strong>Celular:</strong> $celular</p>
<p><strong>Correo:</strong> $correo</p>
<p><strong>Mensaje:</strong><br>$mensaje</p>
";

// Encabezados (HTML)
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: $nombre <$correo>\r\n";
$headers .= "Reply-To: $correo\r\n";

// Envío del correo
if (mail($destino, $asunto, $cuerpo, $headers)) {
   header("Location: gracias.html");
exit;
    
} else {
    echo "<h2>Error al enviar el mensaje.</h2>";
    echo "<p>Por favor intenta nuevamente más tarde.</p>";
}
?>
